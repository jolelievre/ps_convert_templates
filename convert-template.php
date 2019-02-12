<?php

include_once 'vendor/autoload.php';

$templateFolder = realpath($argv[1]);
if (!is_dir($templateFolder)) {
    throw new RuntimeException('Invalid template folder: '.$templateFolder);
}

$outputFolder = realpath($argv[2]);
if (!is_dir($outputFolder)) {
    throw new RuntimeException('Invalid output folder: '.$outputFolder);
}

$fileSystem = new \Symfony\Component\Filesystem\Filesystem();
$finder = new \Symfony\Component\Finder\Finder();
$finder->files()->name('*.php')->in($templateFolder)->sortByName();

$ignoredFiles = [
    'viewer.php',
    'header.php',
    'header_order_conf.php',
    'footer.php',
];

/** @var \Symfony\Component\Finder\SplFileInfo $file */
foreach ($finder as $file) {
    $relativePath = $file->getRelativePath() . DIRECTORY_SEPARATOR . $file->getBasename();
    if (in_array($file->getBasename(), $ignoredFiles)) {
        echo 'Ignoring ' . $relativePath . PHP_EOL;
        continue;
    }
    $targetPath = str_replace('.php', '.html.twig', $outputFolder . DIRECTORY_SEPARATOR . $relativePath);
    echo 'Converting ' . $relativePath .' to ' . $targetPath . PHP_EOL;

    $templateContent = file_get_contents($file->getRealPath());

    $twigLayout = 'layout.html.twig';
    $headerRegexp = "/\<\?php include *\('header\.php'\); \?\>/";
    if (!preg_match($headerRegexp, $templateContent)) {
        $headerRegexp = "/\<\?php include \('header_order_conf\.php'\); \?\>/";
        $twigLayout = 'order_layout.html.twig';
        if (!preg_match($headerRegexp, $templateContent)) {
            throw new RuntimeException('File without header needs to be ignored '.$file->getRealPath());
        }
    }

    $footerRegexp = "/\<\?php include *\('footer\.php'\); \?\>/";
    if (!preg_match($footerRegexp, $templateContent)) {
        throw new RuntimeException('File without footer needs to be ignored '.$file->getRealPath());
    }

    $templateContent = preg_replace($headerRegexp, '', $templateContent);
    $templateContent = preg_replace($footerRegexp, '', $templateContent);

    //Replace echo of variables
    $templateContent = convertVariables($templateContent);

    //Replace translations
    $templateContent = convertTranslations($templateContent);

    //Replace schema urls
    $templateContent = preg_replace('_http://schema\.org_', 'https://schema.org', $templateContent);

    $phpTagRegexp = "/\<\?php(.*)/";
    if (preg_match($phpTagRegexp, $templateContent, $matches)) {
        throw new RuntimeException('File still has php code '.$file->getRealPath().': '.var_export($matches, true));
    }
    $templateContent = trim($templateContent);
    $templateContent = preg_replace('/\t/', '  ', $templateContent);

    $layout = <<<END_LAYOUT
{% extends '@MailThemes/classic/components/$twigLayout' %}

{% block content %}
@@TEMPLATE_CONTENT@@
{% endblock %}

END_LAYOUT;
    $templateContent = str_replace('@@TEMPLATE_CONTENT@@', $templateContent, $layout);

    $exportFolder = dirname($targetPath);
    if (!is_dir($exportFolder)) {
        $fileSystem->mkdir($exportFolder);
    }

    file_put_contents($targetPath, $templateContent);
}

function convertVariables($templateContent)
{
    $echoVariableRegexp = '/\<\?php +echo +\$(\w+) +\?\>/';
    if (preg_match($echoVariableRegexp, $templateContent, $matches)) {
        //You could add |raw in the replacement if you need to
        $variablesReplacements = [
            'emailDefaultFont' => 'languageDefaultFont',
        ];

        $templateContent = preg_replace_callback($echoVariableRegexp, function(array $matches) use ($variablesReplacements) {
            $variable = $matches[1];
            if (!isset($variablesReplacements[$variable])) {
                throw new RuntimeException('Unexpected variable '.$variable);
            }

            return sprintf('{{ %s }}', $variablesReplacements[$variable]);
        }, $templateContent);
    }
    if (preg_match($echoVariableRegexp, $templateContent, $matches)) {
        return convertVariables($templateContent);
    }

    return $templateContent;
}

function convertTranslations($templateContent) {
    $translationRegexp = "/\<\?php +echo +t\(\'([^']+)\'\); +\?\>/";
    if (preg_match($translationRegexp, $templateContent, $matches)) {
        $templateContent = preg_replace_callback($translationRegexp, function(array $matches) {
            $translationKey = $matches[1];

            //Do not use html special chars like &amp; but real characters
            $translationKey = html_entity_decode($translationKey);
            //Use raw only when the key contains variables and no html tags
            $hasHtml = $translationKey != strip_tags($translationKey);
            $hasVariables = preg_match('/\{{1}.+\}{1}/', $translationKey);
            if ($hasVariables && !$hasHtml) {
                $translationLayout = "{{ '%s'|trans({}, 'EmailsBody', locale) }}";
            } else {
                $translationLayout = "{{ '%s'|trans({}, 'EmailsBody', locale)|raw }}";
            }

            return sprintf($translationLayout, $translationKey);
        }, $templateContent);
    }

    if (preg_match($translationRegexp, $templateContent, $matches)) {
        return convertTranslations($templateContent);
    }

    return $templateContent;
}

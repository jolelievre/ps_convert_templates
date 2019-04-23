<?php include ('header.php'); ?>

<tr>
	<td align="center" class="titleblock">
		<font size="2" face="<?php echo $emailDefaultFont ?>Open-sans, sans-serif" color="#555454">
			<span class="title"><?php echo t('Hi,'); ?></span>
		</font>
	</td>
</tr>
<tr>
	<td class="space_footer">&nbsp;</td>
</tr>
<tr>
	<td class="linkbelow" style="border:none;padding:7px 0">
		<span><?php echo t('You have received a new return request for {shop_name}.'); ?></span>
	</td>
</tr>
<tr>
	<td class="space_footer">&nbsp;</td>
</tr>
<tr>
	<td class="box" colspan="3" style="background-color:#fbfbfb;border:1px solid #d6d4d4!important;padding:10px!important">
		<p style="margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;border-bottom:1px solid #d6d4d4!important;padding-bottom:10px">
			<?php echo t('Return details'); ?>
		</p>
		<span style="color:#777">
			<span style="color:#333"><strong><?php echo t('Order:'); ?></strong></span> <?php echo t('{order_name} Placed on {date}'); ?><br />
			<span style="color:#333"><strong><?php echo t('Customer:'); ?></strong></span> {firstname} {lastname}, ({email})
		</span>
	</td>
</tr>
<tr>
	<td style="border:none;padding:7px 0">
		<table class="table table-recap" bgcolor="#ffffff" style="width:100%;background-color:#fff"><!-- Title -->
			<thead>
				<tr>
					<th style="border:1px solid #DDD!important;background-color:#fbfbfb;font-family:Arial;color:#333;font-size:13px;padding:10px"><?php echo t('Reference'); ?></th>
					<th style="border:1px solid #DDD!important;background-color:#fbfbfb;font-family:Arial;color:#333;font-size:13px;padding:10px"><?php echo t('Product'); ?></th>
					<th style="border:1px solid #DDD!important;background-color:#fbfbfb;font-family:Arial;color:#333;font-size:13px;padding:10px"><?php echo t('Quantity'); ?></th>
				</tr>
			</thead>
			<tbody>
				{items}
			</tbody>
		</table>
	</td>
</tr>
<tr>
	<td class="space_footer" style="padding:0!important;border:none">&nbsp;</td>
</tr>
<tr>
	<td style="border:none;padding:7px 0">
		<table class="table" style="width:100%;background-color:#fff">
			<tr>
				<td class="box address" width="310" style="background-color:#fbfbfb;border:1px solid #d6d4d4!important;padding:10px!important">
					<p style="margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;border-bottom:1px solid #d6d4d4!important;padding-bottom:10px"><?php echo t('Delivery address'); ?></p>
					<span style="color:#777">
						{delivery_block_html}
					</span>
				</td>
				<td width="20" class="space_address" style="border:none;padding:7px 0">&nbsp;</td>
				<td class="box address" width="310" style="background-color:#fbfbfb;border:1px solid #d6d4d4!important;padding:10px!important">
					<p style="margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;border-bottom:1px solid #d6d4d4!important;padding-bottom:10px"><?php echo t('Billing address'); ?></p>
					<span style="color:#777">
						{invoice_block_html}
					</span>
				</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td class="space_footer" style="padding:0!important;border:none">&nbsp;</td>
</tr>
<tr>
	<td class="box" colspan="3" style="background-color:#fbfbfb;border:1px solid #d6d4d4!important;padding:10px!important">
		<p style="margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;border-bottom:1px solid #d6d4d4!important;padding-bottom:10px">
			<?php echo t('Customer message:'); ?>
		</p>
		<span style="color:#777">
			{message}
		</span>
	</td>
</tr>

<?php include ('footer.php'); ?>

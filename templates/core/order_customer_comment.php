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
	<td class="box" style="border:1px solid #D6D4D4;">
		<table class="table">
			<tr>
				<td width="10">&nbsp;</td>
				<td>
					<font size="2" face="<?php echo $emailDefaultFont ?>Open-sans, sans-serif" color="#555454">
						<html-only>
							<p style="border-bottom:1px solid #D6D4D4;">
								<?php echo t('Message from a customer'); ?>
							</p>
						</html-only>
						<span>
							<?php echo t('You have received a new message regarding order with the reference'); ?> <span><strong>{order_name}</strong></span>.<br /><br />
							<span><strong><?php echo t('Customer:'); ?></strong></span> {firstname} {lastname} ({email})<br /><br />
							{message}
						</span>
					</font>
				</td>
				<td width="10">&nbsp;</td>
			</tr>
		</table>
	</td>
</tr>

<?php include ('footer.php'); ?>

<?php include ('header.php'); ?>

<tr>
	<td align="center" class="titleblock">
		<font size="2" face="<?php echo $emailDefaultFont ?>Open-sans, sans-serif" color="#555454">
			<span class="title"><?php echo t('Hi {firstname} {lastname},'); ?></span>
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
								<?php echo t('Order {order_name}'); ?>&nbsp;-&nbsp;<?php echo t('Credit slip created'); ?>
							</p>
						</html-only>
						<span>
							<?php echo t('We have generated a credit slip in your name for order with the reference <span><strong>{order_name}</strong></span>.'); ?>
						</span>
					</font>
				</td>
				<td width="10">&nbsp;</td>
			</tr>
		</table>
	</td>
</tr>
<tr>
	<td class="space_footer">&nbsp;</td>
</tr>
<tr>
	<td class="linkbelow">
		<font size="2" face="<?php echo $emailDefaultFont ?>Open-sans, sans-serif" color="#555454">
			<span>
				<?php echo t('You can review this credit slip and download your invoice from the <a href="{history_url}">"My credit slips"</a> section of your account by clicking <a href="{my_account_url}">"My account"</a> on our shop.'); ?>
			</span>
		</font>
	</td>
</tr>

<?php include ('footer.php'); ?>
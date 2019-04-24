<?php include('header.php'); ?>

<tr>
    <td align="center" class="titleblock" style="padding:7px 0">
        <font size="2" face="<?php echo $emailDefaultFont ?>Open-sans, sans-serif" color="#555454">
            <span class="title" style="font-weight:500;font-size:28px;text-transform:uppercase;line-height:33px"><?php echo t('Hi {firstname} {lastname},'); ?></span>
        </font>
    </td>
</tr>
<tr>
    <td class="space_footer" style="padding:0!important">&nbsp;</td>
</tr>
<tr>
    <td class="box" style="border:1px solid #D6D4D4;background-color:#f8f8f8;padding:7px 0">
        <table class="table" style="width:100%">
            <tr>
                <td width="10" style="padding:7px 0">&nbsp;</td>
                <td style="padding:7px 0">
                    <font size="2" face="Open-sans, sans-serif" color="#555454">
                        <html-only>
                            <p style="border-bottom:1px solid #D6D4D4;margin:3px 0 7px;text-transform:uppercase;font-weight:500;font-size:18px;padding-bottom:10px">
                                <?php echo t('Order {order_name}'); ?>&nbsp;-&nbsp;<?php echo t('Order edited'); ?>
                            </p>
						</html-only>
                        <span style="color:#777">
                            <?php echo t('Your order with the reference <span><strong>{order_name}</strong></span> has been modified.'); ?>
                        </span>
                    </font>
                </td>
                <td width="10" style="padding:7px 0">&nbsp;</td>
            </tr>
        </table>
    </td>
</tr>
<tr>
    <td class="space_footer" style="padding:0!important">&nbsp;</td>
</tr>
<tr>
    <td class="linkbelow" style="padding:7px 0">
        <font size="2" face="Open-sans, sans-serif" color="#555454">
            <span>
                <?php echo t('You can review your order and download your invoice from the <a href="{history_url}">"Order history"</a> section of your customer account by clicking <a href="{my_account_url}">"My account"</a> on our shop.'); ?>
            </span>
        </font>
    </td>
</tr>
<tr>
    <td class="linkbelow" style="padding:7px 0">
        <font size="2" face="Open-sans, sans-serif" color="#555454">
            <span>
                <?php echo t('If you have a guest account, you can follow your order via the <a href="{guest_tracking_url}?id_order={order_name}">"Guest Tracking"</a> section on our shop.'); ?>
            </span>
        </font>
    </td>
</tr>

<?php include('footer.php'); ?>

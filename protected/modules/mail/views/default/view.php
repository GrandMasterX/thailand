<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Indast</title>
	</head>
<body>

	<div style="background-color: #5ABCE4; font-family:Arial, Helvetica, sans-serif;width:100%;-webkit-text-size-adjust:none !important;margin:0;padding: 70px 0 70px 0;">
       	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
			<tbody>
				<tr>
					<td align="center" valign="top">
						<div style="margin-top:0; background-color:#5ABCE4; width: 560px;border: 20px solid #5ABCE4;">
							<img style="margin-left: -397px;" src="<?php echo Yii::app()->request->hostInfo . Yii::app()->theme->baseUrl ?>/img/logo.png">
						</div>
			<table border="0" cellpadding="0" cellspacing="0" width="600" style="background: #DEEFF7;">
				<tbody>
					<tr>
						<td align="center" valign="top">
                       	</td>
                    </tr>
						<tr>
							<td align="center" valign="top">
                               	<table border="0" cellpadding="0" cellspacing="0" width="600">
									<tbody>
										<tr>
											<td valign="top" style="background-color: #DEEFF7;-webkit-border-radius:6px !important;border-radius:6px !important; padding: 10px;">
												<?php echo $content; ?>
											</td>
                                        </tr>
									</tbody>
								</table>
							</td>
                        </tr>
						<tr>
							<td align="center" valign="top">
                                <table border="0" cellpadding="10" cellspacing="0" width="600" style="border-top:0;-webkit-border-radius:6px;">
									<tbody>
										<tr>
											<td valign="top">
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
													<tbody>
														<tr>
															<td colspan="2" valign="middle" style="border:0;color: #f1f1f1;font-family: Arial;font-size:12px;line-height:125%;text-align:center;">
																<p style="font-family: Arial;line-height: 18.2px;font-weight: bold;font-size: 18px;color: #000000;text-align: right;margin-bottom: 40px;">
																	<br>
																	<span style="padding-top: 10px;display: block;font-weight: normal;padding-right: 9px;">
																		<?php
																			$phoneNumbers = Yii::app()->config->get('phoneNumbers');
																			$phoneNumbers = explode(', ', $phoneNumbers);
																		?>
																		Тел.:&nbsp; <?php echo implode('<br>', $phoneNumbers) ?>
																	</span>
																	<a target="_blank" href="<?php echo Yii::app()->request->hostInfo ?>" style="padding-top: 10px;display: block;font-weight: normal;padding-right: 9px;"><?php echo Yii::app()->request->hostInfo ?></a>
																</p>
															</td>
														</tr>
													</tbody>
												</table>
											</td>
                                        </tr>
									</tbody>
								</table>
							</td>
                        </tr>
				</tbody>
			</table>
		</td>
         </tr></tbody>
		</table>
	</div>
</body>
</html>





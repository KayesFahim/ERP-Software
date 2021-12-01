<?php

include '../config.php';
include('../session.php');

$SQ_No = $_GET['SLno'];
$vendorId;

$sql = "SELECT *  FROM `salesqutation` where sqid='$SQ_No'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {	
		$CBy = $row["createdBy"];
		$Am = $row["Amount"];
		$CDate =$row["createdDate"];
		$Cname =$row["clientName"];
		$Cemail = $row["clientEmail"];
		$Item = $row["Quation"];
		$CPhone = $row["clientPhone"];
		$CAddress = $row["clientAddress"];						
	}
} else {
  	echo "0 results";
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<h1 style="text-align: center;"> Sales Quotation</h1>
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="../logo.png" style="width: 100%; max-width: 180px" />
								</td>

								<td>
									Invoice #: <?php echo $SQ_No; ?><br />
									Created: <?php echo $CBy; ?><br />
									Issue Date: <?php echo $CDate; ?><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Fly Far International<br />
									Ka 11/2A, Jagannathpur,<br />
									Bashundhora Road, Dhaka, 1229 <br/>
								</td>

								<td>
								<?php echo $Cname; ?><br />
								<?php echo $Cemail; ?><br />
								<?php echo $CPhone; ?><br/>
								<?php echo $CAddress; ?>
								</td>
							</tr>
						</table>
					</td>
				</tr>


				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>

				<tr class="item">
					<td><?php echo $Item; ?></td>

					<td><?php echo $Am; ?></td>
				</tr>


				<tr class="total">
					<td></td>

					<td>Total: <?php echo $Am; ?></td>
				</tr>

				<tr class="information" style="margin-top: 100px;">
					<td colspan="3">
						<table>
							<tr>
								<td style="text-align: center;">
									<u >Checked By</u><br />
									
								</td>

								<td style="text-align: center;">
								<u>Approved By</u><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
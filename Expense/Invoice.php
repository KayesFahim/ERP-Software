<?php

require '../config.php';
require('../session.php');

$EXP_No = $_GET['Exp'];

$sql = "SELECT *  FROM `expense` where expNo='$EXP_No'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {	
		$PayeeDate = $row["payeedate"];
		$category = $row["category"];
		$Am = $row["amount"];
		$CDate =$row["issueDate"];
		$Pm =$row["paymentMethod"];
		$Pid = $row["paymentway"];
		$Item = $row["purpose"];
						
	}
}


?>

<!DOCTYPE html>
<html>
	<head id="head">
		<meta charset="utf-8" />
		<title>Invoice</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <!-- Feathericon CSS -->
        <link rel="stylesheet" href="../assets/css/feathericon.min.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Datatables CSS -->
        <link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
        <!-- Main CSS -->
        <link rel="stylesheet" href="../assets/css/style.css">

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
    <div id="htmlContent">
		<div id="dvContainer" class="invoice-box" style="padding-bottom: 150px">
            
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="../logo.png" style="width: 100%; max-width: 180px" />
								</td>

								<td>
									Expense No #: <?php echo $EXP_No; ?><br />
									Created Date: <?php echo $PayeeDate; ?><br />
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
								
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Payment Method</td>

					<td>Check #</td>
				</tr>

				<tr class="details">
					<td><?php echo $Pm; ?> </td>

					<td><?php echo $Pid; ?></td>
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
			</table>
		</div>
    </div>
        
        <div id="editor" class="container" style="margin-top: 30px">
            <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-primary" style="margin-right: 20px" id="generatePDF"> Print</button>
                    <a href="../Expense.php" class="btn btn-primary"> Home</a>
                 
            </div>
           
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

        <script type="text/javascript">
            var doc = new jsPDF();
            var specialElementHandlers = {
                '#editor': function (element, renderer) {
                    return true;
                }
            };
                    
            $('#generatePDF').click(function () {
                doc.fromHTML($('#dvContainer').html(), 15, 15, {
                    'width': 700,
                    'elementHandlers': specialElementHandlers
                });
                doc.save('ExpenseInvoice.pdf');
            });
            </script>


        
        
	</body>
</html>
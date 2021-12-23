<?php

include '../config.php';
include('../session.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Invoice</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="../assets/css/feathericon.min.css">
	<!-- Datatables CSS -->
	<link rel="stylesheet" href="../assets/plugins/datatables/datatables.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
	
		

		<!-- Page Wrapper -->
			<div class="container-fluid" style="margin-top: 50px">
								
					<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Expense Details</h4>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-stripped">
											<thead>
												<tr>
                                                    <th>Issue Date</th>
													<th>Amount</th>
													<th>Category</th>
													<th>Description No</th>
												</tr>
											</thead>
											<tbody>
											<?php
                                            
                                                $Today = date("Y-m-d");

												$sql = "SELECT *  FROM `expense` where issueDate LIKE '$Today%' ORDER BY id DESC";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {	
													$EXP_NO = $row["expNo"];
													echo "<tr>
																<td>".$row["issueDate"]."</td> 
														 		<td>".$row["amount"]."</td>
														 		<td>".$row["category"]."</td>
																 <td>".$row["purpose"]."</td>
																 </tr>";   											
												  }
												} else {
  												echo "0 results";
											    }
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>

				<!-- /Page Wrapper -->

			<!-- jQuery -->
			<script src="../assets/js/jquery-3.2.1.min.js"></script>
			<!-- Bootstrap Core JS -->
			<script src="../assets/js/popper.min.js"></script>
			<script src="../assets/js/bootstrap.min.js"></script>
			<!-- Slimscroll JS -->
			<script src="../assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
			<!-- Datatables JS -->
			<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
			<script src="../assets/plugins/datatables/datatables.min.js"></script>
			<!-- Custom JS -->
			<script  src="../assets/js/script.js"></script>
	</body>
</html>
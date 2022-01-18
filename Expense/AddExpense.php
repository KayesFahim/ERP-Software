<?php

include '../config.php';
include('../session.php');


//Reciept No

$EXP_NO ="";
$sql = "SELECT * FROM expense ORDER BY expNo DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $outputString = preg_replace('/[^0-9]/', '', $row["expNo"]);
		$EXP_NO = "EXP-".(int)$outputString + 1 ;									
 }
} else {
echo "0 results";
 }




// Generate PDF

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST['des'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    $payWay = $_POST['paymentway'];
    $payMethod = $_POST['paymentmethod'];
    $payeedate = $_POST['payeedate']; 

	
    $mrgenerate = "INSERT INTO `expense`(
		`expNo`,
		`amount`,
        `category`,
        `payeedate`,
		`paymentMethod`,
		`paymentway`,
		`purpose`
	)
	VALUES(
		'$EXP_NO',
		'$amount',
		'$category',
		'$payeedate',
		'$payWay',
		'$payMethod',
		'$description'
	)";

	if (mysqli_query($conn, $mrgenerate)) {

		echo "Successfully Save Data";
		
	} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	
	
	if($payWay == 'bank'){

		if($payMethod == 'city'){

			$credit = "INSERT INTO `bank`(
				
				`bankId`,
				`bankname`,				
				`TxType`,
				`debit`,
				`debitComment`				
			)
			VALUES(
				'BNK-001',
				'City Bank Limited',
				'$EXP_NO',
				'$amount',
				'$description'				
			)";

			if (mysqli_query($conn, $credit)) {
							
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="Invoice.php='.$EXP_NO.'"';
				echo '</script>';
				
			} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		}else if($payMethod == 'brac'){
			$credit = "INSERT INTO `bank`(				
				`bankId`,
				`bankname`,				
				`TxType`,
				`debit`,
				`debitComment`
				
			)
			VALUES(
				'BNK-002',
				'Brac Bank Limited',
				'$EXP_NO',
				'$amount',
				'$description'
				
			)";

			if (mysqli_query($conn, $credit)) {
			
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="Invoice.php?Exp='.$EXP_NO.'"';
				echo '</script>';
				
		 } else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		}else if($payMethod == 'islami'){
			$credit = "INSERT INTO `bank`(
				
				`bankId`,
				`bankname`,				
				`TxType`,
				`debit`,
				`debitComment`
				
			)
			VALUES(
				'BNK-003',
				'Islami Bank',
				'$EXP_NO',
				'$amount',
				'$description'
				
			)";

			if (mysqli_query($conn, $credit)) {
							
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="invoice.php?Exp='.$EXP_NO.'"';
				echo '</script>';
				
			} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		}else if($payMethod == 'sonali'){
			$credit = "INSERT INTO `bank`(
				
				`bankId`,
				`bankname`,				
				`TxType`,
				`debit`,
				`debitComment`
				
			)
			VALUES(
				'BNK-004',
				'Sonali Bank',
				'$EXP_NO',
				'$amount',
				'$description'
				
			)";

			if (mysqli_query($conn, $credit)) {
							
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="Invoice.php?Exp='.$EXP_NO.'"';
				echo '</script>';
				
			} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}


		}elseif($payMethod == 'dutch'){
			$credit = "INSERT INTO `bank`(
				
				`bankId`,
				`bankname`,				
				`TxType`,
				`debit`,
				`debitComment`
				
			)
			VALUES(
				'BNK-005',
				'Dutch Bangla Bank',
				'$EXP_NO',
				'$amount',
				'$description'
				
			)";

			if (mysqli_query($conn, $credit)) {
							
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="invoice.php?Exp='.$EXP_NO.'"';
				echo '</script>';
				
			} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		}elseif($payMethod == 'commercial'){
		
			$credit = "INSERT INTO `bank`(
				
				`bankId`,
				`bankname`,				
				`TxType`,
				`debit`,
				`debitComment`
				
			)
			VALUES(
				'BNK-006',
				'Commercial Bank',
				'$EXP_NO',
				'$amount',
				'$description'
				
			)";

			if (mysqli_query($conn, $credit)) {
							
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="invoice.php?Exp='.$EXP_NO.'"';
				echo '</script>';
				
			} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}


		}elseif($payMethod == 'ncc'){
			$credit = "INSERT INTO `bank`(
				
				`bankId`,
				`bankname`,				
				`TxType`,
				`debit`,
				`debitComment`
				
			)
			VALUES(
				'BNK-007',
				'NCC Bank',
				'$EXP_NO',
				'$amount',
				'$description'
				
			)";

			if (mysqli_query($conn, $credit)) {
							
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="invoice.php?Exp='.$EXP_NO.'"';
				echo '</script>';
				
			} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		}elseif($payMethod == 'modhumoti'){

			$credit = "INSERT INTO `bank`(				
				`bankId`,
				`bankname`,				
				`TxType`,
				`debit`,
				`debitComment`
				
			)
			VALUES(
				'BNK-008',
				'Modhumoti Bank',
				'$EXP_NO',
				'$amount',
				'$description'
				
			)";

			if (mysqli_query($conn, $credit)) {
							
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="invoice.php?Exp='.$EXP_NO.'"';
				echo '</script>';
				
			} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}else{
			echo 'Wrong Selection';
		}
	

	}elseif($payWay == 'cash'){

		if($payMethod == 'cash'){

		$credit = "INSERT INTO `cash`(
					`TxType`,
					`cashOut`,
					`cashOutdescription`
				)
				VALUES(
					'$EXP_NO',
					'$amount',
					'$description'
				)";

		if (mysqli_query($conn, $credit)) {						
			echo '<script language="javascript">';
			echo 'alert("Successfully Created"); location.href="Invoice.php?Exp='.$EXP_NO.'"';
			echo '</script>';
			
		} else {
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}else{
		echo 'Wrong Selection';
	}


	}elseif($payWay == 'mobile_banking'){
		if($payMethod == 'BK-01755543447'){

			$credit = "INSERT INTO `mobile_banking`(
						`MB_ID`,
						`mb_operator`,
						`mb_number`,
						`TxType`,
						`cashOut`,
						`cashOutComment`
					)
					VALUES(
						'BK-01755543447',
						'BKASH',
						'01755543447',
						'$EXP_NO',
						'$amount',
						'$description'
					)";
	
			if (mysqli_query($conn, $credit)) {						
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="Invoice.php?Exp='.$EXP_NO.'"';
				echo '</script>';
				
			} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}else{
			echo 'Wrong Selection';
		}
		

	}                                                                   
}

?>

<!------------  Header ----------->
<?php include '../header.php'; ?>
<!------------  Header ----------->

		
        <!-- Sidebar -->

		<?php
        	include '../sidebar.php';
        ?>	
			<!--- Sidebar --->

		

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">
				
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Expense</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="../Dashboard.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Expense</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- /Page Header -->
				
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Expense Details</h4>
										

									</div>
									<div class="card-body">
										<form action="#" method="post" autocomplete="off">
											<div class="row">
												<div class="col-md-12">
													
													<div class="row">
													<div class="col-md-4">
															<div class="form-group">
																<label>Payee Date:</label>
																<input type="date" name="payeedate" class="form-control">
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Category:</label>
																<select name="category" class="select form-control" required>
																		<option value="" disabled selected>Select Category</option>
																		<option value="Office EXpense">Office Expense</option>
																		<option value="Vendor Bill">Vendor Bill</option>
																		<option value="Salary">Salary</option>
																	</select>
															</div>
														</div>

                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Amount :</label>
                                                                <input type="number" name="amount" class="form-control">
																
															</div>
														</div>
														
														
													</div>
													
													<div class="row">
														<div class="col-md-3">
															<div class="form-group">
																<label>Payment Method:</label>
																<div class="form-group row">
																	<div class="col-lg-12">																	
																	<select name="paymentway" class="select form-control" required>
																		<option value="" disabled selected>Select Payment Way</option>
																		<option value="cash">Cash</option>
																		<option value="bank">Bank</option>
																		<option value="mobile_banking">Mobile Banking</option>
																	</select>

																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Payment A/C:</label>
																<div class="form-group row">
																	<div class="col-lg-12">
																	<select name="paymentmethod" class="select form-control" required>
																		<option value="" disabled selected>Select Payment Method</option>
																		<option value="cash">Cash</option>
																		<option value="city">City Bank Limited</option>	
																		<option value="brac">Brac Bank </option>	
																		<option value="islami">Islami Bank</option>	
																		<option value="sonali">Sonali Bank</option>	
																		<option value="dutch">Dutch Bangla Bank</option>	
																		<option value="commercial">Commercial Bank</option>	
																		<option value="ncc">NCC Bank</option>	
																		<option value="modhumoti">Modhumoti Bank</option>	
																		<option value="BK-01755543447">BKash (01755543447)</option>
																		

																	</select>
																	</div>
																</div>
															</div>
														</div>

                                                        <div class="col-md-6">
															<div class="form-group">
																<label>Description :</label>
																<input type="text" name="des" class="form-control" required>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="text-right">
												<button type="submit" class="btn btn-primary"> Generate</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
									

					<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">Expense Detail</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Issue Date</th>
													<th>Amount</th>
													<th>Category</th>

													<th>Description</th>													
													<th>Action</th>
													<th> </th>
												</tr>
											</thead>
											<tbody>
											<?php

												$sql = "SELECT *  FROM `expense` ORDER BY id DESC LIMIT 5";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {	
													$EXP_NO = $row["expNo"];
													echo "<tr><td>".$row["issueDate"]."</td> 
														 		<td>".$row["amount"]."</td>
														 		<td>".$row["category"]."</td>
																 <td>".$row["purpose"]."</td>
																<td><a href='Expense/Invoice.php?Exp=$EXP_NO' class='btn btn-primary'> View </a><td>
																 </tr>";   											
												  }
												} else {
  												echo " ";
											    }
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
                    </div>
										
						<!-- End Contant -->
					</div>			
				</div>
				<!-- /Page Wrapper -->
			</div>
			<!-- /Main Wrapper -->
			<script>
			$(document).on('submit','#userForm',function(e){
				e.preventDefault();
			
				$.ajax({
				method:"POST",
				url: "../Customer/AddCustomer.php",
				data:$(this).serialize(),
				success: function(data){
				$('#msg').html(data);
				$('#userForm').find('input').val('')

				}});
			});
			</script>
			
<!------------  Footer ----------->
<?php include '../footer.php'; ?>
<!------------  Footer ----------->
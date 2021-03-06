<?php

include '../config.php';
include('../session.php');


//Reciept No

$Bill_No ="";
$sql = "SELECT * FROM bill ORDER BY billNo DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $outputString = preg_replace('/[^0-9]/', '', $row["billNo"]);
		$Bill_No = "BN-".(int)$outputString + 1 ;									
 }
} else {
	$Bill_No = "BN-1000";	
 }



//Vendor Info

if (array_key_exists('search', $_GET)){
	$searchvar = $_GET['search'];
		
		$sql = "SELECT * FROM vendor where vendorId='$searchvar' or phone='$searchvar' or email='$searchvar'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$Vendor_Id = $row["vendorId"];
				$Vendor_Name = $row["name"];
				$Vendor_Email = $row["email"];
				$Vendor_Phone = $row["phone"];     								
			}
		} else {
			$Vendor_Name=" ";
			$Vendor_Email=" ";
			$Vendor_Phone=" ";
		}
		
}else{
	$Vendor_Name=" ";
	$Vendor_Email=" ";
	$Vendor_Phone=" ";
}




// Generate PDF

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST['comment'];
    $amount = $_POST['amount'];
    $payWay = $_POST['paymentway'];
    $payMethod = $_POST['paymentmethod'];
    $TxId = $_POST['txid']; 

	
    $mrgenerate = "INSERT INTO `bill`(
		`billNo`,
		`vendorId`,
		`TxId`,
		`amount`,
		`paymentMethod`,
		`paymentway`,
		`purpose`
	)
	VALUES(
		'$Bill_No',
		'$Vendor_Id',
		'$TxId',
		'$amount',
		'$payWay',
		'$payMethod',
		'$comment'
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
				'$Bill_No',
				'$amount',
				'$TxId'				
			)";

			if (mysqli_query($conn, $credit)) {
							
				echo '<script language="javascript">';
		echo 'alert("Successfully Created"); location.href="invoice.php?Bno='.$Bill_No.'"';
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
				'$Bill_No',
				'$amount',
				'$TxId'
				
			)";

			if (mysqli_query($conn, $credit)) {
			
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="invoice.php?Bno='.$Bill_No.'"';
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
				'$Bill_No',
				'$amount',
				'$TxId'
				
			)";

			if (mysqli_query($conn, $credit)) {
							
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="invoice.php?Bno='.$Bill_No.'"';
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
				'$Bill_No',
				'$amount',
				'$TxId'
				
			)";

			if (mysqli_query($conn, $credit)) {
							
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="invoice.php?Bno='.$Bill_No.'"';
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
				'$Bill_No',
				'$amount',
				'$TxId'
				
			)";

			if (mysqli_query($conn, $credit)) {
							
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="invoice.php?Bno='.$Bill_No.'"';
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
				'$Bill_No',
				'$amount',
				'$TxId'
				
			)";

			if (mysqli_query($conn, $credit)) {
							
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="invoice.php?Bno='.$Bill_No.'"';
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
				'$Bill_No',
				'$amount',
				'$TxId'
				
			)";

			if (mysqli_query($conn, $credit)) {
							
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="invoice.php?Bno='.$Bill_No.'"';
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
				'$Bill_No',
				'$amount',
				'$TxId'
				
			)";

			if (mysqli_query($conn, $credit)) {
							
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="invoice.php?Bno='.$Bill_No.'"';
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
					`cashOutTxId`
				)
				VALUES(
					'$Bill_No',
					'$amount',
					'$TxId'
				)";

		if (mysqli_query($conn, $credit)) {						
			echo '<script language="javascript">';
			echo 'alert("Successfully Created"); location.href="invoice.php?Bno='.$Bill_No.'"';
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
						`cashOutTxId`,
						`cashOutComment`
					)
					VALUES(
						'BK-01755543447',
						'BKASH',
						'01755543447',
						'$Bill_No',
						'$amount',
						'$TxId',
						'$comment'
					)";
	
			if (mysqli_query($conn, $credit)) {						
				echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="invoice.php?Bno='.$Bill_No.'"';
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

<! ------------  Header ----------->
<?php include '../header.php'; ?>
<! ------------  Header ----------->

		
       
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
							<h3 class="page-title">Bill</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="../project.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Bill</li>
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
										<h4 class="text-danger card-title">Vendor Details</h4>
										<div class="text-right">
										<a href="../Vendor/AddVendor.php" class="btn btn-primary"> Add Vendor </a>
									</div>

									</div>
									<div class="card-body">
										<form action="" method="post">
											<div class="row">
												<div class="col-md-12">
													<h4 class="card-title">Details</h4>
													<div class="row">
													<div class="col-md-4">
															<div class="form-group">
																<label>Bill No:</label>
																<input type="text" value="<?php echo $Bill_No ?>" class="form-control" disabled>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Name:</label>
																<input type="text" value="<?php echo $Vendor_Name ?>" class="form-control" required>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Phone: </label>
																<input type="phone" value="<?php echo $Vendor_Phone ?>" class="form-control" required>
															</div>
														</div>
														
													</div>
													<div class="row">
														<div class="col-md-4">
																<div class="form-group">
																	<label>Email :</label>
																	<input type="email" value="<?php echo $Vendor_Email ?>" class="form-control" required>
																</div>
															</div>


														<div class="col-md-4">
															<div class="form-group">
																<label>Purchase Item Description :</label>
																<input type="text" name="comment" class="form-control" required>
															</div>
														</div>

														<div class="col-md-3">
																<div class="form-group">
																	<label>Amount :</label>
																	<input type="number" name="amount" class="form-control" required>
																</div>
														</div>
											

													</div>
													
													<div class="row">
														<div class="col-md-4">
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
														<div class="col-md-4">
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
														<div class="col-md-4">
															<div class="form-group">
																<label>Reference No:</label>
																<input type="text" name="txid" class="form-control" required>
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
													<th>Bill ID</th>
													<th>Issue Date</th>
													<th>Amount</th>
													<th>Created By</th>
													<th>Vendor</th>
													<th>Purchase Item</th>													
													<th>R. No</th>
													<th> </th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php

												$sql = "SELECT *  FROM `bill` ORDER BY id DESC";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {	
													$Bno = $row["billNo"];
													echo "<tr><td>".$row["billNo"]."</td>
																<td>".$row["issueDate"]."</td> 
														 		<td>".$row["amount"]."</td>
																<td>".$row["createdBy"]."</td>
														 		<td>".$row["vendorId"]."</td>
																<td>".$row["purpose"]."</td>
																<td>".$row["TxId"]."</td>
																<td><td><a href='Invoice.php?Bno=$Bno' class='btn btn-primary'> <i class='fe fe-print'></i> </a>
																<a href='Invoice.php?Bno=$Bno' class='btn btn-success'> <i class='fe fe-edit'></i> </a>
																<a href='Invoice.php?Bno=$Bno' class='btn btn-danger'> <i class='fe fe-trash'></i> </a>
																<a href='Invoice.php?Bno=$Bno' class='btn btn-danger'> <i class='fe fe-mail'></i> </a>
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
			
<! ------------  Footer ----------->
<?php include '../footer.php'; ?>
<! ------------  Footer ----------->
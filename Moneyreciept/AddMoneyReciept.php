<?php

include '../config.php';
include('../session.php');


//Reciept No

$Reciept_No ="";
$sql = "SELECT * FROM moneyreciept ORDER BY recieptNo DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $outputString = preg_replace('/[^0-9]/', '', $row["recieptNo"]);
		$number= (int)$outputString + 1;
		$Reciept_No = "RCP-$number";							
 }
} else {
	$Reciept_No = "RCP-1000";
 }



// Generate PDF

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$Customer_Id = $_POST['customerId'];
    $comment = $_POST['comment'];
    $amount = $_POST['amount'];
    $payWay = $_POST['paymentway'];
    $payMethod = $_POST['paymentmethod'];
    $TxId = $_POST['txid']; 

	
    $mrgenerate = "INSERT INTO `moneyreciept`(
		`recieptNo`,
		`createdBy`,
		`customerId`,
		`TxId`,
		`amount`,
		`paymentMethod`,
		`paymentId`,
		`comment`
	)
	VALUES(
		'$Reciept_No',
		'$userName',
		'$Customer_Id',
		'$TxId',
		'$amount',
		'$payWay',
		'$payMethod',
		'$comment'
	)";

	if (mysqli_query($conn, $mrgenerate)) {
		$ses_sql = mysqli_query($conn,"SELECT * FROM `client_ledger` WHERE CSR_ID='$Customer_Id' ORDER BY DateTime DESC LIMIT 1");
        $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
        
        $Balanced = $row['Balance'] + $amount;

        $ClientLedger ="INSERT INTO `client_ledger`(`TxType`, `CSR_ID`, `serviceType`, `Details`, `deposit`, `Balance`)
                         VALUES ('$Reciept_No','$Customer_Id','$payWay $payMethod ','$TxId $comment','$amount',' $Balanced')";
		
		if (mysqli_query($conn, $ClientLedger)) {
			if($payWay == 'bank'){

				if($payMethod == 'city'){
		
					$credit = "INSERT INTO `bank`(
						
						`bankId`,
						`bankname`,				
						`TxType`,
						`credit`,
						`creditComment`				
					)
					VALUES(
						'BNK-001',
						'City Bank Limited',
						'$Reciept_No',
						'$amount',
						'$TxId'				
					)";
		
					if (mysqli_query($conn, $credit)) {
									
						echo '<script language="javascript">';
				echo 'alert("Successfully Created"); location.href="invoice.php?Rno='.$Reciept_No.'"';
				echo '</script>';
						
					}
		
				}else if($payMethod == 'brac'){
					$credit = "INSERT INTO `bank`(				
						`bankId`,
						`bankname`,				
						`TxType`,
						`credit`,
						`creditComment`
						
					)
					VALUES(
						'BNK-002',
						'Brac Bank Limited',
						'$Reciept_No',
						'$amount',
						'$TxId'
						
					)";
		
					if (mysqli_query($conn, $credit)) {
					
						echo '<script language="javascript">';
						echo 'alert("Successfully Created"); location.href="invoice.php?Rno='.$Reciept_No.'"';
						echo '</script>';
						
				 }
		
				}else if($payMethod == 'islami'){
					$credit = "INSERT INTO `bank`(
						
						`bankId`,
						`bankname`,				
						`TxType`,
						`credit`,
						`creditComment`
						
					)
					VALUES(
						'BNK-003',
						'Islami Bank',
						'$Reciept_No',
						'$amount',
						'$TxId'
						
					)";
		
					if (mysqli_query($conn, $credit)) {
									
						echo '<script language="javascript">';
						echo 'alert("Successfully Created"); location.href="invoice.php?Rno='.$Reciept_No.'"';
						echo '</script>';
						
					}
		
				}else if($payMethod == 'sonali'){
					$credit = "INSERT INTO `bank`(
						
						`bankId`,
						`bankname`,				
						`TxType`,
						`credit`,
						`creditComment`
						
					)
					VALUES(
						'BNK-004',
						'Sonali Bank',
						'$Reciept_No',
						'$amount',
						'$TxId'
						
					)";
		
					if (mysqli_query($conn, $credit)) {
									
						echo '<script language="javascript">';
						echo 'alert("Successfully Created"); location.href="invoice.php?Rno='.$Reciept_No.'"';
						echo '</script>';
						
					}
		
		
				}elseif($payMethod == 'dutch'){
					$credit = "INSERT INTO `bank`(
						
						`bankId`,
						`bankname`,				
						`TxType`,
						`credit`,
						`creditComment`
						
					)
					VALUES(
						'BNK-005',
						'Dutch Bangla Bank',
						'$Reciept_No',
						'$amount',
						'$TxId'
						
					)";
		
					if (mysqli_query($conn, $credit)) {
									
						echo '<script language="javascript">';
						echo 'alert("Successfully Created"); location.href="invoice.php?Rno='.$Reciept_No.'"';
						echo '</script>';
						
					}
		
				}elseif($payMethod == 'commercial'){
				
					$credit = "INSERT INTO `bank`(
						
						`bankId`,
						`bankname`,				
						`TxType`,
						`credit`,
						`creditComment`
						
					)
					VALUES(
						'BNK-006',
						'Commercial Bank',
						'$Reciept_No',
						'$amount',
						'$TxId'
						
					)";
		
					if (mysqli_query($conn, $credit)) {
									
						echo '<script language="javascript">';
						echo 'alert("Successfully Created"); location.href="invoice.php?Rno='.$Reciept_No.'"';
						echo '</script>';
						
					}
		
		
				}elseif($payMethod == 'ncc'){
					$credit = "INSERT INTO `bank`(
						
						`bankId`,
						`bankname`,				
						`TxType`,
						`credit`,
						`creditComment`
						
					)
					VALUES(
						'BNK-007',
						'NCC Bank',
						'$Reciept_No',
						'$amount',
						'$TxId'
						
					)";
		
					if (mysqli_query($conn, $credit)) {
									
						echo '<script language="javascript">';
						echo 'alert("Successfully Created"); location.href="invoice.php?Rno='.$Reciept_No.'"';
						echo '</script>';
						
					}
		
				}elseif($payMethod == 'modhumoti'){
		
					$credit = "INSERT INTO `bank`(				
						`bankId`,
						`bankname`,				
						`TxType`,
						`credit`,
						`creditComment`
						
					)
					VALUES(
						'BNK-008',
						'Modhumoti Bank',
						'$Reciept_No',
						'$amount',
						'$TxId'
						
					)";
		
					if (mysqli_query($conn, $credit)) {
									
						echo '<script language="javascript">';
						echo 'alert("Successfully Created"); location.href="invoice.php?Rno='.$Reciept_No.'"';
						echo '</script>';
						
					}
				}elseif($payMethod == 'ebl'){
		
					$credit = "INSERT INTO `bank`(				
						`bankId`,
						`bankname`,				
						`TxType`,
						`credit`,
						`creditComment`
						
					)
					VALUES(
						'BNK-009',
						'Estern Bank Limited',
						'$Reciept_No',
						'$amount',
						'$TxId'
						
					)";
		
					if (mysqli_query($conn, $credit)) {									
						echo '<script language="javascript">';
						echo 'alert("Successfully Created"); location.href="invoice.php?Rno='.$Reciept_No.'"';
						echo '</script>';
						
					}
				}
			
		
			}elseif($payWay == 'cash'){
		
				if($payMethod == 'cash'){
		
				$credit = "INSERT INTO `cash`(
		
							`TxType`,
							`cashIn`,
							`cashInTxId`
						)
						VALUES(
							'$Reciept_No',
							'$amount',
							'$TxId'
						)";
		
				if (mysqli_query($conn, $credit)) {						
					echo '<script language="javascript">';
					echo 'alert("Successfully Created"); location.href="invoice.php?Rno='.$Reciept_No.'"';
					echo '</script>';
					
				}
			}
		
		
			}elseif($payWay == 'mobile_banking'){
				if($payMethod == 'mobile_banking'){
					$credit = "INSERT INTO `mobile_banking`(
						`MB_ID`,
						`cashIn`,
						`TxType`
					)
					VALUES(
		
						'$TxId',
						'$amount',
						'$Reciept_No'
					)";
			
					if (mysqli_query($conn, $credit)) {						
						echo '<script language="javascript">';
						echo 'alert("Successfully Created"); location.href="invoice.php?Rno='.$Reciept_No.'"';
						echo '</script>';
						
					}
		
				}

				
		
				
		
			}elseif($payWay == 'ssl_commerce'){
				if($payMethod == 'ssl_commerce'){
					$credit = "INSERT INTO `ssl_commerce`(
						`TxId`,
						`amount`,
						`TxType`
					)
					VALUES(
		
						'$TxId',
						'$amount',
						'$Reciept_No'
					)";
			
					if (mysqli_query($conn, $credit)) {						
						echo '<script language="javascript">';
						echo 'alert("Successfully Created"); location.href="invoice.php?Rno='.$Reciept_No.'"';
						echo '</script>';
						
					}
		
				}
			}                          

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
							<h3 class="page-title">Money Receipt</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="../project.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Money Receipt</li>
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
										
									</div>
									<div class="card-body">
										<form action="" method="post">
											<div class="row">
												<div class="col-md-12">
													<h4 class="card-title">Details</h4>
													<div class="row">
													<div class="col-md-4">
															<div class="form-group">
																<label>Reciept No:</label>
																<input type="text" value="<?php echo $Reciept_No ?>" class="form-control" disabled>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Client Name:</label>
																<select name="customerId" class="select form-control" required>
                                                                            <option value="" disabled selected> Select Client Name</option>
                                                                            <?php
                                                                                $sql = "SELECT *  FROM `customer` ORDER BY name DESC";
                                                                                $result = $conn->query($sql);                              
                                                                                if ($result->num_rows > 0) {
                                                                                while($row = $result->fetch_assoc()) {
                                    
                                                                                    $csrId= $row['CustomerId'];
                                                                                    
                                                                                    echo "<option value=\"$csrId\">".$row['name']."</option>";                                                                                 
                                                                                }
                                                                            }
                                                                                ?>

                                                                            

                                                                            
                                                                </select>
															</div>
														</div>

														<div class="col-md-4">
															<div class="form-group">
																<label>BCC :</label>
																<input type="email" name="bccemail"  class="form-control" required>
															</div>
														</div>
														
														
													</div>
													
													<div class="row">
														<div class="col-md-3">
																<div class="form-group">
																	<label>Amount :</label>
																	<input type="number" name="amount" class="form-control" required>
																</div>
															</div>

														<div class="col-md-3">
															<div class="form-group">
																<label>Attachement :</label>
																<input type="file" name="file" class="form-control"> required
															</div>
														</div>

														<div class="col-md-4">
															<div class="form-group">
																<label>Purchase Item Description :</label>
																<input type="text" name="comment" class="form-control" required>
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
																		<option value="ssl_commerce">SSL_commerce</option>
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
																		<option value="ssl_commerce">SSL_commerce</option>
																		<option value="city">City Bank Limited</option>	
																		<option value="brac">Brac Bank </option>	
																		<option value="islami">Islami Bank</option>	
																		<option value="sonali">Sonali Bank</option>	
																		<option value="dutch">Dutch Bangla Bank</option>	
																		<option value="commercial">Commercial Bank</option>	
																		<option value="ncc">NCC Bank</option>	
																		<option value="modhumoti">Modhumoti Bank</option>
																		<option value="ebl">Estern Bank</option>		
																		<option value="mobile_banking">Mobile Banking</option>
																		

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
													<th>Reciept No:</th>
													<th>Issue Date</th>
													<th>Amount</th>
													<th>Created By</th>
													<th>Customer</th>
                                                    <th>Payment Method</th>
													
                                                    <th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php

													$sql = "SELECT recieptNo, createdBy, customerId, issueDate, TxId, amount, paymentMethod, paymentId   FROM `moneyreciept` ORDER BY id DESC LIMIT 5";
													$result = $conn->query($sql);

													if ($result->num_rows > 0) {
													while($row = $result->fetch_assoc()) {	
														$Rno = $row["recieptNo"];
														echo "<tr><td>".$row["recieptNo"]."</td>
																	<td>".$row["issueDate"]."</td> 
																	<td>".$row["amount"]."</td>
																	<td>".$row["createdBy"]."</td>
																	<td>".$row["customerId"]."</td>
																	<td>".$row["paymentMethod"]."</td>
																	<td><a href='Invoice.php?Rno=$Rno' class='btn btn-primary'> <i class='fe fe-print'></i> </a>
																	<a href='Invoice.php?Rno=$Rno' class='btn btn-success'> <i class='fe fe-edit'></i> </a>
																	<a href='Invoice.php?Rno=$Rno' class='btn btn-danger'> <i class='fe fe-trash'></i> </a>
																	<a href='Invoice.php?Rno=$Rno' class='btn btn-danger'> <i class='fe fe-mail'></i> </a>
																	</tr>";   											
													}
													}
													?>
                                                    </td>
												</tr>
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
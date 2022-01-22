<?php

include '../config.php';
include('../session.php');
include '../header.php';


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

    if($payWay == 'bank'){
        $bank = mysqli_query($conn,"SELECT * FROM bank where bankId='$payMethod'");
        $row = mysqli_fetch_array($bank,MYSQLI_ASSOC);                          
        $BankName = $row['bankname'];
    }

	
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
		'$BankName',
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

                		
					$credit = "INSERT INTO `bank`(						
						`bankId`,
						`bankname`,				
						`TxType`,
						`credit`,
						`creditComment`				
					)
					VALUES(
						'$payMethod',
						'$BankName',
						'$Reciept_No',
						'$amount',
						'$TxId'				
					)";
		
					if (mysqli_query($conn, $credit)) {
															
						print '<script>
                                    swal({
                                    title: "Success!",
                                    text: "Money Reciept Created Successfully!",
                                    type: "success",
                                    confirmButtonText: "Cool"
                                    },
                                    function(){
                                        window.location=\'invoice.php?Rno='.$Reciept_No.'\'
                                        });
                                    </script>';
						
					}
		
			
		
			}elseif($payWay == 'cash'){
		
				if($payMethod == 'cash'){
		
				$credit = "INSERT INTO `cash`(
		
							`TxType`,
							`cashIn`,
							`cashInTxId`,
							`cashIndescription`
						)
						VALUES(
							'$Reciept_No',
							'$amount',
							'$TxId',
							'$comment'
						)";
		
				if (mysqli_query($conn, $credit)) {						
					print '<script>
                                    swal({
                                    title: "Success!",
                                    text: "Money Reciept Created Successfully!",
                                    type: "success",
                                    confirmButtonText: "Cool"
                                    },
                                    function(){
                                        window.location=\'invoice.php?Rno='.$Reciept_No.'\'
                                        });
                                    </script>';
					
				}
			}
		
		
			}elseif($payWay == 'mobile_banking'){
				
					$credit = "INSERT INTO `mobile_banking`(
						`MB_ID`,
						`cashIn`,
						`TxType`,
						`cashInTxId`,
						`cashInComment`
					)
					VALUES(
		
						'$payMethod',
						'$amount',
						'$Reciept_No',
						'$TxId',
						'$comment'

					)";
			
					if (mysqli_query($conn, $credit)) {						
						print '<script>
                                    swal({
                                    title: "Success!",
                                    text: "Money Reciept Created Successfully!",
                                    type: "success",
                                    confirmButtonText: "Cool"
                                    },
                                    function(){
                                        window.location=\'invoice.php?Rno='.$Reciept_No.'\'
                                        });
                                    </script>';
						
					
		
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
						print '<script>
                                    swal({
                                    title: "Success!",
                                    text: "Money Reciept Created Successfully!",
                                    type: "success",
                                    confirmButtonText: "Cool"
                                    },
                                    function(){
                                        window.location=\'invoice.php?Rno='.$Reciept_No.'\'
                                        });
                                    </script>';
						
					}
		
				}
			}                          

		}

		
	}
		
	                                                          
}





?>

<!------------  Header ----------->

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

																		<?php

                                                                        $sql = "SELECT * FROM mobile_banking GROUP BY MB_ID";
                                                                        $result = $conn->query($sql);
                                                                        if ($result->num_rows > 0) {
                                                                        while($row = $result->fetch_assoc()) {	
                                                                            $MBKID = $row["MB_ID"];
                                                                            echo "<option value=\"$MBKID\">".$row['mb_operator']." - ".$row['mb_number']."</option>";
                                                                            
                                                                            }
                                                                        }
                                                                        ?>
                                                                        
																		<?php

                                                                        $sql = "SELECT DISTINCT id, bankId, bankname FROM bank GROUP BY bankId";
                                                                        $result = $conn->query($sql);
                                                                        if ($result->num_rows > 0) {
                                                                        while($row = $result->fetch_assoc()) {	
                                                                            $bankgetID = $row["bankId"];
                                                                            echo "<option value=\"$bankgetID\">".$row['bankname']."</option>";
                                                                            
                                                                            }
                                                                        }
                                                                        ?>	
																		
																		

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
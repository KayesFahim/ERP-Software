<?php
require('../config.php');
require('../session.php');


$sql = "SELECT * FROM customer ORDER BY CustomerId DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $outputString = preg_replace('/[^0-9]/', '', $row["CustomerId"]);
		$number = (int)$outputString + 1 ;
		$CustomerId = "CSR-$number";									
 }
} else {
	$CustomerId = "CSR-1000";
 }

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cName = $_POST['cname'];
    $CEmail = $_POST['cemail'];
    $cPhone = $_POST['cphone'];
    $cAddress = $_POST['caddress'];
    $cRegDate = date("d/m/Y");
    $creditdt = $_POST['cnid'];
	$balance = $_POST['balance']; 

    $sqlquery = "INSERT INTO `customer`(                                            
        `CustomerId`,
		`name`,
		`phone`,
		`email`,
		`address`
    )
    VALUES(
        '$CustomerId',
        '$cName',
        '$cPhone',
        '$CEmail',
        '$cAddress'
    )";
        
    if ($conn->query($sqlquery) === TRUE) {

			$ClientLedger ="INSERT INTO `client_ledger`(`TxType`, `CSR_ID`, `PaxName`, `serviceType`, `Details`, `deposit`, `Balance`)
                         VALUES ('Open','$CustomerId',' ','Account Open','Opening Balanced','$balance','$balance')";

        if (mysqli_query($conn, $ClientLedger)) {

			echo '<script language="javascript">';
		    echo 'alert("Successfully Created"); location.href="index.php"';
		    echo '</script>';

		}
           
	 }
                                                                                       
}


											
?>

<!------------  Header ----------->
<?php include '../header.php'; ?>
<!------------  Header ----------->

	    
        <!-- Sidebar -->

		<?php include '../sidebar.php'; ?>	
			<!--- Sidebar --->

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">
				
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Add New Customer</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="invoice.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Add Customer</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				

				<!-- Contant -->
				<div class="row">					
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Customer Information</h4>
									</div>
                                    


									<div class="card-body">
										<form action="#" method='post'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Customer ID</label>
																<input type="text" value="<?php echo $CustomerId ?>" class="form-control" disabled>
															</div>
														</div>
													
													
														<div class="col-md-6">
															<div class="form-group">
																<label>Customer Name</label>
																<input type="text" name="cname" class="form-control">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Customer Email</label>
																<input type="email" name="cemail" class="form-control">
															</div>
														</div>
													
                                                        <div class="col-md-6">
															<div class="form-group">
																<label>Customer Phone</label>
																<input type="number" name="cphone" class="form-control">
															</div>
														</div>
													</div>
													<div class="row">
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Address</label>
																<input type="text"name="caddress" class="form-control">
															</div>
														</div>
													
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>NID / Passport No</label>
																<input type="text" name="cnid" class="form-control">
															</div>
														</div>
														
														<div class="col-md-4">
															<div class="form-group">
																<label>Opening Balance</label>
																<input type="number" name="balance" class="form-control">
															</div>
														</div>													
													</div>
											<div class="text-right">
												<button type="submit" class="btn btn-primary"> Create </button>
											</div>
										</form>
									</div>
								</div>
							</div>

                            <!-- Contact Personal Info  --->
            
						</div>


					</div>
					<!-- End Contant -->
					</div>	                   
				</div>

				<!-- /Page Wrapper -->
			</div>
			<!-- /Main Wrapper -->
			
<! ------------  Footer ----------->
<?php include '../footer.php'; ?>
<! ------------  Footer ----------->
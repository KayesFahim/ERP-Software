<?php
include '../config.php';
include('../session.php');


$success ="";
$error ="";

$BankId ="";
$sql = "SELECT * FROM bank ORDER BY bankId DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $outputString = preg_replace('/[^0-9]/', '', $row["bankId"]);
		$BankId = "BNK-00".(int)$outputString + 1 ;									
 }
} else {
echo "0 results";
 }

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bname = $_POST['bankname'];
    $brname = $_POST['branchname'];
    $accno = $_POST['accno'];
    $credit = $_POST['credit'];
    $creditDate = date("d/m/Y");
    $creditdt = $_POST['creditdt']; 

    $sqlquery = "INSERT INTO `bank`(                                            
        `bankId`,
        `bankname`,
        `branchname`,
        `bankaccno`,
        `credit`,
        `creditDate`,
        `creditComment`
    )
    VALUES(
        '$BankId',
        '$bname',
        '$brname',
        '$accno',
        '$credit',
        '$creditDate',
        '$creditdt'
    )";
        
        if ($conn->query($sqlquery) === TRUE) {
            $success = "Record inserted successfully";
        } else {
            $error = "Error: " . $sqlquery . "<br>" . $conn->error;
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
							<h3 class="page-title">Add New bank</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="invoice.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Add New Bank</li>
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
										<h4 class="text-danger card-title">Bank Information</h4>
									</div>
                                    <div class="alert alert-success" role="alert">
                                                <?php echo $success; ?>
                                        </div>
                                        <div class="alert alert-danger" role="alert">
                                                <?php echo $error; ?>
                                        </div>


									<div class="card-body">
										<form action="#" method='post'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Bank ID</label>
																<input type="text" name="bankid" value="<?php echo $BankId ?>" class="form-control" disabled>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Bank Name</label>
																<input type="text" name="bankname" class="form-control">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Branch Name</label>
																<input type="text" name="branchname" class="form-control">
															</div>
														</div>
                                                        <div class="col-md-6">
															<div class="form-group">
																<label>Account Number</label>
																<input type="text" name="accno" class="form-control">
															</div>
														</div>

                                                        <div class="col-md-6">
															<div class="form-group">
																<label>Opening Balance</label>
																<input type="number"name="credit" class="form-control">
															</div>
														</div>
                                                        <div class="col-md-6">
															<div class="form-group">
																<label>Comments</label>
																<input type="text" name="creditdt" class="form-control">
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
			
<! ------------  Footer ----------->
<?php include '../footer.php'; ?>
<! ------------  Footer ----------->
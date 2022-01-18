<?php

include '../config.php';
include('../session.php');


$creditId = $_GET['getCreditId'];

//Employee Info
$Bank_Name;
$Bank_Branch;
$Bank_Acccount;
$Bank_Id;
$Credit;
$Creditdate;
$creditComments;



$sql = "SELECT * FROM bank where id='$creditId'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $Bank_Name = $row["bankname"];
        $Bank_Branch = $row["branchname"];
        $Bank_Acccount = $row["bankaccno"];
        $Bank_Id = $row["bankId"];
        $Credit = $row["credit"];
        $Creditdate = $row["creditDate"];
        $creditComments = $row["creditComment"];

        								
 }
} else {
echo "0 results";
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
							<h3 class="page-title">Edit Credit Details</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="invoice.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Credit</li>
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
										<h4 class="text-danger card-title">Credit Information</h4>
									</div>
                                    
									<div class="card-body">
										<form action="#" method='post'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Bank ID</label>
																<input type="text" name="bankid" value="<?php echo $Bank_Id ?>" class="form-control" disabled>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Bank Name</label>
																<input type="text" value="<?php echo $Bank_Name ?>" name="bankname" class="form-control">
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-group">
																<label>Branch Name</label>
																<input type="text" value="<?php echo $Bank_Branch ?>" name="branchname" class="form-control">
															</div>
														</div>
                                                        <div class="col-md-6">
															<div class="form-group">
																<label>Account Number</label>
																<input type="text" value="<?php echo $Bank_Acccount ?>" name="accno" class="form-control">
															</div>
														</div>

                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Credit Balance</label>
																<input type="number" value="<?php echo $Credit ?>" name="credit" class="form-control">
															</div>
														</div>
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Credit Balance</label>
																<input type="date" value="<?php echo $Creditdate ?>" name="credit" class="form-control">
															</div>
														</div>
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Comments</label>
																<input type="text" value="<?php echo $creditComments ?>" name="creditdt" class="form-control">
															</div>
														</div>
											</div>
											<div class="text-right">
												<button type="submit" class="btn btn-primary"> Edit </button>
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
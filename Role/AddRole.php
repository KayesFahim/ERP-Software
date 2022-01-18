<?php

require '../config.php';
require('../session.php');
if($AddPermission !== 'yes'){
    echo '<script language="javascript">';
	echo 'alert("You Have No Pemission On This Page"); location.href="index.php"';
	echo '</script>';
}



$Vendor_Id ="";
$sql = "SELECT * FROM vendor ORDER BY vendorId DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $outputString = preg_replace('/[^0-9]/', '', $row["vendorId"]);
		$Vendor_Id = "VDR-".(int)$outputString + 1;									
 }
} else {
	$Vendor_Id ="VDR-1000";

}

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['name'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    $Role = $_POST['role'];


    $sqlquery = "INSERT INTO `users`(                                            
		`email`,
		`username`,
		`password`,
        `role`
		
    )
    VALUES(
        '$Email',
        '$Name',
        '$Password',
        '$Role'       
    )";
        
        if ($conn->query($sqlquery) === TRUE) {
            $success = "Data Saved successfully";
			echo '<script language="javascript">';
			echo 'alert("Successfully Created"); location.href="index.php"';
			echo '</script>';
        } else {
            echo "Error: " . $sqlquery . "<br>" . $conn->error;
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
							<h3 class="page-title">Add New Role</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="invoice.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Add Role</li>
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
										
									</div>
                                    
                                     <?php if(isset($success)){
                                        echo "<div class='alert alert-success' role='alert'> $success  </div> ";
                                            }
                                      ?>

									<div class="card-body">
										<form action="#" autocomplete="off" method='post'>
											<div class="row">
												<div class="col-md-12">
													<div class="row">														
														<div class="col-md-3">
															<div class="form-group">
																<label>Name</label>
																<input type="text" name="name" class="form-control" required>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Email</label>
																<input type="email" name="email" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-3">
															<div class="form-group">
																<label>Password</label>
																<input type="password" name="password" class="form-control" required>
															</div>
														</div>

                                                        <div class="col-md-3">
															<div class="form-group">
																<label>Role</label>
																<div class="form-group row">
                                                                        <div class="col-lg-12">
                                                                        <select name="role" class="select form-control"  required>
                                                                            <option value="" disabled selected>Select Role</option>
                                                                            
                                                                            <?php if($userRole == 'admin'){
                                                                                echo '<option value="admin">Adminstrator</option>';
                                                                                echo '<option value="manager">Manager</option>';
                                                                                echo '<option value="reservation">Reservation</option>';
                                                                                echo '<option value="accounts">Accounts</option>';
                                                                                echo '<option value="executive">Executive</option>';
                                                                            }elseif($userRole == 'reservation'){                                                                               
                                                                                echo '<option value="reservation">Reservation</option>';
                                                                            }
                                                                             ?>
                                                                           	                                                                           
                                                                        </select>
                                                                        </div>
                                                                    </div>
															</div>
														</div>

                                                       
                                                        
											</div>
											<div class="text-right">
												<button type="submit" class="btn btn-primary"> Add Role </button>
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
			<input type="hidden" id="refresh" value="no">

			<script>
				jQuery( document ).ready(function( $ ) {
				//Use this inside your document ready jQuery 
				$(window).on('popstate', function() {
				location.reload(true);
				});

				});
			</script>
			

<!------------  Header ----------->
<?php include '../footer.php'; ?>
<!------------  Header ----------->
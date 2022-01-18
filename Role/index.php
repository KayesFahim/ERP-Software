<?php

include '../config.php';
include('../session.php');


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
							<h3 class="page-title">User Roles</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">User Role</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<!-- Contant -->
				
					<div class="col-md-12">
						
					</div>
					<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									
									<div class="text-right">

										<?php if($AddPermission == 'yes'){
                                            echo '<a href="AddRole.php" class="btn btn-primary"> Create +</a>';
                                         }else{

                                         } ?>
									</div>
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													
													<th>Name</th>
													<th>Email</th>
													<th>Role</th>													
													<th>Action</th>
                                                    <th></th>
												</tr>
											</thead>
											<tbody>
											<?php

												$sql = "SELECT *  FROM `users` ORDER BY id DESC";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) {
  												while($row = $result->fetch_assoc()) {	
													$Rno = $row["id"];
													echo "<tr><td>".$row["username"]."</td>
																<td>".$row["email"]."</td> 
														 		<td>".$row["role"]."</td>
																<td><a href='Moneyreciept/Invoice.php?Rno=$Rno' class='btn btn-primary'> View </a><td>
																 </tr>";   											
												  }
												} else {
  												

											    }
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					<div class="col-md-3">						
					</div>
				</div>
				<!-- /Page Wrapper -->
			</div>
			<!-- /Main Wrapper -->
			

			<!------------  Footer ----------->
<?php include '../footer.php'; ?>
<!------------  Footer ----------->
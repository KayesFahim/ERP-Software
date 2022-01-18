<?php
include '../config.php';
include('../session.php');


$encryption = $_GET['empId'];
$ciphering = "AES-128-CTR";
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
$decryption_iv  = '1234567891011121';
$decryption_key  = "FlyFarInterNational";
$decryption=openssl_decrypt ($encryption, $ciphering, 
        $decryption_key, $options, $decryption_iv);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $issueDate = $_POST['date'];
    $deductionDay = $_POST['deduction'];
    $absentAmount = $_POST['absentamount'];
    $lunchMeal = $_POST['lunch'];
    $timesheetmiss = $_POST['tsm'];
    $advanceSalary = $_POST['advanced'];
    $lossOfService = $_POST['los'];

    if(isset($issueDate) && isset($deductionDay) && isset($absentAmount)
     && isset($lunchMeal) && isset($timesheetmiss) && isset($advanceSalary) && isset($lossOfService)){
        $sql = "INSERT INTO `employee_salary`(
            `EMP_Id`,
            `issueDate`,
            `deductionDay`,
            `absentAmount`,
            `lunchMeal`,
            `timesheetmiss`,
            `advanceSalary`,
            `lossOfService`
        )
        VALUES(
            '$decryption',
            '$issueDate',
            '$deductionDay',
            '$absentAmount',
            '$lunchMeal',
            '$timesheetmiss',
            '$advanceSalary',
            '$lossOfService'
        )";

        if (mysqli_query($conn, $sql)) {
            echo '<script language="javascript">';
            echo 'alert("Successfully Created"); location.href="SalaryView.php?empId='.$encryption.'"';
            echo '</script>';
         } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
							<h3 class="page-title">Create Slalary</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Salary</li>
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
													<div class="col-md-3">
															<div class="form-group">
																<label>EMP ID:</label>
																<input type="text" value="<?php echo $decryption ?>" class="form-control" disabled>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Issue Date:</label>
																<input type="date" name="date" class="form-control" required>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Deduction Days: </label>
																<input type="number" name="deduction" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-3">
															<div class="form-group">
																<label>Advanced Salary </label>
																<input type="number" name="advanced" class="form-control" required>
															</div>
														</div>
														
													</div>
													<div class="row">
														<div class="col-md-3">
																<div class="form-group">
																	<label>Absent Amount :</label>
																	<input type="number" name="absentamount" class="form-control" required>
																</div>
															</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Lunch Meal</label>
																<input type="number" name="lunch"  class="form-control" required>
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<label>Time Sheet Missing</label>
																<input type="number" name="tsm" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-3">
															<div class="form-group">
																<label>Loss Of Service</label>
																<input type="number" name="los" class="form-control" required>
															</div>
														</div>
                                                    </div>
												
												</div>
													
											
											</div>
											<div class="text-right">
												<button type="submit" class="btn btn-primary"> Create</button>
											</div>
										</form>
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
			jQuery(function($) {
				var locations = {
					'Bank': ['City Bank Limited', 'Brac Bank', 'Islami Bank', 'Sonali Bank', 'Dutch Bangla Bank','Commercial Bank', 'NCC Bank', 'Modhumoti Bank' ],
					'Cash' : ['Hand Cash'],
					'SSL_commerce' : ['Total Payable'],
					'Mobile Banking': ['Bkash', 'Nagad', 'Rocket']
					
				}

				var $locations = $('#paymentmethod');
				$('#paymentway').change(function () {
					var country = $(this).val(), lcns = locations[country] || [];

					var html = $.map(lcns, function(lcn){
						return '<option value="' + lcn + '">' + lcn + '</option>'
					}).join('');
					$locations.html(html)
				});
			});

			</script>

<!------------  Header ----------->
<?php include '../footer.php'; ?>
<!------------  Header ----------->
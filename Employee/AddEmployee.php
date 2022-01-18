<?php
include '../config.php';
require '../session.php';

$EmployeeId;


$sql = "SELECT * FROM employee ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$outputString = preg_replace('/[^0-9]/', '', $row["EMP_ID"]);
        $number= (int)$outputString + 1;
		$EmployeeId = "FFI-$number";
 }
} else {
	$EmployeeId ="FFI-1000";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$Email = $_POST['email'];
    $Name = $_POST['name'];
    $Phone = $_POST['phone'];
    $Department  = $_POST['department'];

    $Password = $_POST['password'];
    $FatherName = $_POST['fname'];
    $MotherName= $_POST['mname'];
    $Religion= $_POST['religion'];
    $Marital = $_POST['marital'];
    $Blood  = $_POST['blood'];
    $HomePhone = $_POST['telephone'];
    $BirthDate = $_POST['birthday'];
	$TemporaryAddress = $_POST['tAddress'];
	$ParmanentAddress = $_POST['pAddress'];
	$NID = $_POST['nid'];
	$Passport = $_POST['passport'];
	$Insurance = $_POST['insuranc'];


	$BankName = $_POST['bname'];
    $BankAcc = $_POST['bAccount'];
    $BankBrunch= $_POST['bBranch'];
	$PFBrunch= $_POST['pfAcc'];


    $JobType = $_POST['jobtype'];
    $Designation = $_POST['designation'];
    $Salary  = $_POST['salary'];
    $RegistrationDate = $_POST['regDate'];
    $JoinDate = $_POST['joinDate'];
    $ResignDate= $_POST['resignDate'];
    $ConfirmationDate= $_POST['confirmDate'];
    $SalaryIncrement = $_POST['salaryincrement'];


	$Company = $_POST['company'];
	$CompanyResign = $_POST['time'];
	$CompanyIssue = $_POST['issue'];


    $UniversityName  = $_POST['uvname'];
    $UvPassingYear = $_POST['uvpassingyear'];
    $UvResult = $_POST['uvresult'];
	$UvYear = $_POST['uvyear'];

	$CollegeName  = $_POST['collegename'];
    $CollegePassingYear = $_POST['collegepassingyear'];
    $CollegeResult = $_POST['collegeresult'];
	$CollegeYear = $_POST['collegeyear'];

	$SchoolName  = $_POST['schoolname'];
    $SchoolPassingYear = $_POST['schoolpassingyear'];
    $SchoolResult = $_POST['schoolresult'];
	$SchoolYear = $_POST['schoolyear'];

    $NomineeName = $_POST['nomineename'];
    $NomineePhone = $_POST['nomineephone'];
    $Relation  = $_POST['nomineerelation'];
    $NomineeTAddress = $_POST['nomineeTAddress'];
	$NomineePAddress = $_POST['nomineePAddress'];
    $NomineeBirthDay = $_POST['nomineebirth'];



$sql = "INSERT INTO `employee`(
    `EMP_ID`,
    `email`,
    `name`,
    `phone`,
    `department`,
    `password`,
    `fatherName`,
    `motherName`,
    `dateOfBirth`,
    `telephone`,
    `temporaryaddress`,
    `parmanentaddress`,
    `maritalstatus`,
    `bloodgroup`,
    `religion`,
    `nid`,
    `passportno`,
    `insuranceno`,
    `bankname`,
    `bankacc`,
    `branchname`,
    `pfaccno`,
    `jobType`,
    `designation`,
    `salary`,
    `joindate`,
    `resigndate`,
    `confirmationdate`,
    `incrementdate`,
    `registrationdate`,
    `schoolname`,
    `sscresult`,
    `sscpassingyear`,
    `sscsessionyear`,
    `collegename`,
    `hscresult`,
    `hscpassingyear`,
    `hscsessionyear`,
    `universityname`,
    `cgpa`,
    `uvpassingyear`,
    `uvsessionyear`,
    `pastcompanyname`,
    `workduration`,
    `resigncause`,
    `nominee`,
    `relation`,
    `Address`,
    `nomineebd`,
    `nphone`,
    `pAddress`
)
VALUES(
    '$EmployeeId',
    '$Email',
    '$Name',
    '$Phone',
    '$Department',
    '$Password',
    '$FatherName',
    '$MotherName',
	'$BirthDate',
	'$HomePhone',
	'$TemporaryAddress',
	'$ParmanentAddress',
	'$Marital',
    '$Blood',
    '$Religion',
    '$NID',
    '$Passport',
    '$Insurance',
    '$BankName',
    '$BankAcc',
    '$BankBrunch',
    '$PFBrunch',
    '$JobType',
    '$Designation',
    '$Salary',
    '$JoinDate',
    '$ResignDate',
    '$ConfirmationDate',
    '$SalaryIncrement',
    '$RegistrationDate',
    '$SchoolName',
	'$SchoolResult',
    '$SchoolPassingYear',
    '$SchoolYear',
    '$CollegeName',
    '$CollegeResult',
    '$CollegePassingYear',
    '$CollegeYear',
    '$UniversityName',
	'$UvResult',
    '$UvPassingYear',
	'$UvYear',
	'$Company',
	'$CompanyResign',
	'$CompanyIssue',
	'$NomineeName',
	'$Relation',
	'$NomineeTAddress',
	'$NomineeBirthDay',
	'$NomineePhone',
	'$NomineePAddress'

    
)";

if (mysqli_query($conn, $sql)) {

	echo '<script language="javascript">';
		    echo 'alert("Successfully Created"); location.href="index.php"';
		    echo '</script>';

}else{

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
							<h3 class="page-title">Employee Details</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="invoice.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Employee Details</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<form action=" " method="post">



				<!-- Contant -->
				<div class="row">
					<form action="#" autocomplete="off" method="post">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Employee Information</h4>
									</div>
									<div class="card-body">


											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-2">
															<div class="form-group">
																<label>Employee ID</label>
																<input type="text" value="<?php echo $EmployeeId ?>" class="form-control" disabled>
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label>Email </label> <b style="color:red;">*</b> 
																<input type="email" name="email" class="form-control" required>
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label>Full Name</label> <b style="color:red;">*</b> 
																<input type="text" name="name" class="form-control"required>
															</div>
														</div>
                                                        <div class="col-md-2">
															<div class="form-group">
																<label>Phone</label> <b style="color:red;">*</b> 
																<input type="text" name="phone" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-2">
															<div class="form-group">
																<label>Department :</label> <b style="color:red;">*</b> 
																<input type="text" name="department" class="form-control" required>
															</div>
													    </div>

                                                        <div class="col-md-2">
															<div class="form-group">
																<label>Password :</label> <b style="color:red;">*</b> 
																<input type="password" name="password" class="form-control" required>
															</div>
														</div>
											</div>

									</div>
								</div>
							</div>

                            <!-- Contact Personal Info  --->

						</div>


					</div>
					<!-- End Contant -->
					</div>

                    <!---- basic Info -->

                    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Basic Information</h4>
									</div>
									<div class="card-body">

											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-2">
															<div class="form-group">
																<label>Father Name</label> <b style="color:red;">*</b> 
																<input type="text" name="fname" class="form-control" required>
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label>Mother Name</label> <b style="color:red;">*</b> 
																<input type="text" name="mname" class="form-control" required>
															</div>
														</div>
														<div class="col-md-2">
															<div class="form-group">
																<label>Religion</label> <b style="color:red;">*</b> 
																<input type="text" name="religion" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-2">
															<div class="form-group">
																<label>Marital Status</label> <b style="color:red;">*</b> 
																<input type="text" name="marital" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-2">
															<div class="form-group">
																<label>Blood Group :</label> <b style="color:red;">*</b> 
																<input type="text" name="blood" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-2">
															<div class="form-group">
																<label>Telephone No (Home) :</label>
																<input type="text" name="telephone" class="form-control" required>
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Birth Date :</label> <b style="color:red;">*</b> 
																<input type="date" name="birthday" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Temporary Address:</label> <b style="color:red;">*</b> 
																<input type="text" name="tAddress" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Parmanent Address:</label> <b style="color:red;">*</b> 
																<input type="text" name="pAddress" class="form-control" required>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>NID</label><i style="color:red;">*</i> 
																<input type="text" name="nid" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Passport</label>
																<input type="text" name="passport" class="form-control">
															</div>
														</div>
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Insurance No</label>
																<input type="text" name="insurance" class="form-control">
															</div>
														</div>
													</div>
												</div>

											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
                         <!---- basic Info -->

						 <!---- basic Info -->

						 <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Bank Information</h4>
									</div>
									<div class="card-body">

											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-3">
															<div class="form-group">
																<label>Bank Name</label>
																<input type="text" name="bname" class="form-control">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Bank Account Number</label>
																<input type="text" name="bAccount" class="form-control">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Bank Branch Name</label>
																<input type="text" name="bBranch" class="form-control">
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<label>Provident Fund Acc</label>
																<input type="text" name="pfAcc" class="form-control">
															</div>
														</div>

													</div>


												</div>

											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
                         <!---- basic Info -->



                    <!---- JOb Info -->

                    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Job Information</h4>
									</div>
									<div class="card-body">

											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-3">
															<div class="form-group">
																<label>Job Type</label> <b style="color:red;">*</b> 
																<input type="text" name="jobtype" class="form-control" required>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Designation</label> <b style="color:red;">*</b> 
																<input type="text" name="designation" class="form-control" required>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Salary</label> <b style="color:red;">*</b> 
																<input type="number" name="salary" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-3">
															<div class="form-group">
																<label>Registration Date :</label> <b style="color:red;">*</b> 
																<input type="date" name="regDate" class="form-control" required>
															</div>
													    </div>

													</div>
													<div class="row">
                                                    <div class="col-md-3">
															<div class="form-group">
																<label>Join Date :</label> <i style="color:red;">*</i> 
																<input type="date" name="joinDate" class="form-control" required>
															</div>
													</div>

                                                        <div class="col-md-3">
															<div class="form-group">
																<label>Resign Date :</label>
																<input type="date" name="resignDate" class="form-control">
															</div>
														</div>
                                                        <div class="col-md-3">
															<div class="form-group">
																<label>Confirmation Date :</label>
																<input type="date" name="confirmDate" class="form-control">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label>Salary Increment Date :</label>
																<input type="date" name="salaryincrement" class="form-control">
															</div>
														</div>


													</div>
												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
                         <!---- basic Info -->

                    <!---- Academic Info -->

                    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Work Experience & Academic Information</h4>
									</div>
									<div class="card-body">

											<div class="row">
												<div class="col-md-12">
												<div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                            <h5 class="card-title"> Previous Company </h5>
                                                            </div>
                                                        </div>
														<div class="col-md-3">
                                                            <div class="form-group">
																<label>Name of Company</label>
																<input type="text" name="company" class="form-control">
                                                            </div>
                                                        </div>
                                                       

                                                        <div class="col-md-2">
                                                            <div class="form-group">
																<label>Work Duration</label>
																<input type="text"  name="time" class="form-control">
															</div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
																<label>Resign Cause</label>
																<input type="text"  name="issue" class="form-control">
															</div>
														</div>
													</div>
													<div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                            <h5 class="card-title"> University Information </h5>
                                                            </div>
                                                        </div>
														<div class="col-md-3">
                                                            <div class="form-group">
																<label>Name of Institute</label>
																<input type="text" name="uvname" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
																<label>Passing Year</label>
																<input type="text"  name="uvpassingyear" class="form-control">
															</div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
																<label>Result</label>
																<input type="text"  name="uvresult" class="form-control">
															</div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
																<label>Academic Session</label>
																<input type="text"  name="uvyear" class="form-control">
															</div>
														</div>
													</div>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                            <h5 class="card-title"> College Information </h5>
                                                            </div>
                                                        </div>
														<div class="col-md-3">
                                                            <div class="form-group">
																<label>Name of Institute</label>
																<input type="text"  name="collegename" class="form-control" >
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
																<label>Passing Year</label>
																<input type="text"  name="collegepassingyear" class="form-control" >
															</div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
																<label>Result</label>
																<input type="text" name="collegeresult" class="form-control" >
															</div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
																<label>Academic Session</label>
																<input type="text" name="collegeyear" class="form-control" >
															</div>
														</div>
													</div>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                            <h5 class="card-title"> School Information </h5>
                                                            </div>
                                                        </div>
														<div class="col-md-3">
                                                            <div class="form-group">
																<label>Name of Institute</label>
																<input type="text" name="schoolname" class="form-control" >
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
																<label>Passing Year</label>
																<input type="text" name="schoolpassingyear" class="form-control" >
															</div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
																<label>Result</label>
																<input type="text" name="schoolresult" class="form-control" >
															</div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
																<label>Academic Session</label>
																<input type="text" name="schoolyear" class="form-control" >
															</div>
														</div>
													</div>

												</div>
											</div>

										</form>
									</div>
								</div>
							</div>
						</div>
                        <!---- Academic Info -->

						<!---- basic Info -->

						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h4 class="text-danger card-title">Nominee Information</h4>
									</div>
									<div class="card-body">

											<div class="row">
												<div class="col-md-12">
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Nominee Name</label> <b style="color:red;">*</b> 
																<input type="text" name="nomineename" class="form-control" required>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Relation</label> <b style="color:red;">*</b> 
																<input type="name" name="nomineerelation" class="form-control" required>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label>Address</label> <b style="color:red;">*</b> 
																<input type="text" name="nomineeTAddress" class="form-control" required>
															</div>
														</div>

													</div>

													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label>Birth Date :</label> <b style="color:red;">*</b> 
																<input type="date" name="nomineebirth" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Phone</label> <b style="color:red;">*</b> 
																<input type="text" name="nomineephone" class="form-control" required>
															</div>
														</div>
                                                        <div class="col-md-4">
															<div class="form-group">
																<label>Parmanent Address:</label> <b style="color:red;">*</b> 
																<input type="text" name="nomineePAddress" class="form-control" required>
															</div>
														</div>
													</div>
												</div>

											</div>
											<div class="text-right">
												<button type="submit" class="btn btn-primary">Create</button>
											</div>

									</div>
								</div>
							</div>
						</div>
                         <!---- basic Info -->

					</form>
				</div>

				<!-- /Page Wrapper -->
			</form>
			</div>
			<!-- /Main Wrapper -->
			
<!------------  Footer ----------->
<?php include '../footer.php'; ?>
<!------------  Footer ----------->
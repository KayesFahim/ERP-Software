<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>First Page</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	
	<!-- Main Wrapper -->
	<div class="main-wrapper">
		
		<!-- Header -->
		<div class="header">
			
			<!-- Logo -->
			<div class="header-left">
				<a href="index.html" class="logo">
					<!-- <img src="assets/img/logo.png" alt="Logo"> -->
					<h2>YOUR LOGO</h2>
				</a>
				<a href="index.html" class="logo logo-small">
					<!-- <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30"> -->
					<h4>YOUR LOGO</h4>
				</a>
			</div>
			<!-- /Logo -->

			<a href="javascript:void(0);" id="toggle_btn">
				<i class="fe fe-text-align-left"></i>
			</a>

			<div class="top-nav-search">
				<form>
					<input type="text" class="form-control" placeholder="Search here">
					<button class="btn" type="submit"><i class="fa fa-search"></i></button>
				</form>
			</div>

			<!-- Mobile Menu Toggle -->
			<a class="mobile_btn" id="mobile_btn">
				<i class="fa fa-bars"></i>
			</a>
			<!-- /Mobile Menu Toggle -->

			<!-- Header Right Menu -->
			<ul class="nav user-menu">

				<!-- Notifications -->
				<li class="nav-item dropdown noti-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="fe fe-bell"></i> <span class="badge badge-pill">1</span>
					</a>
					<div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">Notifications</span>
							<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
						</div>
						<div class="noti-content">
							<ul class="notification-list">
								<li class="notification-message">
									<a href="#">
										<div class="media">
											<span class="avatar avatar-sm">
												<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profile.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Farhana </span> Schedule <span class="noti-title">her appointment</span></p>
												<p class="noti-time"><span class="notification-time">4 mins ago</span></p>
											</div>
										</div>
									</a>
								</li>

							</ul>
						</div>
						<div class="topnav-dropdown-footer">
							<a href="#">View all Notifications</a>
						</div>
					</div>
				</li>
				<!-- /Notifications -->

				<!-- User Menu -->
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img"><img class="rounded-circle" src="assets/img/profile.jpg" width="31" alt="Ryan Taylor"></span>
					</a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm">
								<img src="assets/img/profile.jpg" alt="User Image" class="avatar-img rounded-circle">
							</div>
							<div class="user-text">
								<!-- #Username -->
								<h6>Admin</h6>
								<p class="text-muted mb-0">Administrator</p>
							</div>
						</div>
						<a class="dropdown-item" href="">My Profile</a>
						<a class="dropdown-item" href="">Settings</a>
						<a class="dropdown-item" href="login.html">Logout</a>
					</div>
				</li>
				<!-- /User Menu -->
			</ul>
			<!-- /Header Right Menu -->

		</div>
		<!-- /Header -->

		<!-- Sidebar -->
		<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Main</span>
                        </li>
                        <li>
                            <a href="Dashborad.html"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="salesQuotation.html"><i class="fe fe-layout"></i> <span>Sales Quotation</span></a>
                        </li>
                        <li>
                            <a href="invoice.html"><i class="fe fe-layout"></i> <span>Invoice</span></a>
                        </li>
                        <li>
                            <a href="Bill.html"><i class="fe fe-layout"></i> <span>Bill</span></a>
                        </li>
                        <li>
                            <a href="expense.html"><i class="fe fe-layout"></i> <span>Expense</span></a>
                        </li>
                        <li>
                            <a href="moneyReceipt.html"><i class="fe fe-layout"></i> <span>Money Receipt</span></a>
                        </li>

                        <li>
                            <a href="payment.html"><i class="fe fe-layout"></i> <span>Payment</span></a>
                        </li>
                        <li>
                            <a href="transfer.html"><i class="fe fe-layout"></i> <span>Transfer</span></a>
                        </li>
                        <li>
                            <a href="project.html"><i class="fe fe-layout"></i> <span>Project</span></a>
                        </li>
                        <li>
                            <a href="employees.html"><i class="fe fe-layout"></i> <span>Employees</span></a>
                        </li>
                        <li>
                            <a href="Report.html"><i class="fe fe-layout"></i> <span>Report</span></a>
                        </li>

                        <li>
                            <a href="refund.html"><i class="fe fe-layout"></i> <span>Refund</span></a>
                        </li>
                        <li>
                            <a href="accounting.html"><i class="fe fe-layout"></i> <span>Accounting</span></a>
                            <li>
                                <a href="reservation.html"><i class="fe fe-layout"></i> <span>Reservation</span></a>
                                <li>
                                    <a href="access.html"><i class="fe fe-layout"></i> <span>Acces control</span></a>
                                </li>
                            </li>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">
				
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Accounting</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"> <a href="salesQuotation.html">Dashboard</a></li>
								<li class="breadcrumb-item active">Sales Quotation</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				<!-- Contant -->
				<div class="row">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-md-8">
								<h6>Balance Sheet Information</h6>
							</div>
							<div class="col-md-4">
								<div class="row">
									<label class="col-lg-12 col-form-label">Cash And Cash Equivalents  <u><b><span style="color:red; font-size: 20px;">00.00 TK</span></b></u></label>
								</div>
							</div>
						</div>
						<hr>

						<div class="row">
							<div class="col-md-2">
								<h6 class="text-center">Payable</h6>
								<div class="form-group row">
									<div class="col-lg-12">
										<select class="select form-control">
											<option>Total Payable</option>
											<option value="1">A+</option>
											<option value="2">O+</option>
											<option value="3">B+</option>
											<option value="4">AB+</option>
										</select>
									</div>
								</div>
								<h6 class="text-center">0.00</h6>
							</div>
							<div class="col-md-2">
								<h6 class="text-center">Receivable</h6>
								<div class="form-group row">
									<div class="col-lg-12 ">
										<select class="select form-control">
											<option>Total Receivable</option>
											<option value="1">A+</option>
											<option value="2">O+</option>
											<option value="3">B+</option>
											<option value="4">AB+</option>
										</select>
									</div>
								</div>
								<h6 class="text-center">0.00</h6>
							</div>
							<div class="col-md-2">
								<h6 class="text-center">Liabilities</h6>
								<div class="form-group row">
									<div class="col-lg-12">
										<select class="select form-control">
											<option>Total Liabilities</option>
											<option value="1">A+</option>
											<option value="2">O+</option>
											<option value="3">B+</option>
											<option value="4">AB+</option>
										</select>
									</div>
								</div>
								<h6 class="text-center">0.00</h6>
							</div>
							<div class="col-md-2">
								<h6 class="text-center">Overpaid</h6>
								<div class="form-group row">
									<div class="col-lg-12">
										<select class="select form-control">
											<option>Total Overpaid</option>
											<option value="1">A+</option>
											<option value="2">O+</option>
											<option value="3">B+</option>
											<option value="4">AB+</option>
										</select>
									</div>
								</div>
								<h6 class="text-center">0.00</h6>
							</div>
							<div class="col-md-4">
								<h6 class="text-center">Bank Accounts Total Taka</h6>
								<div class="form-group row">
									<div class="col-lg-12">
										<select class="select form-control" multiple>
											<option value="1">A+</option>
											<option value="2">O+</option>
											<option value="3">B+</option>
											<option value="4">AB+</option>
											<option value="1">A+</option>
											<option value="2">O+</option>
											<option value="3">B+</option>
											<option value="4">AB+</option>
											<option value="1">A+</option>
											<option value="2">O+</option>
											<option value="3">B+</option>
											<option value="4">AB+</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<hr>
						<h6>Income Statement Information</h6>
						<div class="row">
							<div class="col-md-3">
								<h6 class="text-center">Sale</h6>
								<div class="form-group row">
									<div class="col-lg-12">
										<select class="select form-control">
											<option>Today Sale</option>
											<option value="1">A+</option>
											<option value="2">O+</option>
											<option value="3">B+</option>
											<option value="4">AB+</option>
										</select>
									</div>
								</div>
								<h6 class="text-center">0.00</h6>
							</div>
							<div class="col-md-3">
								<h6 class="text-center">Purchase</h6>
								<div class="form-group row">
									<div class="col-lg-12 ">
										<select class="select form-control">
											<option>Today Purchase</option>
											<option value="1">A+</option>
											<option value="2">O+</option>
											<option value="3">B+</option>
											<option value="4">AB+</option>
										</select>
									</div>
								</div>
								<h6 class="text-center">0.00</h6>
							</div>
							<div class="col-md-3">
								<h6 class="text-center">Profit/Loss</h6>
								<div class="form-group row">
									<div class="col-lg-12">
										<select class="select form-control">
											<option>Today Profit/Loss</option>
											<option value="1">A+</option>
											<option value="2">O+</option>
											<option value="3">B+</option>
											<option value="4">AB+</option>
										</select>
									</div>
								</div>
								<h6 class="text-center">0.00</h6>
							</div>
						</div>
						<hr>
						<style type="text/css">
							.titular {
								display: block;
								line-height: 60px;
								margin: 0;
								text-align: center;
								border-top-left-radius: 5px;
								border-top-right-radius: 5px;
							}
							.horizontal-list {
								margin: 0;
								padding: 0;
								list-style-type: none;
							}
							.horizontal-list li {
								float: left;
							}
							.block {
								margin: 25px 25px 0 0;
								background: #394264;
								border-radius: 5px;
								float: left;
								width: 300px;
								overflow: hidden;
							}
							/******************************************** LEFT CONTAINER *****************************************/
							.left-container {}
							.menu-box {
								height: 360px;
							}

							.donut-chart-block {
								overflow: hidden;
							}
							.donut-chart-block .titular {
								padding: 10px 0;
							}
							.os-percentages li {
								width: 75px;
								border-left: 1px solid #394264;
								text-align: center;					
								background: #50597b;
							}
							.os {
								margin: 0;
								padding: 10px 0 5px;
								font-size: 15px;		
							}
							.os.ios {
								border-top: 4px solid #e64c65;
							}
							.os.mac {
								border-top: 4px solid #11a8ab;
							}
							.os.linux {
								border-top: 4px solid #fcb150;
							}
							.os.win {
								border-top: 4px solid #4fc4f6;
							}
							.os-percentage {
								margin: 0;
								padding: 0 0 15px 10px;
								font-size: 25px;
							}
							.line-chart-block, .bar-chart-block {
								height: 400px;
							}
							.line-chart {
								height: 200px;
								background: #11a8ab;
							}
							.time-lenght {
								padding-top: 22px;
								padding-left: 38px;
								overflow: hidden;
							}
							.time-lenght-btn {
								display: block;
								width: 70px;
								line-height: 32px;
								background: #50597b;
								border-radius: 5px;
								font-size: 14px;
								text-align: center;
								margin-right: 5px;
								-webkit-transition: background .3s;
								transition: background .3s;
							}
							.time-lenght-btn:hover {
								text-decoration: none;
								background: #e64c65;
							}
							.month-data {
								padding-top: 28px;
							}
							.month-data p {
								display: inline-block;
								margin: 0;
								padding: 0 25px 15px;            
								font-size: 16px;
							}
							.month-data p:last-child {
								padding: 0 25px;
								float: right;
								font-size: 15px;
							}
							.increment {
								color: #e64c65;
							}

							.grafico {
								padding: 2rem 1rem 1rem;
								width: 100%;
								height: 100%;
								position: relative;
								color: #fff;
								font-size: 80%;
							}
							.grafico span {
								display: block;
								position: absolute;
								bottom: 3rem;
								left: 2rem;
								height: 0;
								border-top: 2px solid;
								transform-origin: left center;
							}
							.grafico span > span {
								left: 100%; bottom: 0;
							}
							[data-valor='25'] {width: 75px; transform: rotate(-45deg);}
							[data-valor='8'] {width: 24px; transform: rotate(65deg);}
							[data-valor='13'] {width: 39px; transform: rotate(-45deg);}
							[data-valor='5'] {width: 15px; transform: rotate(50deg);}
							[data-valor='23'] {width: 69px; transform: rotate(-70deg);}
							[data-valor='12'] {width: 36px; transform: rotate(75deg);}
							[data-valor='15'] {width: 45px; transform: rotate(-45deg);}

							[data-valor]:before {
								content: '';
								position: absolute;
								display: block;
								right: -4px;
								bottom: -3px;
								padding: 4px;
								background: #fff;
								border-radius: 50%;
							}
							[data-valor='23']:after {
								content: '+' attr(data-valor) '%';
								position: absolute;
								right: -2.7rem;
								top: -1.7rem;
								padding: .3rem .5rem;
								background: #50597B;
								border-radius: .5rem;
								transform: rotate(45deg);  
							}
							[class^='eje-'] {
								position: absolute;
								left: 0;
								bottom: 0rem;
								width: 100%;
								padding: 1rem 1rem 0 2rem;
								height: 80%;
							}
							.eje-x {
								height: 2.5rem;
							}
							.eje-y li {
								height: 25%;
								border-top: 1px solid #777;
							}
							[data-ejeY]:before {
								content: attr(data-ejeY);
								display: inline-block;
								width: 2rem;
								text-align: right;
								line-height: 0;
								position: relative;
								left: -2.5rem;
								top: -.5rem;
							} 
							.eje-x li {
								width: 33%;
								float: left;
								text-align: center;
							}

/******************************************
GRAFICO CIRCULAR PIE CHART
******************************************/
							.donut-chart {
								position: relative;
								width: 200px;
								height: 200px;
								margin: 0 auto 2rem;
								border-radius: 100%
							}
							p.center-date {
								background: #394264;
								position: absolute;
								text-align: center;
								font-size: 28px;
								top:0;left:0;bottom:0;right:0;
								width: 130px;
								height: 130px;
								margin: auto;
								border-radius: 50%;
								line-height: 35px;
								padding: 15% 0 0;
							}
							.center-date span.scnd-font-color {
								line-height: 0; 
							}
							.recorte {
								border-radius: 50%;
								clip: rect(0px, 200px, 200px, 100px);
								height: 100%;
								position: absolute;
								width: 100%;
							}
							.quesito {
								border-radius: 50%;
								clip: rect(0px, 100px, 200px, 0px);
								height: 100%;
								position: absolute;
								width: 100%;
								font-family: monospace;
								font-size: 1.5rem;
							}
							#porcion1 {
								transform: rotate(0deg);
							}

							#porcion1 .quesito {
								background-color: #E64C65;
								transform: rotate(76deg);
							}
							#porcion2 {
								transform: rotate(76deg);
							}
							#porcion2 .quesito {
								background-color: #11A8AB;
								transform: rotate(140deg);
							}
							#porcion3 {
								transform: rotate(215deg);
							}
							#porcion3 .quesito {
								background-color: #4FC4F6;
								transform: rotate(113deg);
							}
							#porcionFin {
								transform:rotate(-32deg);
							}
							#porcionFin .quesito {
								background-color: #FCB150;
								transform: rotate(32deg);
							}
							.nota-final {
								clear: both;
								color: #4FC4F6;
								font-size: 1rem;
								padding: 2rem 0;
							}
							.nota-final strong {
								color: #E64C65;
							}
							.nota-final a {
								color: #FCB150;
								font-size: inherit;
							}
						</style>
						<div class="container">
							<div class="row">
								<div class="col-md-4">
									<div class="donut-chart-block block"> 
										<h2 class="titular" style="color:white;">Income State Chart</h2>
										<div class="donut-chart">
											<div id="porcion1" class="recorte"><div class="quesito ios" data-rel="21"></div></div>
											<div id="porcion2" class="recorte"><div class="quesito mac" data-rel="39"></div></div>
											<div id="porcion3" class="recorte"><div class="quesito win" data-rel="31"></div></div>
											<div id="porcionFin" class="recorte"><div class="quesito linux" data-rel="9"></div></div>
											<!-- FIN AÑADIDO GRÄFICO -->
											<p class="center-date" style="color:white;">JUNE<br><span class="scnd-font-color">2013</span></p>        
										</div>
										<ul class="os-percentages horizontal-list" style="color:white;">
											<li>
												<p class="ios os scnd-font-color">Sale</p>
												<p class="os-percentage">21<sup>%</sup></p>
											</li>
											<li>
												<p class="mac os scnd-font-color">Cost</p>
												<p class="os-percentage">39<sup>%</sup></p>
											</li>
											<li>
												<p class="linux os scnd-font-color">Profit</p>
												<p class="os-percentage">9<sup>%</sup></p>
											</li>
											<li>
												<p class="win os scnd-font-color">Loss</p>
												<p class="os-percentage">31<sup>%</sup></p>
											</li>
										</ul>
									</div>
								</div>
								<div class="col-md-4">
									<!-- LINE CHART BLOCK (LEFT-CONTAINER) -->
									<div class="line-chart-block block">
										<h2 class="titular" style="color:white;">Sale Growth Chart</h2>
										<div class="line-chart">
											<div class='grafico'>
												<ul class='eje-y'>
													<li data-ejeY='4000'></li>
													<li data-ejeY='3000'></li>
													<li data-ejeY='2000'></li>
													<li data-ejeY='0'></li>
												</ul>
												<ul class='eje-x'>
													<li>2020</li>
													<li>2021</li>
													<li>2022</li>
												</ul>
												<span data-valor='25'>
													<span data-valor='8'>
														<span data-valor='13'>
															<span data-valor='5'>   
																<span data-valor='23'>   
																	<span data-valor='12'>
																		<span data-valor='15'>
																		</span></span></span></span></span></span></span>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-3">
															<h6 class="text-center">Bank Accounts Total Taka</h6>
															<div class="form-group row">
																<div class="col-lg-12">
																	<select class="select form-control" multiple>
																		<option value="1">A+</option>
																		<option value="2">O+</option>
																		<option value="3">B+</option>
																		<option value="4">AB+</option>
																		<option value="1">A+</option>
																		<option value="2">O+</option>
																		<option value="3">B+</option>
																		<option value="4">AB+</option>
																		<option value="1">A+</option>
																		<option value="2">O+</option>
																		<option value="3">B+</option>
																		<option value="4">AB+</option>
																	</select>
																</div>
															</div>
															<h6 class="text-center">Mobile Banking Total Taka</h6>
															<div class="form-group row">
																<div class="col-lg-12">
																	<select class="select form-control" multiple>
																		<option value="1">A+</option>
																		<option value="2">O+</option>
																		<option value="3">B+</option>
																		<option value="4">AB+</option>
																		<option value="1">A+</option>
																		<option value="2">O+</option>
																		<option value="3">B+</option>
																		<option value="4">AB+</option>
																		<option value="1">A+</option>
																		<option value="2">O+</option>
																		<option value="3">B+</option>
																		<option value="4">AB+</option>
																	</select>
																</div>
															</div>

															<h6 class="text-center"><u>Portal Total Taka</u></h6>
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
							<!-- jQuery -->
							<script src="assets/js/jquery-3.2.1.min.js"></script>
							<!-- Bootstrap Core JS -->
							<script src="assets/js/popper.min.js"></script>
							<script src="assets/js/bootstrap.min.js"></script>
							<!-- Slimscroll JS -->
							<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
							<!-- Custom JS -->
							<script  src="assets/js/script.js"></script>
						</body>
						</html>
<?php

include '../config.php';
include('../session.php');

$bank = "SELECT SUM(credit - debit) as amount from bank";
$mobilebanking = "SELECT SUM(cashIn - cashOut) as amount from mobile_banking GROUP By mb_number";
$ssl = "SELECT id, Sum(amount) as balance FROM `ssl_commerce`";
$cash = "SELECT SUM(cashIn - cashOut) as amount from cash";




$result = $conn->query($bank);
$result1 = $conn->query($mobilebanking);
$result2 = $conn->query($ssl);
$result3 = $conn->query($cash);


$Bank_Amount; $MobileBanking_Amount; $SSL_Amount; $Cash;

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$Bank_Amount = $row["amount"];
	}
}

// Mobile banking

if ($result1->num_rows > 0) {
	while($row = $result1->fetch_assoc()) {
	$MobileBanking_Amount = $row["amount"];
		
	}
}

//Portal Balanced

if ($result2->num_rows > 0) {
	while($row = $result2->fetch_assoc()) {
		$SSL_Amount = $row["balance"];



	}
}else{
	$SSL_Amount = 0;
}

//Cash Balanced

if ($result3->num_rows > 0) {
	while($row = $result3->fetch_assoc()) {
		$Cash = $row["amount"];

	}
}else{
	$Cash = 0;
}

?>


<!------------  Header ----------->
<?php include '../header.php'; ?>
<!------------  Header ----------->

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
							<h3 class="page-title">Cash Equivalent</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="Employees.php">Dashboard</a></li>
								<li class="breadcrumb-item active">cash And cash Equivalent</li>
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
									<h4 class="card-title">Cash Details</h4>									
								</div>
								
								<div class="card-body">
									<div class="table-responsive">
										<table class="datatable table table-stripped">
											<thead>
												<tr>
													<th>Item No: </th>
													<th>Account Type</th>
													<th>Amount</th>
													<th>Action</th>
													<th></th>
												</tr>
											</thead>
											<tbody>

												<tr>
												<td>01</td>
												<td>Bank</td> 
												<td><?php echo $Bank_Amount ?></td>												
												<td><a href='Bank.php' class='btn btn-primary'> View </a><td>
												</tr>
												<tr><td>02</td>
												<td>Mobile Banking</td> 
												<td><?php echo $MobileBanking_Amount ?></td>
												<td><a href='MobileBanking.php' class='btn btn-primary'> View </a><td>
												</tr>
												<tr>
												
												<td>03</td>
												<td>SSL Commerce</td>
												<td><?php echo $SSL_Amount ?></td>
												<td><a href='SSLCommerce.php' class='btn btn-primary'> View </a><td>
												</tr>
												<tr>
												<td>04</td>
												<td>Hand Cash</td>
												<td><?php echo $Cash ?></td>
												<td><a href='HandCash.php' class='btn btn-primary'> View </a><td>
												</tr>

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

<?php include '../footer.php'; ?>
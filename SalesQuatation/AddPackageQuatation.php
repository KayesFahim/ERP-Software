`<?php

include '../config.php';
include('../session.php');


//Reciept No

$SQT_No;
$sql = "SELECT * FROM packagequatation ORDER BY sqNo  DESC LIMIT 1";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
        $outputString = preg_replace('/[^0-9]/', '', $row["sqNo"]);
		$number = (int)$outputString + 1;
		$SQT_No = "SQT-$number";									
 }
} else {
	$SQT_No ="SQT-1000";

 }


if (array_key_exists("pax",$_GET)){  
    $pax = $_GET['pax'];
  }else{
    $pax = 1;
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
							<h3 class="page-title">Add Package Quatation</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="../project.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Package Sales Quatation</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
					<div class="col-md-12">
						<div class="row">
                        <div class="col-md-2">
							<div class="form-group">
							<label>Pax No</label>																
                             <form>
                                <input type="number" name="pax" min="1" max="9" class="form-control" required></br>
                                                                                          
                            </form>
							</div>
						</div>
							<div class="col-md-12">
								<div class="card">									
									<div class="card-body">
										<form action="#" autocomplete="off" method="post">
											<div class="row">
												<div class="col-md-12">
													<div class="row">

													<div class="col-md-4">
															<div class="form-group">
																<label>Quatation No:</label>
																<input type="text" value="<?php echo $SQT_No ?>" class="form-control" disabled>
															</div>
														</div>


														<div class="col-md-4">
															<div class="form-group">
																<label>Quatation To:</label>
																<select name="client" class="select form-control"  required>
                                                                            <option value="" disabled selected>Choose Client</option>
                                                                            <?php
                                                                                $sql = "SELECT *  FROM `customer` ORDER BY name DESC";
                                                                                $result = $conn->query($sql);
                                
                                                                                if ($result->num_rows > 0) {
                                                                                while($row = $result->fetch_assoc()) {
                                                                                    $vnName = $row["name"];
																					$CId = $row["CustomerId"];	
                                                                                    echo "<option value=\"$CId\">".$row["name"]."</option>";                                                                                 
                                                                                }
                                                                            }
                                                                                ?>
                                                                            
                                                                </select>
															</div>
														</div>
														
														
													</div>

                                                    <?php 

                                                    for($i = 1 ; $i <= $pax ; $i++){

                                                        echo "<div class='row'>
															<div class='col-md-2'>
																<div class='form-group'>
																	<label>Pax Name $i</label>
																	<input type='text' name='pax$i' class='form-control' required>
																</div>
															</div>
															
															
															
															<div class='col-md-2'>
                                                                <div class='form-group'>
                                                                    <label>Service Type :</label>
                                                                    <select name='packagetype$i' class='select form-control' required >
                                                                            <option value='' disabled selected>Select Package</option>
                                                                            <option value='Italy Package'>Italy Package</option>
                                                                            <option value='india Package'>India Package</option>	
                                                                            <option value='Dubai Package'>Dubai Package</option>	
                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>
															<div class='col-md-2'>
                                                                <div class='form-group'>
                                                                    <label>Service Details</label>
                                                                    <div class='form-check'>
                                                                            <input class='form-check-input' type='checkbox' name='airticket$i' value='' id='flexCheckDefault'>
                                                                            <label class='form-check-label' for='flexCheckDefault'>
                                                                                Air Ticket
                                                                            </label>
                                                                        </div>
                                                                        <div class='form-check'>
                                                                            <input class='form-check-input' type='checkbox' name='visa$i' value='' id='flexCheckDefault'>
                                                                            <label class='form-check-label' for='flexCheckDefault'>
                                                                                Visa Processing
                                                                            </label>
                                                                        </div>
                                                                        <div class='form-check'>
                                                                                <input class='form-check-input' type='checkbox' name='travel$i' value='' id='flexCheckDefault'>
                                                                                <label class='form-check-label' for='flexCheckDefault'>
                                                                                    Travel Assistancy
                                                                                </label>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-2'>
                                                                <div class='form-group'>
                                                                    <label>Service Details</label>
                                                                    <div class='form-check'>
                                                                            <input class='form-check-input' type='checkbox' name='covid$i' value='' id='flexCheckDefault'>
                                                                            <label class='form-check-label' for='flexCheckDefault'>
                                                                               Covid Test
                                                                            </label>
                                                                        </div>
                                                                        <div class='form-check'>
                                                                            <input class='form-check-input' type='checkbox' name='transport$i' value='' id='flexCheckDefault'>
                                                                            <label class='form-check-label' for='flexCheckDefault'>
                                                                                Transportation
                                                                            </label>
                                                                        </div>
                                                                        <div class='form-check'>
                                                                                <input class='form-check-input' type='checkbox' name='document$i' value='' id='flexCheckDefault'>
                                                                                <label class='form-check-label' for='flexCheckDefault'>
                                                                                    Document Assistancy
                                                                                </label>
                                                                        </div>
                                                                </div>
                                                            </div>
															
															<div class='col-md-2'>
																<div class='form-group'>
																	<label>Amount</label>
																	<input type='number' name='price$i' class='form-control' required>
																</div>
															</div>														
													</div>";
                                                    }
                                                

                                                    ?>
                                                    

											<div class="text-right">
												<button type="submit" class="btn btn-primary"> Create Quatation</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

                    <?php

                        if ($_SERVER["REQUEST_METHOD"] == "POST") { 	
                            
                            $Client_Id = $_POST['client'];

                            $ses_sql = mysqli_query($conn,"select * from customer where CustomerId = '$Client_Id' "); 
                            $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);   
                            $Client_Name = $row['name'];


                            for($i= 1; $i <= $pax ; $i++){
                                $paxName = "pax".$i;
                                $service = "packagetype".$i;

                                $airticket = "airticket".$i;
                                $visa = "visa".$i;
                                $travel = "travel".$i;
                                $document = "document".$i;
                                $covid = "covid".$i;                               
                                $transportation = "transport".$i;
                                $price = "price".$i;

                                if(isset($_POST[$airticket])){
                                    $airticketSelect = "Yes";
                                }else{
                                    $airticketSelect = "No";
                                }
                                if(isset($_POST[$visa])){
                                    $visaSelect = "Yes";
                                }else{
                                    $visaSelect = "No";
                                }

                                if(isset($_POST[$travel])){
                                    $travelSelect = "Yes";
                                }else{
                                    $travelSelect = "No";
                                }

                                if(isset($_POST[$covid])){
                                    $covidSelect = "Yes";
                                }else{
                                    $covidSelect = "No";
                                }
                                if(isset($_POST[$transportation])){
                                    $transportSelect = "Yes";
                                }else{
                                    $transportSelect = "No";
                                }
                                if(isset($_POST[$document])){
                                    $documentSelect = "Yes";
                                }else{
                                    $documentSelect = "No";
                                }
                            
                               
                                
                                    
                                    
                                $mrgenerate = "INSERT INTO `packagequatation`(
                                    `sqNo`,
                                    `createdBy`,
                                    `clientName`,
                                    `csrId`,
                                    `totalPax`,
                                    `paxNo`,
                                    `PaxName`,
                                    `service`,
                                    `airticket`,
                                    `visa`,
                                    `travel`,
                                    `covid`,
                                    `transport`,
                                    `document`,
                                    `cost`
                                )
                                VALUES(
                                    '$SQT_No',
                                    '$userName',
                                    '$Client_Name',
                                    '$Client_Id',
                                    '$pax',
                                    '$i',
                                    '$_POST[$paxName]',
                                    '$_POST[$service]',
                                    '$airticketSelect',
                                    '$visaSelect',
                                    '$travelSelect',
                                    '$covidSelect',        
                                    '$transportSelect',
                                    '$documentSelect',
                                    '$_POST[$price]'


                                    
                                )";
                            
                                if (mysqli_query($conn, $mrgenerate)) {
                                    print '<script>
                                    swal({
                                    title: "Success!",
                                    text: "Package Quatation Created Successfully!",
                                    type: "success",
                                    confirmButtonText: "Cool"
                                    },
                                    function(){
                                        window.location=\'PackageInvoice.php?SQT='.$SQT_No.'\'
                                        });
                                    </script>';
                            
                        }	
                                                
                                }

                            }
                                                                                                

                        ?>




														
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
			
		
`<?php

include '../config.php';
include('../session.php');


//Reciept No

$SQT_No;
$sql = "SELECT * FROM salesqutation ORDER BY sqNo  DESC LIMIT 1";
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


 if ($_SERVER["REQUEST_METHOD"] == "POST") { 	
	 
	$Client_Id = $_POST['client'];

    $ses_sql = mysqli_query($conn,"select * from customer where CustomerId = '$Client_Id' "); 
    $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);   
    $Client_Name = $row['name'];


    for($i= 1; $i <= $pax ; $i++){
        $paxName = "pax".$i;
        $Airlines = "airlines".$i;
        $from = "from".$i;
        $to = "to".$i;
        $type = "tickettype".$i;
        $price = "price".$i;
        $way = "way".$i;
            
            
        $mrgenerate = "INSERT INTO `salesqutation`(
            `sqNo`,
            `createdBy`,
            `clientName`,
            `csrId`,
            `pax`,
            `PaxName`,
            `Airlines`,
            `from`,
            `to`,
            `type`,
            `cost`,	
            `way`
        )
        VALUES(
            '$SQT_No',
            '$userName',
            '$Client_Name',
            '$Client_Id',
            '$pax',
            '$_POST[$paxName]',
            '$_POST[$Airlines]',
            '$_POST[$from]',
            '$_POST[$to]',
            '$_POST[$type]',
            '$_POST[$price]',        
            '$_POST[$way]'
            
        )";
    
        if (mysqli_query($conn, $mrgenerate)) {
            echo "Data Added";		
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
							<h3 class="page-title">Add Sales Quatation</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="../project.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Sales Quatation</li>
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
																<label>Bill To:</label>
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
															<div class='col-md-1'>
                                                                <div class='form-group'>
                                                                    <label>Airlines</label>
                                                                    <select name='airlines$i' class='select form-control'  required>
                                                                            <option value='' disabled selected>*</option>
                                                                            <option value='6E'>6E</option>
                                                                            <option value='AI'>AI</option>
                                                                            <option value='BG'>BG</option>
                                                                            <option value='BS'>BS </option>
                                                                            <option value='CX'>CX</option>
                                                                            <option value='CZ'>CZ</option>
                                                                            <option value='EK'>EK</option>
                                                                            <option value='EY'>EY</option>
                                                                            <option value='FZ'>FZ </option>	
                                                                            <option value='GF'>GF </option>
                                                                            <option value='G9'>G9 </option>
                                                                            <option value='G8'>G8 </option>	
                                                                            <option value='H9'>H9</option>
                                                                            <option value='J9'>J9</option>
                                                                            <option value='KU'>KU</option>
                                                                            <option value='MH'>MH</option>
                                                                            <option value='MS'>MS </option>	
                                                                            <option value='OD'>OD</option>	
                                                                            <option value='OV'>OV</option>
                                                                            <option value='QR'>QR </option>	
                                                                            <option value='UL'>UL</option>                                                                          
                                                                            <option value='UK'>UK</option>
                                                                            <option value='SV'>SV</option>
                                                                            <option value='SQ'>SQ </option>
                                                                            <option value='SL'>SL</option>
                                                                            <option value='SG'>SG </option>
                                                                            <option value='TK'>TK </option>	                                                                       
                                                                            <option value='TG'>TG </option>  	
                                                                            <option value='VQ'>VQ </option>                                                                                                                                                    
                                                                            <option value='WY'>WY</option>   
                                                                        </select>
                                                                	</div>
																</div>
															<div class='col-md-1'>
																<div class='form-group'>
																	<label>From</label>
																	<select name='from$i' class='select form-control' required >
                                                                            <option value='' disabled selected>*</option>";

                                                                                $sql = 'SELECT DISTINCT code FROM airports order by code';
                                                                                $result = $conn->query($sql);
                                
                                                                                if ($result->num_rows > 0) {
                                                                                while($row = $result->fetch_assoc()) {
                                                                                    $vnName = $row['code'];	
                                                                                    echo "<option value=\"$vnName\">".$row["code"]."</option>";                                                                                  
                                                                                }
                                                                            }
                                                                            
                                                                            
                                                                echo " </select>
																</div>
															</div>
															<div class='col-md-1'>
																<div class='form-group'>
																	<label>To</label>
																	<select name='to$i' class='select form-control' required >
                                                                            <option value='' disabled selected>*</option>";

                                                                                $sql = 'SELECT DISTINCT code FROM airports order by code';
                                                                                $result = $conn->query($sql);
                                
                                                                                if ($result->num_rows > 0) {
                                                                                while($row = $result->fetch_assoc()) {
                                                                                    $vnName = $row['code'];	
                                                                                    echo "<option value=\"$vnName\">".$row["code"]."</option>";                                                                                  
                                                                                }
                                                                            }
                                                                            
                                                                            
                                                               echo " </select>
																</div>
															</div>
															<div class='col-md-2'>
                                                                <div class='form-group'>
                                                                    <label>Ticket Type :</label>
                                                                    <select name='tickettype$i' class='select form-control' required >
                                                                            <option value='' disabled selected>Ticket Type</option>
                                                                            <option value='Non Refundable'>Non Refundable</option>
                                                                            <option value='Refundable'>Refundable</option>	
                                                                            <option value='Refund Adjusted'>Refund Adjusted </option>	
                                                                            
                                                                        </select>
                                                                </div>
                                                            </div>
															<div class='col-md-2'>
                                                                <div class='form-group'>
                                                                    <label>Way:</label>
                                                                    <select name='way$i' class='select form-control' required >
                                                                            <option value='' disabled selected>Way</option>
                                                                            <option value='One Way'>One Way</option>
                                                                            <option value='Round Trip'>Round Trip</option>	
                                                                            <option value='Multiple City'>Multiple City</option>	
                                                                            
                                                                        </select>
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
			
			
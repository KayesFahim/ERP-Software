<?php

require '../config.php';
require '../session.php';

$SQT = $_GET['SQT'];
$PaxNo = $_GET['PaxNo'];

$sql1 = "SELECT *  FROM `packagequatation` where sqNo='$SQT' And paxNo='$PaxNo' ";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
while($row1 = $result1->fetch_assoc()) {
  $Client_Name = $row1['clientName'];
  $Client_Id = $row1['csrId'];
  $Created_Date = $row1['createdDate'];
  $Created_By = $row1['createdBy'];
  $PaxName = $row1['PaxName'];
  $Pax_No = $row1['totalPax'];

  }
}



?>


<!------------  Header ----------->
<?php include '../header.php'; ?>
<!------------  Header ----------->
          <!-- SideBar -->

          

        <?php
        include '../sidebar.php';
        ?>

        <!-- SideBar -->
                    

		<!-- Page Wrapper -->
		<div class="page-wrapper">
			<div class="content container-fluid">
				
				<!-- Page Header -->
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12">
							<h3 class="page-title">Operation</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="../Dashboard.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Operation</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
				
				
                    
                     <!---- Pax! -->
                    
                    <div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">	
                  <div class="d-flex justify-content-center" style="margin-top: 30px; margin-bottom: 20px;">

                  <?php

                  $ses_sql = mysqli_query($conn,"SELECT *  FROM `packagequatation` where sqNo='$SQT' And paxNo='$PaxNo'");
                  $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

                  if(!empty($row)){
                    $airticket = $row['airticket'];
                    $visa = $row['visa'];
                    $travel = $row['travel'];
                    $covid = $row['covid'];
                    $transport = $row['transport'];
                    $documents = $row['document'];
                  
                    }else{
                      $airticket = "";
                      $visa = " ";
                      $travel = " ";
                      $covid = " ";
                      $transport = " ";
                      $documents = " ";
                    }

                    $Param = "SQT=$SQT&PaxNo=$PaxNo&ClientName=$Client_Name&Client_Id=$Client_Id&PaxName=$PaxName";


                    if($airticket == 'Yes'){
                        echo "<a href='../PackageInvoice/AirTicketInvoice.php?$Param' class='btn btn-primary' style='margin-right: 10px;'> Air Ticket </a>";
                    }
                    if($visa == 'Yes'){
                      echo "<a href='' class='btn btn-primary' style='margin-right: 10px;'> Visa Processing </a>";
                    }
                    if($travel == 'Yes'){
                      echo "<a href='' class='btn btn-primary' style='margin-right: 10px;'> Travel Assistancy </a>";
                    }
                    if($covid == 'Yes'){
                      echo "<a href='' class='btn btn-primary' style='margin-right: 10px;'> Covid Test </a>";
                    }
                    if($transport == 'Yes'){
                      echo "<a href='' class='btn btn-primary' style='margin-right: 10px;'> Transportation </a>";
                    }if($documents == 'Yes'){
                      echo "<a href='' class='btn btn-primary' style='margin-right: 10px;'> Documents </a>";
                    }



                  ?>
                   
                  </div>									
                                        
									</div>
									<div class="card-body">
										
                                                    <div class="row">

                                                    <div class="d-flex">
            <div class="mr-auto p-2">
              <h5>#<?php echo $SQT; ?> </h5>
              <h6>Client Name: <?php echo $Client_Name; ?></h6>

              <h6>Issue Date: <?php echo $Created_Date; ?></h6>
              <h6>Created By: <?php echo $Created_By; ?></h6>
              <h6>Pax No: <?php echo $Pax_No; ?></h6>


            </div>
        </div>





        <table class="table table-bordered" style="margin-top:50px;">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Pax Name</th>
                            <th scope="col">Service</th>
                            <th scope="col">Included Service</th>
                            
                            <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                          $Total=0;
                          $sql = "SELECT *  FROM `packagequatation` where sqNo='$SQT' AND paxNo='$PaxNo'";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {	
                              
                              $Total += $row["cost"];
                              echo "<tr>
                              <th scope='row'>".$row["PaxName"]."</th>                              																
                              <td>".$row["service"]."</td>";

                              echo"<td>";
                              if($row["airticket"] == "Yes"){
                                echo "Air Ticket </br>";

                              }
                              if($row["visa"] == "Yes"){
                                echo "Visa Processing </br>";

                              }
                              if($row["travel"] == "Yes"){
                                echo "Travel Assistancy </br>";

                              }
                              if($row["covid"] == "Yes"){
                                echo "Covid Test </br>";
                              }
                              if($row["transport"] == "Yes"){
                                echo "Transportation</br>";
                              }
                              if($row["document"] == "Yes"){
                                echo "Documents</br>";
                              }
                              echo"</td>";
                              
                              echo "<td>".number_format($row["cost"], 2)."</td></tr>";
                                          
                            }
                          }


                        ?>

                            
                            
                            <tr>
                            
                            <td rowspan="3" colspan="2" style="text-align:center; color:red;">Air Ticket fair Will Be chnage after 15 minutes</td>
                            <td>Total</td>
                            <td><?php echo number_format($Total, 2); ?></td>
                            </tr>
                            <tr>
                            <td>Discount</td>
                            <td>0.00</td>
                            </tr>
                            <tr>
                            <td>Due</td>
                            <td><?php  echo number_format($Total, 2) ?></td>
                            </tr>
                        </tbody>
                        </table>
                            
                
    </div>
    </div>
                                                        

                                                     
											    </div>
									</div>
								</div>
							</div>
						</div>
                         <!---- Pax 1 -->

                         
                        
					</div>
														
					<!-- End Contant -->

                    </form>

                    
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

			
			
<!------------  Footer ----------->
<?php include '../footer.php'; ?>
<!------------  Footer ----------->
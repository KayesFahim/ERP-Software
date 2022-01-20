<?php

require '../config.php';
require '../session.php';

$STQ = $_GET['SQT'];

$sql1 = "SELECT *  FROM `salesqutation` where sqNo='$STQ'";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
while($row1 = $result1->fetch_assoc()) {
  $Client_Name = $row1['clientName'];
  $Created_Date = $row1['createdDate'];
  $Created_By = $row1['createdBy'];
  $Pax_No = $row1['totalPax'];

  }
}



?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/media.css">
    <title>Sales Quatation</title>
    
  </head>
<body>
    <div class="container" style="background: url(../assets/img/pdfbg.jpeg); background-repeat: no-repeat; background-size: cover; height: 100%;">
    <div class="d-flex flex-column">

        <h1 style="text-align:center;margin-top: 220px;"><u>Sales Quatation</u></h2>


        <!-- .row -->

        <div class="d-flex">
            <div class="mr-auto p-2">
              <h5>#<?php echo $STQ; ?> </h5>
              <h6>Client Name: <?php echo $Client_Name; ?></h6>
              <h6>Service: Air Ticket</h6>

            </div>
            <div class="p-2">
              <h6>Issue Date: <?php echo $Created_Date; ?></h6>
              <h6>Created By: <?php echo $Created_By; ?></h6>
              <h6>Pax No: <?php echo $Pax_No; ?></h6>


            </div>
        </div>





        <table class="table table-bordered" style="margin-top:50px;">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Pax Name</th>
                            <th scope="col">Airlines</th>
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Ticket Type</th>
                            <th scope="col">Way</th>
                            <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                          $Total=0;
                          $sql = "SELECT *  FROM `salesqutation` where sqNo='$STQ'";
                          $result = $conn->query($sql);

                          if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {	
                              
                              $Total += $row["cost"];
                              echo "<tr>
                              <th scope='row'>".$row["PaxName"]."</th>                              																
                              <td>".$row["Airlines"]."</td>
                              <td>".$row["placeFrom"]."</td>
                              <td>".$row["placeTo"]."</td>
                              <td>".$row["ticketType"]."</td>
                              <td>".$row["way"]."</td>
                              <td>".number_format($row["cost"], 2)."</td></tr>";
                                          
                            }
                          }


                        ?>

                            
                            
                            <tr>
                            
                            <td rowspan="3" colspan="5" style="text-align:center; color:red;">Air Ticket fair Will Be chnage after 15 minutes</td>
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


    <!-- Optional JavaScript -->
    <script type="text/javascript">
    window.print();
    //-->
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
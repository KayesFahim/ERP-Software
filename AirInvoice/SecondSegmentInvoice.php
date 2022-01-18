<?php

require '../config.php';

$INV_No = $_GET['INV'];

$sql1 = "SELECT *  FROM `invoice` where invNo='$INV_No'";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
while($row1 = $result1->fetch_assoc()) {
  $Client_Name = $row1['clientName'];
  $Created_Date = $row1['createdtime'];
  $Created_By = $row1['createdBy'];
  $System =  $row1['system'];
  $Rev_Officer = $row1['recofficer'];
  }
}

//Table Data

$sql = "SELECT *  FROM `airticket` where invNo='$INV_No'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {	
		//Pax
        $pax1 = $row['PaxName1'];
        $pnr1 = $row['PNR1'];
        $ticket1 = $row['TicketNo1'];
        $airlines1 = $row['Airlines1'];
        $from1 = $row['placeFrom1'];
        $to1 = $row['placeTo1'];
        $way1 = $row['way1'];        
        $Ticket_Type1 = $row['ticketType1']; 
        $price1 = $row['cost1']; 
    
        
						
	}
} else {
  
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
    <title>Invoice</title>
    
  </head>
<body>
    <div class="container" style="background: url(../assets/img/pdfbg.jpeg); background-repeat: no-repeat; background-size: cover; height: 100%;">
    <div class="d-flex flex-column">

        <h1 style="text-align:center;margin-top: 220px;"><u>INVOICE</u></h2>


        <!-- .row -->

        <div class="d-flex">
            <div class="mr-auto p-2">
              <h5>#<?php echo $INV_No; ?> </h5>
              <h6>Client Name: <?php echo $Client_Name; ?></h6>
              <h6>Reservation officer: <?php echo $Rev_Officer; ?></h6>
              <h6>Service: Air Ticket (Second Segment)</h6>
            </div>
            <div class="p-2">
              <h6>Issue Date: <?php echo $Created_Date; ?></h6>
              <h6>Created By: <?php echo $Created_By; ?></h6>
              
            </div>
        </div>





        <table class="table table-bordered" style="margin-top:50px;">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Pax Name</th>
                            <th scope="col">PNR</th>
                            <th scope="col">Ticket Number</th>
                            <th scope="col">Airlines</th>
                            <th scope="col">Type</th>
                            <th scope="col">Place To</th>
                            <th scope="col">Place From</th>
                            <th scope="col">Way</th>
                            <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row"><?php echo $pax1; ?></th>
                            <td><?php echo $pnr1; ?></td>
                            <td><?php echo $ticket1; ?></td>
                            <td><?php echo $airlines1; ?></td>
                            <td><?php echo $Ticket_Type1; ?></td>
                            <td><?php echo $to1; ?></td>
                            <td><?php echo $from1; ?></td>
                            <td><?php echo $way1; ?></td>
                            <td><?php echo $price1; ?></td>
                            </tr>

                            
                            
                            <tr>                           
                            <td rowspan="3" colspan="7" style="text-align:left;">
                            <?php echo "<left><img src='images/$INV_No.png'></left>"; ?> </td>
                            <td>Total</td>
                            <td><?php $Total = $price1;
                              echo number_format($Total, 2)
                            
                            ?></td>
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
    <!--
    window.print();
    //-->
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
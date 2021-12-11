<?php

require '../config.php';
require '../session.php';

$INV_No = $_GET['INV'];

$sql1 = "SELECT *  FROM `invoice` where invNo='$INV_No'";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
while($row1 = $result1->fetch_assoc()) {
  $Client_Name = $row1['clientName'];
  $Created_Date = $row1['createdtime'];
  $Created_By = $row1['createdBy'];
  $Pax_No = $row1['pax'];
  $System =  $row1['system'];
  $Class =  $row1['class'];
  $Ticket_Type = $row1['ticketType'];
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
        $route1 = $row['Route1']; 
        $from1 = $row['placeFrom1'];
        $to1 = $row['placeTo1'];
        $price1 = $row['cost1']; 
    
        //Pax2
        $pax2 = $row['PaxName2'];
        $pnr2 = $row['PNR2'];
        $ticket2 = $row['TicketNo2'];
        $airlines2 = $row['Airlines2'];
        $route2 = $row['Route2']; 
        $from2 = $row['placeFrom2'];
        $to2 = $row['placeTo2'];
        $price2 = $row['cost2'];
        
    
        //Pax3

        $pax3 = $row['PaxName3'];
        $pnr3 = $row['PNR3'];
        $ticket3 = $row['TicketNo3'];
        $airlines3 = $row['Airlines3'];
        $route3 = $row['Route3']; 
        $from3 = $row['placeFrom3'];
        $to3 = $row['placeTo3'];
        $price3 = $row['cost3'];
       
    
         //Pax4

         $pax4 = $row['PaxName4'];
         $pnr4 = $row['PNR4'];
         $ticket4 = $row['TicketNo4'];
         $airlines4 = $row['Airlines4'];
         $route4 = $row['Route4']; 
         $from4 = $row['placeFrom4'];
         $to4 = $row['placeTo4'];
         $price4 = $row['cost4'];
         
    
         //Pax 5
         $pax5 = $row['PaxName5'];
         $pnr5 = $row['PNR5'];
         $ticket5 = $row['TicketNo5'];
         $airlines5 = $row['Airlines5'];
         $route5 = $row['Route5']; 
         $from5 = $row['placeFrom5'];
         $to5 = $row['placeTo5'];
         $price5 = $row['cost5'];
						
	}
} else {
  	echo "0 results";
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
              <h5>INVOICE NO: #<?php echo $INV_No; ?> </h5>
              <h6>Client Name: <?php echo $Client_Name; ?></h6>
              <h6>Reservation officer: <?php echo $Rev_Officer; ?></h6>
              <h6>Service: Air Ticket</h6>
              <h6>Cabin Class: <?php echo $Class; ?></h6>
            </div>
            <div class="p-2">
              <h6>Issue Date: <?php echo $Created_Date; ?></h6>
              <h6>Created By: <?php echo $Created_By; ?></h6>
              <h6>Ticket Type: <?php echo $Ticket_Type; ?></h6>
              <h6>Pax No: <?php echo $Pax_No; ?></h6>


            </div>
        </div>





        <table class="table table-bordered" style="margin-top:50px;">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Pax Name</th>
                            <th scope="col">PNR</th>
                            <th scope="col">Ticket Number</th>
                            <th scope="col">Airlines</th>
                            <th scope="col">Route</th>
                            <th scope="col">Place To</th>
                            <th scope="col">Place From</th>
                            <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row"><?php echo $pax1; ?></th>
                            <td><?php echo $pnr1; ?></td>
                            <td><?php echo $ticket1; ?></td>
                            <td><?php echo $airlines1; ?></td>
                            <td><?php echo $route1; ?></td>
                            <td><?php echo $to1; ?></td>
                            <td><?php echo $from1; ?></td>
                            <td><?php echo $price1; ?></td>
                            </tr>

                            <tr>
                            <th scope="row"><?php echo $pax2; ?></th>
                            <td><?php echo $pnr2; ?></td>
                            <td><?php echo $ticket2; ?></td>
                            <td><?php echo $airlines2; ?></td>
                            <td><?php echo $route2; ?></td>
                            <td><?php echo $to2; ?></td>
                            <td><?php echo $from2; ?></td>
                            <td><?php echo $price2; ?></td>
                            </tr>
                            <tr>
                            <th scope="row"><?php echo $pax3; ?></th>
                            <td><?php echo $pnr3; ?></td>
                            <td><?php echo $ticket3; ?></td>
                            <td><?php echo $airlines3; ?></td>
                            <td><?php echo $route3; ?></td>
                            <td><?php echo $to3; ?></td>
                            <td><?php echo $from3; ?></td>
                            <td><?php echo $price3; ?></td>
                            </tr>
                            <tr>
                            <th scope="row"><?php echo $pax4; ?></th>
                            <td><?php echo $pnr4; ?></td>
                            <td><?php echo $ticket4; ?></td>
                            <td><?php echo $airlines4; ?></td>
                            <td><?php echo $route4; ?></td>
                            <td><?php echo $to4; ?></td>
                            <td><?php echo $from4; ?></td>
                            <td><?php echo $price4; ?></td>
                            </tr>
                            <tr>
                            <th scope="row"><?php echo $pax5; ?></th>
                            <td><?php echo $pnr5; ?></td>
                            <td><?php echo $ticket5; ?></td>
                            <td><?php echo $airlines5; ?></td>
                            <td><?php echo $route5; ?></td>
                            <td><?php echo $to5; ?></td>
                            <td><?php echo $from5; ?></td>
                            <td><?php echo $price5; ?></td>
                            </tr>
                            
                            <tr>
                            
                            <td rowspan="3" colspan="6" style="text-align:center;">Air Ticket fair Will Be chnage after 15 minutes</td>
                            <td>Total</td>
                            <td><?php $Total = $price1 + $price2 + $price3 + $price4 + $price5;
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
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
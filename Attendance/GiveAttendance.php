<?php
include '../config.php';
include('../session.php');

date_default_timezone_set('Asia/Dhaka');
$Today = date("Y-m-d");
																												
$sql = "select * from attendance where emp_Id = '$EMP_Id' AND checkIn LIKE '$Today%' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);																																		
$count = mysqli_num_rows($result);

$startAt = 90000;
$finishAt = 180900;
$currentTime = (int) date('Gis');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if(!isset($_POST['comment'])){
        $Comment = " ";
    }else{       
		$Comment = $_POST['comment'];
    }
    
    if($count == 0){
        $Date = date("Y-m-d h:i:s");
        $sql1 = "INSERT INTO `attendance`(
                `emp_Id`,
                `checkIn`,
                `checkInComment`                            
        )
        VALUES(
            '$EMP_Id',
            '$Date',
            '$Comment'
                      
        )";

        if (mysqli_query($conn, $sql1)) {            
			echo '<script language="javascript">';
			echo 'alert("Check In Recorded"); location.href="GiveAttendance.php"';
			echo '</script>';
         }
    
    }elseif($count == 1){
		date_default_timezone_set('Asia/Dhaka');
        $Date = date("Y-m-d h:i:s");
		$Today = date("Y-m-d");
        $sql1 = "UPDATE `attendance` SET `checkOut` = '$Date', `chechOutComment` = '$Comment' WHERE emp_Id = '$EMP_Id' and checkIn LIKE '$Today%'";

        if (mysqli_query($conn, $sql1)) {            
			echo '<script language="javascript">';
			echo 'alert("Check Out Recorded \n Thanks For your hard Working"); location.href="GiveAttendance.php"';
			echo '</script>';
        }
	}


	
}
?>

<! ------------  Header ----------->
<?php include '../header.php'; ?>
<! ------------  Header ----------->
		
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
							<h3 class="page-title">Give Attendance</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="../dashboard.php">Dashboard</a></li>
								<li class="breadcrumb-item active">Attendance</li>
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
										<h4 class="text-danger card-title">
                                            <?php if(isset($Check_In)){
                                                        echo "<div class='alert alert-success' role='alert'> $Check_In  </div> ";
                                                    }
                                            ?>
                                        </h4>
                                    

									</div>
									<div class="card-body">
										<form action="#" autocomplete="off" method="post">
											<div class="row">
												<div class="col-md-12">
                                                    <div class="row">
														<div class="col-md-6">
																<div class="form-group">
                                                                    <div class="text-center">
                                                                        <canvas id="canvas" width="300" height="300" style="background-color:#333"></canvas>
                                                                    </div>
																</div>
														</div>

                                                        <div class="col-md-6">
                                                            <div class="row">
																<div class="form-group">
                                                                    <div class="text-center">
                                                                        <label><b>Time Date : </b></label>
                                                                        <p id="time"></p>
                                                                    </div>
                                                                </div>
                                                            </div>
															<?php 
																$result1 = mysqli_query($conn,$sql);
																$row1 = mysqli_fetch_array($result1,MYSQLI_ASSOC);																																		
																$count1 = mysqli_num_rows($result1);
																    
																	if($count1 == 1 && empty($row1["checkOut"])) {

																		print "<div class='row'>
																					<div class='text-center'>
																						<button type='submit' class='btn btn-danger rounded-pill' style='font-size: 50px;'> Check Out </button>
																					</div>
																				</div>";

																				if ($currentTime < $finishAt){
																					
																					print "<div class='row' style='margin-top: 50px;'>
																					<div class='col-md-8'>
																						<div class='form-group'>
																							<div class='text-left'>
																									<label><b>You Gonna Check Out Early. Write Valid Reason</b></label>
																									<input type='text' name='comment' class='form-control'Required>
																							</div>
																						</div>
																					</div>
																				</div>";
																																							
																				}



																	}elseif($count1 < 1){
																		print "<div class='row'>
																					<div class='text-center'>
																						<button type='submit' class='btn btn-success rounded-pill' style='font-size: 50px;'> Check In </button>
																					</div>
																				</div>";

																		
																				
																			if ($currentTime > $startAt){
																					
																					print "<div class='row' style='margin-top: 50px;'>
																					<div class='col-md-8'>
																						<div class='form-group'>
																							<div class='text-left'>
																									<label><b>You are Late . Write Valid Reason</b></label>
																									<input type='text' name='comment' class='form-control'Required>
																							</div>
																						</div>
																					</div>
																				</div>";
																																							
																				}
												
																	}else{
																		echo " <h3> See You Tomorrow At 9.00 AM</h3>";																
																	}



															
															
															?>
                                                            
                                                                                                                      
															
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
					</div>
															
						<!-- End Contant -->
					</div>			
				</div>
				<!-- /Page Wrapper -->
			</div>
			<!-- /Main Wrapper -->
			<script>
                var canvas = document.getElementById("canvas");
                var ctx = canvas.getContext("2d");
                var radius = canvas.height / 2;
                ctx.translate(radius, radius);
                radius = radius * 0.90
                setInterval(drawClock, 1000);

                function drawClock() {
                drawFace(ctx, radius);
                drawNumbers(ctx, radius);
                drawTime(ctx, radius);
                }

                function drawFace(ctx, radius) {
                var grad;
                ctx.beginPath();
                ctx.arc(0, 0, radius, 0, 2*Math.PI);
                ctx.fillStyle = 'white';
                ctx.fill();
                grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
                grad.addColorStop(0, '#333');
                grad.addColorStop(0.5, 'white');
                grad.addColorStop(1, '#333');
                ctx.strokeStyle = grad;
                ctx.lineWidth = radius*0.1;
                ctx.stroke();
                ctx.beginPath();
                ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
                ctx.fillStyle = '#333';
                ctx.fill();
                }

                function drawNumbers(ctx, radius) {
                var ang;
                var num;
                ctx.font = radius*0.15 + "px arial";
                ctx.textBaseline="middle";
                ctx.textAlign="center";
                for(num = 1; num < 13; num++){
                    ang = num * Math.PI / 6;
                    ctx.rotate(ang);
                    ctx.translate(0, -radius*0.85);
                    ctx.rotate(-ang);
                    ctx.fillText(num.toString(), 0, 0);
                    ctx.rotate(ang);
                    ctx.translate(0, radius*0.85);
                    ctx.rotate(-ang);
                }
                }

                function drawTime(ctx, radius){
                    var now = new Date();
                    var hour = now.getHours();
                    var minute = now.getMinutes();
                    var second = now.getSeconds();
                    //hour
                    hour=hour%12;
                    hour=(hour*Math.PI/6)+
                    (minute*Math.PI/(6*60))+
                    (second*Math.PI/(360*60));
                    drawHand(ctx, hour, radius*0.5, radius*0.07);
                    //minute
                    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
                    drawHand(ctx, minute, radius*0.8, radius*0.07);
                    // second
                    second=(second*Math.PI/30);
                    drawHand(ctx, second, radius*0.9, radius*0.02);
                }

                function drawHand(ctx, pos, length, width) {
                    ctx.beginPath();
                    ctx.lineWidth = width;
                    ctx.lineCap = "round";
                    ctx.moveTo(0,0);
                    ctx.rotate(pos);
                    ctx.lineTo(0, -length);
                    ctx.stroke();
                    ctx.rotate(-pos);
                }
                </script>

            <input type="hidden" id="refresh" value="no">

			<script>
				jQuery( document ).ready(function( $ ) {

				//Use this inside your document ready jQuery 
				$(window).on('popstate', function() {
				location.reload(true);
				});

				});
			</script>

			
<! ------------  Footer ----------->
<?php include '../footer.php'; ?>
<! ------------  Footer ----------->
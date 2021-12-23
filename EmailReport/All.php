<?php

include '../config.php';
include('../session.php');

?>


<body>


		<!-- Page Wrapper -->
			<div  style="margin-top: 50px">
								

								<div class="card-header">
									<h4 class="card-title">Expense Details</h4>
								</div>

                                             <table style="width:100%">          
                                                <tr style="border:1px solid black;">
                                                    <th style="border:1px solid black;">Issue Date</th>
													<th style="border:1px solid black;">Amount</th>
													<th style="border:1px solid black;">Category</th>
													<th style="border:1px solid black;">Description No</th>
                                                </tr>
                                                <tr style='border:1px solid black;'> 
                                                <?php
                                                
                                                    $Today = date("Y-m-d");

                                                    $sql = "SELECT *  FROM `expense` where issueDate LIKE '$Today%' ORDER BY id DESC";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                    while($row = $result->fetch_assoc()) {	
                                                        $EXP_NO = $row["expNo"];
                                                        echo "<tr>
                                                                    <td style='border:1px solid black;'>".$row["issueDate"]."</td> 
                                                                    <td style='border:1px solid black;'>".$row["amount"]."</td>
                                                                    <td style='border:1px solid black;'>".$row["category"]."</td>
                                                                    <td style='border:1px solid black;'>".$row["purpose"]."</td>
                                                                    </tr>";   											
                                                    }
                                                    } else {
                                                    echo "0 results";
                                                    }
                                                    ?>
											</tbody>
										</table>

				<!-- /Page Wrapper -->

              
	</body>
</html>
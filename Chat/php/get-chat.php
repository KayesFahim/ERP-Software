<?php 

        $outgoing_id = 100;
        $output = "";
        if($outgoing_id == 100)
                if(100 === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. "Kaka" .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="php/images/'.$row['img'].'" alt="">
                                <div class="details">
                                    <p>'. "Kaka" .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;


?>
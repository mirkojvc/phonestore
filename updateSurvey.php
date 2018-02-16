<?php 
include "components/connection.php";
    if(isset($_REQUEST['rate_value'])) {
        $rate_value = $_REQUEST['rate_value'];
        $insert = sprintf('INSERT INTO anketa (score) VALUES(%s)', $rate_value);
        $run    = mysqli_query($conn, $insert); 
        if($run) {
            $getscore = sprintf('SELECT * FROM anketa');
            $score = 0;
            $count = 0;
            $fetch = mysqli_query($conn, $getscore);

            while($sc = mysqli_fetch_array($fetch)) {
                $count++;
                $score += $sc['score'];
            }

            echo $score/$count;
        }
    }
?>
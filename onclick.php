<?php
    date_default_timezone_set("Europe/Moscow"); 
    $start_time = hrtime(true);
    $start_time_sec = time();


    if(!(isset($_GET['x']) && isset($_GET['y']) && isset($_GET['r']))) {
        echo 'Не достаточно данных';
        http_response_code(400);

        
    } else {
            $x = strval(str_replace(',', '.', $_GET['x']));

            $y = strval(str_replace(',', '.', $_GET['y']));

            $r = strval(str_replace(',', '.', $_GET['r']));
            if(!is_numeric($x) || !is_numeric($y) || !is_numeric($r)) {
                echo "Please put numbers into query";
                http_response_code(400);
                return;
            }
            if($r <= 0 || $r > 5 || $y < -2 || $y > 2 || $x <= -5 || $x > 5) {
                echo "Please put correct values";
                http_response_code(400);
                return;
            }
            $hit = false;
            if(($x >= 0) && ($x <= $r / 2) && ($y >=0) && ($y <= $r)) {
                $hit = true;
            }
            if($x>=0 && $y<=0 && $x*$x + $y*$y <= $r * $r / 4) {
                $hit = true;
            }

            // -r - 2x  = y
            if($x<=0 && $y <=0 &&  $y >= -$r - $x*2) {
                $hit = true;
            }

            

            session_start();
            if($hit) {
                $_SESSION['hit'] = 'Hit!';

            } else {
                $_SESSION['hit'] = 'Miss!';
            }





            $attempt = array('x' => $x,
            'y' => $y,
            'r' => $r,
            'hit' => $hit,
            'work_time' => (hrtime(true) - $start_time) / 1000000 ,
            'start_time' => date('Y-m-d H:i:s', $start_time_sec),
        );
            
            if(!isset($_SESSION['attempts'])) {
                $_SESSION['attempts'] = array($attempt);
            } else {
                array_push($_SESSION['attempts'], $attempt);
            }
            header('Location: ./index.php');

    }
    
    
?>
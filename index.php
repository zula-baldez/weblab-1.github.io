<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>weblab_1</title>
    <header class = "header">
        <h1>Egor Vereshchagin, P3232</h1>
        <h2>var. 3204</h2>
     </header>
     <link rel="stylesheet" href="./static/style.css">

</head>

<body>
    <div class = "main">
    <div class = "rainbow-box">     
        <div class = "card">
            <div id = "graph-back"></div>

            <canvas id = "graph" width="350" height="350"></canvas>
        </div>
    </div>    
        <form id = "form" action = "./onclick.php" method = "GET">
                <p class = "variable_name">X</p>
                <input type = "text" name = "x" id = "xInput">
                <p id="x-warning" class="warning"></p>

    
            <div class = "yInput">
            <p  class = "variable_name">Y</p>
                <input name="y" type="radio" value = "-2" id = rb1>
                <label for="rb1"> -2 </label>  
                
                <input name="y" type="radio" value = "-1.5"  id = rb2>
                <label for="rb2"> -1.5 </label>  
                
                <input name="y" type="radio" value = "-1" id = rb3>
                <label for="rb3"> -1 </label>  
                
                <input name="y" type="radio" value = "-0.5" id = rb4>              
                <label for="rb4"> -0.5 </label>  

                <input name="y" type="radio" value = "0" id = rb5>
                <label for="rb5"> 0 </label>  

                <input name="y" type="radio" value = "0.5" id = rb6>
                <label for="rb6"> 0.5 </label>  
                
                <input name="y" type="radio" value = "1" id = rb7>
                <label for="rb7"> 1 </label>  
                
                <input name="y" type="radio" value = "1.5" id = rb8>
                <label for="rb8"> 1.5 </label>  
                
                <input name="y" type="radio" value = "2" id = rb9>
                <label for="rb9"> 2 </label>  
                
            </div>

            <p class = "variable_name">R</p>
                <input type = "hidden" id = 'r' name = 'r'>
 
                    
                <button name = "rButton" value = "1" type="button" id = "button1" class="button" onclick =  
                        'rHidden = document.getElementById("r")
                         rHidden.value = 1;
                        '>1 </button>
                <button name = "rButton" value = "2" type="button" id = "button2" class="button" onclick =  
                        'rHidden = document.getElementById("r")
                         rHidden.value = 2;'>2 </button>
                <button name = "rButton" value = "3" type="button" id = "button3" class="button" onclick =  
                        'rHidden = document.getElementById("r")
                         rHidden.value = 3;'>3 </button>
                <button name = "rButton" value = "4" type="button" id = "button4" class="button" onclick =  
                        'rHidden = document.getElementById("r")
                         rHidden.value = 4;'>4 </button>
                <button name = "rButton" value = "5" type="button" id = "button5" class="button" onclick =  
                        'rHidden = document.getElementById("r")
                         rHidden.value = 5'>5 </button>
                            
            

            <div>
                    <button id="form-submit" type="submit" class="button">Send</button>
            </div>
        </form>    
        <div id = "results" class = "table">
        <h1>Results</h1>
        <table>
            <tr>
                <td>Attempt</td>
                <td>X</td>
                <td>Y</td>
                <td>R</td>
                <td>Result</td>
                <td>Work time</td>
                <td>Start time</td>
            </tr>
        <?php
            
            
            
            if(isset($_SESSION['attempts'])) {
                foreach($_SESSION['attempts'] as $key => $attempt) {
                    print('<tr>');
                    printf('<td>%s</td>', $key+1);
                    printf('<td>%s</td>', $attempt['x']);
                    printf('<td>%s</td>', $attempt['y']);
                    printf('<td>%s</td>', $attempt['r']);
                    if( $attempt['hit']) {
                        printf('<td>%s</td>', 'HIT');
                    } else {
                        printf('<td>%s</td>', 'MISS');
                    }
                
                    printf('<td>%s</td>', $attempt['work_time']);
                    printf('<td>%s</td>', $attempt['start_time']);
                    

                }
            }
        ?>

        </table>



    </div>

    </div>
    
    

    <script src="./static/grapher.js"></script>
    <script src="./static/validator.js"></script>

</body>

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
    <style>
        

        :root {
            font-size: 20px;
            font-family: sans-serif;
            background-color: #7395AE;

        }
        * {
            margin: 0;
            padding: 0;


        }

        .main {

            padding: 10px;
            text-align: center;
        }
        header {
            font-size: 20px;
            font-family: 'Gill Sans', monospace;

            color: #F6F836;

            
            text-align: left;
            background-color: #5D5C61;
            padding: 0;
            margin:0;
            border: 16px solid #5D5C61;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
            
        }


        .warning {
            margin: 30px;
        }

        .variable_name {

            margin: 30px;
            font-size: 30px;
        }
        table {
            font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
            border-collapse: separate;
            border-spacing: 10px;
            background: #5D5C61;
            color: black;
            border: 16px solid #5D5C61;
            border-radius: 40px;
            width: 90%;
            margin : auto;
            transition: 0.3s;

        }
        th {
            font-size: 20px;
            padding: 10px;
        }
        td {
            background: #E8E4E3;
            padding: 10px;
        }

        .card {
            position: relative;
            width: 360px;
            height: 360px;
            margin:auto;
            padding: 0px 0px 0px 0px; 
            margin-top:30px;
            align-items: center;
            display: flex;
            overflow: hidden;
            }

        #graph {
            position: absolute;
            left: 0px;
            right: 0px;
            top: 0px;
            bottom: 0px;
            padding: 0px 0px 0px 0px;
            cursor: pointer;
            margin: 5px;
            border-radius: 10px;
            background-color: #A5EFE7;
        }
        #graph-back {
            position: absolute;
            
            left: -100px;
            right: -100px;
            top: -100px;
            bottom: -100px;

                
            
            background-image: conic-gradient(from 0deg, blue , cyan, #38C0F6, #3856F6, #7368C3, #9668C3, #BF7DFF, blue  );
        
            
            animation: rotate 3s linear infinite;
            overflow: hidden
            

        }


        button {
            
            background-color: #9A9A9A;
            font-size: 20px;
            margin: 10px;
            padding-top: 5px;
            
            padding-bottom: 5px;
            
            padding-right: 15px;
            
            padding-left: 15px;

            transition: 0.3s;
        }


        button:enabled:hover {
            box-shadow: inset 0 0 0 5px #2f6144;

        }


        input[type="radio"] {
                margin: 0px 20px;
            
        }
        input[type="text"] {
            font-size: 20px;

        }


        h2::first-line, h1::first-line, .warning {
            color: #F6F836;
        }

        .graph-back:hover, table:hover {
            box-shadow: 15px 5px rgba(0, 255, 255, 0.5);

        }
        h1, h2 {
            transition: 0.3s;

        }

        header:hover h1 {
        opacity: 0; 
            
        }
        header:hover h2 {

            text-align: center;
            
            transform: scale(2); 
            transition-duration: 0.3s;

        }
        header:hover h2::after {
            content: '. ITMO, 2022';

        }



        @keyframes rotate {
            from {
            transform: rotate(0deg);
            }
            to { 
            transform: rotate(360deg);
            }
        }
    </style>
    
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

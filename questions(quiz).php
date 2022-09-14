<?php include 'database(quiz).php'; ?>
<?php session_start(); ?>
<?php 
if(isset($_SESSION['status'])){
    $id = $_SESSION['id'];
    $qn = $_SESSION['number'];

    $r= mysqli_query($conn,"SELECT * FROM ques");
    $num = mysqli_num_rows($r);
        $result = mysqli_query($conn,"SELECT * FROM ques WHERE si='$qn'");
        $re = mysqli_fetch_assoc($result);
    }
    else{ 
    echo "you can not open this page without login"; 
    exit();
   }
 ?>



<html>
    <head>
        <style>
           
            .container{
                display:grid;
                place-items:center;
                text-align:center;
                background-color:yellow;
                grid-template-rows:10% 70%;
            }
            .main{
                width:60%;
                margin-top:20px;
                background-color:White;
                border:3px solid blue;
                height:90%;
                
            }
            .header{
                grid-row:1/span 1;
            }
            .div1{
                background-color:blue;
                color:white;
                height:10%;
            }
            h2{
                text-align:left;
                margin-left:5%;
            }
            .div2{
                text-align:left;
                padding:40px;
                height:60%;
                
            }
            .options{
                padding:5px;
                font-size:30px;
                size:30px;
            }
            #next{
                float: right;
                background-color:skyblue;
                font-size:30px;
            }
        </style>
</head>
<body class="container" >
<div class="header">
<h1>Welcome to my quiz</h1></div>
<form class="main" method="POST" action="count(quiz).php">
<div class = "div1">
    <h2 >Question <?php echo $qn ?> of <?php echo $num ?></h2>
</div>
<div class = "div2">
<h2 id = "question"><?php echo $re["question"] ?></h2><br>
<div class = "options"><input type="radio" id="option1" name="radio" value="1"><?php echo $re["option1"] ?><br>
<input type="radio" id="option2" name="radio"  value="2"><?php echo $re["option2"] ?><br>
<input type="radio" id="option3" name="radio"  value="3"><?php echo $re["option3"] ?><br>
<input type="radio" id="option4" name="radio"  value="4"><?php echo $re["option4"] ?><br>
</div>
<input type="submit" value="next" id="next" ></div>
</form>
</body>
</html>
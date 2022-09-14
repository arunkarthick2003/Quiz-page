<?php include 'database(quiz).php'; ?>
<?php session_start(); ?>
<?php
$scored_marks = $_SESSION['score'];
$total_marks = $_SESSION['count'] ;
$id=$_SESSION['id'];
$ip=$_SERVER['REMOTE_ADDR'];
//getting start time and end time
date_default_timezone_set('Asia/Kolkata');
$start_time=$_SESSION['start_time'] ;
$end_time = $_SESSION['E_time'];
//setting score again to zero
$_SESSION['score']=0;
$_SESSION['count'] = 0;
//inserting in database
$s = "INSERT INTO results(id,total,ip,start_time,end_time) VALUES('$id','$scored_marks','$ip','$start_time','$end_time')";
$insert= mysqli_query($conn,$s);


?>
<html>
<head>
    <style>
       body{
           display:grid;
           place-items:center;
           background-color:yellow;
           text-align:center;
           grid-gap:10px;
           grid-template-rows:10% 70%;
       } 
       .header{
           grid-row:1/span 1;
       }
       .container{
           width:60%;
           height:100%;
           background-color:white;
           border:3px solid blue;
       }
       .div1{
        height:15%;
        background-color:blue;
        color:White;
       }
       .div2{
           font-size:x-large;
           font-weight:bold;
           line-height:300%;
       }
       #exit{
           margin-top:15px;
           background-color:skyblue;
           width:15%;
           font-size:20px;
       }
    </style>
</head>
<body>
    <div class="header">
    <h1>Welcome to My Quiz</h1></div>
    <form class="container" action="login(quiz).php">
        <div class="div1">
            <h1>Results:</h1>
        </div>
        <div class="div2">
            Scored Marks:<?php echo $scored_marks ?><br>
            Total Marks:<?php echo $total_marks ?><br>
            Start Time:<?php echo $start_time ?><br>
            End Time:<?php echo $end_time ?><br>
        </div>
        <div class="div3">
            <input type="submit" value="Exit" onsubmit=exit(); id="exit">
        </div>
     
    </form>
</body>
</html>


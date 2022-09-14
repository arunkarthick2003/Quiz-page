<?php include 'database(quiz).php'; ?>
<?php session_start(); ?>
<?php
if(!isset($_SESSION['score'])){
    $_SESSION['score']=0;
    $_SESSION['count']=0;
}
if($_SERVER['REQUEST_METHOD']=="POST"){
    $number = $_SESSION['number'];
    $selected_choice = $_POST['radio'];
   // echo $selected_choice;

  
    $r= mysqli_query($conn,"SELECT * FROM ques");
    $total = mysqli_num_rows($r);
    // geting correct answer from server
    $result = mysqli_query($conn,"SELECT * FROM ques WHERE si='$number'");
    $re = mysqli_fetch_assoc($result);
    $ans =  $re["ans"];
    $_SESSION['count']= $_SESSION['count']+$re['marks'];
    if($selected_choice == $ans){
        $_SESSION['score']=$_SESSION['score']+$re['marks'];
    }
    if($number == $total){
    $_SESSION['number']=1;
    date_default_timezone_set('Asia/Kolkata');
    $_SESSION['E_time']=date("h:i:s");
    header("Location:results(quiz).php");
    }
    else{
    $_SESSION['number']=$_SESSION['number']+1;
    header("Location:questions(quiz).php");
    }
}
?>


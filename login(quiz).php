<?php include 'database(quiz).php'; ?>

<html>
<head>
    <style>
        .container{
            display:grid;
            place-items:center;
            text-align:center;
            margin-top:100px;
            background-color:yellow;
            grid-template-rows:10% 70%;
        }
        .header{
            grid-row:1/span 1;
        }
        .main{
            border:3px solid blue;
            font-size:35px;
            text-align:left;
            background-color:white;
            width:600px;
            height:300px;
            padding:10px;
        }
        #in{
            font-size:25px;
            width:400px;
        }
        #su{
            width:150px;
            font-size:30px;
            background-color:lightblue;
        }
    </style>
</head>
<body class="container">
    <div class="header">
    <h1>Welcome to Quiz...</h1></div>
    <form class="main" action="" method="POST">
    UserName:
    <input type="text" name="un" id="in"><br><br>
    Password:
    <input type="password" name="pw" id="in"><br><br><br>
    <input type="submit" value="Login" id="su">
    </form>
</body>
</html>


<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = $_POST['un'];
    $pass = $_POST['pw'];
    $s = "SELECT pw FROM login WHERE id='$name'";
    $result = mysqli_query($conn,$s);
    $num = mysqli_num_rows($result);
    //checking whether already attempted or not
    $check="SELECT * FROM results WHERE id='$name'";
    $result1 = mysqli_query($conn,$check);
    $num1 = mysqli_num_rows($result1);
    
    if($num>0) {
        $pw = mysqli_fetch_assoc($result);
        if($pw['pw']== $pass){
            date_default_timezone_set('Asia/Kolkata');
            $start_time=mktime(14,00,00);
            $End_time=mktime(23,59,59);
           
            if($num1>0){
                echo  '<script type="text/JavaScript"> 
                alert ("You have already atempted quiz");
                </script>';
            }
            else{
                if(time()<$start_time || time()>$End_time){
                    echo  '<script type="text/JavaScript"> 
                    alert ("not registered for quiz");
                    </script>';   
                }
                else{
                echo  '<script type="text/JavaScript"> 
                alert ("sucessful");
                </script>';
                $num=1;
                session_start();
                date_default_timezone_set('Asia/Kolkata');
                $_SESSION['status']= "success";
                $_SESSION['id']=$name;
                $_SESSION['start_time'] = date("h:i:s");
                $_SESSION['number'] = $num;
                header("Location:questions(quiz).php");
                }
        }
       
    }
       else{
        echo  '<script type="text/JavaScript"> 
        alert ("Enter correct password");
        </script>'
   ;
       }
    }
    else{
        echo  '<script type="text/JavaScript"> 
        alert ("Enter correct UserName");
        </script>'
   ;
    }
}
?>





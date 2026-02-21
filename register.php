<?php
include 'db.php';

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO students (name, email, password)
            VALUES ('$name', '$email', '$password')";

    if($conn->query($sql) === TRUE){
        header("Location: login.php");
        exit();
    }
    else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Register</title>

    <style>
        body{
            margin:0;
            padding:0;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Arial, sans-serif;
            background:linear-gradient(135deg,#667eea,#764ba2);
        }

        .container{
            background:white;
            padding:40px;
            width:350px;
            border-radius:20px;
            box-shadow:0 20px 40px rgba(0,0,0,0.3);
            text-align:center;
            animation:fadeIn 1.5s ease-in-out;
        }

        h2{
            color:#764ba2;
            margin-bottom:25px;
            animation:slideDown 1.2s ease-in-out;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"]{
            width:90%;
            padding:12px;
            margin:10px 0;
            border-radius:25px;
            border:2px solid #764ba2;
            outline:none;
            transition:0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus{
            box-shadow:0 0 10px #764ba2;
        }

        input[type="submit"]{
            margin-top:15px;
            padding:12px 30px;
            border:none;
            border-radius:25px;
            background:linear-gradient(45deg,#667eea,#764ba2);
            color:white;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        input[type="submit"]:hover{
            transform:scale(1.1);
        }

        marquee{
            position:fixed;
            bottom:0;
            left:0;
            width:100%;
            font-size:23px;
            font-weight:bold;
            color:white;
            background:linear-gradient(45deg,#fbbf77,#dd24dd);
            padding:15px;
            box-shadow:0 -5px 15px rgba(0,0,0,0.3);
            z-index:999;
        }

        @keyframes fadeIn {
            from {opacity:0;}
            to {opacity:1;}
        }

        @keyframes slideDown {
            from {transform:translateY(-40px); opacity:0;}
            to {transform:translateY(0); opacity:1;}
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Student Register</h2>

    <form method="post">
        <input type="text" name="name" placeholder="Enter Name" required>
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <br>
        <input type="submit" name="register" value="Register">
    </form>

</div>

<marquee behavior="scroll" direction="left" scrollamount="8">
    Created by ABHISHEK CK
</marquee>

</body>
</html>
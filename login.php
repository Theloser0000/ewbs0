<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM students 
            WHERE email='$email' AND password='$password'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION['student_id'] = $row['id'];
        header("Location: complaint.php");
        exit();
    } else {
        $error = "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>

    <style>
        body{
            margin:0;
            padding:0;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Arial, sans-serif;
            background:linear-gradient(135deg,#1d2b64,#f8cdda);
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
            color:#1d2b64;
            margin-bottom:25px;
            animation:slideDown 1.2s ease-in-out;
        }

        .error{
            color:red;
            font-weight:bold;
            animation:shake 0.5s;
        }

        input[type="email"],
        input[type="password"]{
            width:90%;
            padding:12px;
            margin:10px 0;
            border-radius:25px;
            border:2px solid #1d2b64;
            outline:none;
            transition:0.3s;
        }

        input[type="email"]:focus,
        input[type="password"]:focus{
            box-shadow:0 0 10px #1d2b64;
        }

        input[type="submit"]{
            margin-top:15px;
            padding:12px 30px;
            border:none;
            border-radius:25px;
            background:linear-gradient(45deg,#1d2b64,#f8cdda);
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

        @keyframes shake {
            0% {transform:translateX(0);}
            25% {transform:translateX(-5px);}
            50% {transform:translateX(5px);}
            75% {transform:translateX(-5px);}
            100% {transform:translateX(0);}
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Student Login</h2>

    <?php if(isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="post">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <br>
        <input type="submit" name="login" value="Login">
    </form>

</div>

<marquee behavior="scroll" direction="left" scrollamount="8">
    Created by ABHISHEK CK
</marquee>

</body>
</html>
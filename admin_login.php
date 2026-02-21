<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin 
            WHERE username='$username' AND password='$password'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $_SESSION['admin'] = $username;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Invalid Username or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <style>
        body{
            margin:0;
            padding:0;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Arial, sans-serif;
            background:linear-gradient(135deg,#141e30,#243b55);
        }

        .container{
            background:white;
            padding:40px;
            width:350px;
            border-radius:20px;
            box-shadow:0 20px 40px rgba(0,0,0,0.4);
            text-align:center;
            animation:fadeIn 1.5s ease-in-out;
        }

        h2{
            color:#243b55;
            margin-bottom:25px;
            animation:slideDown 1.2s ease-in-out;
        }

        .error{
            color:red;
            font-weight:bold;
            animation:shake 0.4s;
        }

        input[type="text"],
        input[type="password"]{
            width:90%;
            padding:12px;
            margin:10px 0;
            border-radius:25px;
            border:2px solid #243b55;
            outline:none;
            transition:0.3s;
        }

        input[type="text"]:focus,
        input[type="password"]:focus{
            box-shadow:0 0 10px #243b55;
        }

        input[type="submit"]{
            margin-top:15px;
            padding:12px 30px;
            border:none;
            border-radius:25px;
            background:linear-gradient(45deg,#141e30,#243b55);
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

    <h2>Admin Login</h2>

    <?php if(isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="post">
        <input type="text" name="username" placeholder="Enter Username" required>
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
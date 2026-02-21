<?php
session_start();
include 'db.php';

if(!isset($_SESSION['student_id'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['submit'])){
    $complaint = $_POST['complaint'];
    $student_id = $_SESSION['student_id'];

    $sql = "INSERT INTO complaints (student_id, complaint_text)
            VALUES ('$student_id', '$complaint')";

    if($conn->query($sql) === TRUE){
        $success = "Complaint Submitted Successfully!";
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Submit Complaint</title>

    <style>
        body{
            margin:0;
            padding:0;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            font-family:Arial, sans-serif;
            background:linear-gradient(135deg,#0f2027,#203a43,#2c5364);
        }

        .container{
            background:white;
            padding:40px;
            width:400px;
            border-radius:20px;
            box-shadow:0 20px 40px rgba(0,0,0,0.3);
            text-align:center;
            animation:fadeIn 1.5s ease-in-out;
        }

        h2{
            color:#2c5364;
            margin-bottom:20px;
            animation:slideDown 1.2s ease-in-out;
        }

        .success{
            color:green;
            font-weight:bold;
            animation:pop 0.5s;
        }

        .error{
            color:red;
            font-weight:bold;
        }

        textarea{
            width:95%;
            height:120px;
            padding:15px;
            border-radius:15px;
            border:2px solid #2c5364;
            outline:none;
            resize:none;
            font-size:14px;
            transition:0.3s;
        }

        textarea:focus{
            box-shadow:0 0 10px #2c5364;
        }

        input[type="submit"]{
            padding:12px 30px;
            border:none;
            border-radius:25px;
            background:linear-gradient(45deg,#203a43,#2c5364);
            color:white;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        input[type="submit"]:hover{
            transform:scale(1.1);
        }

        .logout-link{
            text-decoration:none;
            color:#2c5364;
            font-weight:bold;
            transition:0.3s;
        }

        .logout-link:hover{
            color:black;
        }

        @keyframes fadeIn {
            from {opacity:0;}
            to {opacity:1;}
        }

        @keyframes slideDown {
            from {transform:translateY(-40px); opacity:0;}
            to {transform:translateY(0); opacity:1;}
        }

        @keyframes pop {
            0% {transform:scale(0.8);}
            100% {transform:scale(1);}
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Submit Complaint</h2>
   
    <?php if(isset($success)) { ?>
        <p class="success"><?php echo  $success; ?></p>
    <?php } ?>

    <?php if(isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="post">
        <textarea name="complaint" placeholder="Write your complaint here..." required></textarea>
        <br><br>
        <input type="submit" name="submit" value="Submit Complaint">
    </form>

    <br>

    <a href="login.php" class="logout-link">Logout<br><h5> please logout after sumbit</h5></a>

</div>

</body>
</html>
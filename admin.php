<?php
session_start();
include 'db.php';

if(!isset($_SESSION['admin'])){
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <style>
        body{
            margin:0;
            padding:0;
            font-family:Arial, sans-serif;
            background:linear-gradient(135deg,#1f4037,#99f2c8);
            min-height:100vh;
        }

        .wrapper{
            padding:30px;
            animation:fadeIn 1.5s ease-in-out;
        }

        h2{
            color:white;
            text-align:center;
            animation:slideDown 1.2s ease-in-out;
        }

        .logout-container{
            text-align:center;
            margin-bottom:20px;
        }

        .logout-btn{
            text-decoration:none;
            padding:10px 25px;
            border-radius:25px;
            background:white;
            color:#1f4037;
            font-weight:bold;
            transition:0.3s;
        }

        .logout-btn:hover{
            background:#1f4037;
            color:white;
        }

        .table-container{
            display:flex;
            justify-content:center;
        }

        table{
            width:80%;
            border-collapse:collapse;
            background:white;
            border-radius:15px;
            overflow:hidden;
            box-shadow:0 15px 35px rgba(0,0,0,0.3);
            animation:fadeIn 2s;
        }

        th{
            background:#1f4037;
            color:white;
            padding:15px;
        }

        td{
            padding:12px;
            text-align:center;
        }

        tr{
            transition:0.3s;
        }

        tr:hover{
            background:#e0f7f1;
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

<div class="wrapper">

    <h2>Admin - View Complaints</h2>

    <div class="logout-container">
        <a href="admin_logout.php" class="logout-btn">Logout</a>
    </div>

<?php
$sql = "SELECT students.name, complaints.complaint_text
        FROM complaints
        JOIN students ON complaints.student_id = students.id";

$result = $conn->query($sql);
?>

<div class="table-container">
<table>

<tr>
    <th>Student Name</th>
    <th>Complaint</th>
</tr>

<?php
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['complaint_text']."</td>";
        echo "</tr>";
    }
}
?>

</table>
</div>

</div>

</body>
</html>
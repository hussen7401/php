<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <h2>Table</h2>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>username</th>
                <th>password</th>
                <th>per</th>
                <th>delete</th>
                <th>update</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $con = mysqli_connect('localhost','root','','asf');
                $cmd = 'SELECT * FROM `af`';
                $q = mysqli_query($con,$cmd);
                while ($row = mysqli_fetch_array($q)) {
                    echo 
                        '<tr><td>'.$row['id'].'</td>',
                        '<td>'.$row['name'].'</td>',
                        '<td>'.$row['username'].'</td>',
                        '<td>'.$row['password'].'</td>',
                        '<td>'.$row['per'].'</td>',
                        //هاي للحذف بعدين نستعملها 
                        '<td><a href="?rid='.$row['id'].'"> Delete </a></td>',
                        
                        '<td><a href="edit.php?update_id=' . $row['id'].'&update_name=' 
                                                           . $row['name'].'&update_username=' 
                                                           . $row['username'].'&update_per=' 
                                                           . $row['per'].'" > update </a></td></tr>';
                    }

                    
                //url هذا الكود في حال اكو ايدي بعنوان ال 
                //راح يحذف البيانات من الداتابيس حسب هذا الايدي 
                if (isset($_GET['rid'])) {
                    $cmdd = 'DELETE FROM `af` WHERE id ='.$_GET['rid'];
                    if (mysqli_query($con,$cmdd)) {
                        echo "<script>alert('انحذفت');</script>";
                        header("Location: table.php");
                    }    
                }
            ?>
        </tbody>
    </table>
    <p><a href="login.php">Login</a> | <a href="signup.php">Sign Up </a>| <a href="logout.php">logout</a></p>
</body>
<?php  
    // في حال ماعندي جلسة راح يرجعني لصفحة تسجيل الدخول
    session_start();
    if ($_SESSION['per']== null) {          
        header("Location: login.php");
    }
?>
</html>

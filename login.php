<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        form {
            margin: 0 auto;
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <form method="POST">
        <label>Username:</label><br>
        <input type="text"  name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br><br>
        <input type="submit"name="login" value="Login">
    </form>
    <p>Don't have an account? <a href="signup.php">Sign up</a></p>
</body>

<?php 
    session_start();// تفعيل الجلسة
    
    if (isset($_POST['login'])) {        
        $con = mysqli_connect('localhost','root','','asf'); 
        $cmd = 'SELECT * FROM `af`';  
        $q = mysqli_query($con, $cmd);
        $msg = 0; 
        
        while ($row = mysqli_fetch_array($q)) {  
            if ($row['username'] == $_POST['username'] and $row['password'] == md5( $_POST['password'])) { 
                $msg = 1; 
                $_SESSION['per']=$row['per']; 
                $_SESSION['username']=$row['username']; 
            } 
        }
        if ($msg == 1) { 
            header("Location: table.php");
        }
        else{ 
            echo "<script> alert('wrong username or password !') </script>";
        }
    }

    if (isset($_SESSION['per'])!= null) {
        header("Location: table.php");
    }
?>
</html>

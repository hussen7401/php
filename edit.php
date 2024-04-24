<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
        input[type="email"],
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
        a {
            text-decoration: none;
            color: #007bff;
        }
    </style>
</head>
<body>
    <h2>update</h2>  
    <!-- من ضغطت على زر التعديل الموجود بصفحة الجدول راح يرسل البيانات لهاي الصفحة بلرابط -->
    <!-- فاستقبلتهن داخل حقلول حته اعدل عليهن واحفظهن -->
    <form method="POST">
        <input type="text" style="display: none;" name="id" value="<?php echo $_GET["update_id"] ?>" ><br>
        <label>name:</label><br>
        <input type="text"  name="name" value="<?php echo $_GET["update_name"] ?>"><br>
        <label>username:</label><br>
        <input type="text"  name="username" value="<?php echo $_GET["update_username"] ?>"><br>
        <label>uper:</label><br>
        <input type="text"  name="per" value="<?php echo $_GET["update_per"] ?>"><br><br>
        <input type="submit" value="Update" name="Update">
    </form>
</body>
<?php   
    if (isset($_POST['Update'])) {

        $id= $_POST['id'];
        $name= $_POST['name'];
        $username= $_POST['username'];
        $per= $_POST['per'];
        
        $con = mysqli_connect('localhost','root','','asf');
        $cmds = "UPDATE `af` SET `name`= '$name' , `username`= '$username' , `per`= '$per' WHERE id = '$id'";
        if (mysqli_query($con,$cmds)) {
            echo "<script>alert('update');</script>";
            header("Location: table.php");
        }
    }


    // في حال ماعندي جلسة راح يرجعني لصفحة تسجيل الدخول
    session_start();
    if ($_SESSION['per']== null) {   
        header("Location: login.php");
    }
    // في حال ماضغطت على زر التعديل رجعني لصفحة الجدول
    if ($_GET["update_id"]== null) {
        header("Location: table.php");
    }
?>
</html>

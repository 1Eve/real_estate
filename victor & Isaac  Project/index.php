<?php
    session_start();
    if (isset($_POST['submit'])) {
   
    include 'includes/config.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $msg = '';
    $sql = mysqli_query($con, "SELECT * FROM users where email='$email' and password='$password'");
    $row  = mysqli_fetch_array($sql);
    if (is_array($row)) {
        $_SESSION["email"] = $row["email"];
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["staff"] = $row["staff"];
        $_SESSION['house'] = $row['house'];
 
            $msg = "Sign In Access Granted!";
            echo "<script type='text/javascript'>alert('$msg');</script>";
            header("refresh: 0, pages/dashboard.php");


    }else{
        $msg = "User Does not Exist! Please Register First.";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        header("refresh: 0, index.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="login">
  <div class="form">
    <form class="login-form" method="POST" action="">
      <span class="material-icons">Sign In</span>
      <input type="email" placeholder="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
      <input type="password" name="password" placeholder="password" required />
      <button type="submit" name="submit">login</button>
    </form>  
  </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Comfortaa&display=swap');

body {
  background: linear-gradient(90deg, #4b6cb7 0%, #182848 100%);
}

.login {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
  font-family: 'Comfortaa', cursive;
}

.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  border-radius: 10px;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
}

.form input {
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  border-radius: 5px;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
  font-family: 'Comfortaa', cursive;
}

.form input:focus {
  background: #dbdbdb;
}

.form button {
  font-family: 'Comfortaa', cursive;
  text-transform: uppercase;
  outline: 0;
  background: #4b6cb7;
  width: 100%;
  border: 0;
  border-radius: 5px;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}

.form button:active {
  background: #395591;
}

.form span {
  font-size: 75px;
  color: #4b6cb7;
}
</style>
</body>
</html>






















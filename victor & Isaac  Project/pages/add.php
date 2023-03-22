<?php 
require_once("header.php");
?>
 <div class="main-content">
<?php if ($_GET['q'] == 'tenant'){?>






       
			
<h1>Add New Tenant</h1>












<?php
    if (isset($_POST['tenant'])) {
   
        include '../includes/config.php';
    
        $email = $_POST['email'];
        $password = $_POST['password'];
        $house = $_POST['house'];

    
        $users = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
        $rows = mysqli_num_rows($users);
        if($rows >= 1){
            $msg = "User ALready Exists. Please use a different email to sign Up.";
            echo "<script type='text/javascript'>alert('$msg');</script>";
            header("refresh: 0, ../"); 
        }else{
            $insert = mysqli_query($con, "INSERT INTO users(email, password, house, staff) VALUES('$email', '$password', '$house', 'tenant')");
            $msg = "Tenant Registration Successful!";
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }
    
   
}
?>

<div class="login">
  <div class="form">
    <form class="login-form" method="POST" action="">
      <span class="material-icons">Details</span>
      <input type="email" placeholder="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required/>
      <input type="password" name="password" placeholder="password" required />
      <input type="number" name="house" placeholder="house no" required />
      <button type="submit" name="tenant">Add</button>
    </form>  
  </div>
</div>











<?php }elseif($_GET['q'] == 'notification'){?>








    		
    <h1>Add New Notification</h1>












<?php
    if (isset($_POST['notification'])) {
        include '../includes/config.php';
    
        $title = $_POST['title'];
        $text = $_POST['text'];
        $user_id = $_POST['user_id'];

        $insert = mysqli_query($con, "INSERT INTO notifications(title, text, user_id) VALUES('$title', '$text', '$user_id')");
        $msg = "Notification sent Successful!";
        echo "<script type='text/javascript'>alert('$msg');</script>";
    
   
}
?>


<div class="login">
  <div class="form">
    <form class="login-form" method="POST" action="">
      <span class="material-icons">Details</span>
      <input type="text" placeholder="title" name="title"  required/>
      <input type="text" name="text" placeholder="content" required />
      <label for="usr">Select Tenant:</label>
            <select class="form-control" name="user_id"  style="background: #f2f2f2;width:100%;border: 0;
  border-radius: 5px;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
  font-family: 'Comfortaa', cursive;">
            <?php $users = mysqli_query($con, "SELECT * FROM users where staff='tenant'");?>
            <option value="0">Public Notification</option>
              <?php while($row = mysqli_fetch_array($users)){ ?>
              <option value="<?php echo $row['id'];?>"><?php echo $row['email'];?></option>
            <?php }?>
            </select>
            <br>
      <button type="submit" name="notification">Send</button>
    </form>  
  </div>
</div>


<?php }elseif($_GET['q'] == 'Contact'){?>

  <?php
    if (isset($_POST['contact'])) {
        include '../includes/config.php';
    
        $title = $_POST['title'];
        $text = $_POST['text'];
        $user_id = $_POST['user_id'];

        $insert = mysqli_query($con, "INSERT INTO messages(title, text, user_id) VALUES('$title', '$text', '$user_id')");
        $msg = "message sent Successful!";
        echo "<script type='text/javascript'>alert('$msg');</script>";
    
   
}
?>



<div class="login">
  <div class="form">
    <form class="login-form" method="POST" action="">
      <span class="material-icons">write</span>
      <input type="text" placeholder="message title" name="title"  required/>
      <input type="text" name="text" placeholder="message" required />
      <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>">
      <br>
      <button type="submit" name="contact">Send</button>
    </form>  
  </div>
</div>


<?php }else{?>
<p>No Data!</p>
<?php }?>


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






















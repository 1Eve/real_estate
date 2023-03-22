<?php
require_once("../includes/config.php");
if(isset($_POST['submit'])){
$user_id = $_POST['user_id'];
$date = $_POST['date'];
$totalamount = $_POST['totalamount'];
$rent = $_POST['rent'];
$water = $_POST['water'];
$electricity = $_POST['electricity'];
$internet = $_POST['internet'];
$trash = $_POST['trash'];
$balance = $_POST['balance'];


        $query = mysqli_query($con, "UPDATE invoices SET date='$date', totalamount='$totalamount', rent='$rent', water='$water', electricity='$electricity', internet='$internet', trash='$trash', balance='$balance' WHERE user_id='$user_id'");
        $msg = "Record updated successfully!";
        echo "<script type='text/javascript'>alert('$msg');</script>";
    
  }
?>
<html>
  <head>
    <!-- Latest compiled and minified BootstrapCSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    
    <!--   Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,600,700|Playfair+Display:400,700" rel="stylesheet">
  
    <title>
    </title>
  </head>
  
  <body>


  <?php require_once("header.php");?>
        <div class="main-content">
			
        <h1> Payments</h1>
		<p>Welcome to Account!</p>
       <div class="panel-wrapper">
       <div class="panel-head">
      <h1>Update Monthly Payments</h1>
  
      <div class="left col col-md-6">
        <div class="customer-info">
          <h2><span><span><b>1</b></span> Tenant</h2>
  
          <div class="form-group">

         
         
            <label for="usr">Select Tenant:</label>
            <select class="form-control" onchange="location = this.value;">
            <?php $users = mysqli_query($con, "SELECT * FROM users where staff='tenant'");?>
                  <option value="">select tenant Below</option>
               <?php while($row = mysqli_fetch_array($users)){ ?>
                  
              <option value="updatepayments.php?user=<?php echo $row['id'];?>"><?php echo $row['email'];?></option>
            <?php }?>
            </select>
          </div>

          <?php
			if(isset($_GET['user'])){
			$query2 = mysqli_query($con, "SELECT * FROM invoices WHERE user_id = '".$_GET['user']."'");
			while($row = mysqli_fetch_array($query2)){
			?>
       <form action="" method="POST">
         
       <div class="form-group">
            <label for="usr">Date:</label> <input class="form-control" name="date" id="date" type="date" value="9700">
          </div>
          </div>
  
        <input type="hidden" name="user_id" value="<?php  echo $_GET['user'];?>">

        <div class="customer-pay">
        <h2><span><span><b>2</b></span> Payments</h2>
  
  
          <p id="accept">All Monthly Payments</p>
          <i aria-hidden="true" class="fa fa-cc-mastercard"></i> <i aria-hidden="true" class="fa fa-cc-discover"></i> <i aria-hidden="true" class="fa fa-cc-visa"></i> <i aria-hidden="true" class="fa fa-cc-amex"></i>
  
          <div class="form-group">
            <label for="usr">Total Monthy Amount:</label> <input class="form-control" id="totalamount" name="totalamount" type="text" value="9700" oninput="calc();">
          </div>
  
  
          <div class="form-group">
            <label for="num">Rent:</label> <input class="form-control" id="rent" name="rent" type="text" value="<?php  echo $row['rent'];?>/6000" oninput="calc();">
          </div>
  
  
          <div class="form-group">
            <label for="usr">Water Bill:</label> <input class="form-control" name="water" id="water" type="text" value="<?php  echo $row['water'];?>/500" oninput="calc();">
          </div>


          <div class="form-group">
            <label for="usr">Elecricity Bill:</label> <input class="form-control" id="electricity" name="electricity" type="text"  value="<?php  echo $row['electricity'];?>/500" oninput="calc();">
          </div>


          <div class="form-group">
            <label for="usr">Internet Bill:</label> <input class="form-control" id="internet" name="internet" type="text" value="<?php  echo $row['internet'];?>/2500" oninput="calc();">
          </div>



          <div class="form-group">
            <label for="usr">Trash Bill:</label> <input class="form-control" id="trash" name="trash" type="text" value="<?php  echo $row['trash'];?>/200" oninput="calc();">
          </div>

          <div class="form-group">
            <label for="usr">Balance:</label> <input class="form-control" id="balance" name="balance" type="text" required>
          </div>

          <button class="btn btn-primary" type="submit" name="submit">Submit</button>

          <script>
            function calc() {
              var totalamount = document.getElementById("totalamount").value;
              var totalamount = parseInt(totalamount, 10);

              var rent = document.getElementById("rent").value;
              var rent = parseInt(rent, 10);

              var water = document.getElementById("water").value;
              var water = parseInt(water, 10);

              var electricity = document.getElementById("electricity").value;
              var electricity = parseInt(electricity, 10);

              var internet = document.getElementById("internet").value;
              var internet = parseInt(internet, 10);

              var trash = document.getElementById("trash").value;
              var trash = parseInt(trash, 10);

              var balance = totalamount -(rent + water + electricity + internet + trash);
              document.getElementById("balance").value = balance;
            }
          </script>
          
   <?php }}else{?>
               <p>No data!</p>
			<?php }?>
          </form>
        </div>
  
  
      </div>
  
  
      <div class="right col col-md-6">
       
      </div>
   
    </div>
</div>
  <style>
    html {
	background-color: #fcfbfa;
	margin: 20px 100px 30px 100px;
}

body {
	font-family: 'Montserrat', sans-serif;
  background-color: #fcfbfa;

}

.col h2 {
	font-family: 'Montserrat', sans-serif;
	text-align: left;
	font-weight: 100;
	margin-bottom: 30px;
}

p {
	font-family: 'Montserrat', sans-serif;
	font-size: 11px;
	text-align: left;
	font-weight: 300;
	color: grey;
	line-height: 2em;
	letter-spacing: .1em;
}

.customer-order, .customer-pay, .customer-info {
	padding: 20px;
	margin-top: 30px;
	background-color: #ffffff;
	border: .5px solid #cccccc;
}

.btn {
	background-color: #000;
	text-transform: uppercase;
	font-weight: 300;
	font-family: 'Montserrat', sans-serif;
	letter-spacing: .1em;
	font-size: 8px;
}

.btn:hover {
	background-color: #ffffff;
	text-transform: uppercase;
	font-weight: 500;
	font-family: 'Montserrat', sans-serif;
	letter-spacing: .1em;
	border: 1px solid #555555;
}

span {
	color: #cccccc;
}

.customer-order {
	position: fixed;
	margin-right: 100px;
}

.fa {
	padding: 5px;
	margin: 0px 0px 30px 0px;
  text-align: left;
  color: #555555;
}

#accept, label {
	text-transform: uppercase;
	font-size: 11px;
	font-family: 'Montserrat', sans-serif;
	font-weight: 700;
	color: #555555;
	letter-spacing: .1em;
}

.wrapper h1, .wrapper {
	background-color: #fcfbfa;
	font-family: 'Montserrat', sans-serif;
	font-weight: 100;
	margin-bottom: 20px;
}

.wrapper h1 {
  text-align: center;
}


  </style>
    
  </body>
  </html>























































  
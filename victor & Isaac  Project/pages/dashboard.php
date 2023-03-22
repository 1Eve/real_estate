<?php 
require_once("header.php");
?>
<?php if ($_SESSION['staff'] == 'landlord'){?>






        <div class="main-content">
			
            <h1>Dashboard</h1>
			<p>Welcome to Account!</p>
			<div class="panel-wrapper">
				<div class="">
				Tenants <b><?php 
                  $tenants = mysqli_query($con, "SELECT count(*) as count FROM users WHERE staff ='tenant'");
                  while($row = mysqli_fetch_array($tenants)){
                    echo $row['count'];
                  }
                  ?></b>
				  <br>
				 
				</div>
				<div class="panel-body">
				<a href="add.php?q=tenant"><button style="width:120px; height:40px; background-color:#00A5F2;;color:white; border:none;">Add Tenant</button></a>
				<?php 
                  $users = mysqli_query($con, "SELECT * FROM users WHERE staff='tenant'  ORDER BY id desc LIMIT 3");
                  while($row = mysqli_fetch_array($users)){
					  ?>
                 
                 <p><?php echo $row['email']; ?></p>
				 
				<?php }?>
				</div>
			</div>

			

			<div class="panel-wrapper">
				<div class="panel-head">
					Notifications <b><?php 
                  $noti = mysqli_query($con, "SELECT count(*) as count FROM notifications");
                  while($row = mysqli_fetch_array($noti)){
                    echo $row['count'];
                  }
                  ?></b>
				</div>
				
				<div class="panel-body">
				<?php 
                  $notif = mysqli_query($con, "SELECT * FROM notifications  ORDER BY id desc LIMIT 3");
                  while($row = mysqli_fetch_array($notif)){
					  ?>
                 
                 <p><?php echo $row['text']; ?></p>

			
				 
				<?php }?>
				<br>
				<a href="notification.php"><button style="width:120px; height:40px; background-color:#00A5F2;;color:white; border:none;">View All</button></a>
				</div>

			
			</div>

		</div>




    <?php }elseif($_SESSION['staff'] == 'tenant'){?>



        <div class="main-content">
			<h1>Dashboard</h1>
			<div class="panel-wrapper">
				<div class="panel-head">
					My Notifications <b><?php 
                  $noti = mysqli_query($con, "SELECT count(*) as count FROM notifications WHERE user_id = '".$_SESSION['user_id']."'");
                  while($row = mysqli_fetch_array($noti)){
                    echo $row['count'];
                  }
                  ?></b>
				</div>
				<div class="panel-body">
				<?php 
                  $notif = mysqli_query($con, "SELECT * FROM notifications  WHERE user_id = '".$_SESSION['user_id']."'  ORDER BY id desc LIMIT 3");
                  while($row = mysqli_fetch_array($notif)){
					  ?>
                 <p><?php echo $row['title']; ?></p>
                 <p><?php echo $row['text']; ?></p>

			
				 
				<?php }?>
				</div>
			</div>
		</div>




      <?php }?>
      </div>

</body>
</html>
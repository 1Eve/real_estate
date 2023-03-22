<?php 
require_once("header.php");
?>
<?php if ($_SESSION['staff'] == 'tenant'){?>


<div class="main-content">
			<h1>Notifications</h1>
			<label for="usr">Filter By:</label>
			<select class="form-control" style="width:300px; height:40px;" onchange="location = this.value;">
              <option value="">Filter Notifications By Options Below</option>
			  <option value="notification.php?userid=<?php echo 0; ?>">Public</option> 
			  <option value="notification.php?userid=<?php echo $_SESSION['user_id']?>">Private</option>
            </select>
			

			<?php
			if(isset($_GET['userid'])){
			$query = mysqli_query($con, "SELECT * FROM notifications WHERE user_id = '".$_GET['userid']."'");
			while($row = mysqli_fetch_array($query)){
			?>

			<div class="panel-wrapper">
				<div class="panel-head">
				<?php echo $row['title'];?>
				</div>
				<div class="panel-body">
					<?php echo $row['text'];?>
				</div>
			</div>
            <?php }}else{?>
               <p>No data!</p>
			<?php }?>
			
		</div>


  </div>


  <?php }elseif($_SESSION['staff'] == 'landlord'){?>




	<div class="main-content">
			<h1>Notifications</h1>
			<div class="panel-wrapper">
				<div class="panel-head">
				
				</div>
				<div class="panel-body">
				<a href="add.php?q=notification"><button style="width:120px; height:40px; background-color:#00A5F2;;color:white; border:none;">Add Notification</button></a>
				<?php
			$query = mysqli_query($con, "SELECT * FROM notifications");
			if(mysqli_num_rows($query) >= 1){
			while($row = mysqli_fetch_array($query)){
			?>

			<div class="panel-wrapper">
				<div class="panel-head">
				<?php echo $row['title'];?>
				</div>
				<div class="panel-body">
					<?php echo $row['text'];?>
				</div>
			</div>
            <?php }}else{?>
               <p>No data!</p>
			<?php }?>
				</div>
			</div>
			
		</div>


  </div>



  <?php }?>

</body>
</html>
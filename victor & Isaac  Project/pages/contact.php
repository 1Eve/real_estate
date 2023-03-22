    <?php 
        require_once("header.php");
    ?>
       
       
       
       <div class="main-content">
			<h1>Messages</h1>
			<label for="usr">Select Tenant:</label>
            <select class="form-control" onchange="location = this.value;">
            <?php $users = mysqli_query($con, "SELECT * FROM users");?>
                  <option value="">select tenant Below</option>
               <?php while($row = mysqli_fetch_array($users)){ ?>
                  
              <option value="contact.php?user=<?php echo $row['id'];?>"><?php echo $row['email'];?></option>
            <?php }?>
            </select>
			

			<?php
			if(isset($_GET['user'])){
			$query = mysqli_query($con, "SELECT * FROM messages WHERE user_id = '".$_GET['user']."'");
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

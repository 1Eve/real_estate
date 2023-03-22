<?php require_once("header.php");?>
        <div class="main-content">
			
        <h1>Invoice</h1>

			<label for="usr">Filter By:</label>
			<select class="form-control" style="width:300px; height:40px;" onchange="location = this.value;">
              <option value="">Filter By Date of payment Below</option>
                    <?php 

                    $query = mysqli_query($con, "SELECT * FROM invoices WHERE user_id = '".$_SESSION['user_id']."'");
                    while($row = mysqli_fetch_array($query)){
                    
                    ?>

			      <option value="invoice.php?date=<?php echo $row['date']?>"><?php echo $row['date'];?></option> 

                    <?php }?>

            </select>

       <div class="panel-wrapper">
        
       <?php
			if(isset($_GET['date'])){
			$query2 = mysqli_query($con, "SELECT * FROM invoices WHERE user_id = '".$_SESSION['user_id']."' AND date='".$_GET['date']."'");
			while($row = mysqli_fetch_array($query2)){
			?>
       
       <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
		<tr class="top_rw">
		   <td colspan="2">
		      <h2 style="margin-bottom: 0px;"> Monthly Invoice</h2>
			  <span style="">Date: <?php echo $_GET['date'];?></span>
		   </td>
		    <td  style="width:30%; margin-right: 10px;">
		        House No:<?php echo $_SESSION['house'];?>
		   </td>
		</tr>
            <tr class="top">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
							<b> Note: </b> <br>
                                This is your monthly invoice. <br> All bill balances should be paid by the first week of each month. Failure to, the management will lock your <br> house and you  wont be able to access your items untill bill balances are fully settled. <br> Thank you. 
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                  <td colspan="3">
                    <table>
                        <tr>
                            <td colspan="2">
							<b> Rent and other Bills </b> <br>
                                Rent: <br>
                                Water Bill<br>
                                Electricity Bill<br>
								Internet Bill <br>
                                Trash Bill
                            </td>
                            <td> <b> Payments </b><br>
                           <?php  echo $row['rent'];?> Ksh.<br>
                           <?php  echo $row['water'];?> Ksh.<br>
                           <?php  echo $row['electricity'];?> Ksh.<br>
                           <?php  echo $row['internet'];?> Ksh.<br>
                           <?php  echo $row['trash'];?> Ksh.
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
                            <td colspan="3">
                            <p><b>Balance: <?php  echo $row['balance'];?>Ksh</b></p>
            
			   </td>
			</tr>
        </table>
    </div>

   <?php }}else{?>
               <p>No data!</p>
			<?php }?>


</div>
</div>
    <style>
       .top_rw{ background-color:#f4f4f4; }
	.td_w{ }
	button{ padding:5px 10px; font-size:14px;}
    .invoice-box {
        max-width: 890px;
        margin: auto;
        padding:10px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 14px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }
    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
		border-bottom: solid 1px #ccc;
    }
    .invoice-box table td {
        padding: 5px;
        vertical-align:middle;
    }
    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }
    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }
    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }
    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }
    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
		font-size:12px;
    }
    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }
    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }
    .invoice-box table tr.item.last td {
        border-bottom: none;
    }
    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }
        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }
    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    .rtl table {
        text-align: right;
    }
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</body>
</html>
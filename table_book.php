<!DOCTYPE html>
<html>
<head>
	<style>
		div.container{
			width:30%;
			margin-left: 35%;
		}
	</style>
</head>
<body>
	<form method="post">
	<div class="container"><center>
		<lable for="sel_table_id">CHOOSE TABLE</lable><br>	
		<select name=sel_table id='sel_table_id' required>
			
	<?php
    $conn=mysqli_connect("localhost","root","","TBS");
      $q_sel="select *from TABLES where STATUS='FREE'";
      $query=mysqli_query($conn,$q_sel);
      while($row=mysqli_fetch_assoc($query))
      {
      	  ?>
      	<option><?php echo $row['NAME'];?></option>
     <?php 	
    }  
    ?>
</select>
    	<br><br>
    
		<lable for="date_id">DATE</lable><br>	
		<input type="date" id="date_id" name="date1" required><br><br>

		<lable for="reason_id">REASON</lable>	<br>
		<textarea id="reason_id" name="reason" rows="4" cols="10"></textarea><br><br>
		<input type="submit" name="book" value="book">
	</center>
	</div>
</form>
</body>
</html>

<?php
if(isset($_POST['book'])){

	$A=$_POST['sel_table'];
	$B=$_POST['date1'];
	$C=$_POST['reason'];
	$D="BOOKED";
	$conn=mysqli_connect("localhost","root","","TBS");
	$q="insert into `bookedtable` (NAME,DATE,REASON) values ('$A','$B','$C')";
	$q1="update `TABLES` set STATUS='$D' where NAME='$A'";
	$query=mysqli_query($conn,$q);
	$query1=mysqli_query($conn,$q1);
	echo"<script>window.location.href='table_book.php'</script>";
}
?>
<html>
<head>
  <style>
    table,th,td{
      border:1px solid;
    }
  </style>
</head>
<body>
  <center>
  <table >
    <tr>
    <th>ID</th>
    <th>NAME</th>
    <th>DATE</th>
    <th>REASON</th>
     <th>STATUS</th>
     <th>FREE TABLE</th>
   
    </tr>
    <?php
    $conn=mysqli_connect("localhost","root","","TBS");
      $q_sel="select *from bookedtable";
      $query=mysqli_query($conn,$q_sel);
      while($row=mysqli_fetch_assoc($query))
      {
    ?>
    <tr>
    	<td><?php echo $row['ID'];?></td>
      <td><?php echo $row['NAME'];?></td>
      <td><?php echo $row['DATE'];?></td>
      <td><?php echo $row['REASON'];?></td>
       <td>BOOKED
       </td>
        <td><a href="free_table.php ?name=<?php echo $row['NAME']?>">free_table </a></td>
    </tr>
    <?php
      }
    ?>
  </table>
</center>
</div>

</body>
</html>
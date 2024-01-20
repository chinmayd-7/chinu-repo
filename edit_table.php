<?php
$conn=mysqli_connect("localhost","root","","TBS");

$id=$_GET['id'];
$q="select *from TABLES where id=$id";
 $o=mysqli_query($conn,$q);
      while($row=mysqli_fetch_assoc($o))
      {
      	$A=$row['NAME'];
    $B=$row['CAPACITY'];
    $C=$row['REMARK'];
    
      }
?>
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
		<lable for="name_id">NAME</lable><br>	
		<input type="textbox" id="name_id" name="name" value="<?php echo $A?>"><br><br>
		<lable for="cap_id">CAPACITY</lable><br>	
		<input type="textbox" id="cap_id" name="cap"value="<?php echo $B?>"><br><br>
		<lable for="rem_id">REMARK</lable>	<br>
		<textarea id="rem_id" name="rem" rows="4" cols="10"value="<?php echo $C?>"></textarea><br><br>
		<input type="submit" name="submit" value="submit">
	</center>
	</div>
</form>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
	 	$A=$_POST['name'];
	$B=$_POST['cap'];
	$C=$_POST['rem'];
    
	$q="update `TABLES` set NAME='$A',CAPACITY='$B',REMARK='$C' where id=$id";
	$query=mysqli_query($conn,$q);
	if($query){
      echo "<script>alert('Record updated successfully');
      window.location.href='table_creation.php';</script>";
}
else
{
	echo"<script>alert('Record not updated successfully');
window.location.href='table_creation.php';</script>";
}
}

?>
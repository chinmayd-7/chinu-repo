<?php
$conn=mysqli_connect("localhost","root","","TBS");
$id=$_GET['id'];
$q_del="delete from TABLES where id=$id";
$q=mysqli_query($conn,$q_del);
if($q){
echo"<script>alert('Record deleted successfully');
window.location.href='table_creation.php';</script>";
}
else
{
	echo"<script>alert('Record not deleted successfully');
window.location.href='table_creation.php';</script>";
}
?>
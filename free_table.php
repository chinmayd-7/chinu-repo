<?php

$conn=mysqli_connect("localhost","root","","TBS");
$n=$_GET['name'];
$q="update `TABLES` set STATUS='FREE' where NAME='$n'";
$query=mysqli_query($conn,$q);
$q1="delete from bookedtable where NAME='$n'";
$query1=mysqli_query($conn,$q1);
if($query && $query1){
      echo "<script>alert('Table freed successfully');
      window.location.href='table_book.php';</script>";
}
else
{
	echo"<script>alert('Table not freed successfully');
window.location.href='table_book.php';</script>";
}
?>
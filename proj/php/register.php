<?php
$FirstName=$_POST['name'];
$LastName=$_POST['Last'];
$age=$_POST['age'];
$studylevel=$_POST['level'];
$collegename=$_POST['faculty'];
$phone=$_POST['phone'];
$email=$_POST['email'];



$conn=mysqli_connect('localhost','root','','projetweb');


$req="insert into register values ('$FirstName','$LastName','$age','$studylevel','$collegename','$phone','$email')";

mysqli_query($conn,$req);

if(mysqli_affected_rows($conn)>0)
echo "<script>location.href='../pages/valid'</script>";
else
echo ('Registration invalide');
?>
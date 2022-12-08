<?php

$FirstName=$_POST['name'];
$LastName=$_POST['Last'];
$collegename=$_POST['faculty'];
$studylevel=$_POST['level'];
$Gender=$_POST['Gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$Address=$_POST['adrs'];
$skills=$_POST['skills'];



$conn=mysqli_connect('localhost','root','','projetweb');


$req="insert into joinus values ('$FirstName','$LastName','$collegename','$studylevel','$Gender','$email','$phone','$Address','$skills')";

mysqli_query($conn,$req);

if(mysqli_affected_rows($conn)>0)
echo "<script>location.href='../pages/valid'</script>";
else
echo ('inscription invalide');
?>

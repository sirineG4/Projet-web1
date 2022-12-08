<?php
$FirstName=$_POST['name'];
$LastName=$_POST['Last'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$paiement=$_POST['method'];
$Address=$_POST['adrs'];



$conn=mysqli_connect('localhost','root','','projetweb');


$req1="insert into buy values ('$FirstName','$LastName','$email','$phone','$paiement','$Address')";

mysqli_query($conn,$req1);

if(mysqli_affected_rows($conn)>0)
echo "<script>location.href='../pages/valid2'</script>";
else
echo ('Commande invalide');



?>
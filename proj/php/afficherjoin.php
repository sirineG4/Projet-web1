<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/afficher.css">

</head>
<body>
    <?php
$conn=mysqli_connect('localhost','root','','projetweb');
$req="select * from joinus";
$res=mysqli_query($conn,$req);
$num=mysqli_num_rows($res);
    ?>
    <table border=1 class="tab">
<tr class="head">
<td>FirstName</td>
<td>LastName</td>
<td>Collegename</td>
<td>Studylevel</td>
<td>Gender</td>
<td>Email</td>
<td>Phone</td>
<td>Address</td>
<td>Skills</td>

</tr>
<?php
if($num>0) {
    while($row = mysqli_fetch_array($res))
    {?>

<tr>
    <td><?php echo $row['FirstName'];?></td  >
    <td><?php echo $row['lastname'];?></td  >
    <td><?php echo $row['collegename'];?></td >
    <td><?php echo $row['studylevel'];?></td >
    <td><?php echo $row['gender'];?></td>
    <td><?php echo $row['email'];?></td  >
    <td><?php echo $row['phone'];?></td >
    <td><?php echo $row['address'];?></td >
    <td><?php echo $row['skills'];?></td >

</tr>
<?php 
}
}
?>
    </table>
</body>
</html>
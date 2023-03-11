<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="">
    <title>Form Design</title>
  </head>
  <body>
  <section>
    <div class="container mt-8 pt-5">
            <div class="row">
           <div class="col-12 col-sm-8 col-md-6 m-auto">
            <div class="card">
             <div class=card-body>
                <h1>Ajouter Un client</h1>
<form action="" method="post">
<?php
require_once 'inc/utilisateur.inc.php';
require_once 'inc/connect.inc.php';
$db = new db('localhost', 'yoyofood', 'root', '');
$pdo = $db->connect();
$utilisateur = new utilisateur($pdo);

if(isset($_POST['btn'])) {
    $res = $utilisateur->setuser($pdo, $_POST);
    if($res == 1) {
        header('Location: client.php');
    } 
    else if($res == 10) {
        echo "<script>alert('email or password taken');</script>";
    }
}
?>
    <input type="text" name="firstname" id="" class="form-control my-4 py-2" placeholder="First Name">
    <input type="text" name="lastname" id="" class="form-control my-4 py-2" placeholder="Last Name">
    <input type="text" name="email" id="" class="form-control my-4 py-2" placeholder="Email">
    <input type="password" name="motdepasse" id="" class="form-control my-4 py-2" placeholder="Mot de Passe">
    <input type="text" name="phone" id="" class="form-control my-4 py-2" placeholder="Phone">
    <input type="text" name="addresse" id="" class="form-control my-4 py-2" placeholder="Addresse">
    <input type="text" name="codepostal" id="" class="form-control my-4 py-2" placeholder="Code Postal">

<div class="text-center mt-3">
    <button class="btn btn-primary" name='btn'>Ajouter</button>
</div>
</form>
             </div>
            </div>
           </div> 
        </div>
    </div>
  </section>
  </body>
</html>
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
            <form action="" method="post">
<?php
require_once 'inc/produit.inc.php';
require_once 'inc/connect.inc.php';
$db = new db('localhost', 'yoyofood', 'root', '');
$pdo = $db->connect();
$produit = new produit();
if(isset($_POST['btn'])) {
    $res = $produit->setproduit($pdo, $_POST);
    header('Location: produit.php');
}
?>
    <input type="text" name="id" id="" class="form-control my-4 py-2" placeholder="ID Produit">
    <input type="text" name="ref" id="" class="form-control my-4 py-2" placeholder="Reference">
    <input type="text" name="cat" id="" class="form-control my-4 py-2" placeholder="Categorie">
    <input type="text" name="tit" id="" class="form-control my-4 py-2" placeholder="Titre">
    <input type="text" name="desc" id="" class="form-control my-4 py-2" placeholder="Description">
    <input type="text" name="pic" id="" class="form-control my-4 py-2" placeholder="Photo">
    <input type="Number" name="pr" id="" class="form-control my-4 py-2" placeholder="Prix">

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
             
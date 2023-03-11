<?php
require_once 'inc/connect.inc.php';

$db = new db('localhost', 'yoyofood', 'root', '');

class produit {
    public $id_produit;
    public $refernce;
    public $categorie;
    public $titre;
    public $descriptionn;
    public $photo;
    public $prix;

    public function setproduit($pdo,$data) {
        $this->id_produit = $data['id'];
        $this->reference = $data['ref'];
        $this->categorie = $data['cat'];
        $this->titre = $data['tit'];
        $this->description = $data['desc'];
        $this->photo = $data['pic'];
        $this->prix = $data['pr'];

     
            $stmt = $pdo->prepare("INSERT INTO produits (id_produit, reference, categorie, titre, descriptionn, photo, prix) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$this->id_produit, $this->reference, $this->categorie, $this->titre, $this->descriptionn, $this->photo, $this->prix]);

    }
    public function affichproduits($pdo){
        $stmt = $pdo->prepare("SELECT * FROM produits");
        $stmt->execute();
        echo '<table class="tab">';
      echo'<tr>';
      echo'<th>Id Produit</th>';
      echo'<th>Reference</th>';
      echo'<th>Categorie</th>';
      echo'<th>Titre</th>';
      echo'<th>Description</th>';
      echo'<th>Photo</th>';
      echo'<th>Prix</th>';
      echo '<td></td>';
      echo'<td>     <div class="text-right mt-3">
      <a href="ajouter_produit">
      <button class="btn btn-primary" name="btn">Ajouter</button></a>
      </div></td>';
      echo '</tr>';
        while ($row = $stmt->fetch()) {
            echo '<tr>';
            echo '<td>' . $row['id_produit'] . '</td>';
            echo '<td>' . $row['reference'] . '</td>';
            echo '<td>' . $row['categorie'] . '</td>';
            echo '<td>' . $row['titre'] . '</td>';
            echo '<td>' . $row['descriptionn'] . '</td>';
            echo '<td>' . $row['photo'] . '</td>';
            echo '<td>' . $row['prix'] . '</td>';

            echo' <td><form method="post"><button class="" name="del" type="submit" value="'.$row['id_produit'].'">Delete</button></form></td>';
            echo' <td><form method="post"><button class="" name="del" type="submit" value="'.$row['id_produit'].'">Modifier</button></form></td>';
            echo '</tr>';
        }
        echo '</table>';
    }

public function affiche($pdo){

    $stmt = $pdo->prepare("SELECT * FROM produits");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
    echo ' 
    <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="product__item">

        <div class="product__item__pic set-bg">
        <img src="'.$row['photo'].'" alt="">

            <div class="product__label">
                <span>capcake</span>
            </div>
        </div>
        <div class="product__item__text">
            <h6><a href="#">'.$row['titre'].'</a></h6>
            <div class="product__item__price">'.$row['prix'].'</div>
            <div class="cart_add">
                <a href="card.html">Add to cart</a>
            </div>
        </div>
    </div>
    </div>';
        }
}


    public function delete_produit($pdo,$row){
        $stmt = $pdo->prepare("DELETE FROM produits WHERE id_produit=?");
        $stmt->execute([$row['del']]);
    }
    

        }
   
    
?>





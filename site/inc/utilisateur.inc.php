<?php
require_once 'inc/connect.inc.php';

$db = new db('localhost', 'yoyofood', 'root', '');

class utilisateur {
    public $pseudo;
    public $firstname;
    public $lastname;
    public $email;
    public $motdepasse;
    public $phone;
    public $addresse;
    public $codepostal;

    public function __construct() {
        
        $this->firstname = "";
        $this->lastname = "";
        $this->email = "";
        $this->motdepasse = "";
        $this->phone = "";
        $this->addresse = "";
        $this->codepostal = "";
    }

    public function setuser($pdo,$data) {
        $this->firstname = $data['firstname'];
        $this->lastname = $data['lastname'];
        $this->email = $data['email'];
        $this->motdepasse = $data['motdepasse'];
        $this->phone = $data['phone'];
        $this->addresse = $data['addresse'];
        $this->codepostal = $data['codepostal'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email=? OR motdepasse=?");
        $stmt->execute([$this->email, $this->motdepasse]);

        if ($stmt->rowCount() > 0) {
            return 10;
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (firstname, lastname, email, motdepasse, phone, addresse, codepostal) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$this->firstname, $this->lastname, $this->email, $this->motdepasse, $this->phone, $this->addresse, $this->codepostal]);
            return 1;    
        }
    }



    public function getuser($pdo){
        $stmt = $pdo->prepare("SELECT * FROM users");
        $stmt->execute();
        echo '<table class="tab">';
      echo'<tr>';
      echo'<th>First Name</th>';
      echo'<th>Last Name</th>';
      echo'<th>Email</th>';
      echo'<th>Mot de Passe</th>';
      echo'<th>Phone</th>';
      echo'<th>Addresse</th>';
      echo'<th>Code Postal</th>';
      echo '<td></td>';
      echo'<td>     <div class="text-right mt-3">
     <a href="ajouter_client.php"><button class="btn btn-primary" name="btn">Ajouter</button></a>
  </div></td>';

      echo '</tr>';
        while ($row = $stmt->fetch()) {
            echo '<tr>';
            echo '<td>' . $row['firstname'] . '</td>';
            echo '<td>' . $row['lastname'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td>' . $row['motdepasse'] . '</td>';
            echo '<td>' . $row['phone'] . '</td>';
            echo '<td>' . $row['addresse'] . '</td>';
            echo '<td>' . $row['codepostal'] . '</td>';

            echo' <td><form><button class="" name="delete" type="submit" value="'.$row['email'].'">Delete</button></form></td>';
            echo' <td><form><button class="" name="del" type="submit" value="'.$row['email'].'">Modifier</button></form></td>';

            echo '</tr>';
        }
        echo '</table>';
    }

    public function delete_utilisateur($pdo,$row){
        $stmt = $pdo->prepare("DELETE FROM users WHERE email=?");
        $stmt->execute([$row['del']]);
    }
    
    public function login($email,$mdp,$pdo){

        $req = $pdo->prepare('SELECT * FROM users WHERE email = ? AND motdepasse = ?');
        $req->execute([$email, $mdp]);
        $result = $req->fetch();
        if($result)
        {
            header('location:shop.php');
        }



            }

        }
   

?>





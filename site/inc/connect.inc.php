<?php



class db{
   public $localhost;
   public $dbname;
   public $yoyofood;
   public $password;
   public $connect;


   public function __construct($localhost, $dbname, $yoyofood, $password)
    {
        $this->localhost = $localhost;
        $this->dbname = $dbname;
        $this->yoyofood = $yoyofood;
        $this->password = $password;
    }

   public function connect(){
      $this->connect=null;
      $this->connect=new PDO("mysql:host=".$this->localhost.";dbname=".$this->dbname,$this->yoyofood,$this->password);

  return $this->connect;
}

   }


?>
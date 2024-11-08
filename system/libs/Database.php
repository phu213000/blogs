<?php 
class Database extends PDO{
  public function __construct($connect, $user, $password){
      // $db = new PDO($connect, $user, $password);
      parent::__construct($connect, $user, $password);
  }
  public function select($sql, $data = array(),$fetchStyle = PDO::FETCH_ASSOC){
    $statement = $this->prepare($sql);
    foreach ($data as $key => $value) {
      $statement->bindParam($key, $value);
    }
    // $statement->bindParam(':id',$id);
    $statement->execute();
    return $statement->fetchAll($fetchStyle);
  }
  
}
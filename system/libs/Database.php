<?php
class Database extends PDO
{
  public function __construct($connect, $user, $password)
  {
    // $db = new PDO($connect, $user, $password);
    parent::__construct($connect, $user, $password);
  }
  public function select($sql, $data = array(), $fetchStyle = PDO::FETCH_ASSOC)
  {
    $statement = $this->prepare($sql);
    foreach ($data as $key => $value) {
      $statement->bindParam($key, $value);
    }
    // $statement->bindParam(':id',$id);
    $statement->execute();
    return $statement->fetchAll($fetchStyle);
  }

  public function insert($table, $data)
  { 
    $keys = implode(',', array_keys($data));
    $values = ':' . implode(', :', array_keys($data));
    $sql = "INSERT INTO $table($keys) VALUES($values)";
    $statement = $this->prepare($sql);
    foreach ($data as $key => $value) {
      $statement->bindValue(":$key", $value);
    }
    return $statement->execute();
  }
  public function update($table,$data,$cond){
    
    $updatekey = NULL;
    foreach ($data as $key => $value) {
      $updatekey .= "$key=:$key,";
    }
    $updatekey = rtrim($updatekey, ',');
    
    $sql = "UPDATE $table SET $updatekey WHERE $cond";
    $statement = $this->prepare($sql);
    
    foreach ($data as $key => $value) {
      $statement->bindValue(":$key", $value);
    }
    return $statement->execute();
  }
  public function delete($table,$cond,$limit = 1){
    $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
    return $this->exec($sql);
  }

  public function affectedRows($sql,$username,$password){
    $statement = $this->prepare($sql);
    $statement->execute(array(':username' => $username, ':password' => $password));
    return $statement->rowCount();
  }

  public function selectUser($sql,$username,$password){
    $statement = $this->prepare($sql);
    $statement->execute(array(':username' => $username, ':password' => $password));
    return $statement->fetchAll();
  }

  public function selectUserById($sql,$id){
    $statement = $this->prepare($sql);
    $statement->execute(array(':id' => $id));
    return $statement->fetchAll();
  }

  public function selectUserByUsername($sql,$username){
    $statement = $this->prepare($sql);
    $statement->execute(array(':username' => $username));
    return $statement->fetchAll();
  }

  public function selectUserByEmail($sql,$email){
    $statement = $this->prepare($sql);
    $statement->execute(array(':email' => $email));
    return $statement->fetchAll();
  }

  public function selectUserByToken($sql,$token){
    $statement = $this->prepare($sql);
    $statement->execute(array(':token' => $token));
    return $statement->fetchAll();
  }

  public function selectUserByTokenTime($sql,$token,$time){
    $statement = $this->prepare($sql);
    $statement->execute(array(':token' => $token, ':time' => $time));
    return $statement->fetchAll();
  }

  public function selectUserByTokenEmail($sql,$token,$email){
    $statement = $this->prepare($sql);
    $statement->execute(array(':token' => $token, ':email' => $email));
    return $statement->fetchAll();
  }

  public function selectUserByTokenEmailTime($sql,$token,$email,$time){
    $statement = $this->prepare($sql);
    $statement->execute(array(':token' => $token, ':email' => $email, ':time' => $time));
    return $statement->fetchAll();
  }

  public function selectUserByTokenEmailTimeStatus($sql,$token,$email,$time,$status){
    $statement = $this->prepare($sql);
    $statement->execute(array(':token' => $token, ':email' => $email, ':time' => $time, ':status' => $status));
    return $statement->fetchAll();
  }

  public function selectUserByTokenEmailTimeStatusPassword($sql,$token,$email,$time,$status,$password){
    $statement = $this->prepare($sql);
    $statement->execute(array(':token' => $token, ':email' => $email, ':time' => $time, ':status' => $status, ':password' => $password));
    return $statement->fetchAll();
  }

  public function selectUserByTokenEmailTimeStatusPasswordUsername($sql,$token,$email,$time,$status,$password,$username){
    $statement = $this->prepare($sql);
    $statement->execute(array(':token' => $token, ':email' => $email, ':time' => $time, ':status' => $status, ':password' => $password, ':username' => $username));
    return $statement->fetchAll();
  }

  
}
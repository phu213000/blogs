<?php
class categorymodel extends Dmodel{
 
  public function __construct(){
    parent::__construct();
  }
  public function category($table_category_product){
    $sql = "select * from tbl_category_product order by id_category_product desc";
    return $this->db->select($sql);
    // $result =  $this->db->select($sql);
    // return $result;
  //  $sql = "select * from tbl_category_product order by id_category_product desc";
  //  $query = $this->db->query($sql);
  //  $result = $query->fetchAll();
  //  return $result;
  //  echo $result;
  }
  public function categorybyId($table_category_product,$id){
    $sql = "select * from $table_category_product where id_category_product = :id  ";
    $data = array(':id' => $id);
    return $this->db->select($sql,$data);
  }
}

?>
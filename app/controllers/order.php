<?php

class order extends Dcontroller{
  public function __construct(){
   parent::__construct();
  }
 public function index(){
  return $this->order();
 }

  public function order(){
    echo 'This is a order page';
  }
}


?>
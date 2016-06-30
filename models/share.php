<?php
class ShareModel extends Model {
   public function Index(){
       $this->query('select * from shares');
       $rows=$this->resultSet();
       return $rows;
    }
    
   }

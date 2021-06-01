<?php
class client {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function selectall(){
        $this->db->query('SELECT x.id,y.image,y.description,z.fullName from rsv as x INNER JOIN books as y on y.id=x.bkid INNER JOIN students as z on z.id=x.stdid');
           return $this->db->resultSet();
    }
    
    public function delete($id){
        $this->db->query("DELETE FROM `rsv` WHERE `id`='$id'");
        if( $this->db->execute() ){
            return true;
        } else {
            return false;
        }
    }

}
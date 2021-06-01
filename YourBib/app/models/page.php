<?php 
class page {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function selectall()
    {
        $this->db->query('SELECT * from books ');
           return $this->db->resultSet();
    }
    public function newRes($id_user,$id){
        $this->db->query("INSERT INTO `rsv`(`stdid`, `bkid`) VALUES ('$id_user','$id')");
        if( $this->db->execute() ){
            return true;
        } else {
            return false;
        }
    }
}
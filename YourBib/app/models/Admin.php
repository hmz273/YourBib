 <?php


class admin {

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
    public function add1($data){
        $this->db->query('INSERT INTO `books`(`name`, `image`, `autheur`, `type`, `parution`, `description`) values (:name, :image, :autheur,:type, :parution, :description)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':autheur', $data['autheur']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':parution', $data['parution']);
        $this->db->bind(':description', $data['description']);

        // Execute
        if( $this->db->execute() ){
            return true;
        } else {
            return false;
        }
    }

    public function edit ($data) {
  
        
            $this->db->query('UPDATE books SET name = :name, image = :image,  autheur = :autheur, type = :type, parution = :parution, description = :description where id = :id');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':image', $data['image']);
            $this->db->bind(':autheur', $data['autheur']);
            $this->db->bind(':type', $data['type']);
            $this->db->bind(':parution', $data['parution']);
            $this->db->bind(':description', $data['description']);
 
            // Execute
            if( $this->db->execute()){
                return true;
            } else {
                return false;
            }
        



    }
    public function edit1($data) {
  
        
        $this->db->query('UPDATE books SET name = :name,  autheur = :autheur, type = :type, parution = :parution, description = :description where id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':autheur', $data['autheur']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':parution', $data['parution']);
        $this->db->bind(':description', $data['description']);

        // Execute
        if( $this->db->execute()){
            return true;
        } else {
            return false;
        }
    



}

    public function deletebk($id)
    {
        $this->db->query('DELETE FROM `books` WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if( $this->db->execute() ){
            return true;
        } else {
            return false;
        }
    }
    public function selectallById($id)
    {
        $this->db->query("SELECT * from books where id='$id'");
           return $this->db->resultSet();
    }
}
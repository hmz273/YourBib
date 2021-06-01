<?php

    class User{

        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        public function register($data)
        {
            $this->db->query('INSERT INTO `students`(`userName`, `fullName`, `password`) values ( :userName ,:fullName , :password)');
            // Bind values
            $this->db->bind(':userName', $data['userName']);
            $this->db->bind(':fullName', $data['fullName']);
            $this->db->bind(':password', $data['password']);
            // Execute
            if ( $this->db->execute()) {
                return true;
            } else {
                return false;
            }
        }
    
        public function addUser($data)
        {
            $this->db->query('INSERT INTO students (userName, fullName, password) values (:userName, :fullName, :password)');
            // Bind values
            $this->db->bind(':userName', $data['userName']);
            $this->db->bind(':fullName', $data['fullName']);
            $this->db->bind(':password', $data['password']);
            // Execute
            if ( $this->db->execute() ) {
                return true;
            } else {
                return false;
            }
        }
    
        public function deleteUser($id)
        {
            $this->db->query('DELETE FROM uclient where id = :id');
            // Bind values
            $this->db->bind(':id', $id);
        
            // Execute
            if( $this->db->execute() ){
                return true;
            } else {
                return false;
            }
        }
        
        public function login($userName,$password)
        {
            $this->db->query('SELECT * from students where userName = :userName');
            $this->db->bind(':userName', $userName);
            $row = $this->db->single();

            $hashed_password = $row->password;
            if ( password_verify($password,$hashed_password) ) {
                return $row;
            } else {
                return false;
            }
        }
        public function login1($userName,$password)
        {
            $this->db->query('SELECT * from students where userName = :userName and admin=1');
            $this->db->bind(':userName', $userName);
            $row = $this->db->single();

            $hashed_password = $row->password;
            if ( password_verify($password,$hashed_password) ) {
                return $row;
            } else {
                return false;
            }
        }
    
        public function checkPassword($userName,$password)
        {
            $this->db->query('SELECT * from students where userName = :userName');
            $this->db->bind(':userName', $userName);
            $row = $this->db->single();
    
            $hashed_password = $row->password;
            if ( password_verify($password,$hashed_password) ) {
                return $row;
            } else {
                return false;
            }
        }

        public function getUserByuserName($userName)
        {
            $this->db->query('SELECT * FROM students WHERE userName = :userName');
            // Bind values
            $this->db->bind(':userName', $userName);
            $this->db->single();

            // Check row
            if ( $this->db->rowCount() > 0 ) {
                return true;
            } else {
                return false;
            }
        }

        public function getUserById($id)
        {
            $this->db->query('SELECT * FROM students WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $id);
            return $this->db->single();
        }
    
        public function updatePassword($data)
        {
            $this->db->query('UPDATE students SET password = :password where userName = :userName');
            // Bind values
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':userName', $data['userName']);
            // Execute
            if( $this->db->execute() ){
                return true;
            } else {
                return false;
            }
        }
    
        public function getUsers()
        {
            $this->db->query('SELECT * FROM users');
            return $this->db->resultSet();
    
        }    }
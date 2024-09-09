<?php
    
    // specificity 
    namespace App;

    class Database
    {
        // access modifiers -> private, public, 
        private $conn;
        // private property accessible to class

        public function __construct()
        {
            $this->conn = mysqli_connect("localhost", "root", "", "crud");
            // connection establish to database (mysqli)
        }
    
        // Create Data
           
        public function getData()
        {
            $qry = "SELECT * FROM user_data";
            $rslt = mysqli_query($this->conn, $qry);
            $all_data = mysqli_fetch_all($rslt, MYSQLI_ASSOC);
            return $all_data;
        }

        // Add Data
        public function addData($name, $email, $dob)
        {
            $qry = "INSERT INTO user_data(name, email, dob) VALUES('$name', '$email', '$dob')";
            mysqli_query($this->conn, $qry);
        }

        // Update data 

        // Step-1 Getting Data for ID

        public function getID($id)
        {
            $qry = "SELECT * FROM user_data WHERE id=$id";
            $rslt = mysqli_query($this->conn, $qry);
            $idData = mysqli_fetch_assoc($rslt);
            return $idData;
        }

        // Step-2 update data

        public function updateData($id,$name, $email, $dob)
        {
            $qry = "UPDATE user_data
                    SET name = '$name',
                        email = '$email',
                        dob = '$dob'
                    WHERE id = $id";
            mysqli_query($this->conn, $qry);
        }
    
        public function delData($id){
            $qry = "DELETE FROM user_data WHERE id=$id" ;
            mysqli_query($this->conn, $qry) ;
        }
    }

?> 
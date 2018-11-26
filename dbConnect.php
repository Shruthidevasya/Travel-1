<?php  
    class dbConnect {  
        public $conn;
        function __construct() {  
<<<<<<< HEAD
            $this->conn = new mysqli("localhost", "root", "1", "travelstory");
=======

<<<<<<< HEAD
            $this->conn = new mysqli("localhost", "root", "Abcd@123", "Travel");
=======
            $this->conn = new mysqli("localhost", "root", "root", "Travel");
>>>>>>> 27811a8373c819429dcb2787841f98e754629ba3
>>>>>>> 833bad8fc6749591f3ef5f55a38e7bf7e6f2fea0
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
            return $this->conn;    
        }  
        public function Close(){  
            mysqli_close();  
        }  
        
    }  
?> 
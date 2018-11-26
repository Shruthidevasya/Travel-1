<?php  
    class dbConnect {  
        public $conn;
        function __construct() {  
            $this->conn = new mysqli("localhost", "root", "1", "travelstory");
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



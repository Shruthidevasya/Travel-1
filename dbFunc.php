<?php  
//session_start();
require_once 'dbConnect.php';  

    class dbFunc {
        private $db;
        public function __construct() {  
            $this->db = new dbConnect();   
        }  
        function Insertdata($table,$field,$data)
        {
            $field_values= implode(',',$field);
            $data_values=implode("','",$data);
        
            $sql= "INSERT INTO $table (".$field_values.")
        VALUES ('".$data_values."') ";
            $result = mysqli_query($this->db->conn,$sql);
            if($result)
            {
                return 1;
//                echo "<script>location.href='login.php'</script>";
            }
            else
            {
                echo "Error: " . $sql . "" . mysqli_error($this->db->conn);
die;
                return 0;
            }
        }
        function loginprocess($eid,$password)
        {
            $ret = mysqli_query($this->db->conn, "SELECT * FROM login_details WHERE username='$eid'");
            $row = mysqli_fetch_assoc($ret);
            $pasw=$row['password'];
            $id=$row['username'];
            $_SESSION['username']=$row['username'];
            if (password_verify($password,$pasw))
            {
              $row = mysqli_fetch_assoc($ret);
            }
            else
            {
                echo "<script>alert('Wrong password or username);</script>";
                echo "<script>location.href='login.php'</script>";
            }
            return $id;
        }
        
        function getdata($table,$field,$where,$id)
        {
            $field_values= implode(',',$field);
            $sql= "SELECT $field_values FROM $table where $where='$id'";
            $result = mysqli_query($this->db->conn, $sql);
            if($result)
            {
                $num = sizeof($field);
                $row = mysqli_fetch_assoc($result);
                for ($i=0;$i<$num;$i++)
                {
                    $_SESSION[$field[$i]] = $row[$field[$i]];
                }

                echo "<script>location.href='index.php'</script>";
            }
            else
            {
                echo "Error: " . $sql . "" . mysqli_error($this->db->conn);
            }
        }
        function fetch_data($seid,$field,$table)
        {
         $sql = "select * from $table where username='$seid'";
         $result = mysqli_query($this->db->conn, $sql);
         if($result)
            {
                $row = mysqli_fetch_assoc($result);
                return $row;
            }
            else
            {
                echo "Error: " . $sql . "" . mysqli_error($this->db->conn);
            }
        }
        function fetch_comment($sid)
        {
            $sql = " Select id,sid,name,body,date from comments where sid = $sid order by  id desc  ;";
            $result = mysqli_query($this->db->conn, $sql);
            $solutions = [];
            if($result)
            {
                while($row = mysqli_fetch_assoc($result))
                {
//                    print_r($row);die;
                    $solutions[$row['id']] = $row;
                }
                return $solutions;
            }
            else
            {
                echo "Error: " . $sql . "" . mysqli_error($this->db->conn);
                exit(1);
            }
        }

        function reply_comment($pid)
        {
            $sql = " Select * from reply where pid = $pid order by  id desc;";
            $result = mysqli_query($this->db->conn, $sql);
            $solutions = [];
            if($result)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                    $solutions[$row['id']] = $row;
                }
                return $solutions;
            }
            else
            {
                echo "Error: " . $sql . "" . mysqli_error($this->db->conn);
                exit(1);
            }
        }


        function like_check($sid,$user,$select)
        {
            $sql = " Select $select from reaction where sid = $sid and user = '$user'";
            $result = mysqli_query($this->db->conn, $sql);
            if($result)
            {
                if($row = mysqli_fetch_assoc($result))
                {
                    $solutions = $row;
                    return $solutions;
                }
                
            }
            else
            {
                echo "Error: " . $sql . "" . mysqli_error($this->db->conn);
                exit(1);
            }
        }

        function like_update($sid,$user,$like,$dislike)
        {
            $sql = "UPDATE reaction SET `like` = $like, dislike = $dislike  WHERE  sid = $sid and user =  '$user'";
            $result = mysqli_query($this->db->conn, $sql);
            if($result)
            {
                return true;
            }
            else
            {
                echo "Error: " . $sql . "" . mysqli_error($this->db->conn);
                exit(1);
            }
        }

        function like_count($sid,$check)
        {
            $sql = "select count(id) from reaction where $check = '1' and sid= $sid";
            $result = mysqli_query($this->db->conn, $sql);
            if($result)
            {
                $row = mysqli_fetch_assoc($result);
                $solutions = $row['count(id)'];
                return $solutions;
            }
            else
            {
                echo "Error: " . $sql . "" . mysqli_error($this->db->conn);
                exit(1);
            }
        }
        public function insertstories($table_name, $data)
        {

            $string = "INSERT INTO ".$table_name." (";
            $string .= implode(",", array_keys($data)) . ') VALUES (';
            $string .= "'" . implode("','", array_values($data)) . "')";
            try{
                $res =  mysqli_query($this->db->conn, $string);
                print_r($res);
                header("Location: stories.php");
            }catch(Exception $e){
                echo $e->getMessage(); die;
            }
        }

        public function search(){
            $check = mysqli_query($this->db->conn, "SELECT * FROM stories");

            // $result = mysqli_fetch_array($check);
            return $check;

        }

        public function user_delete($username){
            $sql="SET sql_safe_updates=0";
            $sql= "delete from profile where username='$username'";
            
            $sql1="SET sql_safe_updates=0";
            $sql1= "delete from stories where user='$username'";

            if (mysqli_query($this->db->conn,$sql)) {
            }
            else
            {
            echo "Error: " . $sql . "" . mysqli_error($this->db->conn);
            }


            if (mysqli_query($this->db->conn,$sql1)) {
            }
            else
            {
            echo "Error: " . $sql1 . "" . mysqli_error($this->db->conn);
            }
        }

          public function comment_delete($comment_id){

            $sql1="SET sql_safe_updates=0";
            $sql1= "delete from reply where pid='$comment_id'";

            if (mysqli_query($this->db->conn,$sql1)) {
            }
            else
            {
            echo "Error: " . $sql1 . "" . mysqli_error($this->db->conn);
            }

            $sql="SET sql_safe_updates=0";
            $sql= "delete from comments where id='$comment_id'";

            if (mysqli_query($this->db->conn,$sql)) {
            }
            else
            {
            echo "Error: " . $sql . "" . mysqli_error($this->db->conn);
            }
        }

        public function user_story($story_id){
            $check =mysqli_query($this->db->conn,"delete from stories where id=$story_id");
        }

        public function travel_fetch($story_id){
            $check = mysqli_query($this->db->conn, "select * from stories where id=$story_id");
            return $check;
        }

        public function profile_fetch()
        {
            $check = mysqli_query($this->db->conn,"SELECT * FROM stories");
            return $check;
        }

        public function user_fetch()
        {
            $check = mysqli_query($this->db->conn,"select * from profile");
            return $check;
        }

        public function comments_fetch()
        {
            $check = mysqli_query($this->db->conn,"select * from comments");
            return $check;
        }

        function update_storydata($table_name, $form_data,$story_id)
        {
        $valueSets = array();
        foreach($form_data as $key => $value) {
        $valueSets[] = $key . " = '" . $value . "'";
        }
        $sql = "UPDATE $table_name SET ". join(",",$valueSets) . " WHERE id = '".$story_id."'";
        $result = mysqli_query($this->db->conn, $sql);
        if (mysqli_query($this->db->conn, $sql)) {
            header('location:admin_details.php?story_id=' . $story_id);
        }
        else
        {
        echo "Error: " . $sql . "" . mysqli_error($conn);
        }
      }

     

        public function viewdetail($id){
            $check = mysqli_query($this->db->conn, "SELECT * FROM stories where id='$id'");
            return $check;
        }

        public function takesdetail($id){
            $check = mysqli_query($this->db->conn, "SELECT * FROM stories where id='$id'");
            return $check;
        }

        public function updatestories($table_name, $form_data,$story_id)
        {
            {
                $valueSets = array();
                foreach($form_data as $key => $value) {
                    $valueSets[] = $key . " = '" . $value . "'";
                }
                $sql = "UPDATE $table_name SET ". join(",",$valueSets) . " WHERE id = '".$story_id."'";
                $result = mysqli_query($this->db->conn, $sql);
                if (mysqli_query($this->db->conn, $sql)) {

                }
                else
                {
                    echo "Error: " . $sql . "" . mysqli_error($this->db->conn);
                }
            }
        }
        function update_data($table_name, $form_data,$story_id)
        {
            $valueSets = array();
            foreach($form_data as $key => $value) {
                $valueSets[] = $key . " = '" . $value . "'";
            }
            $sql = "UPDATE $table_name SET ". join(",",$valueSets) . " WHERE story_id = '".$story_id."'";
            $result = mysqli_query($this->db->conn, $sql);
            if (mysqli_query($this->db->conn, $sql)) {

            }
            else
            {
                echo "Error: " . $sql . "" . mysqli_error($this->db->conn);
            }
        }

        function delete_image($table_name, $form_data,$story_id,$travel_id)
        {
            $valueSets = array();
            foreach($form_data as $key => $value) {
                $valueSets[] = $key . " = '" . $value . "'";
            }
            $sql = "UPDATE $table_name SET ". join(",",$valueSets) . " WHERE story_id = '".$story_id."'";
            $result = mysqli_query($this->db->conn, $sql);
            if (mysqli_query($this->db->conn, $sql)) {
                header('location:delete_images.php?travel_id=' . $travel_id);
            }
            else
            {
                echo "Error: " . $sql . "" . mysqli_error($this->db->conn);
            }
        }

        function delete_user($table_name, $form_data,$story_id,$travel_id)
        {
            $valueSets = array();
            foreach($form_data as $key => $value) {
                $valueSets[] = $key . " = '" . $value . "'";
            }
            $sql = "UPDATE $table_name SET ". join(",",$valueSets) . " WHERE story_id = '".$story_id."'";
            $result = mysqli_query($this->db->conn, $sql);
            if (mysqli_query($this->db->conn, $sql)) {
                header('location:delete_images.php?travel_id=' . $travel_id);
            }
            else
            {
                echo "Error: " . $sql . "" . mysqli_error($this->db->conn);
            }
        }

    }

$k = new dbFunc();


<<<<<<< HEAD
?> 
=======
?>  
>>>>>>> 27811a8373c819429dcb2787841f98e754629ba3

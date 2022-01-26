<?php
include_once 'config.php';

class Database
{
    public $host = DB_HOST;
    public $uname = DB_UNAME;
    public $pass = DB_PASS;
    public $db_name = DB_NAME;

    public $conn;
    public $error;

    public function __construct()
    {
        $this->connect_db();
    }

    // This is for the connections
    private function connect_db()
    {
        $this->conn = new mysqli($this->host, $this->uname, $this->pass, $this->db_name);
        if (!$this->conn) {
            $this->error = "Connection failed " . $this->conn->connect_error;
            return false;
        }
    }

    // This is for select what you mentioned on the query
    public function select($query)
    {
        //echo $query;
        $result = $this->conn->query($query) or die($this->conn->error . __LINE__);
        //print_r(mysqli_fetch_all($result));
        if ($result->num_rows > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return "No user found";
        }
    }

    // This is for insert what you want
    // insert update delete
    public function action($query)
    {
        //echo  $query;
        $result = $this->conn->query($query);
        //echo $result;
        //echo $query."<br>";
        if ($result) {
            return 1;
        } else {
            return false;
        }
    }

    // fetch all the result with associative array

    public function get_all($query)
    {
        $result = $this->conn->query($query) or die($this->conn->error . __LINE__);
        //print_r(mysqli_fetch_all($result));
        if (mysqli_num_rows($result)) {
            $files = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $files[] = $row;
            }
            return $files;
        }
    }

    public function hash_user_pass($pass)
    {
        $salt = "pimelikapilafhiiiiii";
        //print_r($non_validate_info[4]);
        $total = $salt . $pass . "234";
        return md5($total);
    }
}

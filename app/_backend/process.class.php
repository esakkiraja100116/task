<?php
include_once "data-base.php";

class Users
{
    private $conn;
    public function __construct()
    {
        $this->conn = new Database();
    }

    public function get_user($user_id)
    {
        $query = "SELECT * FROM `Users` WHERE `id` = '$user_id';";
        //echo $query;
        $result = $this->conn->select($query);
        //print_r($result);
        return $result;
    }


    public function insert_user($info)
    {

        $query = "INSERT INTO `Users` (`name`, `username`, `mail`, `phone`, `password`)
        VALUES ('$info[0]', '$info[1]', '$info[2]', '$info[3]', '$info[4]');";
        $result = $this->conn->action($query);
        //echo $query;
        if ($result != false) {
            return "done";
        } else {
            return "not-done";
        }
    }

    public function get_all_users()
    {
        $query = "SELECT * FROM `Users`;";
        $result = $this->conn->get_all($query);
        return $result;
    }

    public function update_user($info)
    {
        $query = "UPDATE `Users` SET
        `name` = '$info[1]',
        `username` = '$info[2]',
        `mail` = '$info[3]',
        `phone` = '$info[4]',
        `password` = '$info[5]'
        WHERE `id` = '$info[0]';";
        $result = $this->conn->action($query);
        if ($result == 1) {
            return "done";
        } else {
            return "not-done";
        }
    }

    public function delete_user($id)
    {
        $query = "DELETE FROM `Users`
        WHERE ((`id` = '$id'));";
        $result = $this->conn->action($query);
        if ($result == 1) {
            return "done";
        } else {
            return "not-done";
        }
    }
}

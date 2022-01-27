<?php

include_once '../_backend/validate.class.php';
include_once '../_backend/data-base.php';
include_once '../_backend/process.class.php';

if (isset($_POST['name']) && isset($_POST['username']) && isset($_POST['mail'])  && isset($_POST['phone'])  && isset($_POST['password'])) {
    $check = new validate();
    $db = new Database();
    $process = new Users();
    $show = "Bad request a:(";
    $name = $_POST['name'];
    $username = $_POST['username'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $f_name = $check->check_string($name);
    $f_username = $check->check_username($username);
    $f_num = $check->check_number($phone);
    $filtered_mail = $check->is_email($mail);

    //checking for any illegal activites
    if ($f_name == -1) {
        echo $show;
        echo "problem in name";
    } elseif ($f_username == -1) {
        echo $show;
    } elseif ($f_num == -1 || strlen($phone) !== 10) {
        echo $show;
    } elseif ($filtered_mail == -1) {
        echo $show;
    } else {
        $hashed_pass = $db->hash_user_pass($password);
        $info = [$f_name, $f_username, $filtered_mail, $f_num, $hashed_pass];
        $result = $process->insert_user($info);
        if ($result == "not-done") {
            echo "sorry there is some problem in inserting (Might be duplicate);";
        } else {
            echo "Inserted";
        }
    }
} else {
    echo "Bad request :(";
}

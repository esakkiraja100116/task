<?php
include_once '../_backend/validate.class.php';
include_once '../_backend/data-base.php';
include_once '../_backend/process.class.php';

if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['username']) && isset($_POST['mail'])  && isset($_POST['phone'])  && isset($_POST['password'])) {
    $check = new validate();
    $db = new Database();
    $process = new Users();
    $show = "Bad request a:(";

    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $f_id = $check->check_number($id);
    $f_name = $check->check_string($name);
    $f_username = $check->check_username($username);
    $f_num = $check->check_number($phone);
    $filtered_mail = $check->is_email($mail);

    //checking for any illegal activites
    if ($f_id == -1) {
        echo $show;
    } elseif ($f_name == -1) {
        echo $show;
    } elseif ($f_username == -1) {
        echo $show;
    } elseif ($f_num == -1 || strlen($phone) !== 10) {
        echo $show;
    } elseif ($filtered_mail == -1) {
        echo $show;
    } else {
        $hashed_pass = $db->hash_user_pass($password);
        $update_info = [$f_id, $f_name, $f_username, $filtered_mail, $f_num, $hashed_pass];
        $result = $process->update_user($update_info);
        if ($result == "not-done") {
            echo "sorry there is some problem in updating (Might be duplicate)";
        } else {
            echo "Updated";
        }
    }
} else {
    echo "Bad request :(";
}

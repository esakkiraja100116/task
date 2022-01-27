
<?php

include_once "../_backend/validate.class.php";
include_once "../_backend/process.class.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $check = new validate();
    $user = new Users();
    $f_id = $check->check_number($id);
    if ($f_id == -1) {
        echo "Bad request :(";
    } else {
        $result = $user->get_user($f_id);
        print_r($result);
    }
} else {
    echo "Bad Request :(";
}

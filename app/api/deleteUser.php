<?

include_once "../_backend/process.class.php";
include_once "../_backend/validate.class.php";

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $check = new validate();
    $user = new Users();
    $f_id = $check->check_number($id);
    if ($f_id == -1) {
        echo "Bad request :(";
    } else {
        $check_user = $user->get_user($id);
        if ($check_user == "No user found") {
            echo $check_user;
        } else {
            $result = $user->delete_user($f_id);
            if ($result == "not-done") {
                echo "There is some problem in deleting";
            } else {
                echo "Deleted";
            }
        }
    }
} else {
    echo "Bad Request :(";
}

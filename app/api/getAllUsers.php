
<?php

include_once "../_backend/process.class.php";

$user = new Users();
$result = $user->get_all_users();
print_r($result);

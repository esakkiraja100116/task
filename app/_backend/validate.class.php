<?php

class validate
{

    public function check_string($str)
    {
        if (!preg_match('/[^A-Za-z]/', $str)) // '/[^a-z\d]/i' should also work.
        {
            return $str;
        } else {
            return -1;
        }
    }

    public function check_number($num)
    {
        if (preg_match("/^\d+$/", $num)) {
            return $num;
        } else {
            return -1;
        }
    }


    public function check_username($uname)
    {
        if (!preg_match('/[^a-zA-Z0-9]/', $uname)) // '/[^a-z\d]/i' should also work.
        {
            return $uname;
        } else {
            return -1;
        }
    }

    public static function is_email($mail)
    {
        //echo "this is mail:".$mail;
        if (filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
            return -1;
        } else {
            return $mail;
        }
    }
}

<?php
function input_cleaner($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}
function validateEmail($email) {
    $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    if (preg_match($pattern, $email)) {
        return true;
    } else {
        return false;
    }
}
function validatePassword($password) {
    $minLength = 8;
    if (strlen($password) >= $minLength) {
        return true;
    } else {
        return false;
    }
}

?>
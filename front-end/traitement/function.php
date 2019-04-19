<?php
function verifyInput($var){
    $var = htmlspecialchars($var);
    $var = stripcslashes($var);
    $var = trim($var);
    return $var ;
}
function isEmail ($email){
    $email = filter_var($email,FILTER_VALIDATE_EMAIL);
    return $email;
}
function isLetter ($letter){
    $letter = preg_match('/^[a-zA-Z ]*$/',$letter);
    return $letter ;
}
function hashPass($pass){
    $pass = sha1($pass);
    return $pass ;
}
function telDefind($phone){
    $phone = preg_match('/^[0-9-]*$/',$phone);
    return $phone ;
}
function lengthPass($pwd){
    $pwd = strlen($pwd) ;
    return $pwd ;
}

?>
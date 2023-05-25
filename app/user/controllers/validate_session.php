<?php

/**
 * Vissza ad TRUE-t ha a beadott request egy létező felhasználótól jött. 
*/
function validate_session(){
    session_start();
    if( isset($_SESSION["id"])) return true;
    else return false;
}
/**
 * Vissza adja a felhasználó user_id-jét ha létezik. Ha nem akkor error-t ad vissza
*/
function get_user_session_id(){
    // session_start();

    if( !isset($_SESSION['id'])) return new Error("No user under this id");

    return $_SESSION["id"];
}
?>
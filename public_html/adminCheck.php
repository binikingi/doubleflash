<?php

function password(){
    return trim(file_get_contents('pass.txt'));
}
	
function check(){
	if(isset($_SESSION['Admin'])){
            if($_SESSION['Admin'] == $_SERVER['REMOTE_ADDR'].'passwordHash'.password()){
                return true;
            }
            else{
                unset($_SESSION['Admin']);
                return false;
            }
        }
        return false;
}
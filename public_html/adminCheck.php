<?php
	
function check(){
	if(isset($_SESSION['Admin'])){
            if($_SESSION['Admin'] == $_SERVER['REMOTE_ADDR'].'passwordHash'.$_ENV['ADMIN_PASSWORD']){
                return true;
            }
            else{
                unset($_SESSION['Admin']);
                return false;
            }
        }
        return false;
}
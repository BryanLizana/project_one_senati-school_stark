<?php 

 function valid_login()
{ 
    if (!isset($_SESSION['user']) || empty($_SESSION['user']) ) {
       header('location:/login/');
    }
}

function up_to_session_user($usuario = 0)
{
    session_start();    
    session_destroy();
    session_start();
   if (isset($usuario['type_us']) ) {       
       $_SESSION['user']['code'] = $usuario['code'];
       $_SESSION['user']['name'] = $usuario['name'];
       
   }

}
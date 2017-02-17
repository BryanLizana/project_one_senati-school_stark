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
       $_SESSION['user']['last_name'] = $usuario['last_name'];
       $_SESSION['user']['email'] = $usuario['email'];
       $_SESSION['user']['phone'] = $usuario['phone'];
       $_SESSION['user']['type_us'] = $usuario['type_us'];
       
   }

}

function valid_permisos($page)
{
    if ($_SESSION['user']['type_us'] !== $page && $_SESSION['user']['type_us'] !== "ROOT" ) {
         header('location:/'.strtolower($_SESSION['user']['type_us']).'/');
    }
}
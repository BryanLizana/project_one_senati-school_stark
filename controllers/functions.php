<?php 

 function valid_login()
{
    if (!isset($_SESSION['user']) || empty($_SESSION['user']) ) {
       header('location:/login/');
    }
}

function up_to_session_user($usuario = 0)
{
   if (isset($usuario['type']) ) {
       $_SESSION['user']['code'] = $usuario['code'];
   }

}
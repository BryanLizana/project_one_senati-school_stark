<?php 
///Borrar la session del usuario actual
session_start();
session_destroy();
header('location: /login/');
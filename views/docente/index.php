<?php $page_this = "DOCENTE"; ?>
<?php require_once('../templates/header.php'); ?>
<!--content-->
<div class="body" >   
<?php 
switch ($_REQUEST['page']) {
    case 'alumno':
        include_once('alumno.php');
        break;
    case 'list-bloques':
        include_once('list-bloques.php');
        break;
    case 'bloque':
        include_once('bloque.php');
        break;   
    case 'curso':
        include_once('curso.php');
        break;                
    default:
        include_once('detail.php');
        break;
}
 ?>
</div>
<?php require_once('../templates/footer.php') ?>
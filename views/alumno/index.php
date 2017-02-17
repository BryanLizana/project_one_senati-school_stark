<?php $page_this = "ALUMNO"; ?>
<?php require_once('../templates/header.php'); ?>
<!--content-->
<div class="body" >   

<?php 
switch ($_REQUEST['page']) {
    case 'list-bloque':
        include_once('list-bloque.php');
        break;
    case 'list-curso':
         include_once('list-curso.php');
        break;
        
    default:
        include_once('detail.php');
        break;
}

 ?>

</div>
<?php require_once('../templates/footer.php') ?>
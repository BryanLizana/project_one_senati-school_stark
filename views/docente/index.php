
<?php require_once('../templates/header.php'); ?>
<!--content-->
<div class="body" >   
<?php 
switch ($_REQUEST['page']) {
    case 'alumno':
    echo 'tet';
        include_once('alumno.php');
        break;
    
    default:
        # code...
        break;
}
 ?>

</div>
<?php require_once('../templates/footer.php') ?>
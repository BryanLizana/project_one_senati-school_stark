<?php $page_this = "ROOT"; ?>
<?php require_once('../../controllers/defines.php') ; // se define en cada modulo ?>
<?php  require_once(ROOT.'/models/users.php');  //objecto con el cual trabajará ?>
<?php require_once(ROOT.'views/templates/header.php'); ?>
<!--content-->
<div class="body" >   

<?php 
//add página requerida
switch ($_REQUEST['page']) {
    case 'add-user':
        include_once('add-user.php');
        break;
    case 'edit-user':
         include_once('edit-user.php');
        break;
    case 'del-user':
         include_once('del-user.php');
        break;     
    case 'test':
         include_once('test.php');
        break;               
    default:
        include_once('detail.php');
        break;
}

 ?>

</div>
<?php require_once('../templates/footer.php') ?>
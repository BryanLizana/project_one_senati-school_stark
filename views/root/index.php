<?php $page_this = "ROOT"; ?>
<?php require_once('../templates/header.php'); ?>
<!--content-->
<div class="body" >   

<?php 
switch ($_REQUEST['page']) {
    case 'add-user':
        include_once('add-user.php');
        break;
    case 'edit-user':
         include_once('edit-user.php');
        break;
    default:
        include_once('detail.php');
        break;
}

 ?>

</div>
<?php require_once('../templates/footer.php') ?>
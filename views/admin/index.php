<?php $page_this = "ADMIN"; ?>
<?php require_once('../templates/header.php'); ?>
<!--content-->
<div class="body" >   
<?php  
switch ($_REQUEST['page']) {
    case 'del-bloque':
         include_once('del-bloque.php');
        break;             
    case 'bloques':
         include_once('bloques.php');
        break; 
    case 'del-curso':
         include_once('del-curso.php');
        break;             
    case 'cursos':
         include_once('cursos.php');
        break;   
    case 'del-alumno':
         include_once('del-alumno.php');
        break;             
    case 'alumnos':
         include_once('alumnos.php');
        break;     
    case 'del-docente':
         include_once('del-docente.php');
        break;             
    case 'docentes':
         include_once('docentes.php');
        break; 
    case 'generate':
         include_once('generate.php');
        break;                             
    default:
        include_once('detail.php');
        break;
}
 
?>
</div>
<?php require_once('../templates/footer.php') ?>
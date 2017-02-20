
<?php require_once('../../models/bloque_curso_docente.php') ?>
<?php 
$bloque_curso_docente =  new BloqueCursoDocente();
$bloque_curso_docente->id_user_docente = $_SESSION['user']['ID'];
$data_bloques = $bloque_curso_docente->list_bloques_by_docente();
 ?>
<div class="main">
    <h3>Lista de bloques asignados:</h3>
    <table class="pure-table">
      <?php foreach ($data_bloques as $bloq): ?>
        <tr>
            <td>Bloque:<?php echo $bloq['code'] ?></td>
            <td><a href="<?php echo '/'.strtolower($_SESSION['user']['type_us']).'/bloque/'.$bloq['id_bloque'].'/' ?>">Listar Curso de este bloque</a></td>            
        </tr>
       <?php endforeach ?>
    </table>

</div>
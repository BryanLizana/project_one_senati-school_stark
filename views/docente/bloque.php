<?php require_once('../../models/bloque_curso_docente.php') ?>
<?php 
$bloque_curso_docente =  new BloqueCursoDocente();
$bloque_curso_docente->id_user_docente = $_SESSION['user']['ID'];
$bloque_curso_docente->id_bloque = $_GET['id'];
$data_cursos = $bloque_curso_docente->list_curso_by_bloque_docente();
 ?>
<div class="main">
    <h3>Lista de curso que tiene en este bloque:</h3>

    <table class="pure-table">
      <?php foreach ($data_cursos as $curs): ?>
        <tr>
            <td>Curso:<?php echo $curs['description'] ?></td>
            <td><a href="<?php echo '/'.strtolower($_SESSION['user']['type_us']).'/curso/'.$curs['id_curso'].'/' ?>">Listar Alumnos de este curso</a></td>            
        </tr>
       <?php endforeach ?>
    </table>

</div>
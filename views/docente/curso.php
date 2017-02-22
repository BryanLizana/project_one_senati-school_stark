<?php require_once('../../models/bloque_curso_docente.php') ?>
<?php require_once('../../models/alumno_control.php') ?>
<?php require_once('../../models/alumno_asistencias.php') ?>



<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $alumno_asistencias =  new AlumnoAsistencias();

    $string  = implode(',',array_keys($_POST['alumno_control']));
    $alumno_asistencias->string_ids = $string;
    $alumno_asistencias->pre_asistencia_update();

   foreach ($_POST['alumno_control'] as $id => $status_assistencia) {
        $alumno_asistencias->id_alumno_control = $id;
        $alumno_asistencias->asistencia = $status_assistencia;
        $alumno_asistencias->save_asistencia();
   }
}
 ?>

<?php 
$bloque_curso_docente =  new BloqueCursoDocente();
$bloque_curso_docente->id_bloquecursodocente = $_GET['id'];
$detail_data = $bloque_curso_docente->list_bloquecursodocente();
validate_permisos($_SESSION['user']['ID'],$detail_data['id_user_docente']);

$alumno_control = new AlumnoControl();
$alumno_control->id_bloque = $detail_data['id_bloque'] ;
$alumno_control->id_curso = $detail_data['id_curso'] ;
$alumno_control->id_user_docente = $_SESSION['user']['ID'] ;
$data_alumno = $alumno_control->list_alumno_by_curso();


///alumno asistencias
foreach ($data_alumno  as $alumno) {
    $string_ids[] = $alumno['id_alumno_control'];
}
if (count($string_ids) > 0) {
   $string_ids = implode(',',$string_ids);
    $alumno_asistencias =  new AlumnoAsistencias();
    $alumno_asistencias->string_ids = $string_ids;
    $alumno_asistencias->fecha = date('Y-m-d'); 
    // $alumno_asistencias->fecha = date('Y-m-d', strtotime(date('Y-m-d') . ' +6 day')); 
    $alumno_asistencias  = $alumno_asistencias->list_alumno_asistencia();
     $ids_asistencias = array('0' );
    foreach ($alumno_asistencias as $id_asistencia) {
        $ids_asistencias[] = $id_asistencia['id_alumno_control'];
    }

}
 ?>
<div class="main">
    <h3>Bloque: <?php echo $detail_data['code'] ?></h3>
    <h3>Curso:  <?php echo $detail_data['description'] ?></h3>    
    <h3>Alumnos:</h3>
    <form method="POST">
        
    <table class="pure-table">
        <thead>
            <th>ID Alumno</th>
            <th>Apellidos y Nombres</th>
            <th>Notas</th>
            <th>Asistencia</th>
        </thead>
        <tbody>
        <?php foreach ($data_alumno as $alumno): ?>
            <tr>
                <td><?php echo $alumno['id_user_alumno'] ?></td>
                <td><?php  echo $alumno['last_name'] ?> <?php  echo $alumno['name'] ?></td>
                <td><a href="/<?php echo strtolower($_SESSION['user']['type_us']) ?>/alumno/<?php echo $alumno['id_alumno_control'] ?>/">ir a notas</a></td>
                <td>
                    <?php 
                        if (in_array($alumno['id_alumno_control'],$ids_asistencias) ) {
                            $checked_si = 'checked';
                            $checked_no = '';
                            
                        }else {
                            $checked_si = '';
                            $checked_no = 'checked';
                        }
                     ?>

                   <label for="<?php echo $alumno['id_alumno_control'] ?>_A" class="pure-checkbox">
                       
                    <input id="<?php echo $alumno['id_alumno_control'] ?>_A" type="radio" value="1" name="alumno_control[<?php echo $alumno['id_alumno_control'] ?>]" <?php echo $checked_si ?>  >SI
                   </label>
                   
                   <label for="<?php echo $alumno['id_alumno_control'] ?>_B" class="pure-checkbox">
                       <?php //echo $checked ?>
                    <input id="<?php echo $alumno['id_alumno_control'] ?>_B" type="radio" value="0" name="alumno_control[<?php echo $alumno['id_alumno_control'] ?>]" <?php echo $checked_no ?>  >NO
                   </label>         
                </td>
            </tr>
        <?php endforeach ?>
            
        </tbody>
    </table>
    <input type="submit" name="" value="Guardar asistencia.">
    </form>

</div>
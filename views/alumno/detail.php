<?php require_once('../../models/alumno_control.php') ?>
<?php require_once('../../models/bloques.php') ?>
<?php require_once('../../models/alumno_notas.php') ?>
<?php require_once('../../models/cursos.php') ?>
<?php require_once('../../models/users.php') ?>
<?php require_once('../../models/alumno_asistencias.php') ?>





<?php 
$alumno = new AlumnoControl();
$alumno->id_user_alumno = $_SESSION['user']['ID'];
 $data_complete = $alumno->list_data_alumno_control();

$data = $data_complete[0];
// $bloque = new Bloques();
// $bloque->id_bloque = $data['id_bloque'];
// $bloque = $bloque->list_bloque();
// $bloque = $bloque[0];
 ?>

<div class="main">
<h2>Detalles del Usuario</h2>
<form class="pure-form pure-form-aligned" action="" method="POST">
<?php include('../templates/form/user-form.php'); ?>
<!--<hr>-->
        <!--<span>Cambiar password::</span><br>
        <div class="pure-control-group">
            <label for="password">Nuevo Password</label>
            <input id="new_password" type="password" placeholder="New Password">
        </div>
        <div class="pure-control-group">
            <label for="password">Repetir nuevo Password</label>
            <input id="re_new_password" type="password" placeholder="Repite new Password">
        </div>
        <div class="pure-control-group">
            <label for="password">Password Actual</label>
            <input id="password" type="password" placeholder="Password">
        </div>-->
</form>

<?php  ///weeek
            $ddate = date('Y-m-d');
            $date = new DateTime($ddate);
            $week = $date->format("W");
            // echo "Weeknummer: $week";
            $add_sem = (is_numeric($_GET['week'])) ? $_GET['week'] : '0' ;
            $week_number = (date('W',strtotime( $add_sem." week") ) ) ;// (is_numeric($_GET['week'])  && $_GET['week'] != '0')? $_GET['week'] : $week ;
            $year = date('Y');
            for($day=1; $day<=5; $day++)
            {
                $fechas[] = "'".date('Y-m-d', strtotime($year."W".$week_number.$day))."'" ;
            }

 ?>

<h2>Asistencias</h2>
<h3>Alumno:XX</h3>
<h4>Fecha: Del Lunes- <?php echo $fechas[0] ?>  al   Viernes-<?php echo $fechas[count($fechas)-1] ?> </h4>
<a href="?week=<?php echo (  $add_sem - 1 ) ?>"> << Semena anterior</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="?week=<?php echo ( $add_sem +  1 ) ?>">Semena siguiente >>  </a>
<br>
<br>


<table class="pure-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Docente</th>
            <th>Curso</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </tr>
    </thead>

    <tbody>

            <?php 
            $n_i = 1;
            foreach ($data_complete as $alumno_control) {
            $alumno_asistencia =  new AlumnoAsistencias();
            $alumno_asistencia->id_alumno_control = $alumno_control['id_alumno_control'];

            $alumno_asistencia->string_ids = implode(',',$fechas);
            $asistencia = $alumno_asistencia->list_alumno_control_asistencia();

                $curso = $alumno_control['description']
                ?> <tr class="pure-table-odd">
                    <td><?php echo $n_i ; $n_i++?></td>
                    <td><?php echo  $alumno_control['last_name_docente'] ?> </td>                     
                    <td><?php echo $curso ?> </td> 
                    
                <?php $no = 0; ?>
                <?php  foreach ($asistencia as $dia) {    ?> 
                            <?php if ($no == 0) :  ?> 
                                <?php foreach ($fechas as $fecha): ?>
                                <?php if ("'".$dia['fecha']."'" != $fecha) :  ?> 
                                    <td></td>
                                <?php  else: $no = 1; break ?>
                                <?php  endif;  ?>
                                <?php endforeach ?>
                            <?php  endif;  ?>
                           <td><?php echo  $dia['asistencia'] ?></td>
                <?php }            
            ?> </tr>  <?php
            }
        ?>
    </tbody>
</table>

<hr>    
<h2>Notas</h2>
<h3>Alumno: <?php echo $data['last_name'] .' '.$data['name']?> </h3>
<h4>Bloque: <?php echo $data['bcode'] ?> </h4>
<?php  

    // echo '<pre>'; var_dump( $data_complete ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
    // echo '<pre>'; var_dump( $notas ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
 ?>
<table class="pure-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Docente</th>
            <th>Curso</th>
            <th>Nota1</th>
            <th>Nota2</th>
            <th>Nota3</th>
            <th>Nota4</th>
            <th>NotaFinal-1B</th>
            <th>Nota1</th>
            <th>Nota2</th>
            <th>Nota3</th>
            <th>Nota4</th>
            <th>NotaFinal-2B</th>
        </tr>
    </thead>

    <tbody>        
       <?php 
function list_nota_alumno_($temporada_class,$id_alumno_control)
{
    $alumno_nota = new AlumnoNotas();
    $alumno_nota->id_alumno_control = $id_alumno_control;
    $alumno_nota->temporada_clase = $temporada_class;
    $notas = $alumno_nota->list_nota_by_temporada();
        if ($notas == null) {
        $notas = array('nota_1' => 0,'nota_2' => 0,'nota_3' => 0 ,'nota_4' => 0);
        }
		 $promedio = (( $notas['nota_1'] +  $notas['nota_2'] +  $notas['nota_3'] + $notas['nota_4'] )/4 )
    ?>
    <td><?php echo $notas['nota_1'] ?></td>
    <td><?php echo $notas['nota_2'] ?></td>
    <td><?php echo $notas['nota_3'] ?></td>
    <td><?php echo $notas['nota_4'] ?></td>
    <td><?php  echo $promedio ?></td> 
      <?php          
} 
$n_i = 1;
foreach ($data_complete as $alumno_control) {
    ?> 
            <tr class="pure-table-odd">
            <td><?php echo $n_i ; $n_i++?></td>
    
    <?php
       //list notas
    $alumno_nota = new AlumnoNotas();
    $alumno_nota->id_alumno_control = $alumno_control['id_alumno_control'];

    $curso =  $alumno_control['description'];
    ?> 
            <td><?php  echo  $alumno_control['last_name_docente'] ?></td>
            <td><?php  echo  $curso ?></td>
            
         <?php list_nota_alumno_('1',$alumno_control['id_alumno_control']) ?>
         <?php list_nota_alumno_('2',$alumno_control['id_alumno_control']) ?>
         
        </tr>
    
    <?php  }   ?>
   
    </tbody>
</table>
<hr>

</div>

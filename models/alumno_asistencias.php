<?php 
require_once('/conexion.php');

/**
 * 
 */
class AlumnoAsistencias 
{
    public  $id_alumno_control;
    public  $asistencia;
    public  $fecha ;
    
    function __construct()
    {
           $this->fecha = date('YY-MM-dd');        
    }

    public function save_asistencia()
    {
       global $db_class;
       
       if (is_numeric( $this->id_alumno_control) && $this->id_alumno_control != '0') {
           $data = array(':id_alumno_control' => $this->id_alumno_control, ':fecha' => $this->fecha,':asistencia' => $this->asistencia);
           $sql = "INSERT INTO alumno_asistencias(id_alumno_control,fecha,asistencia)  values(:id_alumno_control,:fecha,:asistencia)";
           $db_class->query($sql,$data);   
       }
    }
}

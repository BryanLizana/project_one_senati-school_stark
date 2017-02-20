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
    public  $string_ids ;
    

     
    
    function __construct()
    {
    }

    public function save_asistencia()
    {
       global $db_class;
       $this->fecha = date('Y-m-d');               
       if (is_numeric( $this->id_alumno_control) && $this->id_alumno_control != '0') {
           $data = array(':id_alumno_control' => $this->id_alumno_control, ':fecha' => $this->fecha,':asistencia' => $this->asistencia);
           $sql = "INSERT INTO alumno_asistencias(id_alumno_control,fecha,asistencia)  values(:id_alumno_control,:fecha,:asistencia)";
           $db_class->query($sql,$data);   
       }
    }

    public function pre_asistencia_update()
    {
      global $db_class;
      $this->fecha = date('Y-m-d');  
      $data = array(':string_ids' => $this->string_ids,':fecha'=> $this->fecha );
      $sql = "DELETE FROM alumno_asistencias where id_alumno_control in (:string_ids) and fecha = :fecha";
      $db_class->query($sql,$data);
    }
}

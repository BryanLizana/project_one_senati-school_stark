<?php 
require_once(ROOT.'/models/conexion.php');

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

    //la asistencia se hace el mismo día, no se puede postergar o adelantar
    public function save_asistencia()
    {
       global $db_class;
    //    $this->fecha = date('Y-m-d', strtotime(date('Y-m-d') . ' +6 day'));         
       $this->fecha = date('Y-m-d');              
             
       if (is_numeric( $this->id_alumno_control) && $this->id_alumno_control != '0') {
           $data = array(':id_alumno_control' => $this->id_alumno_control, ':fecha' => $this->fecha,':asistencia' => $this->asistencia);
           $sql = "INSERT INTO alumno_asistencias(id_alumno_control,fecha,asistencia)  values(:id_alumno_control,:fecha,:asistencia)";
           $db_class->query($sql,$data);   
       }
    }

    ///al volver a guardar la asistencia hay que eliminar la anterior 
    public function pre_asistencia_update()
    {
      global $db_class;
    //   $this->fecha = date('Y-m-d', strtotime(date('Y-m-d') . ' +6 day')); 
      $this->fecha = date('Y-m-d');    
         
      $data = array(':fecha'=> $this->fecha );
      $sql = "DELETE FROM alumno_asistencias where id_alumno_control in ( $this->string_ids ) and fecha = :fecha";
      $db_class->query($sql,$data);
    }

    // lista a los días de asistencia de un alumno en específico, segpun sus id de control de un alumno
    public function list_alumno_asistencia()
    {
         global $db_class;  
            
        $data = array(':fecha'=> $this->fecha );
        $sql = "SELECT id_alumno_control FROM alumno_asistencias  where id_alumno_control in ( $this->string_ids ) and fecha = :fecha and asistencia	= '1'";
        $r = $db_class->query($sql,$data);
        return $r;
    }

//lista a la  asistencia de un alumno por un rango de fechas
    public function list_alumno_control_asistencia()
    {
         global $db_class;  
            
        $data = array(':id_alumno_control'=> $this->id_alumno_control );
        $sql = "SELECT * FROM alumno_asistencias  where fecha in ( $this->string_ids ) and id_alumno_control = :id_alumno_control ";
        $r = $db_class->query($sql,$data);
        
        return $r;
    }
}

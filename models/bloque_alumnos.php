<?php 
require_once(ROOT.'/models/conexion.php');
require_once(ROOT.'/models/bloques.php');
/**
 * 
 */
class BloqueAlumnos 
{
    public $id_bloque;
    public $id_user_alumno;
    
    function __construct()
    {
        # code...
    }

    public function save_bloque_alumnos()
    {
        global $db_class;
         //params
        $data  = array(':id_bloque' => $this->id_bloque, 
                        'id_user_alumno' =>  $this->id_user_alumno
                        );

        // **¡¡¡
        //validate unique data - code
        if (is_numeric($this->id_bloque)   && is_numeric($this->id_user_alumno)  &&  $this->id_bloque != '0'  && $this->id_user_alumno != '0') {
           
           //select  si existe
           $data_select  = array(':id_user_alumno' => $this->id_user_alumno );
           $sql_select = "select id_user_alumno from bloque_alumnos where id_user_alumno = :id_user_alumno";
            $r_select = $db_class->query($sql_select,$data_select,"ROW");
            //validar si existe un id similar o ingrsar si no existe
            if (is_numeric($r_select[0])  && $r_select[0] != '0' ) {
            //edit bloque_alumnos
            $sql = "UPDATE bloque_alumnos set id_bloque=:id_bloque where id_user_alumno = LAST_INSERT_ID(:id_user_alumno);";        
            $r = $db_class->query($sql,$data,"UPDATE");
            }else {
            //new bloque_alumnos
            $sql = "INSERT INTO bloque_alumnos(id_bloque,id_user_alumno) VALUES(:id_bloque,LAST_INSERT_ID(:id_user_alumno))";        
            $r = $db_class->query($sql,$data,"INSERT");     
             //update bloque vacantes
            $bloque =  new Bloques();
            $bloque->id_bloque = $this->id_bloque;
            $bloque->update_vacante(); 
            }
        }else {
                $r = "Error- Bloques Alumnos";
        }

        return $r;
        
    }

    public function list_alumno() //por bloque
    {
      global $db_class;
      $data = array(':id_bloque' => $this->id_bloque );
      $sql = "SELECT * FROM bloque_alumnos where id_bloque = :id_bloque";
      $r = $db_class->query($sql,$data);
      return $r;

    }

    public function get_bloque() // por user - alumno
    {
      global $db_class;
      $data = array(':id_user_alumno' => $this->id_user_alumno );
      $sql = "SELECT * FROM bloque_alumnos where id_user_alumno = :id_user_alumno";
      $r = $db_class->query($sql,$data,'ROW');
      return $r;
    }

}

<?php 
require_once('/conexion.php');

/**
 * 
 */
class BloqueCursoDocente 
{
    public $id_bloque;
    public $id_curso;
    public $id_user_docente;
    
    function __construct()
    {
        # code...
    }

    public function save_bloque_curso_docente()
    {
        # code...
        global $db_class;
        if ( self::validate($this->id_bloque) && self::validate($this->id_curso) && self::validate($this->id_user_docente) ) {
        

          $data = array(':id_bloque' =>  $this->id_bloque,
                        ':id_curso' => $this->id_curso,
                        ':id_user_docente' => $this->id_user_docente
                        );
         $sql = "INSERT INTO bloque_curso_docente(id_bloque,id_curso,id_user_docente,dia) values(:id_bloque,:id_curso,:id_user_docente,'null')" ;
         $db_class->query($sql,$data);
        }else {
            echo '<pre>'; var_dump( 'Nop' ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
        }
    }

    public function delete_docente_detalle()
    {
        global $db_class;
          //delete old info        
        if (self::validate($this->id_user_docente)) {
          $data  = array('id_user_docente' => $this->id_user_docente );
          $sql = "DELETE FROM bloque_curso_docente where id_user_docente = :id_user_docente";
          $db_class->query($sql,$data);
        }
    
    }

    private function validate($value)
    {
       if (is_numeric($value) && $value != '0') {
          return true;
       }else {
           return false;
       }
    }
}

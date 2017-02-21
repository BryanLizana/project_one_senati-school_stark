<?php 
require_once('/conexion.php');

/**
 * 
 */
class BloqueCursoDocente 
{
    public $id_bloquecursodocente;    
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

    public function list_bloques_by_docente()
    {
        if (self::validate($this->id_user_docente)) {
           global $db_class;
           $data = array(':id_user_docente' => $this->id_user_docente );
           $sql = "SELECT DISTINCT b.id_bloque,b.code  FROM bloque_curso_docente as bcd inner join bloques as b  on bcd.id_bloque = b.id_bloque  where
            bcd.id_user_docente = :id_user_docente";
           $r = $db_class->query($sql,$data);

           
           return $r;
        }
    }

    public function list_curso_by_bloque_docente()
    {
        if (self::validate($this->id_user_docente) &&  self::validate($this->id_bloque)) {
           global $db_class;
           $data = array(':id_user_docente' => $this->id_user_docente,':id_bloque' => $this->id_bloque);
           $sql = "SELECT bcd.id_bloquecursodocente ,c.id_curso,c.name,c.description FROM bloque_curso_docente as bcd inner join cursos as c  on c.id_curso = bcd.id_curso  where bcd.id_user_docente = :id_user_docente and bcd.id_bloque = :id_bloque";
           $r = $db_class->query($sql,$data);
           return $r;
        }
    }

    public function list_bloquecursodocente()
    {
        global $db_class;
       if (self::validate($this->id_bloquecursodocente)) {
          
            $data = array(':id_bloquecursodocente' => $this->id_bloquecursodocente );
            $sql = "SELECT c.description , b.code ,b.id_bloque,bcd.id_user_docente,c.id_curso FROM bloque_curso_docente as bcd
                     inner join bloques as b  on bcd.id_bloque = b.id_bloque
                     inner join cursos as c  on c.id_curso = bcd.id_curso
                       where id_bloquecursodocente =:id_bloquecursodocente";
          $r = $db_class->query($sql,$data,'ROW');
          return $r;
       }
    }

  
    
}

<?php 
require_once(ROOT.'/models/conexion.php');

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

    //asgnar a un docente los bloques y cursos que tiene a sus cargo
    public function save_bloque_curso_docente()
    {
        # code...
        global $db_class;
        if ( self::validate($this->id_bloque) && self::validate($this->id_curso) && self::validate($this->id_user_docente) ) {
        
            //add params
          $data = array(':id_bloque' =>  $this->id_bloque,
                        ':id_curso' => $this->id_curso,
                        ':id_user_docente' => $this->id_user_docente
                        );
         $sql = "INSERT INTO bloque_curso_docente(id_bloque,id_curso,id_user_docente,dia) values(:id_bloque,:id_curso,:id_user_docente,'null')" ;
         $db_class->query($sql,$data);
        }else {
            ///Error si se ha alterado los id por datos no permitidos
            echo '<pre>'; var_dump( 'Datos no válidos' ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
        }
    }

    //eliminar todos los bloques y cursos asignados a un docente
    public function delete_docente_detalle()
    {
        global $db_class;
          //delete old info        
        if (self::validate($this->id_user_docente)) {
            //add params
          $data  = array('id_user_docente' => $this->id_user_docente );
          $sql = "DELETE FROM bloque_curso_docente where id_user_docente = :id_user_docente";
          $db_class->query($sql,$data);
        }
    
    }

    //validad si es un id válido
    private function validate($value)
    {
       if (is_numeric($value) && $value != '0') {
          return true;
       }else {
           return false;
       }
    }

    //listar los bloques que posee un docente
    public function list_bloques_by_docente()
    {
        if (self::validate($this->id_user_docente)) {
           global $db_class;
           //add params
           $data = array(':id_user_docente' => $this->id_user_docente );
           $sql = "SELECT DISTINCT b.id_bloque,b.code  FROM bloque_curso_docente as bcd inner join bloques as b  on bcd.id_bloque = b.id_bloque  where
            bcd.id_user_docente = :id_user_docente";
           $r = $db_class->query($sql,$data);

        //retornar la lista de bloques 
           return $r;
        }
    }

    //listar los cursos que tiene un docente por cada bloque
    public function list_curso_by_bloque_docente()
    {
        if (self::validate($this->id_user_docente) &&  self::validate($this->id_bloque)) {
           global $db_class;
           //add params
           $data = array(':id_user_docente' => $this->id_user_docente,':id_bloque' => $this->id_bloque);
           $sql = "SELECT bcd.id_bloquecursodocente ,c.id_curso,c.name,c.description FROM bloque_curso_docente as bcd inner join cursos as c  on c.id_curso = bcd.id_curso  where bcd.id_user_docente = :id_user_docente and bcd.id_bloque = :id_bloque";
           $r = $db_class->query($sql,$data);
            //retornar la lista 
           return $r;
        }
    }

    //listar informacion de un curso de un docente según el bloque
    public function list_bloquecursodocente()
    {
        global $db_class;
       if (self::validate($this->id_bloquecursodocente)) {
            //add params
            $data = array(':id_bloquecursodocente' => $this->id_bloquecursodocente );
            $sql = "SELECT c.description , b.code ,b.id_bloque,bcd.id_user_docente,c.id_curso FROM bloque_curso_docente as bcd
                     inner join bloques as b  on bcd.id_bloque = b.id_bloque
                     inner join cursos as c  on c.id_curso = bcd.id_curso
                       where id_bloquecursodocente =:id_bloquecursodocente";
         //retornar una fila 
          $r = $db_class->query($sql,$data,'ROW');
          return $r;
       }
    }

    public function list_cursos()
    {
            global $db_class;

            //list all cursos
            $sql = "select * from cursos  where id_curso not in ( SELECT id_curso FROM bloque_curso_docente  )";
            $r  = $db_class->query($sql);
            unset($sql);
            unset($data);
            // Result:  list  | null 
            return $r;
    }

      public function list_bloques()
    {
            global $db_class;

            //list all cursos
            $sql = "select * from bloques  where id_bloque not in ( SELECT id_bloque FROM bloque_curso_docente  )";
            $r  = $db_class->query($sql);
            unset($sql);
            unset($data);
            // Result:  list  | null 
            return $r;
    }
    
}

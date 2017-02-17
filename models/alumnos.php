<?php 
require_once('/conexion.php');
require_once('/users.php.php');


/**
 * 
 */
class Alumnos extends Users
{
    
    function __construct()
    {
       
    }

    public function save_alumno()
    {
        global $db_class;
        // $data = array(':name' =>  $this->name );
        // $data = array(':name' =>  $this->name );
        // $data = array(':name' =>  $this->name );
        // $data = array(':name' =>  $this->name );
        // $data = array(':name' =>  $this->name );
        $sql = "INSERT INTO menu(type_user,name,code_menu) VALUES('ROOT','Actualizar Usuario','edit-user')";        
        $r = $db_class->query($sql,$data);

        echo '<pre>'; var_dump( $r ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 

    }
}


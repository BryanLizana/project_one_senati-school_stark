<?php 
require_once(ROOT.'/models/conexion.php');

/**
 * 
 */
class Cursos       
{
    public $id_curso;
    public $name;
    public $description;
    
    function __construct()
    {
        # code...
    }

    ///Guarda un curso, validando su nombre ya que es único
    public function save_curso()
    {
                global $db_class;
                //params
                $data = array(  ':id_curso' =>  $this->id_curso  ,  
                                  ':cursos_name' =>  $this->name ,
                                  ':cursos_description' =>  $this->description ,
                                 );
                    //validate data
                    $data_validate = $data;
                    $validate =  new Validate();                   
                    $validate->data  = $data_validate ;
                    $validate->table  = "cursos" ;
                    $validate->id_table = $this->id_curso ;
                    $validate->id_table_field = "id_curso" ;                     
                    $r_validate =  $validate->validate();
                    if ( $r_validate !== 1) {
                        ///devolver errores de la validación
                        $r = $r_validate;
                    }else {

                            // **¡¡¡ try
                            //validate unique data - code
                            if (!empty($this->id_curso) ) {
                                //edit any curso
                                $sql = "UPDATE cursos set name = :cursos_name,description = :cursos_description where id_curso = LAST_INSERT_ID(:id_curso)  ;";        
                                $r = $db_class->query($sql,$data,"UPDATE");
                            }else {
                                unset($data[':id_curso']);
                                //new any curso
                                $sql = "INSERT INTO cursos(name,description) VALUES(:cursos_name,:cursos_description)";
                                $r = $db_class->query($sql,$data,"INSERT"); 
                            }
                    }
                    
                    //eliminar variables que no se usarán 
                    unset($sql);
                    unset($data);
                    unset($validate);
                    
                    // Result:  id_curso insert or edit | null 
                    return $r;
                
    }

    ///la eliminación de curso se hace por completo
    public function delete_curso()
    {
           //    delete
           global $db_class;
           $data = array(':id_curso' => $this->id_curso );
           $sql = "DELETE FROM  cursos  where id_curso = :id_curso";
           $r = $db_class->query($sql,$data);
            unset($sql);
            unset($data);
            return $r;
        
    }

    //listado de cursos ya sea de uno solo o de todos
    public function list_curso()
    {
            global $db_class; //variable para hacer las consultas

            if (empty($this->id_curso) ) {

                    //list all cursos
                $sql = "SELECT * FROM cursos";
                $r  = $db_class->query($sql);
            }else {

                    // List curso specific
                $sql = "SELECT * FROM cursos where id_curso = :id_curso";
                $data = array(':id_curso' => $this->id_curso );
                $r =  $db_class->query($sql,$data);
                
            }

            unset($sql);
            unset($data);
            // Result:  list  | null 
            return $r;
    }
}

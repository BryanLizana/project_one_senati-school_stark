<?php 
require_once('/conexion.php');

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
                    
              

                    // Result:  id_curso insert or edit | null 
                    return $r;
                
    }

    public function delete_curso()
    {
           //    delete
           global $db_class;
           $data = array(':id_curso' => $this->id_curso );
           $sql = "DELETE FROM  cursos  where id_curso = :id_curso";
           $r = $db_class->query($sql,$data);
           
            return $r;
        
    }

    public function list_curso()
    {
            global $db_class;


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

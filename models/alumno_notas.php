<?php 
require_once(ROOT.'/models/conexion.php');

/**
 * 
 */
class AlumnoNotas 
{
    public $id_alumno_control;
    public $n_nota;
    public $nota;
    public $temporada_clase;
    
    
    function __construct()
    {
        # code...
    }



    public function list_nota_by_temporada()
    {
        global $db_class;
        $data = array(':id_alumno_control' => $this->id_alumno_control,                 
                        ':temporada_clase' =>   $this->temporada_clase
                         );

                        // ':n_nota' =>  $this->n_nota ,
                        // ':nota' =>  $this->nota ,

        $sql = "SELECT * FROM alumno_notas where id_alumno_control = :id_alumno_control  and temporada_clase = :temporada_clase" ;
        $r = $db_class->query($sql,$data);
        $i = 1;
        foreach ($r as $nota ) {
            
            $data_r['nota_'.$i] = $nota['nota'];

            $i++;
        }

        // return $r;
        return  $data_r ;
    }


    ///save notas how integers
    public function save_nota()
    {
        global $db_class;
        $data = array(':id_alumno_control' => $this->id_alumno_control,
                        ':n_nota' =>  $this->n_nota ,
                        ':nota' =>  $this->nota ,                 
                        ':temporada_clase' =>   $this->temporada_clase
                         );

        $sql  = "INSERT INTO alumno_notas(id_alumno_control,n_nota,nota,temporada_clase)  values(:id_alumno_control,:n_nota,:nota,:temporada_clase) ";
        $r  =$db_class->query($sql,$data);                
        return $r;
    }

    public function delete_nota()
    {
         global $db_class;
        $data = array(':id_alumno_control' => $this->id_alumno_control,                 
                        ':temporada_clase' =>   $this->temporada_clase
                         );

        $sql  = "DELETE FROM  alumno_notas where id_alumno_control = :id_alumno_control  and temporada_clase = :temporada_clase ";
        $r  =$db_class->query($sql,$data);
    }
}

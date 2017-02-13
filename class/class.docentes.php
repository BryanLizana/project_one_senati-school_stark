<?php

error_reporting(E_ALL);

/**
 * modelo sin título - class.docentes.php
 *
 * $Id$
 *
 * This file is part of modelo sin título.
 *
 * Automatically generated on 11.02.2017, 23:30:04 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/**
 * include alumnos
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.alumnos.php');

/**
 * include bloques
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.bloques.php');

/**
 * include cursos
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.cursos.php');

/**
 * include users
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.users.php');

/* user defined includes */
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:00000000000009E5-includes begin
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:00000000000009E5-includes end

/* user defined constants */
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:00000000000009E5-constants begin
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:00000000000009E5-constants end

/**
 * Short description of class docentes
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class docentes
    /* multiple generalisations not supported by PHP: */
    /* extends users,
            cursos,
            bloques,
            cursos,
            users */
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---

    /**
     * Short description of method save_docente
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  name
     * @param  last_name
     * @param  code
     * @param  type_us
     * @param  password
     * @param  status
     * @return mixed
     */
    public function save_docente($name, $last_name, $code, $type_us = docente, $password = null, $status = null)
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A1D begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A1D end
    }

    /**
     * Short description of method update_docente
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  name
     * @param  last_name
     * @param  code
     * @param  type_us
     * @param  password
     * @param  status
     * @return mixed
     */
    public function update_docente($name, $last_name, $code, $type_us = docente, $password = null, $status = null)
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A26 begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A26 end
    }

    /**
     * Short description of method list_bloques
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id_user
     * @param  id_curso
     * @return mixed
     */
    public function list_bloques($id_user, $id_curso)
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A36 begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A36 end
    }

    /**
     * Short description of method list_curso
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id_user
     * @param  id_bloque
     * @param  seccion
     * @return mixed
     */
    public function list_curso($id_user, $id_bloque, $seccion)
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A4C begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A4C end
    }

    /**
     * Short description of method save_nota
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id_user
     * @param  id_bloque
     * @param  id_curso
     * @param  id_alumno
     * @param  nota
     * @param  bimestre
     * @return mixed
     */
    public function save_nota($id_user, $id_bloque, $id_curso, $id_alumno, $nota, $bimestre)
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A67 begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A67 end
    }

    /**
     * Short description of method save_asistencia
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id_user
     * @param  id_bloque
     * @param  id_curso
     * @param  id_alumno
     * @param  asistencia
     * @param  fecha
     * @return mixed
     */
    public function save_asistencia($id_user, $id_bloque, $id_curso, $id_alumno, $asistencia, $fecha)
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A78 begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A78 end
    }

} /* end of class docentes */

?>
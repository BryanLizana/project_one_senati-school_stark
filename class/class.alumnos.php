<?php

error_reporting(E_ALL);

/**
 * modelo sin título - class.alumnos.php
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
 * include docentes
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.docentes.php');

/**
 * include users
 *
 * @author firstname and lastname of author, <author@example.org>
 */
require_once('class.users.php');

/* user defined includes */
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:00000000000009E6-includes begin
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:00000000000009E6-includes end

/* user defined constants */
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:00000000000009E6-constants begin
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:00000000000009E6-constants end

/**
 * Short description of class alumnos
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class alumnos
    /* multiple generalisations not supported by PHP: */
    /* extends users,
            docentes,
            docentes */
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    // --- OPERATIONS ---

    /**
     * Short description of method save_alumnoe
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
    public function save_alumnoe($name, $last_name, $code, $type_us = alumno, $password = code, $status = null)
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A8D begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A8D end
    }

    /**
     * Short description of method update_alumno
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
    public function update_alumno($name, $last_name, $code, $type_us = alumno, $password = null, $status = null)
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A99 begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A99 end
    }

    /**
     * Short description of method list_notas
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id_user
     * @return mixed
     */
    public function list_notas($id_user)
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000AA2 begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000AA2 end
    }

    /**
     * Short description of method list_asistencias
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id_user
     * @return mixed
     */
    public function list_asistencias($id_user)
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000AAB begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000AAB end
    }

    /**
     * Short description of method list_bloques
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function list_bloques()
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000AAE begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000AAE end
    }

    /**
     * Short description of method list_bloque_vacante
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @return mixed
     */
    public function list_bloque_vacante()
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000AB8 begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000AB8 end
    }

} /* end of class alumnos */

?>
<?php

error_reporting(E_ALL);

/**
 * modelo sin título - class.bloques.php
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

/* user defined includes */
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:00000000000009FA-includes begin
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:00000000000009FA-includes end

/* user defined constants */
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:00000000000009FA-constants begin
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:00000000000009FA-constants end

/**
 * Short description of class bloques
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class bloques
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

    /**
     * Short description of attribute id_bloque
     *
     * @access public
     * @var Integer
     */
    public $id_bloque = null;

    /**
     * Short description of attribute code
     *
     * @access public
     * @var String
     */
    public $code = null;

    /**
     * Short description of attribute grado
     *
     * @access public
     * @var Integer
     */
    public $grado = null;

    /**
     * Short description of attribute seccionString
     *
     * @access public
     * @var Integer
     */
    public $seccionString = null;

    /**
     * Short description of attribute status
     *
     * @access public
     * @var Integer
     */
    public $status = null;

    /**
     * Short description of attribute cusos_id_cadena
     *
     * @access public
     * @var string
     */
    public $cusos_id_cadena = '';

    // --- OPERATIONS ---

    /**
     * Short description of method save_bloque
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  code
     * @param  grado
     * @param  seccion
     * @param  status
     * @return mixed
     */
    public function save_bloque($code, $grado, $seccion, $status)
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A07 begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A07 end
    }

    /**
     * Short description of method update_bloque
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  code
     * @param  grado
     * @param  seccion
     * @param  status
     * @return mixed
     */
    public function update_bloque($code, $grado, $seccion, $status)
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A0C begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A0C end
    }

    /**
     * Short description of method list_alumno
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  id_bloque
     * @return mixed
     */
    public function list_alumno($id_bloque)
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A63 begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000A63 end
    }

    /**
     * Short description of method list_bloques_cursos
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  cusos_id_cadena
     * @return mixed
     */
    public function list_bloques_cursos($cusos_id_cadena)
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000AB2 begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000AB2 end
    }

} /* end of class bloques */

?>
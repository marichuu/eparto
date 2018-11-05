<?php

/*
 * @access public
 * @param String $db_object : database query object
 * @return String : Return array with data
 */

if (!function_exists('format_database_array')) {

    function format_database_array($db_object) {
        $db_array = array();

        if ($db_object->num_rows > 0) {
            foreach ($db_object->result_array() as $row) {
                foreach ($row as $key => $value) {
                    $db_array[] = $value;
                }
            }
        } 
        return $db_array;
    }

}


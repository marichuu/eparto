<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed.');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Form_validation
 *
 * @author USER
 */
class MY_Form_validation extends CI_Form_validation {

    function __construct() {
        parent::__construct();
    }

    /*
     * Patrick KOKOU
     * Contrôler l'unicité lors de la mise à jour
     */
    function unique($str, $field) {
        $CI = & get_instance();
        list($table, $column, $current) = explode('.', $field, 3);

        $CI->form_validation->set_message('unique', 'This %s already exists.');
        if (strlen($current) == 0) {
            $count = $CI->db->from($table)->where($column, $str)->count_all_results();
        } else {
            $count = $CI->db->from($table)->where($column, $str)->where($column . ' !=', $current)->count_all_results();
        }
         
        return ($count > 0) ? FALSE : TRUE;
    }

    /*
     * Patrick KOKOU
     * Contrôler une périodicité  (date début < date fin)
     */

    function periode($str, $field) {
        $CI = & get_instance();
        list($datedebut, $datefin) = explode('.', $field, 2);
        $CI->form_validation->set_message('periode', 'Period is not valid.');

        return ($datedebut > $datefin) ? FALSE : TRUE;
    }
    /*
     * Patrick KOKOU
     * Contrôler une périodicité  (date début < date fin)
     */
    function valid_date($str) {
        $CI = & get_instance();
        $ddmmyyy = '/^([123]0|[012][1-9]|31)\/(0[1-9]|1[012])\/(19[0-9]{2}|2[0-9]{3})$/';
        if (preg_match("$ddmmyyy", $str)) {
            return TRUE;
        } else {
            $CI->form_validation->set_message('valid_date', 'Format de date invalide: dd/mm/yyyy');
            return FALSE;
        }
    }

    /*
     * Patrick KOKOU
     * Vider les formulaires après insertion
     */
    public function unset_field_data() {
        unset($this->_field_data);
    }
    
    /*
     * Patrick KOKOU
     * Contrôler l'unicité par rapport à un objet
     */
    function unique_relative($str, $field ) {
        $CI = & get_instance();
        list($table, $column, $relative_column, $relative_value, $current) = explode('.', $field, 5);

        $CI->form_validation->set_message('unique_relative', 'Le champ %s existe déjà.');
        if (strlen($current) == 0) {
            $count = $CI->db->from($table)->where($column, $str)
                    ->where($relative_column . ' =', $relative_value)->count_all_results();
        } else {
            $count = $CI->db->from($table)->where($column, $str)->where($relative_column . ' =', $relative_value)
                    ->where($column . ' !=', $current)->count_all_results();
        }
        
        return ($count > 0) ? FALSE : TRUE;
    }

    /*
     * Patrick KOKOU
     * Validation de numero de téléphone
     */
    function phone_number($str) {
        if(trim($str) == '')
            return true;
        $CI = & get_instance();
        $CI->form_validation->set_message('phone_number', 'The %s field is not correct.');
        if (preg_match('/^([0-9-]){11}$/', $str)) {
            return true; 
        } else {
            return false;
        }
    }
    
    /*
     * Patrick KOKOU
     * Validation de numero de téléphone
     */
    function password_format($str) {
        $CI = & get_instance();
        $CI->form_validation->set_message('password_format', 'The %s must contain at least 6 characters with at least 1 digit and 1 capital letter.');
        if (preg_match('/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{6,20}$/', $str)) {
            return true; 
        } else {
            return false;
        }
    }
    
    function trim_in($str)
	{
		return str_replace(' ','',$str);
	} 
}

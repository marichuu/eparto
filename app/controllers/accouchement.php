<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @package Accouchement
 * @category Accouchement
 */
class Accouchement extends CI_Controller {

    private $_em;
    private $_table;

    public function __construct() {
        parent::__construct();
        if (!logged_in())
            redirect('auth/login');
        $this->_em = $this->doctrine->em;
        $this->_table = "accouchement";
    }

    public function index() {
        $id = str_replace(' ', '+', $_GET['xl']); 
        if($id=="") redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme',(int)decrypter($id));
        $this->twig->display("accouchement/list.html.twig", $data);
    }
}

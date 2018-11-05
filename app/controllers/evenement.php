<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @package Evenement
 * @category Module
 */
class Evenement extends CI_Controller {
   public function __construct() {
        parent::__construct();
        if (!logged_in())
            redirect('auth/login');
        $this->_em = $this->doctrine->em;
    }
      
   public function index() { 
        $femmes = $this->_em->getRepository('Entity\\Femme')->findBy(array('status'=>1), array('id'=>'desc'));
        $data['femmes'] = $femmes; 
        $this->twig->display("evenement/index.html.twig", $data);
   }
   
   public function bcf() {
        $id = str_replace(' ', '+', $_GET['xl']); 
        if($id=="") redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme',(int)decrypter($id));
        $this->twig->display("evenement/bcf.html.twig", $data);
    }

    public function gender() {
        $id = isset($_POST['id']) ? $_POST['id'] : $_GET['id'];
        $gender = explode('_', $id);
        $data['periodicity'] = $periodicity = $gender[0];
        $data['indicator_id'] = $indicator_id = $gender[1];
        $data['indicator'] = $indicator = $this->_em->find('Entity\\Indicator', $indicator_id);
        $structure = unserialize($this->session->userdata('structure'));
        $date = $this->session->userdata('date');
        $data['activity'] = $this->_em->getRepository('Entity\\Activity')->findOneBy(array(
            'indicator' => $indicator, 'periodicity' => $periodicity, 'structure' => $structure, 'annee' => $date));
        $this->twig->display("dataentry/activityData/gender.html.twig", $data);
    }

}


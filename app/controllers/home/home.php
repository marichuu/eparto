<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Home controller 
 * 
 * @author Mariam
 *  
 */
class Home extends CI_Controller {
   public function __construct() {
        parent::__construct();
        if (!logged_in())
            redirect('auth/login');
        $this->_em = $this->doctrine->em;
    }
      
   public function index() { 
        $femmes = $this->_em->getRepository('Entity\\Femme')->findBy(array('status'=>'1'), array('id'=>'desc'));
        $data['femmes'] = $femmes; 
        
        // Post partum
        $data['Pfemmes'] = $this->_em->getRepository('Entity\\Femme')->findBy(array('status'=>'2'), array('id'=>'desc'));
        
         // Archives
        $data['Afemmes'] = $this->_em->getRepository('Entity\\Femme')->findBy(array('status'=>'3'), array('id'=>'desc'));
        $this->twig->display("home/index.html.twig", $data);
   }
   
   public function addData() {
        $id = str_replace(' ', '+', $_GET['xl']); 
        if($id=="") redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme',(int)decrypter($id));
        $this->twig->display("home/data.html.twig", $data);
    }

}


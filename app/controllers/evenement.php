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
   
   public function add_bcf() {
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
    
    public function bcf() {
        if ($_POST) {
            $config = array(
                forme_rules('value', 'BCF', 'trim|required'),
            );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run('add')) {
                if (!validation_errors() == '') {
                    $msg = array('insert' => validation_errors());
                    setMessages($msg, 'danger');
                }
            } else {
                try {
                   
                    $value = $this->input->post('value');
                    $dateCreation = new DateTime();
                    $femme_id = $this->input->post('femme_id');
                    $femme = $this->_em->find('Entity\\Femme', $femme_id);
                    $user = findUser();
                    
                    $bcf = new Entity\Bcf();
                    $bcf->setValue($value);
                    $bcf->setFemme($femme);
                    $bcf->setCreatedDate($dateCreation);
                    $bcf->setUser($user);
                    $this->_em->persist($bcf);
                    $this->_em->flush();
                    setMessages('Operation effectuée avec succes.', 'success');
                } catch (DBALException $e) {
                    setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    setMessages($e->getMessage(), 'danger');
                    redirect('delivrance/add_refer');
                }
            }

            redirect('home/home');
        }
    } 

}


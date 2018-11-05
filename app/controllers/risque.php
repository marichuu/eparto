<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @package Risque
 * @category Module
 */
class Risque extends CI_Controller {

    private $_em;
    private $_table;

    public function __construct() {
        parent::__construct();
        if(!logged_in())
            redirect ('auth/login');
        $this->_em = $this->doctrine->em;
        $this->_table = "risque";
    }

    public function index() {
        // les risques en cours d'accouchement
        $risques = $this->_em->getRepository('Entity\\Risque')->findBy(array('status'=>1), array('id'=>'asc'));
        $data['risques'] = $risques; 
        $this->twig->display("risque/index.html.twig", $data);
    }

    public function add() {
        $nb_risque = 0; 
        $id = str_replace(' ', '+', $_GET['xl']); 
        if($id=="") redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme',(int)decrypter($id));
        $data['risque'] = $risque = $this->_em->getRepository('Entity\\Risque')->findOneBy(array('femme'=>$femme->getId()));
        if ($risque!=null) $nb_risque = 1;
        $data['nb_risque'] = $nb_risque;
        $this->twig->display("home/risque.html.twig", $data);
    }

    public function create() {
        if ($_POST) {
            $config = array(
                forme_rules('taille', 'Taille', 'trim|required'),
            );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run('add')) {
                if (!validation_errors() == '') {
                    $msg = array('insert' => validation_errors());
                    setMessages($msg, 'danger');
                }
            } else {
                try {
                    $taille = $this->input->post('taille');
                    $hemoragie = $this->input->post('hemoragie');
                    $terme = $this->input->post('terme');
                    $cpn = $this->input->post('cpn');
                    $nb_cpn = $this->input->post('nb_cpn');
                    $cesa_dernier_acc = $this->input->post('cesa_dernier_acc');
                    $presentation = $this->input->post('presentation');
                    $dernier_enfant = $this->input->post('dernier_enfant');
                    $dateCreation = new DateTime();
                    $femme_id = $this->input->post('femme_id');
                    $femme = $this->_em->find('Entity\\Femme', $femme_id);
                            
                    $risque = new Entity\Risque();
                    $risque->setTaille($taille);
                    $risque->setHemoragie($hemoragie);
                    $risque->setTerme($terme);
                    $risque->setCpn($cpn);
                    $risque->setNbCpn($nb_cpn);
                    $risque->setCesarienneDernierAccouchement($cesa_dernier_acc);
                    $risque->setPresentation($presentation);
                    $risque->setDernierEnfant($dernier_enfant);
                    $risque->setCreatedDate($dateCreation);
                    $risque->setFemme($femme);
                    
                    $this->_em->persist($risque);
                    $this->_em->flush();
                    setMessages('Operation effectuée avec succes.', 'success');
                } catch (DBALException $e) {
                    //setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    setMessages($e->getMessage(), 'danger');
                    redirect('risque/add');
                }
            }

            redirect('home/home');
        }
    }

   

}

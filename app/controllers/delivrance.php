<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @package Delivrance
 * @category Accouchement
 */
class Delivrance extends CI_Controller {

    private $_em;
    private $_table;

    public function __construct() {
        parent::__construct();
        if(!logged_in())
            redirect ('auth/login');
        $this->_em = $this->doctrine->em;
        $this->_table = "delivrance";
    }

    public function index() {
        // les delivrances
        $delivrances = $this->_em->getRepository('Entity\\Delivrance')->findBy(array('status'=>1), array('id'=>'asc'));
        $data['delivrances'] = $delivrances; 
        $this->twig->display("delivrance/index.html.twig", $data);
    }

    public function add() {
        $id = str_replace(' ', '+', $_GET['xl']); 
        if($id=="") redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme',(int)decrypter($id));
        $this->twig->display("home/delivrance.html.twig", $data);
    }

    public function create() {
        if ($_POST) {
            $config = array(
                forme_rules('date', 'Date', 'trim|required'),
                forme_rules('heure', 'Heure', 'trim|required'),
            );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run('add')) {
                if (!validation_errors() == '') {
                    $msg = array('insert' => validation_errors());
                    setMessages($msg, 'danger');
                }
            } else {
                try {
                    $date = $this->input->post('date');
                    $type = $this->input->post('type');
                    $etat = $this->input->post('etat');
                    $poids = $this->input->post('poids');
                    $longueurCordon = $this->input->post('longueur_cordon');
                    $petitCote = $this->input->post('petit_cote_cordon');
                    $motif = $this->input->post('motif');
                    $structure = $this->input->post('structure');
                    $reference = $this->input->post('reference');
                    $heure = $this->input->post('heure').":00";
                    $dateDelivrance = $date." ".$heure;
                    $dateCreation = new DateTime();
                    $femme_id = $this->input->post('femme');
                    $femme = $this->_em->find('Entity\\Femme', $femme_id);
                            
                    $delivrance = new Entity\Delivrance();
                    $delivrance->setDate(new \DateTime($dateDelivrance));
                    $delivrance->setEtat($etat);
                    $delivrance->setType($type);
                    $delivrance->setLongeurCordon($longueurCordon);
                    $delivrance->setPetitCoteCordon($petitCote);
                    $delivrance->setEvacuationReference($reference);
                    $delivrance->setPoidsPlacenta($poids);
                    $delivrance->setCreatedDate($dateCreation);
                    $delivrance->setFemme($femme);
                    
                   
                    
                    $this->_em->persist($delivrance);
                    
                   
                    
                    if($reference == 1){
                        $ref = new Entity\Reference();
                        $ref->setMotif($motif);
                        $ref->setStructure($structure);
                        $ref->setFemme($femme);
                        $this->_em->persist($ref);
                    }
                    $this->_em->flush();
                    setMessages('Operation effectuée avec succes.', 'success');
                } catch (DBALException $e) {
                    //setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    setMessages($e->getMessage(), 'danger');
                    redirect('delivrance/add');
                }
            }

            redirect('home/home');
        }
    }   

}

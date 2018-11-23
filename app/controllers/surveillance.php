<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @package Surveillance
 * @category Accouchement
 */
class Surveillance extends CI_Controller {

    private $_em;
    private $_table;

    public function __construct() {
        parent::__construct();
        if (!logged_in())
            redirect('auth/login');
        $this->_em = $this->doctrine->em;
        $this->_table = "surveillance";
    }

    public function index() {
        // les surveillances
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "") {
            redirect('');
        }
        $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $surveillances = $this->_em->getRepository('Entity\\Surveillance')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $data['surveillances'] = $surveillances;
        $this->twig->display("surveillance/index.html.twig", $data);
    }

    public function add() {
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "") {
            redirect('');
        }
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $surveillances = $this->_em->getRepository('Entity\\Surveillance')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $data['surveillances'] = $surveillances;
        $this->twig->display("home/surveillance.html.twig", $data);
    }

    public function create() {
        if ($_POST) {
            $config = array(
                forme_rules('saignement', 'Saignement', 'trim|required'),
                forme_rules('pouls', 'Pouls', 'trim|required'),
                forme_rules('ta', 'Tension Arterielle', 'trim|required'),
                forme_rules('temperature', 'Temperature', 'trim|required'),
            );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run('add')) {
                if (!validation_errors() == '') {
                    $msg = array('insert' => validation_errors());
                    setMessages($msg, 'danger');
                }
            } else {
                try {
                    $saignement = $this->input->post('saignement');
                    $globeSecurite = $this->input->post('globeSecurite');
                    $pouls = $this->input->post('pouls');
                    $ta = $this->input->post('ta');
                    $temperature = $this->input->post('temperature');
                    $traitement = $this->input->post('traitement');
                    $observation = $this->input->post('observation');
                    $dateCreation = new DateTime();
                    $user = findUser();
                    $femme_id = $this->input->post('femme_id');
                    $femme = $this->_em->find('Entity\\Femme', $femme_id);

                    $surveillance = new Entity\Surveillance();
                    $surveillance->setFemme($femme);
                    $surveillance->setCreatedDate($dateCreation);
                    $surveillance->setSaignement($saignement);
                    $surveillance->setUser($user);
                    $surveillance->setGlobeSecurite($globeSecurite);
                    $surveillance->setPouls($pouls);
                    $surveillance->setTa($ta);
                    $surveillance->setTemperature($temperature);
                    $surveillance->setTraitement($traitement);
                    $surveillance->setObservation($observation);

                    $this->_em->persist($surveillance);
                    $this->_em->flush();

                    
                    $surveillances = $this->_em->getRepository('Entity\\Surveillance')->findBy(array('femme' => $femme), array('id' => 'asc'));
                    $data['femme'] = $femme;;
                    $data['surveillances'] = $surveillances;
                    

                    setMessages('Operation effectuée avec succes.', 'success');
                } catch (DBALException $e) {
                    //setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    setMessages($e->getMessage(), 'danger');
                    redirect('surveillance/add');
                }
            }

            $this->twig->display("home/surveillance.html.twig", $data);
        }
    }

}

<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @package Femme
 * @category Module
 */
class Femme extends CI_Controller {

    private $_em;
    private $_table;

    public function __construct() {
        parent::__construct();
        if(!logged_in())
            redirect ('auth/login');
        $this->_em = $this->doctrine->em;
        $this->_table = "femme";
    }

    public function index() {
        // les femmes en cours d'accouchement
        $femmes = $this->_em->getRepository('Entity\\Femme')->findBy(array('status'=>1), array('id'=>'desc'));
        $data['femmes'] = $femmes; 
        $this->twig->display("femme/index.html.twig", $data);
    }

    public function add() {
        
        $this->twig->display("femme/create.html.twig");
    }

    public function create() {
        if ($_POST) {
            $config = array(
                forme_rules('nom', 'Nom', 'trim|required'),
                forme_rules('prenom', 'Prenom', 'trim|required'),
                forme_rules('age', 'Age', 'trim|required'),
            );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run('add')) {
                if (!validation_errors() == '') {
                    $msg = array('insert' => validation_errors());
                    setMessages($msg, 'danger');
                }
            } else {
                try {
                    $age = $this->input->post('age');
                    $nom = $this->input->post('nom');
                    $prenom = $this->input->post('prenom');
                    $mari = $this->input->post('nom_mari');
                    $village = $this->input->post('village');
                    $nb_grossesse = $this->input->post('nb_grossesse');
                    $nb_parite = $this->input->post('nb_parite');
                    $nb_enfant_vivant = $this->input->post('nb_enfant_vivant');
                    $nb_avortement = $this->input->post('nb_avortement');
                    $nb_iig = $this->input->post('nb_iig');
                    $pde = $this->input->post('pde');
                    $user = findUser();
                    $structure = $user->getStructure();
                    $motif = $this->input->post('motif');
                    $rupture_membrane = $this->input->post('rupture_membrane');
                    $date_entree = $this->input->post('date_entree');
                    $heure_entree = $this->input->post('heure_entree').":00";
                    $date_travail = $this->input->post('date_travail');
                    $heure_travail = $this->input->post('heure_travail').":00";
                    if($rupture_membrane == 1){
                        $date_rupture = $this->input->post('date_rupture');
                        $heure_rupture = $this->input->post('heure_rupture').":00";
                    }
                    
                    $femme = new Entity\Femme();
                    $femme->setAge($age);
                    $femme->setNom($nom);
                    $femme->setPrenom($prenom);
                    $femme->setVillage($village);
                    $femme->setMari($mari);
                    $femme->setNbGrossesse($nb_grossesse);
                    $femme->setNbParite($nb_parite);
                    $femme->setNbAvortement($nb_avortement);
                    $femme->setNbEnfantVivant($nb_enfant_vivant);
                    $femme->setNbIig($nb_iig);
                    $femme->setStatus(1);
                    $femme->setMotif($motif);
                    $femme->setPde($pde);
                    $femme->setStructure($structure);
                    $femme->setUser($user); 
                    $femme->setDateEntree(new \DateTime($date_entree." ".$heure_entree));
                    if($rupture_membrane == 1)   
                        $femme->setHeureRuptureMembrane(new \DateTime($date_rupture." ".$heure_rupture));
                    $femme->setDateDebutTravail(new \DateTime($date_travail." ".$heure_travail));
                    
                    $this->_em->persist($femme);
                    $this->_em->flush();
                    setMessages('Operation effectuée avec succes.', 'success');
                } catch (DBALException $e) {
                    setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    redirect('home/home');
                }
            }

            redirect('home/home');
        }
    }

    public function edit() {
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "")
            redirect('');
        $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $data['femme'] = $femme;
        $this->twig->display("femme/edit.html.twig", $data);
    }

    public function update() {
        if ($_POST) {
            $config = array(
                forme_rules('nom', 'Nom', 'trim|required'),
                forme_rules('prenom', 'Prenom', 'trim|required'),
                forme_rules('age', 'Age', 'trim|required'),
            );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run('edit')) {
                if (!validation_errors() == '') {
                    $msg = array('update' => validation_errors());
                    setMessages($msg, 'danger');
                }
            } else {
                try {

                   $age = $this->input->post('age');
                    $nom = $this->input->post('nom');
                    $prenom = $this->input->post('prenom');
                    $mari = $this->input->post('nom_mari');
                    $village = $this->input->post('village');
                    $nb_grossesse = $this->input->post('nb_grossesse');
                    $nb_parite = $this->input->post('nb_parite');
                    $nb_enfant_vivant = $this->input->post('nb_enfant_vivant');
                    $nb_avortement = $this->input->post('nb_avortement');
                    $nb_iig = $this->input->post('nb_iig');
                    $pde = $this->input->post('pde');
                    $user = findUser();
                    $structure = $user->getStructure();
                    $motif = $this->input->post('motif');
                    $rupture_membrane = $this->input->post('rupture_membrane');
                    $date_entree = $this->input->post('date_entree');
                    $heure_entree = $this->input->post('heure_entree').":00";
                    $date_travail = $this->input->post('date_travail');
                    $heure_travail = $this->input->post('heure_travail').":00";
                    if($rupture_membrane == 1){
                        $date_rupture = $this->input->post('date_rupture');
                        $heure_rupture = $this->input->post('heure_rupture').":00";
                    }

                    $femme = $this->_em->find('Entity\\Femme', (int) $this->input->post('id'));
                    $femme->setAge($age);
                    $femme->setNom($nom);
                    $femme->setPrenom($prenom);
                    $femme->setVillage($village);
                    $femme->setMari($mari);
                    $femme->setNbGrossesse($nb_grossesse);
                    $femme->setNbParite($nb_parite);
                    $femme->setNbAvortement($nb_avortement);
                    $femme->setNbEnfantVivant($nb_enfant_vivant);
                    $femme->setNbIig($nb_iig);
                    $femme->setPde($pde);
                    $femme->setStatus(1);
                    $femme->setMotif($motif);
                    $femme->setStructure($structure);
                    $femme->setUser($user); 
                    $femme->setDateEntree(new \DateTime($date_entree." ".$heure_entree));
                    if($rupture_membrane == 1) 
                        $femme->setHeureRuptureMembrane(new \DateTime($date_rupture." ".$heure_rupture));
                    $femme->setDateDebutTravail(new \DateTime($date_travail." ".$heure_travail));
                    $this->_em->flush();
                    setMessages('Operation effectuée avec succes.', 'success');
                } catch (DBALException $e) {
                    setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    redirect('femme/edit');
                }
            }

            redirect('femme');
        }
    }

}

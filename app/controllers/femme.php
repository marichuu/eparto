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
                    $user = findUser();
                    $structure = $user->getStructure();
                    $motif = $this->input->post('motif');
                    $date_entree = $this->input->post('date_entree');
                    $heure_entree = $this->input->post('heure_entree').":00";
                    $date_travail = $this->input->post('date_travail');
                    $heure_travail = $this->input->post('heure_travail').":00";
                    $date_rupture = $this->input->post('date_rupture');
                    $heure_rupture = $this->input->post('heure_rupture').":00";
                    
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
                    $femme->setStructure($structure);
                    $femme->setDateEntree(new \DateTime($date_entree." ".$heure_entree));
                    $femme->setDateDebutTravail(new \DateTime($date_travail." ".$heure_travail));
                    $femme->setHeureRuptureMembrane(new \DateTime($date_rupture." ".$heure_rupture));
                    
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
        $data['classes'] = $this->_em->getRepository('Entity\\Classe')->findBy(array(), array('id'=>'asc'));
        $data['filieres'] = $this->_em->getRepository('Entity\\Filiere')->findBy(array(), array('id'=>'asc'));
        $this->twig->display("femme/edit.html.twig", $data);
    }

    public function update() {
        if ($_POST) {
            $config = array(
               forme_rules('matricule', 'Matricule', 'trim|required|unique[femme.matricule.' . $this->input->post('matricule_old', TRUE) . ']|xss_clean'),
                forme_rules('nom', 'Nom', 'trim|required'),
                forme_rules('prenom', 'Prenom', 'trim|required'),
                forme_rules('classe', 'Classe', 'trim|required'),
		forme_rules('filiere', 'Filiere', 'trim|required'),
            );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run('edit')) {
                if (!validation_errors() == '') {
                    $msg = array('update' => validation_errors());
                    setMessages($msg, 'danger');
                }
            } else {
                try {

                    $matricule = $this->input->post('matricule');
                    $nom = $this->input->post('nom');
                    $prenom = $this->input->post('prenom');
	  	    $classe = $this->_em->find('Entity\\Classe',(int)$this->input->post('classe')); 
 		    $filiere = $this->_em->find('Entity\\Filiere',(int)$this->input->post('filiere')); 

                    $femme = $this->_em->find('Entity\\Femme', (int) $this->input->post('id'));
                    $femme->setMatricule($matricule);
                    $femme->setNom($nom);
                    $femme->setPrenom($prenom);
                    $femme->setClasse($classe);
		    $femme->setFiliere($filiere);
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

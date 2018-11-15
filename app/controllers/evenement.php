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
        $femmes = $this->_em->getRepository('Entity\\Femme')->findBy(array('status' => 1), array('id' => 'desc'));
        $data['femmes'] = $femmes;
        $this->twig->display("evenement/index.html.twig", $data);
    }

    public function add_bcf() {
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "")
            redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $data['bcfs'] = $this->_em->getRepository('Entity\\Bcf')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $this->twig->display("evenement/bcf.html.twig", $data);
    }

    public function add_pde() {
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "")
            redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $data['pdes'] = $this->_em->getRepository('Entity\\Pde')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $this->twig->display("evenement/pde.html.twig", $data);
    }

    public function add_col() {
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "")
            redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $data['cols'] = $this->_em->getRepository('Entity\\Col')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $this->twig->display("evenement/col.html.twig", $data);
    }

    public function add_contraction() {
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "")
            redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $data['contractions'] = $this->_em->getRepository('Entity\\Contraction')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $this->twig->display("evenement/contraction.html.twig", $data);
    }

    public function add_medicament() {
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "")
            redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $data['medicaments'] = $this->_em->getRepository('Entity\\Medicament')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $this->twig->display("evenement/medicament.html.twig", $data);
    }

    public function add_ocytocine() {
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "")
            redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $data['ocytocines'] = $this->_em->getRepository('Entity\\Ocytocine')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $this->twig->display("evenement/ocytocine.html.twig", $data);
    }

    public function add_pouls_ta() {
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "")
            redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $data['poulsTa'] = $this->_em->getRepository('Entity\\PoulsTa')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $this->twig->display("evenement/pouls_ta.html.twig", $data);
    }

    public function add_temperature() {
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "")
            redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $data['temperatures'] = $this->_em->getRepository('Entity\\Temperature')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $this->twig->display("evenement/temperature.html.twig", $data);
    }

    public function add_urine() {
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "")
            redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $data['urines'] = $this->_em->getRepository('Entity\\Urine')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $this->twig->display("evenement/urine.html.twig", $data);
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
                    redirect('delivrance/add_bcf');
                }
            }

            redirect('home/home');
        }
    }

    public function pde() {
        if ($_POST) {
            $config = array(
                forme_rules('value', 'Liquide amniotique', 'trim|required'),
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
                    $chevauchement = $this->input->post('chevauchement');
                    $dateCreation = new DateTime();
                    $femme_id = $this->input->post('femme_id');
                    $femme = $this->_em->find('Entity\\Femme', $femme_id);
                    $user = findUser();

                    $pde = new Entity\Pde();
                    $pde->setValue($value);
                    $pde->setChevauchement($chevauchement);
                    $pde->setFemme($femme);
                    $pde->setCreatedDate($dateCreation);
                    $pde->setUser($user);
                    $this->_em->persist($pde);
                    $this->_em->flush();
                    setMessages('Operation effectuée avec succes.', 'success');
                } catch (DBALException $e) {
                    setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    setMessages($e->getMessage(), 'danger');
                    redirect('delivrance/add_pde');
                }
            }

            redirect('home/home');
        }
    }

    public function col() {
        if ($_POST) {
            $config = array(
                forme_rules('col', 'Col', 'trim|required'),
            );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run('add')) {
                if (!validation_errors() == '') {
                    $msg = array('insert' => validation_errors());
                    setMessages($msg, 'danger');
                }
            } else {
                try {

                    $col = $this->input->post('col');
                    $descente_tete = $this->input->post('descente_tete');
                    $dateCreation = new DateTime();
                    $femme_id = $this->input->post('femme_id');
                    $femme = $this->_em->find('Entity\\Femme', $femme_id);
                    $user = findUser();

                    $colDescenteTete = new Entity\Col();
                    $colDescenteTete->setCol($col);
                    $colDescenteTete->setDescenteTete($descente_tete);
                    $colDescenteTete->setFemme($femme);
                    $colDescenteTete->setCreatedDate($dateCreation);
                    $colDescenteTete->setUser($user);
                    $this->_em->persist($colDescenteTete);
                    $this->_em->flush();
                    setMessages('Operation effectuée avec succes.', 'success');
                } catch (DBALException $e) {
                    setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    setMessages($e->getMessage(), 'danger');
                    redirect('delivrance/add_col');
                }
            }

            redirect('home/home');
        }
    }

    public function contraction() {
        if ($_POST) {
            $config = array(
                forme_rules('value', 'Contraction', 'trim|required'),
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

                    $contraction = new Entity\Contraction();
                    $contraction->setValue($value);
                    $contraction->setFemme($femme);
                    $contraction->setCreatedDate($dateCreation);
                    $contraction->setUser($user);
                    $this->_em->persist($contraction);
                    $this->_em->flush();
                    setMessages('Operation effectuée avec succes.', 'success');
                } catch (DBALException $e) {
                    setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    setMessages($e->getMessage(), 'danger');
                    redirect('delivrance/add_contraction');
                }
            }

            redirect('home/home');
        }
    }

    public function medicament() {
        if ($_POST) {
            $config = array(
                forme_rules('value', 'Medicament', 'trim|required'),
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

                    $medicament = new Entity\Medicament();
                    $medicament->setValue($value);
                    $medicament->setFemme($femme);
                    $medicament->setCreatedDate($dateCreation);
                    $medicament->setUser($user);
                    $this->_em->persist($medicament);
                    $this->_em->flush();
                    setMessages('Operation effectuée avec succes.', 'success');
                } catch (DBALException $e) {
                    setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    setMessages($e->getMessage(), 'danger');
                    redirect('delivrance/add_medicament');
                }
            }

            redirect('home/home');
        }
    }

    public function ocytocine() {
        if ($_POST) {
            $config = array(
                forme_rules('unite', 'Unite par Litre', 'trim|required'),
                forme_rules('goutte', 'Goutte par minute', 'trim|required'),
            );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run('add')) {
                if (!validation_errors() == '') {
                    $msg = array('insert' => validation_errors());
                    setMessages($msg, 'danger');
                }
            } else {
                try {

                    $unite = $this->input->post('unite');
                    $goutte = $this->input->post('goutte');
                    $dateCreation = new DateTime();
                    $femme_id = $this->input->post('femme_id');
                    $femme = $this->_em->find('Entity\\Femme', $femme_id);
                    $user = findUser();

                    $ocytocine = new Entity\Ocytocine();
                    $ocytocine->setUnite($unite);
                    $ocytocine->setGoutte($goutte);
                    $ocytocine->setFemme($femme);
                    $ocytocine->setCreatedDate($dateCreation);
                    $ocytocine->setUser($user);
                    $this->_em->persist($ocytocine);
                    $this->_em->flush();
                    setMessages('Operation effectuée avec succes.', 'success');
                } catch (DBALException $e) {
                    setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    setMessages($e->getMessage(), 'danger');
                    redirect('delivrance/add_ocytocine');
                }
            }

            redirect('home/home');
        }
    }

    public function poulsTa() {
        if ($_POST) {
            $config = array(
                forme_rules('pouls', 'Pouls', 'trim|required'),
                forme_rules('ta', 'TA', 'trim|required'),
            );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run('add')) {
                if (!validation_errors() == '') {
                    $msg = array('insert' => validation_errors());
                    setMessages($msg, 'danger');
                }
            } else {
                try {

                    $pouls = $this->input->post('pouls');
                    $ta = $this->input->post('ta');
                    $dateCreation = new DateTime();
                    $femme_id = $this->input->post('femme_id');
                    $femme = $this->_em->find('Entity\\Femme', $femme_id);
                    $user = findUser();

                    $poulsTa = new Entity\PoulsTa();
                    $poulsTa->setPouls($pouls);
                    $poulsTa->setTa($ta);
                    $poulsTa->setFemme($femme);
                    $poulsTa->setCreatedDate($dateCreation);
                    $poulsTa->setUser($user);
                    $this->_em->persist($poulsTa);
                    $this->_em->flush();
                    setMessages('Operation effectuée avec succes.', 'success');
                } catch (DBALException $e) {
                    setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    setMessages($e->getMessage(), 'danger');
                    redirect('delivrance/add_pouls_ta');
                }
            }

            redirect('home/home');
        }
    }

    public function temperature() {
        if ($_POST) {
            $config = array(
                forme_rules('value', 'Temperature', 'trim|required'),
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

                    $temperature = new Entity\Temperature();
                    $temperature->setValue($value);
                    $temperature->setFemme($femme);
                    $temperature->setCreatedDate($dateCreation);
                    $temperature->setUser($user);
                    $this->_em->persist($temperature);
                    $this->_em->flush();
                    setMessages('Operation effectuée avec succes.', 'success');
                } catch (DBALException $e) {
                    setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    setMessages($e->getMessage(), 'danger');
                    redirect('delivrance/add_temperature');
                }
            }

            redirect('home/home');
        }
    }

    public function urine() {
        if ($_POST) {
            $config = array(
                forme_rules('femme_id', 'Femme', 'trim|required'),
            );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run('add')) {
                if (!validation_errors() == '') {
                    $msg = array('insert' => validation_errors());
                    setMessages($msg, 'danger');
                }
            } else {
                try {

                    $proteinurie = $this->input->post('pro_res');
                    $cetone = $this->input->post('cetone_res');
                    if ($proteinurie == 1){
                        $proteinurie = $this->input->post('proteinurie');
                    }else{
                        $proteinurie = "Négatif";
                    }
                    if ($cetone == 1){
                        $cetone = $this->input->post('cetone');
                    }else{
                        $cetone = "Négatif";
                    }
                    $volume = $this->input->post('volume');
                    $dateCreation = new DateTime();
                    $femme_id = $this->input->post('femme_id');
                    $femme = $this->_em->find('Entity\\Femme', $femme_id);
                    $user = findUser();

                    $urine = new Entity\Urine();
                    $urine->setProteinurie($proteinurie);
                    $urine->setCetone($cetone);        
                    $urine->setVolume($volume);
                    $urine->setFemme($femme);
                    $urine->setCreatedDate($dateCreation);
                    $urine->setUser($user);
                    $this->_em->persist($urine);
                    $this->_em->flush();
                    setMessages('Operation effectuée avec succes.', 'success');
                } catch (DBALException $e) {
                    setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    setMessages($e->getMessage(), 'danger');
                    redirect('delivrance/add_col');
                }
            }

            redirect('home/home');
        }
    }

}

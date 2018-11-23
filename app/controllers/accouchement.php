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
        if ($id == "")
            redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $this->twig->display("accouchement/list.html.twig", $data);
    }

    public function add_accouchement() {

        $nb_accouchement = 0;
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "")
            redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $data['accouchement'] = $accouchement_infos = $this->_em->getRepository('Entity\\Accouchement')->findOneBy(array('femme' => $femme->getId()));
        if ($accouchement_infos != null) {
            $nb_accouchement = 1;

            $nouveauNes = $this->_em->getRepository('Entity\\Nouveau_ne')->findBy(array('accouchement' => $accouchement_infos), array('id' => 'asc'));
            $data['nouveauNes'] = $nouveauNes;
        }
        $data['nb_accouchement'] = $nb_accouchement;

        $this->twig->display("accouchement/infos_accouch.html.twig", $data);
    }

    public function create_infos_accouch() {

        if ($_POST) {
            $config = array(
//                forme_rules('date', 'Date', 'trim|required'),
//                forme_rules('heure', 'heure', 'trim|required'),
                forme_rules('expulsion', 'Expulsion', 'trim|required'),
                forme_rules('mode', 'Mode d\'accouchemnet', 'trim|required'),
                forme_rules('nbreEnfant', 'Nombre d\'Enfants', 'trim|required'),
                forme_rules('nomAccoucheur', 'Nom de l\'accoucheur (se)', 'trim|required'),
            );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run('add')) {
                if (!validation_errors() == '') {
                    $msg = array('insert' => validation_errors());
                    setMessages($msg, 'danger');
                }
            } else {
                try {
                    $femme_id = $this->input->post('femme_id');
                    $femme = $this->_em->find('Entity\\Femme', $femme_id);

                    $nomAccoucheur = $this->input->post('nomAccoucheur');
                    $user = findUser();
                    $dateCreation = new DateTime();
                    $nbreEnfant = $this->input->post('nbreEnfant');
                    $expulsion = $this->input->post('expulsion');
                    $mode = $this->input->post('mode');
                    $traitement = $this->input->post('traitement');

                    $accouchement = new Entity\Accouchement();
                    $accouchement->setNomAccoucheur($nomAccoucheur);
                    $accouchement->setUser($user);
                    $accouchement->setCreatedDate($dateCreation);
                    $accouchement->setFemme($femme);
                    $accouchement->setNbreEnfant($nbreEnfant);
                    $accouchement->setExpulsion($expulsion);
                    $accouchement->setMode($mode);
                    $accouchement->setTraitement($traitement);

                    $this->_em->persist($accouchement);
                    $this->_em->flush();

                    for ($i = 0; $i < $nbreEnfant; $i++) {

                        if ((isset($_POST["date"][$i]) && $_POST["date"][$i] != "") && (isset($_POST["heure"][$i]) && $_POST["heure"][$i] != "")) {
                            $date = $_POST["date"][$i];
                            $heure = $_POST["heure"][$i] . ":00";
//                            var_dump(new \DateTime($date . " " . $heure)); exit();
                            $nouveauNe = new Entity\Nouveau_ne();
                            $nouveauNe->setDateNais(new \DateTime($date . " " . $heure));
                            $nouveauNe->setAccouchement($accouchement);
                            $nouveauNe->setUser($user);
                            $nouveauNe->setCreatedDate($dateCreation);

                            $this->_em->persist($nouveauNe);
                            $this->_em->flush();
                        }
                    }

                    $nouveauNes = $this->_em->getRepository('Entity\\Nouveau_ne')->findBy(array('accouchement' => $accouchement), array('id' => 'asc'));
                    $data['nouveauNes'] = $nouveauNes;
                    $data['femme'] = $femme;
                    $data['accouchement'] = $accouchement;

                    $nb_accouchement = 0;
                    $data['femme'] = $femme;
//                    $data['accouchement'] = $accouchement_infos = $this->_em->getRepository('Entity\\Accouchement')->findOneBy(array('femme' => $femme->getId()));
                    if ($accouchement != null) {
                        $nb_accouchement = 1;

                        $nouveauNes = $this->_em->getRepository('Entity\\Nouveau_ne')->findBy(array('accouchement' => $accouchement), array('id' => 'asc'));
                        $data['nouveauNes'] = $nouveauNes;
                    }

                    $data['nb_accouchement'] = 1;
                    setMessages('Operation effectuée avec succes.', 'success');

                    $this->twig->display("accouchement/infos_accouch.html.twig");
                } catch (DBALException $e) {
                    //setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    setMessages($e->getMessage(), 'danger');
                    redirect('accouchement/add_accouchement');
                }
            }
            redirect("home/home");
        }
    }

    public function add_apgar() {
        $nb_apgar = 0;
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "")
            redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));

        $data['accouchement'] = $accouchement_infos = $this->_em->getRepository('Entity\\Accouchement')->findOneBy(array('femme' => $femme->getId()));
        if ($accouchement_infos != null) {
            $nouveauNes = $this->_em->getRepository('Entity\\Nouveau_ne')->findBy(array('accouchement' => $accouchement_infos), array('id' => 'asc'));
            $data['nouveauNes'] = $nouveauNes;
            $data['nb'] = count($nouveauNes);
        }

        $query = $this->_em->createQuery('SELECT ap FROM Entity\\Accouchement ac, Entity\\Nouveau_ne ne, Entity\\Apgar ap 
                WHERE ap.nouveauNe=ne.id and
                ne.accouchement =ac.id and
                ac.id = :accouch_id');
        $query->setParameters(array(
            'accouch_id' => $accouchement_infos,
        ));
        $apgars = $query->getResult();
        if ($apgars != null) {
            $nb_apgar = 1;
        }
        $data['nb_apgar'] = $nb_apgar;
        $data['apgars'] = $apgars;
        $this->twig->display("accouchement/apgar.html.twig", $data);
    }

    public function create_apgar() {

        if ($_POST) {
//            $this->form_validation->set_rules($config);  var_dump(1); exit();
//            if (!$this->form_validation->run('add')) {
//                if (!validation_errors() == '') {
//                    $msg = array('insert' => validation_errors());
//                    setMessages($msg, 'danger');
//                }
//            } else {
            try {
                $femme_id = $this->input->post('femme_id');
                $pouls_bcs = $this->input->post('pouls_bc');
                $respirations = $this->input->post('respiration');
                $tonuss = $this->input->post('tonus');
                $reflexess = $this->input->post('reflexes');
                $coloration_peaux = $this->input->post('coloration_peau');
                $nouveau_nes = $this->input->post('nouveau_ne_id');

                $user = findUser();
                $dateCreation = new DateTime();
                $tab_apgar = array();

                for ($i = 0; $i < count($nouveau_nes); $i++) {
                    $j = $i + 1;
                    $pouls_bc_ = $pouls_bcs[$j];
                    $pouls_bc = (int) $pouls_bc_[0];
                    $respiration_ = $respirations[$j];
                    $respiration = (int) $respiration_[0];
                    $tonus_ = $tonuss[$j];
                    $tonus = (int) $tonus_[0];
                    $reflexes_ = $reflexess[$j];
                    $reflexes = (int) $reflexes_[0];
                    $coloration_peau_ = $coloration_peaux[$j];
                    $coloration_peau = (int) $coloration_peau_[0];
                    $nouveau_ne_id_ = $nouveau_nes[$j];
                    $nouveau_ne_id = (int) $nouveau_ne_id_[0];
                    $nouveau_ne = $this->_em->find('Entity\\Nouveau_ne', $nouveau_ne_id);
                    $total = $pouls_bc + $respiration + $tonus + $reflexes + $coloration_peau;


                    $apgar = new Entity\Apgar();
                    $apgar->setUser($user);
                    $apgar->setCreatedDate($dateCreation);
                    $apgar->setNouveauNe($nouveau_ne);
                    $apgar->setPoulsBc($pouls_bc);
                    $apgar->setRespiration($respiration);
                    $apgar->setTonus($tonus);
                    $apgar->setReflexes($reflexes);
                    $apgar->setColorationPeau($coloration_peau);
                    $apgar->setTotal($total);

                    $this->_em->persist($apgar);
                    $this->_em->flush();

                    $tab_apgar[$i] = $apgar;
                }
                $data['apgars'] = $tab_apgar;

//var_dump($tab_apgar); exit();

                $data['femme'] = $femme = $this->_em->find('Entity\\Femme', $femme_id);
                setMessages('Operation effectuée avec succes.', 'success');
                $data['nb_apgar'] = 1;
                $this->twig->display("accouchement/apgar.html.twig");
            } catch (DBALException $e) {
                setMessages($e->getMessage(), 'danger');
                redirect('accouchement/add_accouchement');
            }
//            }
            redirect("home/home");
        }
    }

    public function add_prise__en_charge() {
        $nb_prise_en_charge = 0;
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "")
            redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));

        $data['accouchement'] = $accouchement_infos = $this->_em->getRepository('Entity\\Accouchement')->findOneBy(array('femme' => $femme->getId()));
        if ($accouchement_infos != null) {
            $nouveauNes = $this->_em->getRepository('Entity\\Nouveau_ne')->findBy(array('accouchement' => $accouchement_infos), array('id' => 'asc'));
            $data['nouveauNes'] = $nouveauNes;
            $data['nb'] = count($nouveauNes);
        }

        $query = $this->_em->createQuery('SELECT p FROM Entity\\Accouchement ac, Entity\\Nouveau_ne ne, Entity\\Prise_en_charge p 
                WHERE p.nouveauNe=ne.id and
                ne.accouchement =ac.id and
                ac.id = :accouch_id');
        $query->setParameters(array(
            'accouch_id' => $accouchement_infos,
        ));
        $prise_en_charges = $query->getResult();
        if ($prise_en_charges != null) {
            $nb_prise_en_charge = 1;
        }
        $data['nb_prise_en_charge'] = $nb_prise_en_charge;
        $data['prise_en_charges'] = $prise_en_charges;
        $this->twig->display("accouchement/prise_en_charge.html.twig", $data);
    }

    public function create_prise_en_charge() {

        if ($_POST) {
            try {
                $femme_id = $this->input->post('femme_id');
                $temperatures = $this->input->post('temperature');
                $respirations = $this->input->post('respiration');
                $tailles = $this->input->post('taille');
                $perimetreCraniens = $this->input->post('perimetreCranien');
                $reanimations = $this->input->post('reanimation');
                $colorationPeaux = $this->input->post('colorationPeau');
                $miseAuSeins = $this->input->post('miseAuSein');
                $poidss = $this->input->post('poids');
                $malformations = $this->input->post('malformation');
                $typeMalformations = $this->input->post('typeMalformation');
                $observations = $this->input->post('observation');
                $vitk1s = $this->input->post('vitk1');
                $polio0s = $this->input->post('polio0');
                $tetraOphs = $this->input->post('tetraOph');
                $chlorexidinedigluconates = $this->input->post('chlorexidinedigluconate');
                $nouveau_nes = $this->input->post('nouveau_ne_id');

                $user = findUser();
                $dateCreation = new DateTime();
                $tab_prise_en_charge = array();

                for ($i = 0; $i < count($nouveau_nes); $i++) {
                    $j = $i + 1;
                    $temperature = $temperatures[$j][0];
                    $respiration = $respirations[$j][0];
                    $taille= $tailles[$j][0];
                    $perimetreCranien = $perimetreCraniens[$j][0];
                    $reanimation = $reanimations[$j][0];
                    $colorationPeau = $colorationPeaux[$j][0];
                    $miseAuSein = $miseAuSeins[$j][0];
                    $poids = $poidss[$j][0];
                    $malformation = $malformations[$j][0];
                    $typeMalformation = $typeMalformations[$j][0];
                    $observation = $observations[$j][0];
                    $vitk1 = $vitk1s[$j][0];
                    $polio0 = $polio0s[$j][0];
                    $tetraOph = $tetraOphs[$j][0];
                    $chlorexidinedigluconate = $chlorexidinedigluconates[$j][0];
                    
                    
                    $nouveau_ne_id_ = $nouveau_nes[$j];
                    $nouveau_ne_id = (int) $nouveau_ne_id_[0];
                    $nouveau_ne = $this->_em->find('Entity\\Nouveau_ne', $nouveau_ne_id);


                    $prise_en_charge = new Entity\Prise_en_charge();
                    $prise_en_charge->setUser($user);
                    $prise_en_charge->setCreatedDate($dateCreation);
                    $prise_en_charge->setNouveauNe($nouveau_ne);
                    $prise_en_charge->setRespiration($respiration);
                    $prise_en_charge->setTemperature($temperature);
                    $prise_en_charge->setTaille($taille);
                    $prise_en_charge->setPerimetreCranien($perimetreCranien);
                    $prise_en_charge->setReanimation($reanimation);
                    $prise_en_charge->setColorationPeau($colorationPeau);
                    $prise_en_charge->setMiseAuSein($miseAuSein);
                    $prise_en_charge->setPoids($poids);
                    $prise_en_charge->setMalformation($malformation);
                    $prise_en_charge->setTypeMalformation($typeMalformation);
                    $prise_en_charge->setObservation($observation);
                    $prise_en_charge->setVitk1($vitk1);
                    $prise_en_charge->setPolio0($polio0);
                    $prise_en_charge->setTetraOph($tetraOph);
                    $prise_en_charge->setChlorexidinedigluconate($chlorexidinedigluconate);
                    
                    $this->_em->persist($prise_en_charge);
                    $this->_em->flush();

                    $tab_prise_en_charge[$i] = $prise_en_charge;
                }
                $data['prise_en_charges'] = $tab_prise_en_charge;

                $data['femme'] = $femme = $this->_em->find('Entity\\Femme', $femme_id);
                setMessages('Operation effectuée avec succes.', 'success');
                $data['nb_apgar'] = 1;
                $this->twig->display("accouchement/apgar.html.twig");
            } catch (DBALException $e) {
                setMessages($e->getMessage(), 'danger');
                redirect('accouchement/add_accouchement');
            }
//            }
            redirect("home/home");
        }
    }

}

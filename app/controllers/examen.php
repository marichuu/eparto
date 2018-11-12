<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @package Examen
 * @category Module
 */
class Examen extends CI_Controller {

    private $_em;
    private $_table;

    public function __construct() {
        parent::__construct();
        if(!logged_in())
            redirect ('auth/login');
        $this->_em = $this->doctrine->em;
        $this->_table = "examen";
    }

    public function index() {
        // les examens en cours d'accouchement
        $examens = $this->_em->getRepository('Entity\\Examen')->findBy(array('status'=>1), array('id'=>'asc'));
        $data['examens'] = $examens; 
        $this->twig->display("examen/index.html.twig", $data);
    }

    public function add() {
        $nb_exam = 0;
        $id = str_replace(' ', '+', $_GET['xl']); 
        if($id=="") redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme',(int)decrypter($id));
        $data['examen'] = $examen = $this->_em->getRepository('Entity\\Examen')->findOneBy(array('femme'=>$femme->getId()));
        if ($examen!=null) $nb_exam = 1;
        $data['nb_exam'] = $nb_exam;
        $this->twig->display("home/examen.html.twig", $data);
    }

    public function create() {
        if ($_POST) {
            $config = array(
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
                    $ta = $this->input->post('ta');
                    $pouls = $this->input->post('pouls');
                    $temp = $this->input->post('temp');
                    $hu = $this->input->post('hu');
                    $exam_bcf = $this->input->post('exam_bcf');
                    $contraction = $this->input->post('contraction');
                    $pde = $this->input->post('pde');
                    $dateCreation = new DateTime();
                    $femme_id = $this->input->post('femme_id'); 
                    $autreFacteurRisque = $this->input->post('autre_facteur_risque');
                    $femme = $this->_em->find('Entity\\Femme', $femme_id);
                    $user = findUser();
                            
                    $examen = new Entity\Examen();
                    $examen->setTa($ta);
                    $examen->setPouls($pouls);
                    $examen->setTemperature($temp);
                    $examen->setHu($hu);
                    $examen->setExamenBcf($exam_bcf);
                    $examen->setContractions($contraction);
                    $examen->setPde($pde);
                    $examen->setAutreFacteurRisque($autreFacteurRisque);
                    $examen->setCreatedDate($dateCreation);
                    $examen->setFemme($femme);
                    $examen->setUser($user);
                    
                    $this->_em->persist($examen);
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

   

}

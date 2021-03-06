<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
        $femmes = $this->_em->getRepository('Entity\\Femme')->findBy(array('status' => '1'), array('id' => 'desc'));
        $data['femmes'] = $femmes;
        $this->twig->display("home/index.html.twig", $data);
    }

    public function postPartum() {
        // Post partum
        $data['femmes'] = $this->_em->getRepository('Entity\\Femme')->findBy(array('status' => '2'), array('id' => 'desc'));
        $this->twig->display("home/post.html.twig", $data);
    }

    public function archive() {
        // Archives
        $data['femmes'] = $this->_em->getRepository('Entity\\Femme')->findBy(array('status' => '3'), array('id' => 'desc'));
        $this->twig->display("home/archive.html.twig", $data);
    }

    public function addData() {
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "")
            redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $data['examen'] = $examen = $this->_em->getRepository('Entity\\Examen')->findOneBy(array('femme' => $femme));
        $data['bcf'] = $this->_em->getRepository('Entity\\Bcf')->findOneBy(array('femme' => $femme), array('id' => 'desc'));
        $data['pde'] =  $pde = $this->_em->getRepository('Entity\\Pde')->findOneBy(array('femme' => $femme), array('id' => 'desc'));
        $data['col'] =  $col = $this->_em->getRepository('Entity\\Col')->findOneBy(array('femme' => $femme), array('id' => 'desc'));
        $data['contraction'] = $contraction =  $this->_em->getRepository('Entity\\Contraction')->findOneBy(array('femme' => $femme), array('id' => 'desc'));
        $data['medicament'] = $medicament =  $this->_em->getRepository('Entity\\Medicament')->findOneBy(array('femme' => $femme), array('id' => 'desc'));
        $data['ocytocine'] = $ocytocine =  $this->_em->getRepository('Entity\\Ocytocine')->findOneBy(array('femme' => $femme), array('id' => 'desc'));
        $data['poulsta'] = $poulsta =  $this->_em->getRepository('Entity\\PoulsTa')->findOneBy(array('femme' => $femme), array('id' => 'desc'));
        $data['temp'] = $temp = $this->_em->getRepository('Entity\\Temperature')->findOneBy(array('femme' => $femme), array('id' => 'desc'));
        $data['urine'] = $urine = $this->_em->getRepository('Entity\\Urine')->findOneBy(array('femme' => $femme), array('id' => 'desc'));
        $data['risque'] = $risque = $this->_em->getRepository('Entity\\Risque')->findOneBy(array('femme' => $femme));
        if ($risque != null)
            $data['nb_risque'] = 1;
        if ($examen != null)
            $data['nb_exam'] = 1;

        //calcul des dates
        $d1 = new DateTime('2009-06-10 20:25:10');
        $d2 = new DateTime('2009-06-10 20:30:00');
        $diff = $d1->diff($d2);

         $data['nb_jours'] = $diff->i;

        $this->twig->display("home/data.html.twig", $data);
    }

    public function partographe() {
        $id = str_replace(' ', '+', $_GET['xl']);
        if ($id == "")
            redirect('');
        $data['femme'] = $femme = $this->_em->find('Entity\\Femme', (int) decrypter($id));
        $data['bcfs'] = $this->_em->getRepository('Entity\\Bcf')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $data['pdes'] = $this->_em->getRepository('Entity\\Pde')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $data['cols'] = $this->_em->getRepository('Entity\\Col')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $data['contractions'] = $this->_em->getRepository('Entity\\Contraction')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $data['medicaments'] = $this->_em->getRepository('Entity\\Medicament')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $data['ocytocines'] = $this->_em->getRepository('Entity\\Ocytocine')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $data['poulsTa'] = $this->_em->getRepository('Entity\\PoulsTa')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $data['temperatures'] = $this->_em->getRepository('Entity\\Temperature')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $data['urines'] = $this->_em->getRepository('Entity\\Urine')->findBy(array('femme' => $femme), array('id' => 'asc'));
        $data['examen'] = $examen = $this->_em->getRepository('Entity\\Examen')->findOneBy(array('femme' => $femme));
        $data['risque'] = $risque = $this->_em->getRepository('Entity\\Risque')->findOneBy(array('femme' => $femme));
        if ($risque != null)
            $data['nb_risque'] = 1;
        if ($examen != null)
            $data['nb_exam'] = 1;
        $this->twig->display("home/partographe.html.twig", $data);
    }

}

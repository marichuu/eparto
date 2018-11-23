<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\DBALException;
 
/**
 *
 * @package User
 * @category Module
 */
class Users extends CI_Controller {

    private $_em;
    
    public function __construct(){
        
        parent::__construct();
//        if(!logged_in())
//            redirect ('auth/login');
        $this->_em = $this->doctrine->em;
       

        
        //$this->usermanager->on_invalid_session(site_url('login'));
        
        
    }

    public function index() {
        $data['users'] = $this->_em->getRepository('Entity\\User')->findBy(array(), array('email'=>'asc'));
       // $data['profils'] = $this->_em->getRepository('Entity\\Profil')->findBy(array(), array('id'=>'asc')); 
        $this->twig->display("user/index.html.twig", $data);
    } 
    
    public function add(){
        //$data['users'] = $this->_em->getRepository('Entity\\User')->findBy(array(), array('email'=>'asc'));
        //$data['profils'] = $this->_em->getRepository('Entity\\Profil')->findBy(array(), array('id'=>'asc')); 
        $this->twig->display("user/create.html.twig");
    }

    public function create() { 
        if ($_POST) {
            $config = array(
                forme_rules('email', 'email', 'trim|required'),
                forme_rules('password', 'password', 'trim|required'),
                forme_rules('password1', 'password1', 'trim|required'),
//                forme_rules('password', 'Mot de passe', 'trim|required|min_length[6]|password_format|xss_clean'),
//                forme_rules('password1', 'Confirmation mot de passe', 'trim|required|min_length[6]|xss_clean'),
                forme_rules('firstName', 'firstName', 'required'),
                forme_rules('lastName', 'lastName', 'trim|required'),
               // forme_rules('profil', 'Profil', 'trim|required'),
            );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run('add')) {
                if (!validation_errors() == '') {
                    $msg = array('insert' => validation_errors());
                    setMessages($msg, 'danger');
                } 
            } else {
                try {
                    $this->load->library('authme');
                    $email= $this->input->post('email');
                    $password = $this->authme->HashPass($this->input->post('password'));
                    $firstName= $this->input->post('firstName');
                    $lastName= $this->input->post('lastName');
                    $phone = $this->input->post('phone');
                    $active = $this->input->post('active');
                    $libelle = $this->input->post('libelle_structure');
                    $region = $this->input->post('region');
                    $cercle = $this->input->post('cercle');
                    $commune = $this->input->post('commune');
                   
                    
                  
                    
                    $structure = new Entity\Structure();
                    $structure->setLibelle($libelle);
                    $structure->setRegion($region);
                    $structure->setCercle($cercle);
                    $structure->setCommune($commune);
                    $structure->setStatus(1);
                    $this->_em->persist($structure);
                    
                    $user = new Entity\User();
                    $user->setEmail($email) ;
                    $user->setPassword($password) ;
                    $user->setFirstName($firstName) ;
                    $user->setLastName($lastName) ;
                    $user->setPhone($phone);
                    $user->setStructure($structure);
                     // $user->set
                     if(isset($active)) $user->setValid($active);
                    $user->setAttemptNumber(0);
                    $user->setStatus(1);
                    $this->_em->persist($user);
                    $this->_em->flush();  
                   
                    setMessages('Operation effectuée avec succes.', 'success');
                    redirect('home/home');
                } catch (DBALException $e) {
                    //$this->_em->setFlash('flash_key',"Add not done: " . $e->getMessage());
                       //setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    setMessages($e->getMessage(), 'danger');
                    redirect('users/add');
                }
            }
            
            redirect('users');
        }
    } 
     
    public function edit() {
        $data['users'] = $this->_em->getRepository('Entity\\User')->findBy(array(), array('email'=>'asc'));
       // $data['profils'] = $this->_em->getRepository('Entity\\Profil')->findBy(array(), array('id'=>'asc'));
        $data['arr'] = array(9,10,11);
        $id = str_replace(' ', '+', $_GET['xl']); 
        if($id=="") redirect('');
        $user = $this->_em->find('Entity\\User',(int)decrypter($id));
        //$data['profils_selected'] = $user->getProfils();
          
        $data['user'] = $user;
        
        $this->twig->display("user/edit.html.twig", $data);
    } 
    
    public function update() {
         if ($_POST) {
            $config = array( 
                forme_rules('email', 'Email', 'trim|required'),
                forme_rules('password', 'Password', 'trim'),
                forme_rules('password1', 'Confirm Password', 'trim'),
                forme_rules('firstName', 'First Name', 'trim|required'),
                forme_rules('lastName', 'Last Name', 'trim|required'),
               // forme_rules('profil', 'Profil', 'trim|required'),
            );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run('edit')) {
                if (!validation_errors() == '') {
                    $msg = array('update' => validation_errors());
                    setMessages($msg, 'danger');
                } 
            } else {
                try {
                    $this->load->library('authme');
                    $email= $this->input->post('email');
                    if($this->input->post('password') !="")
                        $password = $this->authme->HashPass($this->input->post('password'));
                    $firstName= $this->input->post('firstName');
                    $lastName= $this->input->post('lastName');
                    $phone = $this->input->post('phone');
                    $active = $this->input->post('active');
                    $banir = $this->input->post('banir');
                    
                    
                    
                    $user = $this->_em->find('Entity\\User',(int)$this->input->post('id'));
                   // $user->setStructure($structure);
                     
                    $user->setEmail($email) ;
                    $user->setPassword($password) ;
                    $user->setFirstName($firstName) ;
                    $user->setLastName($lastName) ;
                    $user->setPhone($phone);
                    if (!is_null($active)) 
                      $user->setValid($active);
                    $user->setBanir($banir);
                    
                   
                    $this->_em->flush();  
                     setMessages('Operation effectuée avec succes.', 'success');
                } catch (DBALException $e) {
                    setMessages('Erreur lors de l\'enregistrement. ', 'danger');
                    redirect('users/edit');
                }
            }
            
            redirect('users');
        }
    } 
}

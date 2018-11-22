<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Example Auth controller using Authme
 *
 * @package Authentication
 * @category Libraries
 * @author Gilbert Pellegrom
 * @link http://dev7studios.com
 * @version 1.0
 */
class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('authme_model');
        $this->load->model('user_model');
        $this->load->library('authme');
        $this->load->helper('authme');
        $this->config->load('authme'); 
    }

    public function index() {
        if (!logged_in())
            redirect('auth/login');
        
    }

    /**
     * Login page
     */
    public function login() {
        if (logged_in())
            redirect('home/home');
 
        $this->load->helper('form');
        $data['error'] = false;
        $this->form_validation->set_rules('login', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            if ($this->authme->login(set_value('login'), set_value('password'))) {
            //loadUserRights();
                redirect('home/home');
            } else {
                $data['error'] = 'votre email ou mot de passe est incorrect.';
            }
        }
        $this->twig->display("themes/default/login.html.twig", $data); 
    }

    /**
     * Signup page
     */
    public function signup() {
        if (logged_in())
            redirect('home/home');
         
        $this->load->helper('form');


        $data['message'] = '';
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[2]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('authme_password_min_length') . ']');
        $this->form_validation->set_rules('password_conf', 'Confirm password', 'required|matches[password]');
        $this->form_validation->set_rules('firstName', 'First name', 'trim|required|min_length[2]|xss_clean');
        $this->form_validation->set_rules('lastName', 'Last name', 'trim|required|min_length[2]|xss_clean');
        $this->form_validation->set_rules('phone', 'Phone');
        $this->form_validation->set_rules('structure_id', 'Structure');
        $this->form_validation->set_rules('profile_id', 'Profile');
        if ($this->form_validation->run()) {
            $this->load->library('authme');
            $password = $this->authme->HashPass(set_value('password'));
            if ($id = $this->user_model->create(set_value('email'), $password, set_value('firstName'), set_value('lastName')
                    , set_value('phone'), set_value('profile_id'), set_value('structure_id'))) {
                //$this->agentprofils_model->create($id, set_value('profil_id'));
                $data['message'] = 'Insertion effectuée avec succès';
                $data['style'] = 'notification-success';
                redirect('auth/login');
            } else {
                $data['message'] = 'Erreur lors de l\'enregistrement';
                $data['style'] = 'notification-failed';
            }
        }

        $this->load->library('layout');
        $this->load->view('user/create', $data);
    }

    /**
     * Logout page
     */
    public function logout() {
        if (!logged_in())
            redirect('auth/login');
        // Redirect to your logged out landing page here
        $this->authme->logout('auth/login');
    }

    /**
     * Example dashboard page
     */
    public function dash() {
        if (!logged_in())
            redirect('auth/login');
        echo 'Hi, ' . user('email') . '. You have successfully logged in. <a href="' . site_url('auth/logout') . '">Logout</a>';
    }

    /**
     * Forgot password page
     */
    public function forgot() {
        // Redirect to your logged in landing page here
        if (logged_in())
            redirect('auth/dash');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $data['success'] = false;
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_exists');
        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $this->load->model('Authme_model');
            $user = $this->Authme_model->get_user_by_email($email);
            $slug = md5($user->id . $user->email . date('Ymd'));
            $this->load->library('email');
            $this->email->from('noreply@example.com', 'Example App'); // Change these details
            $this->email->to($email);
            $this->email->subject('Reset your Password');
            $this->email->message('To reset your password please click the link below and follow the instructions:
        ' . site_url('auth/reset/' . $user->id . '/' . $slug) . '
        If you did not request to reset your password then please just ignore this email and no changes will occur.
        Note: This reset code will expire after ' . date('j M Y') . '.');
            $this->email->send();
            $data['success'] = true;
        }
        $this->load->view('auth/forgot_password', $data);
    }

    /**
     * CI Form Validation callback that checks a given email exists in the db
     *
     * @param string $email the submitted email
     * @return boolean returns false on error
     */
    public function email_exists($email) {
        $this->load->model('Authme_model');
        if ($this->Authme_model->get_user_by_email($email)) {
            return true;
        } else {
            $this->form_validation->set_message('email_exists', 'Nous ne pouvons pas trouver ce email dans notre systeme.');
            return false;
        }
    }

    /**
     * Reset password page
     */
    public function reset() {
        $this->twig->display("user/reset.html.twig");
    }

    public function resetPassword() {
        if ($_POST) {
            $config = array(
                forme_rules('current_password', 'Mot de passe actuel', 'trim|required'),
                forme_rules('password', 'Nouveau mot de passe', 'trim|required'),
                forme_rules('password_conf', 'Confirmation mot de passe', 'trim|required'),
            );
            $this->form_validation->set_rules($config);
            if (!$this->form_validation->run('reset')) {
                if (!validation_errors() == '') {
                    $msg = array('update' => validation_errors());
                    setMessages($msg, 'danger');
                    $this->twig->display("user/reset.html.twig");
                }
            } else {
                try {
                    $current_password = $this->input->post('current_password');

                    $user = $this->session->userdata('user');
                    if ($this->authme->login($user->email, $current_password)) {
                        $this->authme->reset_password($user->id, $this->input->post('password'));
                        setMessages('Mot de passe modifié avec succès', 'success');
                    } else {
                        setMessages('Mot de passe incorrect. ', 'danger');
                    }
                } catch (DBALException $e) {
                    setMessages(lang('error_messsage'), 'danger');
                    $this->twig->display("user/create.html.twig", $data);
                }
            }

            redirect('auth/reset');
        }
    }

}

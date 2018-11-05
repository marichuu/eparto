<?php

/**
 * Authme Authentication Library
 *
 * @package Authentication
 * @category Libraries
 */
class Authme_model extends CI_Model {

    public $table;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->config->load('authme');
        $this->table = 'user';
         
    }

    public function get_user($user_id) {
        $query = $this->db->get_where($this->table, array('id' => $user_id));
        if ($query->num_rows())
            return $query->row();
        return false;
    }

    public function get_user_by_email($email) {
        $query = $this->db->get_where($this->table, array('email' => $email, 'valid' => 1, 'banir' => 0));
        if ($query->num_rows())
            return $query->row();
        return false;
    }

    public function create_user($login, $pwd) {
        $data = array(
            'login' => $login,
            'pwd' => $pwd, // Should be hashed
            'created' => date('Y-m-d H:i:s')
        );
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update_user($user_id, $data) {
        $this->db->where('id', $user_id);
        $this->db->update($this->table, $data);
    }

    public function delete_user($user_id) {
        $this->db->delete($this->table, array('id' => $user_id));
    }

}

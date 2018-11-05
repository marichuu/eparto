<?php

/*
 * @package User
 * @category Model
 */
class User_model extends CI_Model {

    public $table;

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->table = 'user';
        
    }

    public function getById($id) {
        $query = $this->db->get_where($this->table, array('id' => $id));
        if ($query->num_rows())
            return $query->row();
        return false;
    }
    
   function read() {
        $this->db->select('id, firstName, lastName, password, email, phone, profile_id')
                ->from('user') 
                ->order_by('id', 'ASC');
                 
        $query = $this->db->get();
        return $query;
    }


    public function get($order_by = 'id', $order = 'asc', $limit = 0, $offset = 0) {
        $this->db->order_by($order_by, $order);
        if ($limit)
            $this->db->limit($limit, $offset);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    public function gets($order_by = 'lastName', $order = 'asc', $limit = 0, $offset = 0) {
         
        $this->db->order_by($order_by, $order);
        if ($limit)
            $this->db->limit($limit, $offset);
        
        $query = $this->db->get($this->table);
        
        $results =  array('' => " - ");
        if ($query->num_rows())
            foreach($query->result() as $row){
                $results[$row->id] = $row->lastName.' '.$row->firstName;
            } 
        return $results;
    }
 
    public function getCount() {
        return $this->db->count_all($this->table);
    }

    public function create( $email, $password, $firstName, $lastName,  $phone, $profile_id, $structure_id) {
        $data = array(
            
            'firstName' => $firstName,
            'lastName' => $lastName,
            'password' => $password,
            'email' => $email,
            'phone' => $phone,
            'profile_id' => $profile_id 
        );
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function get_user_by_email($email) {
        $query = $this->db->get_where($this->table, array('email' => $email));
        if ($query->num_rows())
            return $query->row();
        return false;
     }

    public function update($id, $data) {
        $this->db->where('id', $id);
        if($this->db->update($this->table, $data))
            return true;
        return false;
    }
   
    public function delete($id) {
        $this->db->delete($this->table, array('id' => $id));
    }

     
}

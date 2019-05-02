<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class of User model
 * 
 * @ author Santeri Yritys
 */

class User_model extends CI_Model {
    
    /**
     * Intialise by calling parent constructor of parent class.
     * Create database connection.
     *
     * @param       -    
     * @return      - 
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get asiakas or asiakkaat from database
     *
     * @param       string  $id    User id
     * @return      array (resultset or single row)
     */
    
    public function get_user($id = NULL) {
        if ($id === NULL) {
            $this->db->order_by('astunnus', 'ASC');
            $query = $this->db->get('Asiakas');
            return $query->result_array();
        }
        $query = $this->db->get_where('Asiakas', array('id' => $id));
        return $query->row_array();
    }
    
    /**
     * Insert user to database
     *
     * @param       array  $data    Array of data
     * @return      boolean
     */
    
    public function insert_user($data = NULL) {
        $data['salasana'] = password_hash($data['salasana'], PASSWORD_DEFAULT);
        return $this->db->insert('Asiakas', $data);
    }
    
    /**
     * Get user from database by email and password
     *
     * @param       array  $data    Array of data
     * @return      array  single row or nothing
     */
    
    public function check_user($data = NULL) {
        $this->db->where('astunnus', $data['astunnus']);
        $this->db->or_where('astunnus', $data['astunnus']);
        $query = $this->db->get('Asiakas');
        if ($query->num_rows() !== 0) {
            $record = $query->row_array();
            if (password_verify($data['salasana'], $record['salasana'])) {
                return $query->row_array();
            }
        } else {
            return null;
        }
    }
    
    /**
     * Update user to database
     *
     * @param       array   $data    Array of data
     * @return      boolean
     */
    
    public function update_user($data = NULL) {
        $this->db->where('id', $data['id']);
        return $this->db->update('Asiakas', $data);
    }
    
    /**
     * Update password of user to database
     *
     * @param       array  $data    Array of data
     * @return      boolean
     */
    
    public function update_password($data = NULL) {
        $this->db->where('id', $data['id']);
        $data['salasana'] = password_hash($data['salasana'], PASSWORD_DEFAULT);
        return $this->db->update('Asiakas', $data);
    }
    
    /**
     * Delete user from database
     *
     * @param       string  $id    User id
     * @return      boolean
     */
    
    public function delete_user($id) {
        $this->db->where('id', $id);
        return $this->db->delete('Asiakas');
    }
}
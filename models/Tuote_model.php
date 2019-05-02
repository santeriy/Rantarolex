<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class of User model
 * 
 * @ author Santeri Yritys
 */
 
class Tuote_model extends CI_Model {
    
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
     * Get items from database.
     * 
     *
     * @param       -    
     * @return      array(resultset) 
     */
    
    public function get_items($id = NULL) {
        if ($id === NULL) {
        $this->db->select('kategoria, merkki, malli, hinta, info, Tuote.tuote_id, lisayspva');
        $this->db->from('Kategoria, Tuote, Tuote_kategoria');
        $this->db->where('Tuote.tuote_id=Tuote_kategoria.tuote_id AND Kategoria.kategoria_id=Tuote_kategoria.kategoria_id AND 
                          Kategoria.kategoria_id');
        $this->db->order_by("lisayspva", "DESC");                 

        $query = $this->db->get();
        return $query->result_array();
        }
        $query = $this->db->get_where('Tuote', array('tuote_id' => $id));
        return $query->row_array();
    }
    
    /**
     * Insert item to database.
     * 
     *
     * @param       array $data Array of data    
     * @return      boolean 
     */
    
    public function insert_item($data = NULL) {
        $this->load->helper('url');
        return $this->db->insert('Tuote', $data);
    }
    
    /**
     * Delete item from database.
     * 
     *
     * @param       string $id Learning item id    
     * @return      boolean 
     */
    
    public function delete_item($id = NULL) {
        $this->db->delete('Tuote', array('id' => $id));
        return;
    }
    
    /**
     * Get categories from database
     * 
     *
     * @param       -   
     * @return      @return      array(resultset)
     */
    
    public function get_category() {
        $this->db->select('kategoria');
        $this->db->from('Kategoria');
        $query = $this->db->get();
        return $query->result_array();
    }
}
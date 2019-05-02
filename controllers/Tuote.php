<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class of tuote controller
 * 
 * @author      Santeri Yritys
 */

class Tuote extends CI_Controller {
    
    /**
     * Intialise by calling parent constructor of parent class.
     * Load helpers and model.
     *
     * @param       -    
     * @return      - 
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'url_helper'));
        $this->load->model('tuote_model');
        $this->load->library('session');
    }
    
    /**
     * Do form validations, and call model function in order to add new
     * item to database. After succesful insert forward back to
     * home page.
     * 
     * @param       -    
     * @return      - 
     */
    
    public function add() {
        $data['logged_user'] = $this->session->userdata();
        $data['category'] = $this->tuote_model->get_category();
        $this->load->library('form_validation');
        $data['title'] = 'Lisää uusi kello';
        $this->form_validation->set_rules('hinta', 'Hinta',
        'trim');
        $this->form_validation->set_rules('merkki', 'Merkki');
        $this->form_validation->set_rules('malli', 'Malli');
        $this->form_validation->set_rules('info', 'Info',
        'trim');
        
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('tuote/add');
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'hinta' => $this->input->post('hinta'),
                'merkki' => $this->input->post('merkki'),
                'malli' => $this->input->post('malli'),
                'info' => $this->input->post('info')
            );
            $this->tuote_model->insert_item($data);
            header('Location:' . site_url() );
        }
    }
    
    /**
     * Call Tuote model in order to get item from the database to be displayed
     * in tuote page. Then load corresponding views including header and
     * footer views.
     * 
     * @param       string  $id   tuote id
     * @return  -
     */
    
    public function hae($id = NULL) {
        $data['item'] = $this->tuote_model->get_items($id);
        return $data;
    }
    
    /**
     * Call Tuote models in order to get certain category and
     * certain recipe from the database to be displayed in tuotoe view page.
     * Then load corresponding views including header and footer views.
     * @param   string $id Tuote id
     * @return  -
     */
    
    public function view($id = NULL) {
        $data = $this->hae($id);
        $data['category'] = $this->tuote_model->get_category();
        $data['logged_user'] = $this->session->userdata();
        $this->load->view('templates/header', $data);
        $this->load->view('tuote/view', $data);
        $this->load->view('templates/footer');
    }
    
    /**
     * Call model function in order to delete item from database. 
     * After succesful deletion forward back to home page.
     * 
     * @param       string $id      Learning item id    
     * @return      - 
     */
    
    public function delete($id = NULL) {
        
        $this->tuote_model->delete_item($id);
        header('Location: ' . site_url());
    }
}
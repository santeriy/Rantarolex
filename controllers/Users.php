<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class of Users controller
 * 
 * @ author Santeri Yritys
 */

class Users extends CI_Controller {
    
    /**
     * Initialise by calling parent constructor of parent class
     * 
     * @param   -
     * @return  -
     */
    
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'url_helper'));
        $this->load->model('user_model');
        $this->load->model('tuote_model');
        $this->load->library('session');
    }
    
    /**
     * Call user model in order to get users from database to be displayed
     * in the home page. Then load corresponding views including header and 
     * footer views.
     * 
     * @param   -
     * @return  -
     */
    
    public function index() {
        $data['logged_user'] = $this->session->userdata();
        $data['item'] = $this->tuote_model->get_items();
        $data['category'] = $this->tuote_model->get_category();
        $data['user'] = $this->user_model->get_user();
        $data['first_title'] = 'My account';
        $data['second_title'] = 'List of users';
        $this->load->view('templates/header', $data);
        $this->load->view('/index', $data);
        $this->load->view('templates/footer');
    }
    
    /**
     * Do form validations, and call to User model in order to add new user to
     * database. After succesful insert forward back to home page.
     * 
     * @param   -
     * @return  -
     */
    
    public function register() {
        $data['category'] = $this->tuote_model->get_category();
        $data['title'] = 'Registration';
        $this->form_validation->set_rules(
            'astunnus', 'astunnus', 'required|valid_email|is_unique[Asiakas.astunnus]');
        $this->form_validation->set_rules(
            'as_etu', 'Etunimi','trim|required');
        $this->form_validation->set_rules(
            'as_suku', 'Sukunimi','trim|required');
        $this->form_validation->set_rules(
            'puh', 'postinro','trim|required');
        $this->form_validation->set_rules(
            'postitmp', 'Postitmp','trim|required');
        $this->form_validation->set_rules(
            'as_osoite', 'Osoite','trim|required');
        $this->form_validation->set_rules(
             'salasana', 'Salasana', 'required|min_length[6]');
        $this->form_validation->set_rules(
              'passconf', 'Password Confirmation',
              'required|matches[salasana]');
              
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/register');
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'astunnus' => $this->input->post('astunnus'),
                'as_etu' => $this->input->post('as_etu'),
                'as_suku' => $this->input->post('as_suku'),
                'puh' => $this->input->post('puh'),
                'postinro' => $this->input->post('postinro'),
                'postitmp' => $this->input->post('postitmp'),
                'as_osoite' => $this->input->post('as_osoite'),
                'salasana' => $this->input->post('salasana')
            );
            
            $user = $this->user_model->check_user($data);
            $this->session->set_userdata($user);
            
            $this->user_model->insert_user($data);
            header('Location: '. site_url());
        }
    }
    
    /**
     * Login form validations. After succesful login forward back to home page.
     * 
     * @param   -
     * @return  -
     */
    
    public function login() {
        $data['category'] = $this->tuote_model->get_category();
        $data['title'] = 'Login';
        $this->form_validation->set_rules(
            'astunnus', 'Sähköposti', 'trim|required');
        $this->form_validation->set_rules('salasana', 'Salasana', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/login');
            $this->load->view('templates/footer');
            
        } else {
            $data = array(
                'astunnus' => $this->input->post('astunnus'),
                'salasana' => $this->input->post('salasana')
            );
            $user = $this->user_model->check_user($data);
            if (empty($user)) {
                $data['title'] = 'Login';
                $this->load->view('templates/header', $data);
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            } else {
                $this->session->set_userdata($user);
                header('Location: ' . site_url());
            }
        }
    }
    
    /**
     * Logout and forward to home page.
     * 
     * @param   -
     * @return  -
     */
    
    public function logout() {
        $this->session->sess_destroy();
        header('Location: ' . site_url());
    }
    
    /**
     * Checks if logged user has the same id as the queried user
     * 
     * @param   string  $id     User id
     * @return  array   $data   Array of data
     */
    
    public function is_logged_user($id = NULL) {
        $data['category'] = $this->tuote_model->get_category();
        $data['logged_user'] = $this->session->userdata();
        $data['user'] = $this->user_model->get_user($id);
        if ($data['logged_user']['id'] === $data['user']['id']) {
            return $data;
        } else {
            $data['user']['id'] = NULL;
            return $data;
        }
    }
    
    /**
     * Call user model in order to get user from the database to be displayed
     * in My account page. Then load corresponding views including header and
     * footer views.
     * 
     * @param       string  $id   User id
     * @return  -
     */
    
    public function profile($id = NULL) {
        $data = $this->is_logged_user($id);
        if (!empty($data['user']['id'])) {
            $this->load->view('templates/header', $data);
            $this->load->view('users/profile', $data);
            $this->load->view('templates/footer');
        } else {
            header('Location: ' . site_url());
        }
    }
    
    /**
     * Do form validations and call to User model in order to update user to
     * database. After succesful update forward back to My account page.
     * 
     * @param       string  $id   User id
     * @return  -
     */
    
    public function edit($id = NULL) {
        $data = $this->is_logged_user($id);
        if (!empty($data['user']['id'])) {
            $data['title'] = 'Vaihda sähköpostiosoite: ' . $data['user']['astunnus'];
            
            if ($data['user']['astunnus'] === $this->input->post('astunnus')) {
                $this->form_validation->set_rules(
                    'astunnus', 'astunnus',
                    'trim|required|min_length[6]');
            } else {
                $this->form_validation->set_rules(
                    'astunnus', 'astunnus',
                    'trim|required|min_length[6]|'
                    . 'is_unique[Asiakas.astunnus]');
            }
            
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('users/edit');
                $this->load->view('templates/footer');
            } else {
                $data = array(
                    'id' => $id,
                    'astunnus' => $this->input->post('astunnus'),
                );
                $this->user_model->update_user($data);
                header('Location: ' . site_url() . '/users/' . $id);
            }
        } else {
            header('Location: ' . site_url());
        }
    }
    
    /**
     * Do form validations and call to User model in order to change the
     * password of user to database. After succesful update forward back to
     * My account page.
     * 
     * @param       string  $id   User id
     * @return  -
     */
    
    public function passwd($id = NULL) {
        $data = $this->is_logged_user($id);
        if (!empty($data['user']['id'])) {
            $data['title'] =
                    'Change password for user ' . $data['user']['astunnus'];
            $this->form_validation->set_rules(
                'salasana', 'Salasana', 'required|min_length[6]');
            $this->form_validation->set_rules(
                'passconf',
                'Password Confirmation', 'required|matches[salasana]');
                
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('users/passwd');
                $this->load->view('templates/footer');
            } else {
                $data = array(
                    'id' => $id,
                    'salasana' => $this->input->post('salasana')
                );
                $this->user_model->update_password($data);
                header('Location: ' . site_url() . '/users/' . $id);
            }  
        } else {
            header('Location: '. site_url());
        }
    }
    
    /**
     * Call user model in order to get user from the database. After
     * succesful deletion forward back to home page.
     * 
     * @param   -
     * @return  -
     */
    
    public function delete() {
        $user_id = $this->input->post('id');
        $delete = $this->input->post('delete');
        $data['user'] = $this->user_model->get_user($user_id);
        $data['title'] = 'Edit user ' . $data['user']['astunnus'];
        if ($delete !== 'DELETE') {
            $this->view($user_id);
        } else {
            $this->user_model->delete_user($user_id);
            $this->session->sess_destroy();
            header('Location: '. site_url());
        }
    }
}


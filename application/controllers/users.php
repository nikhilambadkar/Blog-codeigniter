<?php
class Users extends CI_Controller
{
    // Register user
    public function register()
    {
        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required', 'matches[password]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/register', $data);
            $this->load->view('templates/footer');
        } else {
            //Encrypt password
            $enc_password = md5($this->input->post('password'));
            $this->user_model->register($enc_password);

            //Set message
            $this->session->set_flashdata('user_registered', 'You are now registered user and can log in');
            redirect('posts');
        }
    }
    //login User
    public function login()
    {
        $data['title'] = 'Sign In';


        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header');
            $this->load->view('users/login', $data);
            $this->load->view('templates/footer');
        } else {
            // Get username
            $username = $this->input->post('username');
            //Get and encrypt the password
            $password = md5($this->input->post('password'));
            //login user
            $user_id = $this->user_model->login($username, $password);
            if ($user_id) {
                //create session
                $user_data = array(
                    'user_id' => $user_id,
                    'user_name' => $username,
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);

                // Set message 
                $this->session->set_flashdata('user_loggedin', 'You are now logged in');
                redirect('posts');
            } else {
                // set message
                $this->session->set_flashdata('login_failed', 'Invalid Credential');
                redirect('users/login');
            }
            //Set message
            $this->session->set_flashdata('user_loggedin', 'You are now logged in');
            redirect('posts');
        }
    }



    //Log user out
    public function logout()
    {
       
        // Unset user data
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('username');

        //Set message
        $this->session->set_flashdata('user_loggedout', 'You are now logged out');
      
        redirect('users/login');
      
    }

    // Check if username exists
    public function check_username_exists($username)
    {
        $this->form_validation->set_message('check_username_exists', 'This Username is already is taken, Please different one');
        if ($this->user_model->check_username_exists($username)) {
            return true;
        } else {
            return false;
        }
    }
    //  Check if username exists
    public  function check_email_exists($email)
    {
        $this->form_validation->set_rules('check_email_exists', 'This Email is already exists');
        if ($this->user_model->check_email_exists($email)) {
            return true;
        } else {
            return false;
        }
    }
}

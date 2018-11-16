<?php

class Login extends CI_Controller{


    public function __construct() {
        parent::__construct();
        $this->load->model('mLogin');
        $this->load->model('mcrud');
    }

	public function index(){
        $this->load->view('includes/header_login');
        $this->load->view('login/login');
        $this->load->view('includes/footer_login');		
	}

	public function signup(){

		$username = $this->input->post('login-username');
		$password = $this->input->post('login-password');
        $result = $this->mLogin->loginAuthenticate($username, $password);
        if ($result[0]->role == 1) {
            $this->session->set_userdata('logged_user', $username);
            $this->session->set_userdata('logged_user_id', $result[0]->empid);
            redirect(site_url("sadmin/index"));
        } else {
            $this->session->set_userdata('error', ' The Username or password are invalid!');
            redirect(site_url("login"));
        }
    }

    public function signout(){
        $this->session->unset_userdata('logged_user', $uname);
        $this->session->set_userdata('success', 'User has been Signed out!');
        redirect(site_url("login"));        
   }


    public function changePassword(){
        $this->load->view('includes/header_login');
        $this->load->view('login/changePassword');
        $this->load->view('includes/footer_login');             
    }

    public function changePasswordFunction(){
        $username = $this->input->post('login-username');
        $oldPassword = $this->input->post('oldPassword');
        $newPassword = $this->input->post('newPassword');

        $result = $this->mLogin->loginAuthenticate($username, $oldPassword);
        if ($result) {
            $changedPassword = $this->mLogin->changePassword($username,$newPassword);
            $this->session->set_userdata('success', ' Password has been Changed!');
            redirect(site_url("login"));
        }else{
            $this->session->set_userdata('error', ' The Username or Old password is invalid!');
            redirect(site_url("login/changePassword"));
        }
    }


    public function resetPassword(){
        $this->load->view('includes/header_login');
        $this->load->view('login/resetPassword');
        $this->load->view('includes/footer_login');          
    }

    public function resetPasswordFunction(){
        $username = $this->input->post('login-username');

          $data = array(
                "user_id_from" => 7,
                "user_id_to" => 7,
                "subject" => $username,
                "message" => 'Please reset the password',
                "type" => 'PR',
                "status" => 'Pending',
                );

              $result = $this->mcrud->addDataByForm('messages', $data);

        if ($result) {   
            $this->session->set_userdata('success', ' Password Reset Request Submitted successfully.!');
            redirect(site_url("login/resetPassword"));
        }


    }

}
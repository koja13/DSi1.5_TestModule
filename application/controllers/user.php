<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('user_model');
	}
	
	public function index()
	{
		if(($this->session->userdata('user_name')!=""))
		{
			$this->welcome();
		}
		else{
			$data['title']= 'Home';
			$this->load->view('header_view',$data);
			$this->load->view("signin_view.php", $data);
			$this->load->view('footer_view',$data);
		}
	}
	
	// redirektuje na stranu za registrovanje
	public function register()
	{
		if(($this->session->userdata('user_name')!=""))
		{
			$this->welcome();
		}
		else{
			$data['title']= 'Home';
			$this->load->view('header_view',$data);
			$this->load->view("registration_view.php", $data);
			$this->load->view('footer_view',$data);
		}
	}
	
	public function welcome()
	{
		$data['title']= 'Welcome';
		$this->load->view('header_view',$data);
		$this->load->view('welcome_view.php', $data);
		$this->load->view('footer_view',$data);
	}
	
	public function start()
	{
		$data['title']= 'DSi2.0';
		$this->load->view('header_view',$data);
		$this->load->view('MainView.php', $data);
		//$this->load->view('LessionView.php', $data);
		$this->load->view('footer_view',$data);
	}
	
	public function getUserActions()
	{
		$currentLessionNumber = $_POST['currentLessionNumber'];
		$subject = $_POST['subject'];
		$object = $_POST['object'];
		$currentDateTime = $_POST['currentDateTime'];
		
		$this->user_model->saveUserActions($currentLessionNumber, $subject, $object, $currentDateTime);
	}
	
	public function getUserActionsLessions()
	{
		$currentLessionNumber = $_POST['currentLessionNumber'];
		$action = $_POST['action'];
		$next_prev_lession_number = $_POST['next_prev_lession_number'];
		$currentDateTime = $_POST['currentDateTime'];
		
		$this->user_model->saveUserActionsLessions($currentLessionNumber, $action, $next_prev_lession_number, $currentDateTime);
	}
	
	public function startQuiz()
	{
		$data['title']= 'Welcome';
		$this->load->view('header_view',$data);
		$this->load->view('welcomeViewQuiz.php', $data);
		$this->load->view('footer_view',$data);
	}
	
	public function quiz()
	{
		$data=$this->user_model->getQuestions();
		
		$data['title']= 'Qiuz';
		$this->load->view('HeaderViewQuiz',$data);
		$this->load->view('QuizView.php', $data);
		$this->load->view('footer_view',$data);
	}
	
	public function getQuizResults()
	{
		$userAnswers = $_POST['userAnswers'];
		$currentDateTime = $_POST['currentDateTime'];
		$message = $this->user_model->saveQuizResults($userAnswers);
		//$this->user_model->saveUserActionsLessions(null, "finish_quiz", null, $currentDateTime);
		
		echo $message;
	}
	public function QuizResultPage()
	{
		$data = $this->user_model->getResults();
		
		$data['title'] = 'Quiz results';
		$this->load->view('HeaderViewQuiz',$data);
		$this->load->view('QuizResultsView.php', $data);
		$this->load->view('footer_view',$data);
	}
	public function login()
	{
		$username=$this->input->post('user_name');
		$password=md5($this->input->post('pass'));

		$result=$this->user_model->login($username,$password);
		if($result)
		{
			$this->welcome();
		}
		else
		{
			$this->index();
			
		}
		
	}
	
	public function thank()
	{
		$data['title']= 'Thank';
		$this->load->view('header_view',$data);
		$this->load->view('thank_view.php', $data);
		$this->load->view('footer_view',$data);
	}
	
	public function registration()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('user_name', 'User Name', 'trim|required|min_length[4]|xss_clean|is_unique[user.username]');
		$this->form_validation->set_rules('email_address', 'Your Email', 'trim|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			//$this->index();
			$this->register();
			//echo validation_errors();
		}
		else
		{
			$this->user_model->add_user();
			$this->thank();
		}
	}
	
	public function logout()
	{
		// upisivanje informacije o logout-u u bazu
		$this->user_model->saveUserActionsLessions(null, "logged_out", null, date('Y-m-d H:i:s'));
		
		$newdata = array(
		'user_id'   =>'',
		'user_name'  =>'',
		'user_email'     => '',
		'logged_in' => FALSE,
		);
		
		
		$this->session->unset_userdata($newdata );
		$this->session->sess_destroy();
		$this->index();
	}
}
?>
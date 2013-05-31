<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
	function login($email,$password)
    {
    	// upisivanje u session cookie kako ne bi morali stalno
    	// da pristupamo bazi da vidimo koji je korisnik logovan
    	/*$newdata = array(
    			'email'     => 'johndoe@some-site.com',
    			'logged_in' => TRUE
    	);
    	
    	$this->session->set_userdata($newdata);*/
    	
    	
    	// upisivanje u bazu
		$this->db->where("email",$email);
        $this->db->where("password",$password);
            
        $query=$this->db->get("user");
        if($query->num_rows()>0)
        {
         	foreach($query->result() as $rows)
            {
            	//add all data to session
                $newdata = array(
                	   	'user_id' 		=> $rows->id,
                    	'user_name' 	=> $rows->username,
		                'user_email'    => $rows->email,
                		'use_dsi'    => $rows->use_dsi,
	                    'logged_in' 	=> TRUE,
                   );
			}
            	$this->session->set_userdata($newdata);
                return true;            
		}
		return false;
    }
    
	public function add_user()
	{
		$data=array(
			'username'=>$this->input->post('user_name'),
			'email'=>$this->input->post('email_address'),
			'password'=>md5($this->input->post('password'))
			);
		$this->db->insert('user',$data);
	}
	
	public function getQuestions()
	{
		$query=$this->db->get("quiz_questions");
		if($query->num_rows()>0)
		{
			foreach($query->result() as $rows)
			{
				//add all data to session
				$question = array(
						'question_number' 		=> $rows->question_number,
						'question' 	=> $rows->question,
						'correct_answer_number'    => $rows->correct_answer_number,
						'answer1'    => $rows->answer1,
						'answer2'    => $rows->answer2,
						'answer3'    => $rows->answer3,
				);
				$ques["question" . $rows->question_number] = $question;
				
				//$data["question" . $rows->question_number] = $question;
			}
			$data["q"] = $ques;
			//$this->session->set_userdata($newdata);
			return $data;
		}
	}
}
?>
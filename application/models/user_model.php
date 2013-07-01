<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
	function login($username,$password)
    {
    	// upisivanje u session cookie kako ne bi morali stalno
    	// da pristupamo bazi da vidimo koji je korisnik logovan
    	/*$newdata = array(
    			'email'     => 'johndoe@some-site.com',
    			'logged_in' => TRUE
    	);
    	
    	$this->session->set_userdata($newdata);*/
    	
    	

    	// bira korisnika za zadatim korisnickim imenom i passwordom
		$this->db->where("username",$username);
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
	
	public function addUserFB($name, $username, $email)
	{
		$this->db->where("username",$username);
		//$this->db->where("password",$password);
		
		$query=$this->db->get("user");
		if($query->num_rows()>0)
		{
			foreach($query->result() as $rows)
			{
				$account_type = $rows->account_type;
			}
		}
		else
		{
		
			$data=array(
					//'name'=> $name,
					'username'=> $username,
					'email'=> $email
			);
			$this->db->insert('user',$data);
		}
	}
	
	
	public function getQuestions()
	{
		$query=$this->db->get("quiz_questions");
		if($query->num_rows()>0)
		{	
			foreach($query->result() as $rows)
			{
				$qNo = $rows->question_number;
				$ques = $rows->question;
				$correct_answer_number = $rows->correct_answer_number;
				$answer1 = $rows->answer1;
				$answer2 = $rows->answer2;
				$answer3 = $rows->answer3;
				
				if($qNo<4)
				{
					$question = " <div id='q" .$qNo. "' class='question'>" .
					"<p id='question" .$qNo. "' class ='qPar'>".$qNo. ". ".$ques. "</p> <br />" .
					"<p class='answer'><input class='radio' type='radio' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "'> <label class='answerLabel' for='q" .$qNo. "a1'>" . $answer1 . "</label></p>" .
					"<p class='answer'><input class='radio' type='radio' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'> <label class='answerLabel'  for='q" .$qNo. "a2'>" . $answer2 . "</label></p>" .
					"<p class='answer'><input class='radio' type='radio' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "'> <label class='answerLabel'  for='q" .$qNo. "a3'>" . $answer3 . "</label></p>" .
					"</div>";
				}
				else
				{
					$question = " <div id='q" .$qNo. "' style='display:none;' class='question'>" .
							"<p id='question" .$qNo. "' class ='qPar'>" .$qNo. ". ".$ques. "</p> <br />" .
							"<p class='answer'><input class='radio' type='radio' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "'> <label class='answerLabel'  for='q" .$qNo. "a1'>" . $answer1 . "</label></p>" .
							"<p class='answer'><input class='radio' type='radio' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'> <label  class='answerLabel' for='q" .$qNo. "a2'>" . $answer2 . "</label></p>" .
							"<p class='answer'><input class='radio' type='radio' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "'> <label  class='answerLabel' for='q" .$qNo. "a3'>" . $answer3 . "</label></p>" .
							"</div>";
				}
				$questions[$qNo] = $question;
				
			}
			
			$data["questions"] = $questions;
			return $data;
		}
	}
	
	public function saveQuizResults($userAnswers)
	{
		for($i=1;$i<count($userAnswers);$i++)
		{
			$data[$i] = array(
					'session_id' => $this->session->userdata('session_id'),
					'user_name' => $this->session->userdata('user_name') ,
					'question_number' => $i ,
					'user_answer' => $userAnswers[$i]
			);
			
			$this->db->insert('quiz_results', $data[$i]);
		}
		return "Success";
	}
	
	public function saveUserActions($currentLessionNumber, $subject, $object, $currentDateTime)
	{/*
		for($i=1;$i<count($userAnswers);$i++)
		{*/
		$data = array(
						'session_id' => $this->session->userdata('session_id'),
						'user_name' => $this->session->userdata('user_name') ,
						'lession_number' => $currentLessionNumber ,
						'subject' => $subject,
						'object' => $object,
						'time' => $currentDateTime
					);
							
			$this->db->insert('user_actions', $data);
		//}
	}
	public function saveUserActionsLessions($currentLessionNumber, $action, $next_prev_lession_number,$currentDateTime)
	{
		$data = array(
				'session_id' => $this->session->userdata('session_id'),
				'user_name' => $this->session->userdata('user_name') ,
				'lession_number' => $currentLessionNumber ,
				'action' => $action,
				'next_prev_lession_number' => $next_prev_lession_number,
				'time' => $currentDateTime
		);
			
		$this->db->insert('user_actions_lessions', $data);
	}
	
	public function getResults()
	{
		$query1=$this->db->get("quiz_questions");
		
		$sql = "SELECT question_number, user_answer FROM quiz_results WHERE session_id = '".$this->session->userdata('session_id')."' AND user_name = '".$this->session->userdata('user_name')."';";
		
		$query2 = $this->db->query($sql);
		$userAnswers = null;
		foreach ($query2->result() as $row)
		{
			$userAnswers[$row->question_number] = $row->user_answer;
			//echo $row->question_number;
			//echo $row->user_answer;
		}
		
		$counter = 1;

		if($query1->num_rows()>0)
		{
			foreach($query1->result() as $rows)
			{
				$qNo = $rows->question_number;
				$ques = $rows->question;
				$correct_answer_number = $rows->correct_answer_number;
				$answer1 = $rows->answer1;
				$answer2 = $rows->answer2;
				$answer3 = $rows->answer3;
	
				$question = " <div id='q" .$qNo. "' class='question'>" .
							"<p id='question" .$qNo. "' class ='qPar'>".$qNo. ". ".$ques. "</p> <br />";
				
				if($userAnswers[$qNo]==1)
				{
					if($correct_answer_number==1)
					{
					
						$question .= "<p class='answerResultCorrect'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "' checked> <label for='q" .$qNo. "a1'>" . $answer1 . "</label> <img src=". base_url("correct.png")." alt='correct' height='23' width='27'> </p>";
						$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'> <label for='q" .$qNo. "a2'>" . $answer2 . "</label></p>";
						$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "'> <label for='q" .$qNo. "a3'>" . $answer3 . "</label></p>";
						$question .="</div>";
					}
					else
					{
						if($correct_answer_number==2)
						{
						
							$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "' checked> <label for='q" .$qNo. "a1'>" . $answer1 . "</label> <img src=". base_url("wrong.png")." alt='wrong' height='23' width='23'> </p>";
							$question .= "<p class='answerResultCorrect'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'> <label for='q" .$qNo. "a2'>" . $answer2 . "</label> </p>";
							$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "'> <label for='q" .$qNo. "a3'>" . $answer3 . "</label></p>";
							$question .="</div>";
						}
						else
						{
							if($correct_answer_number==3)
							{
							
								$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "' checked> <label for='q" .$qNo. "a1'>" . $answer1 . "</label> <img src=". base_url("wrong.png")." alt='wrong' height='23' width='23'> </p>";
								$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'> <label for='q" .$qNo. "a2'>" . $answer2 . "</label></p>";
								$question .= "<p class='answerResultCorrect'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "'> <label for='q" .$qNo. "a3'>" . $answer3 . "</label> </p>";
								$question .="</div>";
							}

						}
					}

				}
				else
				{
					if($userAnswers[$qNo]==2)
					{
						/*$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "'> <label for='q" .$qNo. "a1'>" . $answer1 . "</label></p>";
						$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "' checked> <label for='q" .$qNo. "a2'>" . $answer2 . "</label><img src='<?php echo base_url('/correct.jpg')?>' alt='correct' height='23' width='23'></p>";
						$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "'> <label for='q" .$qNo. "a3'>" . $answer3 . "</label></p>";
						"</div>";*/
						
						if($correct_answer_number==1)
						{
								
							$question .= "<p class='answerResultCorrect'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "'> <label for='q" .$qNo. "a1'>" . $answer1 . "</label></p>";
							$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'  checked> <label for='q" .$qNo. "a2'>" . $answer2 . "</label> <img src=". base_url("wrong.png")." alt='wrong' height='23' width='23'> </p>";
							$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "'> <label for='q" .$qNo. "a3'>" . $answer3 . "</label></p>";
							$question .="</div>";
						}
						else
						{
							if($correct_answer_number==2)
							{
						
								$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "'> <label for='q" .$qNo. "a1'>" . $answer1 . "</label> </p>";
								$question .= "<p class='answerResultCorrect'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'  checked> <label for='q" .$qNo. "a2'>" . $answer2 . "</label> <img src=". base_url("correct.png")." alt='correct' height='23' width='27'></p>";
								$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "'> <label for='q" .$qNo. "a3'>" . $answer3 . "</label></p>";
								$question .="</div>";
							}
							else
							{
								if($correct_answer_number==3)
								{
										
									$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "'> <label for='q" .$qNo. "a1'>" . $answer1 . "</label> </p>";
									$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'  checked> <label for='q" .$qNo. "a2'>" . $answer2 . "</label> <img src=". base_url("wrong.png")." alt='wrong' height='23' width='23'></p>";
									$question .= "<p class='answerResultCorrect'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "'> <label for='q" .$qNo. "a3'>" . $answer3 . "</label> </p>";
									$question .="</div>";
								}
						
							}
						}
						

					}
					else
					{
						if($userAnswers[$qNo]==3)
						{
							/*$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "'> <label for='q" .$qNo. "a1'>" . $answer1 . "</label></p>";
							$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'> <label for='q" .$qNo. "a2'>" . $answer2 . "</label></p>";
							$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "' checked> <label for='q" .$qNo. "a3'>" . $answer3 . "</label><img src='<?php echo base_url('/correct.jpg')?>' alt='correct' height='23' width='23'></p>";
							"</div>";*/
							
							if($correct_answer_number==1)
							{
							
								$question .= "<p class='answerResultCorrect'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "'> <label for='q" .$qNo. "a1'>" . $answer1 . "</label> </p>";
								$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'> <label for='q" .$qNo. "a2'>" . $answer2 . "</label></p>";
								$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "' checked> <label for='q" .$qNo. "a3'>" . $answer3 . "</label> <img src=". base_url("wrong.png")." alt='wrong' height='23' width='23'> </p>";
								$question .="</div>";
							}
							else
							{
								if($correct_answer_number==2)
								{
							
									$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "'> <label for='q" .$qNo. "a1'>" . $answer1 . "</label> </p>";
									$question .= "<p class='answerResultCorrect'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'> <label for='q" .$qNo. "a2'>" . $answer2 . "</label> </p>";
									$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "' checked> <label for='q" .$qNo. "a3'>" . $answer3 . "</label>  <img src=". base_url("wrong.png")." alt='wrong' height='23' width='23'> </p>";
									$question .="</div>";
								}
								else
								{
									if($correct_answer_number==3)
									{
							
										$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "'> <label for='q" .$qNo. "a1'>" . $answer1 . "</label> </p>";
										$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'> <label for='q" .$qNo. "a2'>" . $answer2 . "</label> </p>";
										$question .= "<p class='answerResultCorrect'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "'  checked> <label for='q" .$qNo. "a3'>" . $answer3 . "</label> <img src=". base_url("correct.png")." alt='correct' height='23' width='27'></p>";
										$question .="</div>";
									}
							
								}
							}
							

						}
						else
						{
							
							if($correct_answer_number==1)
							{
									
								$question .= "<p class='answerResultCorrect'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "'> <label for='q" .$qNo. "a1'>" . $answer1 . "</label></p>";
								$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'> <label for='q" .$qNo. "a2'>" . $answer2 . "</label></p>";
								$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "'> <label for='q" .$qNo. "a3'>" . $answer3 . "</label> </p>";
								$question .="</div>";
							}
							else
							{
								if($correct_answer_number==2)
								{
										
									$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "'> <label for='q" .$qNo. "a1'>" . $answer1 . "</label> </p>";
									$question .= "<p class='answerResultCorrect'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'> <label for='q" .$qNo. "a2'>" . $answer2 . "</label> </p>";
									$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "'> <label for='q" .$qNo. "a3'>" . $answer3 . "</label>  </p>";
									$question .="</div>";
								}
								else
								{
									if($correct_answer_number==3)
									{
											
										$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "'> <label for='q" .$qNo. "a1'>" . $answer1 . "</label> </p>";
										$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'> <label for='q" .$qNo. "a2'>" . $answer2 . "</label> </p>";
										$question .= "<p class='answerResultCorrect'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "'> <label for='q" .$qNo. "a3'>" . $answer3 . "</label> </p>";
										$question .="</div>";
									}
										
								}
							}
							
							/*
							$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a1' value='" .$answer1. "'> <label for='q" .$qNo. "a1'>" . $answer1 . "</label></p>";
							$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a2' value='" .$answer2. "'> <label for='q" .$qNo. "a2'>" . $answer2 . "</label></p>";
							$question .= "<p class='answerResult'><input class='radio' type='radio' disabled='disabled' name='q" .$qNo. "' id='q" .$qNo. "a3' value='" .$answer3. "'> <label for='q" .$qNo. "a3'>" . $answer3 . "</label></p>";
							$question .="</div>";*/
						}
					}
					
				}

				
				$questions[$qNo] = $question;
				
				//echo $questions[$qNo];
			}
				
			$data["questions"] = $questions;
			return $data;
		}
	}
}
?>
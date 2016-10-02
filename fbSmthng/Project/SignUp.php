<?php 
	defined('BASEPATH') or exit('No direct script access allowed');
	/**
	* 
	*/
	class SignUp extends CI_Controller
	{
		public function profilepic()
		{

		}

		public function signupControl()
		{

				/*$this->load->model('propicM');
		        $user=$_FILES['profilepic']['name'];
		        echo $user;*/
			
				$user['fname']=$this->input->post("fname");
				$user['lname']=$this->input->post("lname");
				$user['email']=$this->input->post("email");
				$user['re-email']=$this->input->post("re-email");
				$user['password']=$this->input->post("password");
				/////////pro_pic property\\\\\\\\\\
				$user['profile_pic']=$_FILES['profilepic']['name'];

				$user['profile_pic_size']=$_FILES['profilepic']['size'];
				//$user['profile_pic_types']=$_FILES['profilepic']['types']
				//$user['profile_pic_width']=$_FILES['profilepic']['width'];
				//$user['profile_pic_height']=$_FILES['profilepic']['height'];
				$user['dob']=$this->input->post("day")."-".$this->input->post("month")."-".$this->input->post("year");
				$user['gender']=$this->input->post("gender");
				echo $user['dob'];
				#print_r($user);
				#print_r($user['profile_pic_size']);
				#print_r($_FILES);
				#$url = 'http://localhost/LoginService/SignUp.php';
				$url = 'http://localhost/WebService/index.php/SignupC/signupControl';
				$options=array(
								'http'=>array(
												'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		        								'method'  => 'POST',
		        								'content' => http_build_query($user),
									),
								);
				$context=stream_context_create($options);
				$result=file_get_contents($url,false,$context);
				#print_r($result);
				$json=json_decode($result,true);
				print_r($json);

				/*if ($json['ResponseCode']==1)
				{
					$this->load->view('email_verification');
				}*/
				///////////validation message\\\\\\\\\\\\
				if ($json['ResponseCode']==0)
				{
					$this->load->view('main',$json);
					echo "<script type='text/javascript'>alert('Enter first name!')</script>";
				}
				elseif ($json['ResponseCode']==1)
				{
					$this->load->view('main',$json);
					echo "<script type='text/javascript'>alert('fname atleast 3 char!')</script>";
				}
				elseif ($json['ResponseCode']==2)
				{
					$this->load->view('main',$json);
					echo "<script type='text/javascript'>alert('Enter an email!')</script>";
				}
				elseif ($json['ResponseCode']==3)
				{
					$this->load->view('main',$json);
					echo "<script type='text/javascript'>alert('email does not match')</script>";
				}
				elseif($json['ResponseCode']==4)
				{
					$this->load->view('main',$json);
					echo "<script type='text/javascript'>alert('Enter ur bithday')</script>";
				}
				elseif($json['ResponseCode']==5)
				{
					$this->load->view('main',$json);
					echo "<script type='text/javascript'>alert('yMinimum age for joining facebook is years.')</script>";
				}
				elseif ($json['ResponseCode']==6)
				{
					$this->load->view('main',$json);
					echo "<script type='text/javascript'>alert('password atleast 8 charactors')</script>";
				}
				elseif ($json['ResponseCode']==7)
				{
					#$this->load->view('email_verification',$json);
					#echo "<script type='text/javascript'>alert('ur account was created')</script>";
					


					////////email sending\\\\\\\\\\


			
			    $config = Array(
					  'crlf' => '\r\n',      //should be "\r\n"
					  'newline' => '\r\n',   //should be "\r\n"
					  'protocol' => 'smtp',
					  'smtp_host' => 'ssl://smtp.googlemail.com',
					  'smtp_port' => 465,
					  'smtp_user' => 'nishamedayannur@gmail.com', // change it to yours
					  'smtp_pass' => 'pk9567836668', // change it to yours
					  'mailtype' => 'text',
					  'charset' => 'utf-8',
					  'wordwrap' => TRUE
						);

				        $message = 'facebook account confirma';
				        
				        $this->load->library('email', $config);
				        $this->email->initialize($config);

				      $this->email->set_newline("\r\n");
				      $this->email->from('nishamedayannur@gmail.com'); // change it to yours
				      $this->email->to($user['email']);// change it to yours
				      $this->email->subject('your facebook account was created');
				      $this->email->message($message);
				      if($this->email->send())
				     {
				     	$this->load->view('email_verification');
						echo "<script type='text/javascript'>alert('your account was created')</script>";
				     }
				    else
				    {
				     #show_error($this->email->print_debugger());
				     echo "<script type='text/javascript'>alert('Please Enter  valid email!')</script>";
				    }


				    		///////pro_pic upload code\\\\\\\
						$config['upload_path']   = './images/'; 
				        $config['allowed_types'] = 'gif|jpg|png'; 
				        $config['max_size']      = 50000; 
				        $config['max_width']     = 10000; 
				        $config['max_height']    = 10000; 
				        $this->load->library('upload', $config);
							
				        if ( ! $this->upload->do_upload('profilepic')) {
				           echo "notpic"; 
				        }
							
				        else {
				            echo "<script type='text/javascript'>alert('gfgfgf')</script>";
				        }


				}


				///////taking email as session varible\\\\\\\\\\
			  	/*$email=$user['email'];
			    $this->load->library('session');
			    $this->session->set_userdata($email);*/
			    #session_start();
				
				$_SESSION['user']=$user['email'];

				

				
			#}


		        
		    ///////taking email as session varible\\\\\\\\\\
		  	/*$email=$user['email'];
		    $this->load->library('session');
		    $this->session->set_userdata($email);*/
		    



		}


	}

 ?>
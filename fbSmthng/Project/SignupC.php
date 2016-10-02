<?php 
	/**
	* 
	*/
	class SignupC extends CI_Controller
	{
		
		public function signupControl()
		{
			


			////////////get values\\\\\\\\\\
			$user['vchr_user_fname']=$this->input->get_post('fname');
			$user['vchr_user_lname']=$this->input->get_post('lname');
			$user['vchr_user_email']=$this->input->get_post('email');
			$val['re_email']=$this->input->get_post('re-email');
			$val['profile_pic_size']=$this->input->get_post('profile_pic_size');

			$user['vchr_user_password']=$this->input->get_post('password');
			$user['vchr_user_profile_pic']=$this->input->get_post('profile_pic');
			$user['vchr_user_dob']=$this->input->get_post('dob');
			$user['vchr_user_gender']=$this->input->get_post('gender');
			$user['active']='1';
			#echo $val['vchr_user_re-email'];

			/////////array to string\\\\\\\
			$fname=$user['vchr_user_fname'];
			$email=$user['vchr_user_email'];
			$password=$user['vchr_user_password'];
			$re_email=$val['re_email'];
			#print_r($user);
			#echo $email,$re_email;
			$fnamelen=strlen($fname);
			$passwordlen=strlen($password);


			//////////date picker\\\\\\\\\
			$date1=date("d-m-Y");
			#echo $date1;
			$date2=$user['vchr_user_dob'];
			#print_r($date2);
			#echo $user['vchr_user_dob'];

			#$date1="2007-03-24";
			#$date2="2009-06-26";
			
				$diff=abs(strtotime($date2)-strtotime($date1));
				#printf($diff);
				$years=floor($diff/(365*60*60*24));
				$months=floor(($diff-$years*365*60*60*24)/(365*60*60*24));
				$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
				#printf("%d years, %d months, %d days\n", $years, $months, $days);
				#echo $years;
			

			//////////validation\\\\\\\\\\
			/*if (!empty($user['vchr_user_fname'])&&$fnamelen>3&&$email==$re_email&&$years>=13)
			{
				$this->load->model('SignupM');
				$result=$this->SignupM->signupModel($user);
				if (!$result)
				{
					$json=array('ResponseCode'=>1,'Msg'=>'value note insert');
					echo json_encode($json);
				}

			}
			else
			{
				
				$json=array('ResponseCode'=>0,'Msg'=>'validation error');
				echo json_encode($json);
			}*/


			if (empty($user['vchr_user_fname']))
			{
				$result1=array('ResponseCode'=>0,'Msg'=>'fname not entered');
				echo json_encode($result1);
			}
			else
			{
				if ($fnamelen<3)
				{
					$result2=array('ResponseCode'=>1,'Msg'=>'fname atleast 3 char');
					echo json_encode($result2);
				}
				else
				{
					if (empty($email)&&empty($re_email))
					{
						$result3=array('ResponseCode'=>2,'Msg'=>'enter an email');
						echo json_encode($result3);
					}
					else
					{
						if ($email!=$re_email)
						{
							$result3=array('ResponseCode'=>3,'Msg'=>'email doesnot match');
							echo json_encode($result3);
						}
						else
						{
							if ($date2=='Day-Month-Year')
							{
								$result4=array('ResponseCode'=>4,'Msg'=>'enter u birthday');
								echo json_encode($result4);
							}
							else
							{

								if ($years<13)
								{
									$result4=array('ResponseCode'=>5,'Msg'=>'you cant create an account u r not an adult');
									echo json_encode($result4);	
								}
								else
								{
									if ($passwordlen<8)
									{
										$result4=array('ResponseCode'=>6,'Msg'=>'the password must atlast 8 charector');
										echo json_encode($result4);
									}
									else
									{
										$this->load->model('SignupM');
										$result=$this->SignupM->signupModel($user);
										$result4=array('ResponseCode'=>7,'Msg'=>'ur account was created');
										echo json_encode($result4);
									}
								}
							}
						}
					}		
				}
			}
			/*elseif ($fnamelen<3)
			{
				$result2=array('ResponseCode'=>1,'Msg'=>'fname atleast 3 char');
				echo json_encode($result2);
				
			}
			elseif ($email!=$re_email&&empty($email)&&empty($re_email))
			{
				$result3=array('ResponseCode'=>2,'Msg'=>'email doesnot match');
				echo json_encode($result3);
				
			}
			elseif ($years>13||is_integer($data2))
			{
				
				$this->load->model('SignupM');
				$result=$this->SignupM->signupModel($user);
				$result4=array('ResponseCode'=>4,'Msg'=>'ur account was created');
				echo json_encode($result4);
			}
			else
			{
				$result4=array('ResponseCode'=>3,'Msg'=>'you cant create an account u r not an adult');
				echo json_encode($result4);
			
			}*/
		}

		public function assgn()
		{
			$student = array('enr_no' => 1001,'name'=>'nisham','city'=>'kannur','mobileno'=>12345,'dob'=>'2016-1-1','status'=>'active');
			$this->load->model('SignupM');
			
			for ($i=0; $i <100000 ; $i++)
			{ 
				$result=$this->SignupM->stored($student);
			}
			
		}
	}
?>

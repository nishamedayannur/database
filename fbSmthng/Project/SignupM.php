<?php 
	/**
	* 
	*/
	class SignupM extends CI_Model
	{
		
		public function signupModel($data)
		{
			#print_r($data);
			foreach (array_keys($data) as $i)
			{
				$data[$i]=$this->db->escape($data[$i]);
			}
			$values=implode(',',$data);
			$this->db->query("call userInsert({$values})");
			#$this->db->insert('tbl_user',$data);
			
			/*foreach ($variable as $key => $value) {
				# code...
			}*/
		}
		
		public function stored()
		{
			$student = array('enr_no' => 1001,'name'=>'nisham','city'=>'kannur','mobileno'=>12345,'dob'=>'1-1-2016','status'=>'active');
			#print_r($student);
			foreach (array_keys($student) as $i)
			{
				#print_r($student);
				#echo $i,"<br>";
				$student[$i]=$this->db->escape($student[$i]);
				#echo $student[$i];
			}

			$values=implode(',', $student);
			#echo "<br>",$values;
			$this->db->query("call ins_std({$values})");
		}
	}

 ?>
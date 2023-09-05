<?php
class Form_model extends CI_Model
{
	public function login_data($email, $pass){
         $query = $this->db->select('*')
                           ->from('users')
                           ->where(['email'=>$email,'password'=>$pass])
		                   ->get();
		 return $query->row();
	}
	
	function insert_data($first_name,$last_name,$email,$password)
	{
	    $query=$this->db->query("select * from users where (email='".$email."' or password='".$password."')");
		$row = $query->num_rows();
		if($row)
		{
		$data['message']="<h3 style='color:red'>This user already registered</h3>";
		}
		else
		{
		$query=$this->db->query("insert into users set first_name='".$first_name."',email='".$email."',last_name='".$last_name."',password='".$password."'");

		$data['message']="<h3 style='color:blue'>You are registered successfully</h3>";
		}

		print_r($data['message']);
	}

}
?>
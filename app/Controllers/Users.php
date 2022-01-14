<?php 

namespace App\Controllers;

// use CodeIgniter\Controller;
use App\Models\UserModel;


class Users extends BaseController
{
	public function index()
	{
		return view('login');
		// return view('registration');
	}
	public function __construct(){
			$this->db= \Config\Database::connect();
			//$session = \Config\Services::session();
			$session = \Config\Services::session();
		}

	public function registration(){
         
		// $length = 3;
		
		
		//print_r($num_str);
		// print_r($unam);
		// exit;
		// $userData = [
		// 	'firstName'     => $this->request->getPost('firstName'),
		// 	'middleName'     => $this->request->getPost('middleName'),
		// 	'lastName'     => $this->request->getPost('lastName'),
		// 	'dob'    => $this->request->getPost('dob'),
		// 	'age'    => $this->request->getPost('age'),
		// 	'emailId'    => $this->request->getPost('email'),
		// 	'mobileNo' => $this->request->getPost('mbNumber'),
		// 	// 'confirmPassword' => $this->request->getPost('confirmPassword'),
		// 	// 'isActive'=>'1'
		// ];
		// print_r($userData);exit;
		
		$data=[];
        $rules = $this->validate([
            'firstName'     => 'required',
            'lastName'      => 'required',
			'dob'           => 'required',    
            'mbNumber'      => 'required',
			'gender'      => 'required'
        ]);

        if(!$rules){
        	return view('registration',['validation'=>$this->validator]);
        }else{
				$randomletter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, 3);
				$num_str = sprintf("%07d", mt_rand(1, 999999));
				$usrnam="WB/EMP/".date("Y").$randomletter.$num_str;
        		$pass=rand ( 10000 , 99999 );
        	   $userData = [
                'firstName'     => $this->request->getPost('firstName'),
				'middleName'     => $this->request->getPost('middleName'),
				'lastName'     => $this->request->getPost('lastName'),
				'dob'    => $this->request->getPost('dob'),
				'age'    => $this->request->getPost('age'),
				'emailId'    => $this->request->getPost('email'),
				'mobileNo' => $this->request->getPost('mbNumber'),
				'gender' => $this->request->getPost('gender'),
				'userName'=>$usrnam,
				'password'=>$pass
            ];
			$updateData = [
                'firstName'     => $this->request->getPost('firstName'),
				'middleName'     => $this->request->getPost('middleName'),
				'lastName'     => $this->request->getPost('lastName'),
				'dob'    => $this->request->getPost('dob'),
				'age'    => $this->request->getPost('age'),
				'emailId'    => $this->request->getPost('email'),
				'mobileNo' => $this->request->getPost('mbNumber'),
				'gender' => $this->request->getPost('gender')
				
            ];
            $email=$userData['emailId'];
			$builder=$this->db->table("users");

			$builder=$builder->where("emailId",$email);
			$userExists=$builder->get()->getResultArray();
			$id=0;
			$id=$this->request->getPost('empId');
			
        	if(empty($userExists)){
        		
				$result = $builder->insert($userData);
				
        		if(!empty($result)){
        			$data['title']="successfully Register";
        		}
				  return redirect()->to(base_url('users/allEmpListing'));
           		
        	}elseif($id!=0){
				$builder->where(["id"=>$id])->set($updateData)->update();
				 return redirect()->to(base_url('users/allEmpListing'));
			}else{
        		$data['emailExists']="Please provide the Unique email address";
        		echo view('registration',$data);

        	}            
        }        
		
	}
	public function login(){
		//echo "test";exit;
        $data=[];
        // $_SESSION['failed_login'] = 1;

        $builder=$this->db->table("users");

        $pass=$this->request->getPost('uPwd');
        $uname=$this->request->getPost('uname');
       

        $builder=$builder->where("userName",$uname);
		$userExists=$builder->get()->getResultArray();
		//print_r($userExists);exit;
        
	        if($userExists != null && !empty($userExists)){
	            if($userExists[0]['password']==$pass){
	                $id=$userExists[0]['id'];
	                $updateData=[
	                    'session'=>rand ( 10000 , 99999 )
	                ];
	                
 					$builder->where(["id"=>$id])->set($updateData)->update();
 					$newdata = [
	                'userName'  => $userExists[0]['firstName'],
	               // 'isActive'  => $userExists[0]['isActive'],
	                'session'   => $updateData['session'],
	                
	                ];
	                // print_r($newdata);exit;
					$_SESSION['userName'] = $id;
					
					//print_r($_SESSION['userName']);exit;
	               // $session->set($newdata);	  
				   if($userExists[0]['userType']=="admin"){
					return view('registration');
				   }
				   else{
					   // $data["allData"]=$userExists;
					  // print_r($data["allData"]);
					  $this->singleEmpDetails($id);
					 // return redirect()->to(base_url('users/singleEmpDetails'))->with('status','successfully add ');
						//echo  view('employee/employeeDetails',$data);
				   }           
	                   
	                
	            }else{
	                 $data['lpgErrorMsg']="please check the user name and password";             
	               	 echo view('login',$data);
	            }
	        }else{
	            $data['lpgErrorMsg']= "please check your user name and password";	           
	            echo view('login',$data);

	        }

	}
	public function singleEmpDetails($id = '')
	{	
		$empId=$id;
		$data=[];
		$builder=$this->db->table("users");
		$builder=$builder->where("id",$empId);
		$userExists=$builder->get()->getResultArray();
		$data['allData']=$userExists;
	
		echo view('employee/employeeDetails',$data);
		
	
	}
	public function allEmpListing()
	{	
		
		$data=[];
		$usermodel = new UserModel();
		$userExists=$usermodel->findAll();		
		$data['allData']=$userExists;		
		return view('employee/employeeListing',$data);
		
	
	}
	public function edit($id)
	{
		 
		 $data=[];
		 $usermodel = new UserModel();
		 $data['userExists']=$usermodel->where('id',$id)->first();
		return view('registration',$data);	
	}

	

}

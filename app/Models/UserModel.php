<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {	

 	protected $table='users';
	 protected $primaryKey='id';
   	protected $allowedFields = ['userType','firstName','lastName','middleName','emailId','userName','password','mobileNo','dob','age','gender','session'
	];
	   
   	
}


?>
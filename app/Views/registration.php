<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

<!-- <h1>test hello ziarul </h1> -->
<div class="container border">
	<div class="card-body p-5">
		<h2 class="text-uppercase text-center mb-5">Create an Account</h2>
		
		<h2><?php if(!empty($emailExists) && $emailExists){ echo $emailExists; } ?></h2>
	</div>             
	<?php if(!empty($validation) && $validation){ echo $validation->listErrors(); } ?>
		<form action="<?php echo base_url('users/registration');?>" method="post">
			<div class="form-group">
			<input type="hidden" id="empId" name="empId" value="<?php if(!empty($userExists['id'])){ echo $userExists['id']; }?>">
			 <label for="exampleInputEmail1">First Name</label>
			 <input type="text" class="form-control" id="firstName" name="firstName" value="<?php if(!empty($userExists['firstName'])){ echo $userExists['firstName']; }?>" placeholder="Enter first name">
		   </div>
		   <div class="form-group">
			 <label for="exampleInputEmail1">Middle Name</label>
			 <input type="text" class="form-control" id="middleName" name="middleName" value="<?php if(!empty($userExists['middleName'])){ echo $userExists['middleName']; }?>" placeholder="Enter middle name">
		   </div>
		   <div class="form-group">
			 <label for="exampleInputEmail1">Last Name</label>
			 <input type="text" class="form-control" id="lastName" name="lastName" value="<?php if(!empty($userExists['lastName'])){ echo $userExists['lastName']; }?>" placeholder="Enter last name">
		   </div>
		   <div class="form-group">
			 <label for="exampleInputEmail1">Date of Birth</label>
			 <input type="date" class="form-control" id="dob" name="dob" value="<?php if(!empty($userExists['dob'])){ echo $userExists['dob']; }?>" placeholder="Enter date of birth ">
		   </div>
		   <div class="form-group">
			 <label for="exampleInputEmail1">Age </label>
			 <input type="number"  class="form-control" id="age" value="<?php if(!empty($userExists['age'])){ echo $userExists['age']; }?>"  name="age" readonly >
		   </div>
			<div class="form-group">
			 <label for="email1">Email address</label>
			 <input type="text" class="form-control" id="email" name="email" autocomplete="off" value="<?php if(!empty($userExists['emailId'])){ echo $userExists['emailId']; }?>" placeholder="Enter email">
			 <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
		   </div>
		   <div class="form-group">
		     <label for="pwd">Mobile Number</label>
		     <input type="number" class="form-control" id="mbNumber" name="mbNumber" value="<?php if(!empty($userExists['mobileNo'])){ echo $userExists['mobileNo']; }?>" placeholder="Mobile number">
		   </div><br>
		   <div class="form-group">
		     <label for="cfmPass">Gender</label>
		     <select id="gender" name="gender">
			 	<option  value="">Select One</option>
				<option <?php if(!empty($userExists['mobileNo'])){  echo ($userExists['gender'] =='male')?'selected':''; }?> value="male">Male</option>
				<option <?php if(!empty($userExists['mobileNo'])){  echo ($userExists['gender'] =='female')?'selected':''; }?> value="female">Female</option>				
				</select>
		   </div><br>
		   <button type="submit" class="btn btn-primary">Submit</button>
		   
		  
		</form>



<script>
$(document).ready(function(){
	$("#dob").change(function(){

	let today = new Date();	
	let dob = new Date($('#dob').val());	
	let dayDiff = Math.ceil(today - dob) / (1000 * 60 * 60 * 24 * 365);	
    let age = parseInt(dayDiff);	
	$("#age").val(age);
	
	});
});
</script>

	
</div>
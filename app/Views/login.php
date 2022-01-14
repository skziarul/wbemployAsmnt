<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<!-- <h1>test hello ziarul </h1> -->
<div class="container border">
	<div class="card-body p-5">
		<h2><?php if(!empty($title) && $title){ echo $title; } ?> </h2>
		<h2 class="text-uppercase text-center mb-5"> Login Here</h2>
		
	</div>
	<div class="p-3 mb-2  text-white">
		<!-- <h2><?php if(!empty($blkMsg) && $blkMsg){ echo $blkMsg; } ?> </h2>  -->
	</div>
	<h2><?php if(!empty($lpgErrorMsg) && $lpgErrorMsg){ echo "<p class='bg-danger'>{$lpgErrorMsg}</p>";
		//echo 'zii12kk';
		//echo $loginAttmp;

	 } ?> </h2> 
	            
	
		<form action="<?php echo base_url('users/login');?>" method="post">
			<div class="form-group">
			 <label for="uEmail">User Name</label>
			 <input type="text" class="form-control" id="uname" name="uname" placeholder="Enter name">
		   </div>
		   <div class="form-group">
		     <label for="uPwd">Password</label>
		     <input type="password" class="form-control" id="uPwd" name="uPwd" placeholder="Password">
		   </div><br>
		   <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<div class="container border">
<h1>All Employee List</h1> 
<table class="table table-striped">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">First Name </th>              
		      <th scope="col">email Id</th>
              <th scope="col"> Mobile No</th>
		      <th scope="col">UserName</th>
              <th scope="col"> Gender </th>              
		      <th scope="col">Age</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php 
		  	foreach ($allData as $key => $val) {
		  		// code...
		  		?>
		  		<tr><td><?= $val['id'] ?></td>
		  			<td><?= $val['firstName'] ?></td>
		  			<td><?= $val['emailId'] ?></td>
                    <td><?= $val['mobileNo'] ?></td>
		  			<td><?= $val['userName'] ?></td>
                    <td><?= $val['gender'] ?></td>		  			
		  			<td><?= $val['age'] ?></td>
		  			<td>
		  				<a href="<?= base_url('users/edit/'.$val['id'])?>" class="btn btn-primary">Edit</a>
		  				<a href="<?= base_url('users/singleEmpDetails/'.$val['id'])?>" class="btn btn-danger">View</a>

		  			</td>
		  			
		  			
		  		</tr>

		  	<?php }

		  	?>
		  </tbody>
		</table>
		
		
</div>
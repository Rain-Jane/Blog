<?php
$link=mysqli_connect("localhost","root","root","blog","33060");

$email = "";

if(isset($_GET['id'])){

	$sql = "SELECT * FROM user WHERE `id`='{$_GET['id']}'";
	$result = $link->query($sql);
	$row = $result->fetch_assoc();
	// echo json_encode($row);
	$email = $row['email'];

 	if(isset($_POST['email'])){
 		$sql = "UPDATE `user` SET `email` = '{$_POST['email']}', `password` = '{$_POST['password']}' WHERE `id` = {$_GET['id']}";
		$result2 = $link->query($sql);
 	}

}else{

	 if(isset($_POST['email']) && $_POST['email'] != "")
		$sql = "SELECT * FRPM `user` WHERE `email` = '{$_POST['email']}'";
		$result = $link->query($sql);
		$row = $result->fetch_assoc();

		if($row.length == 0){
			$sql = "INSERT INTO `user` (email, password) VALUES ('{$_POST['email']}', '{$_POST['password']}')";
	 		$result2 = $link->query($sql);
		}else{
			echo "已經有資料了";
		}
	 	
	 }
}



?>

<html>
  <head>
  	<title>註冊</title>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </head>
  <body>
	<div class="container">
		<form action="l1.php" method="post">
		  <div class="form-group">
		    <label for="email">Email</label>
		    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="required" value=<?=$email?>>
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required">
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>


  </body>
</html>


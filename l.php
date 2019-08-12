<?php
	$link=mysqli_connect("localhost","root","root","blog","33060");

	// //$query = mysqli_query($link,"SELECT * FROM `user`");
	// //$user = mysqli_fetch_assoc($query);
	// //echo(json_encode($user));

	// echo "<br>";



	
	// echo "<br>";
	// if(isset($_POST['email']) && isset($_POST['email'])){
	// 	if(isset($_POST['email']) && $_POST['email'] != ""){
	// 		echo "EMAIL:";
	// 		echo $_POST['email'];
	// 		echo "<br>";
	// 		// echo(json_encode($_POST));
	// 	}
	// 	if(isset($_POST['password'])){
	// 		echo "PASSWORD:";
	// 		echo $_POST['password'];
	// 		echo "<br>";
	// 	}

	// 	// $sql = "INSERT INTO user (email, password) VALUES ('{$_POST['email']}', '{$_POST['password']}')";
	// 	// $sql = "UPDATE `user` SET `email` = '{$_POST['email']}' WHERE `id` = '{$_POST['password']}'";
	// 	// $sql = "DELETE FROM `user`  WHERE `id` = '{$_POST['password']}'";
	// 	echo $sql;
	// 	$result2 = $link->query($sql);
	// }
	if(isset($_GET['type']) && $_GET['type'] == "delete"){
		$sql = "DELETE FROM `user`  WHERE `id` = '{$_GET['id']}'";
		$result2 = $link->query($sql);
	}


	$sql = "SELECT * FROM user";
	$result = $link->query($sql);
	//POST 
	//INSERT DB 
	//ECHO SUCCESS
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
	<table class="table">
	  <caption>USER</caption>
	  <thead>
	    <tr>
	      <th>id</th>
	      <th>Email</th>
	      <th>Password</th>
	      <th></th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php while(   $row = $result->fetch_assoc()   ) {?>
	    <tr>
	    	<th scope="row"><?=$row['id']?></th>
	    	<td><?=$row['email']?></td>
	    	<td><?=$row['password']?></td>
	    	<td>
	      		<a class="btn btn-default" href="l1.php?id=<?=$row['id']?>&type=edit" role="button">EDIT</a>
				<a class="btn btn-default" href="?id=<?=$row['id']?>&type=delete" role="button">DELETE</a>
			</td>
	    </tr>
		<?php }?>
	  </tbody>
	</table>
  </body>
</html>

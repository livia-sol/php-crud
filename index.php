<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<?php require_once 'process.php'; ?>

	<?php 
	if(isset($_SESSION['message'])):?>
		<div class="alert-<?=$_SESSION['msg_type']?> d-flex justify-content-center m-5 p-2">
			<?php 
				echo $_SESSION["message"];
				unset($_SESSION["message"]);
			 ?>
		</div>
	<?php endif ?>

	<?php 
		$mysqli = new mysqli('localhost','root','','crud') or die(mysql_error($mysqli));
		$result = $mysqli->query("SELECT * from data") or die(mysql_error($mysqli));
		//echo "<pre>".print_r($result,1);die;
		//$result->fetch_assoc();
		//echo "<pre>".print_r($result->fetch_assoc(),1);
		//$result->fetch_assoc();
		//echo "<pre>".print_r($result->fetch_assoc(),true);die;
	 ?>
	 <div class="container my-5">
	<div class="row justify-content-center">
		<table class="table table-striped table-hover table-dark">
			<thead>
				<tr>
					<th>Name</th>
					<th>Location</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php while($row = $result->fetch_assoc()){ ?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['location']; ?></td>
					<td>
						<a href="index.php?view=<?php echo $row['id']; ?>" class="btn btn-success">View</a>
						<a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
						<a href="process.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
			
		</table>
	</div>
	<div class="row justify-content-center">
		<form action="process.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $id; ?>">

			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Enter your name">
			</div>
			<div class="form-group">
				<label for="location">Location</label>
				<input type="text" id="location" class="form-control" name="location" value="<?php echo $location; ?>" placeholder="Enter your location">
			</div>
			<div class="form-group">
				<?php if($update == true): ?>
				<input type="submit" class="btn btn-primary" name="update" value="Update">
				<?php else: ?>
			 	<input type="submit" class="btn btn-primary" name="save" value="Save">
			 <?php endif; ?>
			</div>
		</form>
	</div>

	<?php 
	if(isset($_GET['view']))
	{
		$id = $_GET['view'];

		$result = $mysqli->query("SELECT * FROM data WHERE id=$id")or die($mysqli->error());
		if(count([$result])==1)
		{
			$row = $result->fetch_array();
			$name = $row['name'];
			$location = $row['location'];
		}
		?>
		<div class="d-flex justify-content-center">
			<div class="card bg-dark" style="width:300px">
				<div class="card-body text-white">
					<div class="row">
						<div class="col-5">Name:</div> 
						<div class="col-7"><?php echo $name; ?></div>
					</div>
					<div class="row">
						<div class="col-5">Location: </div>
						<div class="col-5"><?php echo $location; ?></div>
					</div>
					<br>
					<div class="row">
						<div class="col-12 d-flex justify-content-center">
							<a href="index.php" class="btn btn-primary">Hide</a>
						</div>
					</div>
				</div>		
			</div>
		</div>
	<?php } ?>

	</div>
</body>
</html>
<?php  include('process.php')
   
  ?>

<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM tab WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$surname = $n['surname'];
			$email = $n['email'];
		}
	}
?>





<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<center><h1> Php MySQL CRUD </h1></center>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
		
		
		<?php $results = mysqli_query($db, "SELECT * FROM tab"); ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Surname</th>
			<th>Email</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['surname']; ?></td>
			<td><?php echo $row['email']; ?></td>
			
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Update</a>
			</td>
			<td>
				<a href="dbConn.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	<form  method="post" action="process.php">
	<input type="hidden"  value="">
		<div class="input-group">
			<label>Name</label>
			              <input type="text"  name= "name"  value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Surname</label>
			<input type="text"    name= "surname"  value="<?php echo $surname; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text"   name = "email"  value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>
		</div>
	</form>
	
	
	
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>
	
</body>
</html>
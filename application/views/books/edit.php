
<!DOCTYPE html>
<html>
<head>
<title>Update</title>
</head>
<body>
<form method="post" action="">
<table>
<thead>
	<tr>
		<h1><?php echo $title; ?></h1>
	</tr>
<tr>
	<td>Title</td>
	<td><input type="text" name="title" value="<?php echo $result[0]->title; ?>"></td>
</tr>
<tr>
	<td>Author</td>
	<td><input type="text" name="author" value="<?php echo $result[0]->author; ?>"></td>
</tr>
<tr>
	<td><input type="submit" name="submit" value="Update"></td>
</tr>
</thead>
</table>
</form>

</body>
</html>
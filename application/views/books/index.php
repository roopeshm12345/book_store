
<style type="text/css">
	table, th, td{
		border: 1px solid black;
		border-collapse: collapse;
		padding: 10px;
	}
</style>

<h1><?php echo $title;  ?></h1>

<a href="http://localhost/project/index.php/books/create/">Add New Books</a><br><br>

<table>
	<thead>
		<th>Title</th>
		<th>content</th>
		<th colspan="3">Actions</th>
	</thead>
	<tbody>
		<?php foreach ($book as $bk) { ?>
			<tr>
				<td><?php echo $bk['title'] ?> </td>
				<td><?php echo $bk['author'] ?></td>
				<td><a href="http://localhost/project/index.php/books/edit/<?php echo $bk['id']  ?>">Edit</a></td>
				<td><a href="http://localhost/project/index.php/books/delete/<?php echo $bk['id']  ?>" onclick="return confirm('Are you sure want to delete');">Delete</a></td>
				<td><a href="http://localhost/project/index.php/books/<?php echo $bk['slug']  ?>">View</a></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
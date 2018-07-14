
<form id='my_form' role="form" method="post" action="http://localhost/project/index.php/books/create/">

	<table>
		<tr>
		<h1><?php echo $title; ?></h1>
	</tr>
	
		<tr>
			<td><label>Title</label></td>
			<td><input type="text" name="title"></td>
		</tr>
		<tr>
			<td>Author</td>
			<td><input type="text" name="author"></td>
		</tr>
		<tr>
			<td><input type="submit" name="submit" value="submit"></td>
		</tr>
	</table>
</form>
<script type="text/javascript">

	$(document).ready(function(){
		$('#my_form').submit(function(e){
			e.preventDefault();
			var type=$(this).attr('method');
			var url=$(this).attr('action');
			var data=$(this).serialize();
			$.ajax({
				url:url,
				type:type,
				data:data,				
			}).success(function(data){
				alert(data);
				if(data=='success'){
				window.location.href="http://localhost/project/index.php/books/";
				}else{
					alert('error');
					window.location.href="http://localhost/project/index.php/books/create/";
				}
				
			})
		})
	})

</script>
<table border="1">
	<tr>
		<th>UserId</th>
		<th>ID</th>
		<th>Title</th>
		<th>Body</th>
	</tr>
	@foreach($json as $item)
	<tr>
		<td>{{ $item['userId'] }}</td>
		<td>{{ $item['id'] }}</td>
		<td>{{ $item['title'] }}</td>
		<td>{{ $item['body'] }}</td>
	</tr>
	@endforeach
</table>
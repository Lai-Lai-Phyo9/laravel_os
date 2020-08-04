@extends('frontendtemplate')
@section('title','Cart Page')
	@section('content')
	<div class="container">
		<h4>Cart Page</h4>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Photo</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>SubTotal</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Item One</td>
					<img src="">
				</tr>
			</tbody>
		</table>
	</div>

	@endsection

	@section('script')
	<script type="text/javascript" src="{{ asset('frontendtemplate/js/custom.js') }}"></script>
@endsection


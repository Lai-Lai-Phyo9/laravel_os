@extends('frontendtemplate')
@section('title','Item Detail')
	@section('content')
	<div class="container">
		<h3 class="text-center">Detail Page</h3>
		<div class="row">
			<div class="col-md-6">
				<img src="{{ asset($item->photo) }}" class="img-fluid w-75 h-75">
			</div>
			<div class="col-md-6 mt-5">
				<table class="table">
				  </thead>
				  <tbody>
				    <tr><td>Product Name</td>
				    	<td>{{$item->name}}</td>
				    </tr>
				    <tr><td>Product Code</td>
				    	<td>{{$item->codeno}}</td></tr>
				    <tr><td>Product Price</td>
				    	<td>{{$item->price}}</td></tr>
				    <tr><td>Product Description</td>
				    	<td>{{$item->description}}</td></tr>
				  </tbody>
				</table>
				<a href="#" class="btn btn-secondary btn-sm addtocartBtn">Add to Cart</a>
			</div>
			
		</div>
	</div>

	@endsection

	@section('script')
	<script type="text/javascript" src="{{ asset('frontendtemplate/js/custom.js') }}">
		
	</script>
@endsection

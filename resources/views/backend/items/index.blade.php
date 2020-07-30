@extends('backendtemplate')
@section('title','Items')
@section('content')
<div class="container-fluid">
	<h2 class="d-inline ">Items List</h2>
	<a href="{{ route('items.create') }}" class="btn btn-success float-right"> Add New</a>
	<table class="table table-bordered mt-3">
		<thead>
			<tr>
				<th scope="col">No</th>
				<th scope="col">CodeNo</th>
				<th scope="col">Name</th>
				<th scope="col">Price</th>
				<th colspan="2">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($items as $item)
			<tr>
				<td>{{$item->id}}</td>
				<td>{{$item->codeno}}
					<a href=""><span class="badge badge-success">More</span></a>
				</td>

				<td>{{$item->name}}</td>
				<td>{{$item->price}}</td>
				<td><a href="{{ route('items.edit',$item->id) }}" class="btn btn-warning"><i class="far fa-edit p-1 btn-sm"></i>Edit</a>
				<form class="d-inline-block"method="post" action="{{ route('items.destroy',$item->id) }}" onsubmit="return confirm('Are your sure?')">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger"><i class="far fa-trash-alt p-1 btn-sm"></i>Delete</button>
				</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection
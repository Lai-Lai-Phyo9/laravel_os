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
				<th scope="col">Photo</th>
				<th scope="col">Price</th>
				<th colspan="2">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($items as $item)
			<tr>
				<td>{{$item->id}}</td>
				<td>{{$item->codeno}}
					<a href="{{ route('items.show',$item->id) }}">
						<span class="badge badge-success"><i class="fas fa-eye"></i></span></a>

					<a href="#" class="detailBtn" data-photo="{{asset($item->photo)}}" data-name="{{$item->name}}" data-codeno="{{$item->codeno}}" data-price="{{$item->price}}" data-description="{{$item->description}}">More</a>
				</td>

				<td>{{$item->name}}</td>
				<td><img width="15%" height="15%" class="img-circle" src="{{ URL::asset($item->photo) }}"></td>
				<td>{{$item->price}}</td>
				<td class="text-center">
					<a href="{{ route('items.edit',$item->id) }}" class="btn btn-warning mb-2" style="width: 120px;"><i class="far fa-edit p-1 btn-sm"></i>Edit</a>
				<form class="d-inline-block"method="post" action="{{ route('items.destroy',$item->id) }}" onsubmit="return confirm('Are your sure?')">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger mb-2" style="width: 120px;"><i class="far fa-trash-alt p-1 btn-sm deleteBtn"></i>Delete</button>
				</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
	<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" class="name" id="exampleModalLabel">Item Detail</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="row">
	        	<div class="col-md-6">
	        		<img src="" class="img-fluid itemImg">
	        	</div>
	        	<div class="col-md-6 content">
	        		
	        	</div>
	        	
	        </div>

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	       
	      </div>
	    </div>
	  </div>
	</div>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('.detailBtn').click(function() {

			photo=$(this).data('photo');
			name=$(this).data('name');
			codeno=$(this).data('codeno');
			price=$(this).data('price');
			description=$(this).data('description');
			// console.log(name);
			$('.itemImg').attr('src',photo);
			$('.name').text(name);
			$('.content').html(`<p>${codeno}</p>
								<p>${name}</p>
								<p>${price}MMK</p>
								<p>${description}</p>`);
			$('#detailModal').modal('show')
		});

	})
</script>
@endsection

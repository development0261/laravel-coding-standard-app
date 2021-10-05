@extends('layouts.app')
@section('title', __('modules.product.menu.view'))
@section('content')
<div class="container">	
	<div>
		<h5>{{ __('modules.product.menu.view') }}</h5>
	</div>
	<table class="table d-md-table table-responsive">
	  	<thead>
		    <tr>
		      	<th scope="col">{{ __('modules.comman.column_names.id') }}</th>
		      	<th scope="col">{{ __('modules.comman.column_names.product_name') }}</th>
		      	<th scope="col">{{ __('modules.comman.column_names.category') }}</th>
		      	<th scope="col">{{ __('modules.comman.column_names.product_price') }}</th>
		      	<th scope="col">{{ __('modules.comman.column_names.actions') }}</th>
		    </tr>
		</thead>
		<tbody>
			@php $indexNumber = $allProducts->perPage() * ($allProducts->currentPage() - 1); @endphp
			@forelse($allProducts as $key => $product)
		    <tr>
		      	<th scope="row">{{ ++$indexNumber }}</th>
		      	<td>{{ $product->product_name }}</td>  
		      	<td>{{ $product->category_name }}</td> 
		      	<td>$ {{ $product->product_price }}</td>
		      	<td>
		      		<div class="d-flex">
			      		<a class="btn btn-info btn-sm" href="{{route('products.show',['id'=> Crypt::encrypt($product->id)])}}">{{ __('modules.comman.buttons.view') }}</a>
			      		<a class="btn ml-2 btn-warning btn-sm" href="{{route('products.edit',['id'=> Crypt::encrypt($product->id)])}}">{{ __('modules.comman.buttons.edit') }}</a>
			      		<button type="button" onclick="deleteRecord('{{encrypt($product->id)}}','{{ route('products.delete',['id' => encrypt($product->id) ]) }}')" class="btn ml-2 btn-danger btn-sm">{{ __('modules.comman.buttons.delete') }}</button></td>
			      	</div>
		    </tr>
		    @empty
		    <tr>
		      	<td colspan="4">{{ __('modules.comman.messages.no_data') }}</td>
		    </tr>
		    @endforelse
		</tbody>
	</table>
	<div class="d-flex justify-content-center">
		{{$allProducts->links()}}
	</div>	
</div>
@endsection

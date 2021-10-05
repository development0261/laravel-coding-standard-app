@extends('layouts.app')
@section('title', __('modules.category.menu.view'))
@section('content')
<div class="container">	
	<div>
		<h5>{{ __('modules.category.menu.view') }}</h5>
	</div>
	<table class="table d-md-table table-responsive">
	  	<thead>
		    <tr>
		      	<th scope="col">{{ __('modules.comman.column_names.id') }}</th>
		      	<th scope="col">{{ __('modules.comman.column_names.category_name') }}</th>
		      	<th scope="col">{{ __('modules.comman.column_names.actions') }}</th>
		    </tr>
		</thead>
		<tbody>
			@php $indexNumber = $listCategories->perPage() * ($listCategories->currentPage() - 1); @endphp
			@forelse($listCategories as $key => $category)
		    <tr>
		      	<th scope="row">{{ ++$indexNumber }}</th>
		      	<td>{{ $category->category_name }}</td>  
		      	<td>
		      		<div class="d-flex">
			      		<a class="btn ml-2 btn-warning btn-sm" href="{{route('categories.edit',['category'=> Crypt::encrypt($category->id)])}}">{{ __('modules.comman.buttons.edit') }}</a>
			      		<button type="button" onclick="deleteRecord('{{encrypt($category->id)}}','{{ route('categories.destroy',['category' => encrypt($category->id) ]) }}')" class="btn ml-2 btn-danger btn-sm">{{ __('modules.comman.buttons.delete') }}</button></td>
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
		{{$listCategories->links()}}
	</div>	
</div>
@endsection

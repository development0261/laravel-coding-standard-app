@extends('layouts.app')
@section('title', __('modules.product.menu.show'))
@section('content')
<div class="container">	
	<div>
		<h5>{{ __('modules.product.menu.show') }}</h5>
	</div>	
	<div class="row mt-5">
		<div class="col-md-12">
			<table class="table table-responsive">
				<tbody>				
				    <tr>
				      	<th scope="row">{{ __('modules.comman.column_names.product_name') }}</th>
				      	<td>{{ $showProduct->product_name }}</td>
				    </tr>
				    <tr>
				      	<th scope="row">{{ __('modules.comman.column_names.product_description') }}</th>
				      	<td>{{ $showProduct->product_description }}</td>
				    </tr>
				    <tr>
				      	<th scope="row">{{ __('modules.comman.column_names.product_price') }}</th>
				      	<td>$ {{ $showProduct->product_price }}</td>
				    </tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

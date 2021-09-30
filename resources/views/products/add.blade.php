@extends('layouts.app')
@section('title', __('modules.product.menu.add'))
@section('content')
<div class="container">	
	<div>
		<h5>{{ __('modules.product.menu.add') }}</h5>
	</div>
	<hr>
	<div class="row mt-5">
		<div class="col-md-12">
			<form method="post" action="{{ route('products.store') }}">
				@csrf
				<div class="form-group">
					<label for="category">{{ __('modules.comman.field_names.category') }}</label>
					<select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
						<option value>{{ __('modules.comman.field_placeholders.category') }}</option>
						@foreach($allCategories as $category)
							<option value="{{$category->id}}" {{($category->id==old('category')) ? 'selected' : ''}}>{{ $category->category_name }}</option>
						@endforeach
					</select>
					@error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="product_name">{{ __('modules.comman.field_names.product_name') }}</label>
					<input type="text" name="product_name" id="product_name" value="{{ old('product_name') }}" placeholder="{{ __('modules.comman.field_placeholders.product_name') }}" class="form-control @error('product_name') is-invalid @enderror">
					@error('product_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="product_description">{{ __('modules.comman.field_names.product_description') }}</label>
					<textarea class="form-control @error('product_description') is-invalid @enderror" name="product_description" id="product_description" placeholder="{{ __('modules.comman.field_placeholders.product_description') }}" rows="5">{{ old('product_description') }}</textarea>
					@error('product_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="product_price">{{ __('modules.comman.field_names.product_price') }}</label>
					<input type="number" name="product_price" id="product_price" value="{{ old('product_price') }}" placeholder="{{ __('modules.comman.field_placeholders.product_price') }}" class="form-control @error('product_price') is-invalid @enderror">
					@error('product_price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="text-right">
					<button class="btn btn-info right">{{ __('modules.comman.buttons.submit') }}</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

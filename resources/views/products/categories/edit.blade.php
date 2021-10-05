@extends('layouts.app')
@section('title', __('modules.category.menu.update'))
@section('content')
<div class="container">	
	<div>
		<h5>{{ __('modules.category.menu.update') }}</h5>
	</div>
	<hr>
	<div class="row mt-5">
		<div class="col-md-12">
			<form method="post" action="{{ route('categories.update',['category' => encrypt($editCategory->id)]) }}">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="category_name">{{ __('modules.comman.field_names.category_name') }}</label>
					<input type="text" name="category_name" id="category_name" placeholder="{{ __('modules.comman.field_placeholders.category_name') }}" class="form-control @error('category_name') is-invalid @enderror" value="{{ (old('category_name') ? old('category_name') : $editCategory->category_name) }}">
					@error('category_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
				</div>
				<div class="text-right">
					<button class="btn btn-warning right">{{ __('modules.comman.buttons.update') }}</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

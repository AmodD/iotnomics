@extends('layouts.index')

@section('topcontent')
	@component('components.home-top') @endcomponent
@endsection

@section('middlecontent')

	@php
	if(empty($data)) $data = '';
	@endphp 
	
	@if((!Auth::check()) || (Route::currentRouteName() == 'main') )
		@component('components.home-middle') @endcomponent
	@else
	<link rel="stylesheet" href="https://dansup.github.io/bulma-templates/css/admin.css">
		<div class="columns">
			@component('components.menu') @endcomponent 
			@component('components.home',['data' => $data]) @endcomponent
		</div>
	@endif

@endsection


@section('bottomcontent')
	@component('components.home-bottom') @endcomponent
@endsection

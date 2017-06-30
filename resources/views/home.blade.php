@extends('layouts.index')

@section('topcontent')
	@component('components.home-top') @endcomponent
@endsection

@section('middlecontent')

	@if(Auth::check())
	@php
	if(empty($data)) $data = '';
	@endphp 

<link rel="stylesheet" href="https://dansup.github.io/bulma-templates/css/admin.css">
<div class="columns">
		@component('components.menu') @endcomponent 
		@component('components.home',['data' => $data]) @endcomponent
</div>
	@else
	@component('components.home-middle') @endcomponent
	@endif

@endsection


@section('bottomcontent')
	@component('components.home-bottom') @endcomponent
@endsection

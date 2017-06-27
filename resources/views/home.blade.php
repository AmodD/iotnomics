@extends('layouts.index')

@section('topcontent')
	@component('components.home-top') @endcomponent
@endsection

@section('middlecontent')
	@if(Auth::check())
	@php
	if(empty($data)) $data = '';
	@endphp 
		@component('components.menu') @endcomponent
		@component('components.home',['data' => $data]) @endcomponent
	@else
	@component('components.home-middle') @endcomponent
	@endif
@endsection


@section('bottomcontent')
	@component('components.home-bottom') @endcomponent
@endsection

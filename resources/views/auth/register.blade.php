
@extends('layouts.index')

@section('topcontent')
	@component('components.home-top') @endcomponent
@endsection

@section('middlecontent')
	@component('components.register') @endcomponent
@endsection


@section('bottomcontent')
	@component('components.home-bottom') @endcomponent
@endsection

@php 
$routeName =  Route::currentRouteName() ;
$componentName = 'components.'.$routeName ;
//echo $routeName ;
@endphp

@if($routeName == 'dashboard' || $routeName == 'home' || $routeName == '' )
	@component('components.dashboard',['data' => $data]) @endcomponent
@elseif($routeName == 'main')
	@component('components.home-middle') @endcomponent
@elseif($routeName == 'teamsearch' || $routeName == 'teamstore')
	@component('components.teams',['data' => $data]) @endcomponent
@else
	@component($componentName,['data' => $data]) @endcomponent
@endif

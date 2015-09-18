@extends('master')

@section('content')

	<h1>Show Song</h1>
       	<div class="form-group">
			
		{!! HTML::link('songs/'.$songs->slug.'/edit','Edit Song',array('class' => 'btn btn-primary')) !!}
	 </div>
		<li><h2>{{$songs->title}}</h2></li>
		<div class="form-group">
		{!! HTML::image('/images/catalog/'.$songs->slug.'.jpg') !!}
		 
		</div>
		@if($songs->lyrics)
			<article class="lyrics">
				{!! nl2br($songs -> lyrics) !!}
			</article>
		@endif
@stop

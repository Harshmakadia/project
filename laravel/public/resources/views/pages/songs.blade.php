@extends('master')

@section('content')

	<h1>Songs List</h1>
	<div class="form-group">
		 {!! HTML::link('songs/create','Add Song',array('class' => 'btn btn-primary')) !!}
	</div>
        @foreach($songs as $song)
			<li><a href="songs/{{$song->slug}}">{{$song -> title}}</a></li>
		@endforeach 
@stop

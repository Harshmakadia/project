@extends('master')

@section('content')

	<h1>Add Song</h1>

	 {!!Form::open(['route' => 'songs.store', 'method' => 'POST',  'files' => true])!!}
		<div class="form-group">
		 {!!Form::text('title',null, ['class' => 'form-controller'])!!}
		</div>
		
		<div class="form-group">
		 {!!Form::textarea('lyrics',null, ['class' => 'form-controller'])!!}
		</div>
		
		<div class="form-group">
		 {!!Form::text('slug',null, ['class' => 'form-controller'])!!}
		</div>
		
		<div class="form-group">
		 {!! Form::file('myname', null) !!}
		</div>
		
		
		<div class="form-group">
		 {!!Form::submit('Add Song', ['class' => 'btn btn-primary'])!!}
		</div>
	 {!!Form::close()!!}
@stop

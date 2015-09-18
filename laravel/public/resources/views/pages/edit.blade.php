@extends('master')

@section('content')

	<h1>Edit Song</h1>

	 {!!Form::model($songs, ['url' => 'songs/'.$songs->slug, 'method' => 'PATCH',  'files' => true])!!}
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
		 {!!Form::submit('Update Song', ['class' => 'btn btn-primary'])!!}
		</div>
	 {!!Form::close()!!}
@stop

@extends('master')

<div class="container">
            <div class="content">
                @foreach($lesson as $les)
					<div class="title">{{$les}}</div>
				@endforeach 
                <div class="quote">{{ Inspiring::quote() }}</div>
            </div>
</div>


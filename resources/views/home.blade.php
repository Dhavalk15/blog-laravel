@extends('layouts.master')

@section('content')
 <div class="centered">
 	<a href="{{route('niceaction',['action'=>'greet'])}}">Greet</a>
 	<a href="{{route('niceaction',['action'=>'hug'])}}">Hug</a>
 	<a href="{{route('niceaction',['action'=>'kiss'])}}">Kiss</a>
 	<br><br>
 	<form method="post" action="{{route('benice')}}">
 		<label>I Want to be...</label>
 		<select id="select-action" name="action">
 			<option value="greet">Greet</option>
 			<option value="hug">Hug</option>
 			<option value="kiss">Kiss</option>
 		</select>
 		<input type="text" name="name" value="" placeholder="">
 		<button type="submit" name="" value="submit">Do a nice action!</button>
 		<input type="hidden" name="" value="{{Session::token()}}" name="_token">
 	</form>
 </div>
@endsection
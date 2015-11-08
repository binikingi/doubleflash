@extends('app')

@section('content')
	<div id="content">
		<h1>עריכה של דף - {{$info->name}}</h1>
		<form class="admin-text" method="post" action="/editInfo">
			{{ csrf_field() }}
			<input type="hidden" name="name" value="{{ $info->name }}">
			<div>
				<label for="title">כותרת לדף:</label>
				<input type="text" class="textbox" name="title" value="{{ $info->title }}"/>
			</div>
			<div>
				<label for="description">תיאור הדף:</label>
				<textarea name="description">{{ $info->description }}</textarea>
			</div>
			<input type="submit" value="עדכן">
		</form>
	</div>
@endsection
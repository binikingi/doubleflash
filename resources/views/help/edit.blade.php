@extends('app')

@section('content')
	<!-- content -->
			<div id="content">
				<h1>עריכת תרומה</h1>
				<form method="post" action="/help/{{ $help->id }}" enctype="multipart/form-data">
					{{csrf_field()}}
					<input type="hidden" name="_method" value="PUT">
					<input type="hidden" name="img" value="{{ $help->img }}">
					<img src="{{ asset($help->img) }}"/>
					<div>
						<label for="desc">תוכן:</label>
						<textarea name="content">{{ $help->content }}</textarea>
					</div>
					<div>
						<label for="link">קישור:</label>
						<input type="text" name="link" value="{{ $help->link }}"></textarea>
					</div>
					<input type="submit" value="שלח">
				</form>
				<form method="post" action="/help/{{ $help->id }}">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="DELETE">
					<input type="submit" value="מחק!">
				</form>
			</div>
		</div>
		@if($errors->Any())
			<ul>
				@foreach($errors->all() as $err)
					<li>{{$err}}</li>
				@endforeach
			</ul>
		@endif
	<script src="{{asset('js/smoothscroll.js')}}"></script>
@endsection
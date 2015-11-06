@extends('app')

@section('content')
	<!-- content -->
			<div id="content" class="admin">
				<h1>הוספת שורה לחוזה</h1>
				<form method="post" action="/agreement">
					{{ csrf_field() }}
					<div class="admin-text">
						<label for="line">תוכן:</label>
						<textarea class="ckeditor" name="line">{{ old('line') }}</textarea>
					</div>
					<input type="submit" value="שלח"/>
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
	<script src="{{ asset('js/smoothscroll.js') }}"></script>
@endsection
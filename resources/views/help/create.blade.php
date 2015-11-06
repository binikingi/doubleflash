@extends('app')

@section('content')
	<!-- content -->
			<div id="content">
				<h1>הוספת תרומה לקהילה</h1>
				<form method="post" action="/help" enctype="multipart/form-data">
					{{csrf_field()}}
					<div>
						<label for="title">תמונה להמחשה</label>
						<input type="file" name="img">
					</div>
					<div>
						<label for="content">תוכן:</label>
						<textarea name="content">{{ old('content') }}</textarea>
					</div>
					<div>
						<label for="link">קישור:</label>
						<input type="text" name="link" value="{{ old('link') }}"></textarea>
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
	<script src="{{asset('js/smoothscroll.js')}}"></script>
@endsection
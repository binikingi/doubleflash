@extends('app')

@section('content')
	<!-- content -->
			<div id="content" class="admin">
				<h2>עריכת דף הבית</h2>
				<form method="post" action="/edit">
					{{csrf_field()}}
					<div class="textarea">
						<textarea name="content" class="ckeditor" placeholder="תוכן...">{{ $text }}</textarea>
					</div>
					<input type="submit" value="שלח">
				</form>
			</div>
		</div>
	<script src="{{asset('js/smoothscroll.js')}}"></script>
@endsection
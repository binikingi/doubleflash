@extends('app')

@section('content')
	<!-- content -->
			<div id="content">
				<h1>עריכת שורה בהסכם שירות</h1>
				<form method="post" action="/agreement/{{$line->id}}">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="PUT" />
					<div class="admin-text">
						<label for="line">תוכן:</label>
						<textarea class="ckeditor" name="line">{{$line->line}}</textarea>
					</div>
					<input type="submit" value="עדכן"/>
				</form> 
				<form method="post" action="/agreement/{{$line->id}}">
					{{ csrf_field() }}
					<input type="hidden" name="_method" value="DELETE"/>
					<input type="submit" value="מחק!"/>
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
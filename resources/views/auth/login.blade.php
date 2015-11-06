@extends('app')

@section('content')
	<!-- content -->
			<div id="content" class="admin">
				<form id="login-form" class="admin-form" method="post" action="/login">
					<input type="hidden" name="_token" value="{{csrf_token()}}">

					<input type="password" class="textbox" placeholder="סיסמה" name="password" id="password" required>
					<input type="submit" class="button" value="הכנס">
				</form>
				<div>
					@if(isset($err))
						{{$err}}
					@endif
				</div>
			<script src="{{asset('js/smoothscroll.js')}}"></script>
@endsection
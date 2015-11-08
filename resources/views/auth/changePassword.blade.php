@extends('app')

@section('content')
	<div id="content" class="admin">
				<form id="login-form" class="admin-form" method="post" action="/changePassword">
					{{ csrf_field() }}
					<input type="password" class="textbox" placeholder="סיסמה ישנה" name="oldPassword" id="password" required>
					<input type="password" class="textbox" placeholder="סיסמה חדשה" name="newPassword" id="newPassword" required>
					<input type="submit" class="button" value="שלח">
				</form>
				<div>
					@if(isset($err))
						{{$err}}
					@endif
				</div>
@endsection
@extends('app')

@section('content')
	<!-- content -->
			<div id="content" class="admin">
				<h1>הוספת אירוע</h1>
				<form method="post" action="/event" class="admin-text">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
					<div>
						<label for="title">שם אירוע:</label>
						<input class="textbox" type="text" name="title" />
					</div>
					<div>
						<label for="desc">תיאור האירוע</label>
						<textarea class="ckeditor" name="desc"></textarea>
					</div>
					<div>
						<label>שירותים שקשורים לאירוע:</label><br>
						@foreach(App\service::all() as $service)
							<input type="checkbox" id="service-{{$service->id}}" value="{{$service->id}}" name="service[]" style="display:inline-block"/>
							<label for="service-{{$service->id}}">{{$service->title}}</label>
						@endforeach
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
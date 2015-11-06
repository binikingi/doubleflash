@extends('app')

@section('content')
	<!-- content -->
			<div id="content" class="admin admin-text">
				<h1>עריכת אירוע - {{$event->title}}</h1>
				<form method="post" action="/event/{{$event->id}}">
					<input type="hidden" name="_method" value="PUT"/>
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>

					<input type="text" class="textbox" placeholder="שם אירוע" name="title" value="{{$event->title}}"/>
					<textarea name="desc" class="ckeditor" placeholder="תיאור האירוע">{{$event->desc}}</textarea>

					<label>שירותים שקשורים לאירוע:</label><br>
					@foreach(App\service::all() as $service)
						<input type="checkbox" id="service-{{$service->id}}" value="{{$service->id}}" name="service[]" style="display:inline-block" @if(in_array($service->id, $services)) {{'checked'}} @endif/>
						<label for="service-{{$service->id}}">{{$service->title}}</label>
					@endforeach
				</form>
					<input type="submit" value="שלח"/>
				<form method="post" action="/event/{{$event->id}}">
					<input type="hidden" name="_method" value="DELETE"/>
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
					<input type="submit" value="מחק!"/>
				</form>
			</div>
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
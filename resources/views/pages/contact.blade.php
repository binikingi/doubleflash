@extends('app')

@section('content')
	<!-- content -->
			<div id="content" class="contact-page">
				<div class="content contact-page">
				<form id="contact" method="post" action="/contact">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<h1 class="header contact">צור קשר</h1>
						<span class="header small-contact red">שלמה 050-8566127</span>

						<div class="contact-div" id="contact-text">
							<input type="text" class="text contact" name="fname" placeholder="שם פרטי" required><!-- 
					 	 --><input type="text" class="text contact" name="lname" placeholder="שם משפחה" required><!--
						 --><input type="text" class="text contact" name="phone" placeholder="טלפון" required><!--
						 --><select class="text contact center" name="payment" required>
								<option value="">בחר נושא</option>
								<option value="price">הצעת מחיר</option>
								<option value="meet">פגישה</option>
							</select>
							<textarea class="text contact" name="content" placeholder="תוכן" required></textarea>
						</div>

						<div class="contact-div" id="contact-event">
							<span class="contact-header">בחר אירוע:</span>

							<!--
							@foreach($events as $event)
								--><div class="button-box">
									<input type="radio" name="event" id="event-{{$event->id}}" value="{{ $event->title }}" {{isset($currEvent)&&$currEvent->id==$event->id?'checked':''}}>
									<label for="event-{{$event->id}}" class="contact-v event-v">{{$event->title}}</label> 
								</div><!--
							@endforeach
						-->
							<input type="text" class="text big contact" name="address" placeholder="מקום אירוע" required><!-- 
						 --><input type="text" class="text small contact center" name="invites" placeholder="מספר מוזמנים" required>
						</div>

						<div class="contact-div" id="contact-service">
							<span class="contact-header">בחר שירות:</span>
							<!--
							@foreach($services as $service)
								--><input type="checkbox" name="service[]" id="service-{{$service->id}}" value="{{ $service->title }}" {{isset($checkService)&&in_array($service->id, $checkService)?'checked':''}}>
								<label for="service-{{$service->id}}" class="contact-v service-v">{{$service->title}}</label><!-- 
							@endforeach
						-->
						</div>

						<div class="contact-div" id="contact-time">
							<span class="contact-header">מתי תרצה שנחזור אליך?</span>
							<input type="radio" name="time" id="time-1" value="עכשיו" checked="checked">
							<label for="time-1" class="contact-v time-v">עכשיו</label><!-- 
						 --><input type="radio" name="time" id="time-2" value="במהלך היום">
							<label for="time-2" class="contact-v time-v">בהמלך היום</label><!-- 
						 --><input type="radio" name="time" id="time-3" value="עד 21:00 הערב">
							<label for="time-3" class="contact-v time-v">עד 21:00 הערב</label><!-- 
						 --><input type="radio" name="time" id="time-4" value="מחר בבוקר">
							<label for="time-4" class="contact-v time-v">מחר בבוקר</label>
						</div>

						<input type="submit" class="text contact center submit" name="id" value="שלח">
						@if($errors->any())
							<ul>
								@foreach($errors->all() as $err)
									<li>{{ $err }}</li>
								@endforeach
							</ul>
						@endif
					</form>

					<div id="contact-left">

						<div id="contact-help">
							<h1 class="header contact">תרומה לקהילה</h1>
							@if(check())
								<a href="help/create">הוספה</a>
							@endif
							<div id="help-slider">
								<div id="help-slider-inside">
								<!--
								@foreach($helps as $help)
									--><div class="help-row">
										<img src="{{ asset($help->img) }}" alt="logo" class="help-row-img">
										<p class="help-row-text">
											{{ $help->content }}
											@if(check())
												<a href="help/{{ $help->id }}/edit">עריכה</a>
											@endif
										</p>
										<span class="row-help-button" id="row-help-{{ $help->id }}">תעודת הוקרה</span>
									</div><!--
								@endforeach
								-->
								</div>
							</div>
							<img src="{{asset('images/icons/arrow-right.png')}}" class="arrow" id="help-next" alt="arrow">
							<img src="{{asset('images/icons/arrow-left.png')}}" class="arrow" id="help-prev" alt="arrow">
						</div>


							<script src="https://maps.googleapis.com/maps/api/js"></script>
							    <script>
							      function initialize() {
							        var mapCanvas = document.getElementById('map');
							        var mapOptions = {
							          center: new google.maps.LatLng(44.5403, -78.5463),
							          zoom: 8,
							          mapTypeId: google.maps.MapTypeId.ROADMAP
							        }
							        var map = new google.maps.Map(mapCanvas, mapOptions)
							      }
							      google.maps.event.addDomListener(window, 'load', initialize);
							    </script>
						<div id="map">
						</div>
					</div>

		
				</div>
			</div>
		</div>

	<script src="{{asset('js/smoothscroll.js')}}"></script>
@endsection
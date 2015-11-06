@extends('app')

@section('content')
		<!-- content -->
			<div id="content">
			<!-- top div -->
				<div class="content">
					<span class="header header-big"><span class="header-candarai">Double</span><span class="header-candaraz">Flash</span></span>
					<div class="content-p">
						<span class="content-p-header">הפקות ואטרקציות לאירועים</span>
						<div class="text-index">
							{!! $content !!}
						</div>
						@if(check())
							<a href="/edit" class="edit">ערוך דף בית</a>
						@endif
					</div>
					<a href="contact" class="contact-span contant-span-black">צור קשר עכשיו וקבל הצעת מחיר משתלמת במיוחד</a>
				</div>
			<!-- event div -->
				<div class="content" id="event">
					<div>
						<span class="event-bg event-bg-top"></span>

						<span class="header">בחר אירוע</span>
						<span>
							@if(check())
								<a href="/event/create" class="edit">הוספת אירוע</a>
							@endif
						</span>
						<span class="event-text">היעזר במחולל האירועים שלנו ובלחיצת כפתור האירוע שלך יהיה מושלם</span>
						<ul class="list-inline list-unstyled">
							@foreach($events as $event)
								<li class="event">
									<div class="event-top">
										<span class="event-header">{{$event->title}}</span>
										<span class="event-click">לחץ לבחירה</span>
									</div>
									<div class="event-bottom">
										<p class="event-p">
											{{$event->desc}}
										</p>
										@if(check())
											<a href="event/{{ $event->id }}/edit" class="edit">עריכת אירוע זה</a>
										@endif
										<a href="contact/{{$event->id}}" class="event-chose">הזמן עכשיו</a>
									</div>
							@endforeach
						</ul>

						<span class="event-bg event-bg-bottom"></span>
					</div>
				</div>
			<!-- services -->
				<div class="content" id="service">
					<span class="service-bg-top"></span>
					<span class="event-bg service-bg-bottom"></span>
					<span class="header">שירותים</span>
					@if(check())
						<a class="edit" href="services/create">הוספת שירות</a>
					@endif
					<ul class="service-ul list-inline list-unstyled">
						@foreach($services as $service)
							<li class="service-li">
								<a href="services/{{$service->id}}" class="service-a">
									<span class="service-a-name">{{$service->title}}</span>
									<div class="service-a-image-div">
										<img src="{{asset($service->pic)}}" alt="service image" class="service-a-image">
									</div>
								</a>
						@endforeach
					</ul>
				</div>
		<!-- contact -->
			<div class="content" id="contact-small">
			<a href="contact" class="contact-span contant-span-white">צור קשר עכשיו וקבל הצעת מחיר משתלמת במיוחד</a>
			</div>
			</div>

			<div id="footer">
		 		<a href="Facebook" class="facebook" target="blank"><img src="{{asset('images/icons/facebook.jpg')}}" alt="facebook"></a>
		 		<span class="bottom-text">כל הזכויות שמורות <span class="red">|</span> <a href="http://codedesign.co.il" target="blank">CODEDESIGN.CO.IL - בניית אתרים במחירים נוחים</a> <span class="red">|</span> <a href="/login" class="admin">פאנל ניהול</a></span>
		 	</div>
		</div>

	<script src="{{asset('js/smoothscroll.js')}}"></script>
@endsection
@extends('app')

@section('content')
		<!-- content -->
			<div id="content">
				<div id="gallery-page">
					<div id="gellery">
						<div id="gallery-inside"><!--
							@foreach($servicePics as $pic)
								--><img src="{{asset($pic->pic)}}" alt="בלונים" class="galley"><!--
							@endforeach
						-->
						</div>
					</div>
					<ul id="galley-dotted" class="list-unstyled list-inline"></ul>
					<div id="galley-text">
						<span class="header gallery-header">{{$service->title}}</span>
						<div class="gallery-text">
							{!!$service->desc!!}
						</div>
						@if(check())
							<a href="/services/{{ $service->id }}/edit" class="edit">עריכת שירות זה</a>
						@endif
					</div>
					<a href="/contact/{{$service->id}}" class="gallery-choose">בחר שירות זה</a>
				</div>
			</div>
		</div>
	<script src="{{ asset('js/smoothscroll.js') }}"></script>
	<script src="{{ asset('js/gallery.js') }}"></script>
@endsection
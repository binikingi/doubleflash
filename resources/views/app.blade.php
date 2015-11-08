<!doctype html>
<html>
	<head>
        <script src="{{ asset('js/jq.js') }}"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<meta charset="utf-8">

		<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
		<meta name="viewport" content="width=device-width">
		<meta name="_token" content="{!! csrf_token() !!}"/>
		<link rel="stylesheet" href="{{ asset('css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('css/pad.css') }}" media="screen and (max-width: 830px)">
		<link rel="stylesheet" href="{{ asset('css/mobile.css') }}" media="screen and (max-width: 600px)">

		@if(isset($info))
			<meta name="description" content="{{ $info->description }}">
		@else
			<meta name="description" content="DoubleFlash - הפקות אירועים ומגנטים">
		@endif

		<title>DoubleFlash @if(isset($info)) {!! '- ' . $info->title !!} @endif</title>
		<script>
			$.ajaxSetup({
			   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});
		</script>
	</head>
	<body dir="rtl">
		<div id="wrap">

		<!-- nav bar -->
			<div id="nav" class="@if(isset($wrapClass)) {{ $wrapClass }} @endif">
				<img src="{{ asset('images/icons/menu.png') }}" alt="menu" id="menu" style="display: none;">
			<!-- right nav -->
				<ul class="list-inline list-unstyled" id="nav-bar">
					<li class="nav-link">
						<a href="/" class="nav-link-a">דף הבית</a>
					<li class="nav-link">
						<span class="nav-link-a">שירותים <span class="caret"></span></a>
						<!-- srvices -->
						<ul class="nav-link-ul list-inline list-unstyled">
							@foreach(App\service::all() as $service)
								<li class="nav-link-ul-li">
									<a href="/services/{{$service->id}}" class="nav-link-ul-a {{$service->important=='true'?'important':''}}">{{$service->title}}</a>
							@endforeach
							@if(check())
								<li class="nav-link-ul-li">
									<a href="/services/create" class="nav-link-ul-a">הוספת שירות</a>
							@endif
						</ul>
					<li class="nav-link">
						<a href="/agreement" class="nav-link-a">הסכם שירות</a>
					@if(check())
						<li class="nav-link">
							<a href="/logout" class="nav-link-a">התנתק</a>
						<li class="nav-link">
							<a href="/changePassword" class="nav-link-a">שינוי סיסמה</a>
					@endif
				</ul>
				<span class="nav-link left important">
					<a href="/contact" class="nav-link-a">צור קשר</a>
			</div>

		@yield('content')
		<script src="{{ asset('js/script.js') }}"></script>
	</body>
</html>
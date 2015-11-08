@extends('app')

@section('content')
	<!-- content -->
			<div id="content">
				<h1>עריכת שירות - {{ $service->title }}</h1>
				<form class="admin-text" method="post" action="/services/{{$service->id}}" enctype="multipart/form-data">
					<input type="hidden" name="_method" value="PUT"/>
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="hidden" name="pic1" value="ss"/>
					<div>
						<label for="title">שם השירות:</label>
						<input type="text" class="textbox" name="title" value="{{ $service->title }}"/>
					</div>
					<div>
						<label for="desc">תיאור השירות:</label>
						<textarea class="ckeditor" name="desc">{{ $service->desc }}</textarea>
					</div>
					<div>
						<label>תמונות:</label>
						@foreach($servicePic as $s)
							<div class="pic-div" style="background-image:url('{{ asset($s->pic) }}'); width:250px; height:150px; display:inline-block; background-size:100%;">
								<span class="x-pic" onclick="deletePic('{{ $s->id }}', {{ $service->id }})">X</span>
							</div>
						@endforeach
					</div>
					<div id="pics">
							<label>הוספת תמונות:</label>
							<input type="file" name="pic1" />
					</div>
					<div>
						<span class="add-img" onclick="addpic()">הוספת תמונה</span>
					</div>
					<div>
						<label>האם השירות חשוב?</label>
						<input type="checkbox" name="important" style="display: inline-block !important" @if($service->important == 'true') {{'checked'}} @endif/>
					</div>
					<input type="submit" value="שמור"/>
				</form>
				<form method="post" action="/services/{{$service->id}}">
					<input type="hidden" name="_method" value="DELETE" />
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
					<input type="submit" value="מחק!" />
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
	<script src="{{asset('js/picsScript.js')}}"></script>
@endsection
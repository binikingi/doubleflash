@extends('app')

@section('content')
	<!-- content -->
			<div id="content">
				<h1>יצירת שירות חדש</h1>
				<form class="admin-text" method="post" action="/services" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>
					<div>
						<label for="title">שם השירות:</label>
						<input type="text" class="textbox" name="title" value="{{ old('title') }}" />
					</div>
					<div>
						<label for="desc">תיאור השירות:</label>
						<textarea class="ckeditor" name="desc">{{ old('desc') }}</textarea>
					</div>
					<div id="pics">
						<label>תמונות:</label>
						<input type="file" name="pic1" />
					</div>
					<span class="add-img" onclick="addpic()">הוספת תמונה</span>
					<div>
						<input type="checkbox" name="important" style="display: inline-block !important"/>
						<label>האם השירות חשוב?</label>
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
	<script src="{{asset('js/picsScript.js')}}"></script>
@endsection
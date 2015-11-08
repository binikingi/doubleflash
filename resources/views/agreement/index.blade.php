@extends('app')

@section('content')
	<!-- content -->
			<div id="content">
				<div class="content">
					<span class="header agreement">הסכם שירות</span>
					@if(check())
						<a class="edit" href="agreement/create">הוספת שורה לחוזה</a>
						<a href="/editInfo/agreement" class="edit">עריכת פרטי דף</a>
					@endif
					<ul class="list-unstyled">
						@foreach($agreements as $agreement)
							<li class="agreement-line">
								{!!$agreement->line!!}
								@if(check())
									<br><a class="edit" href="agreement/{{ $agreement->id }}/edit">עריכת שורה</a>
								@endif
						@endforeach
					</ul>
					<form id="agreement" method="post">
						<input type="text" class="text agreement" name="name" placeholder="שם מלא"><!-- 
					 --><input type="text" class="text agreement center" name="id" placeholder="מספר פנייה">
						<input type="checkbox" id="agree">
						<label for="agree" class="agree-v agreement-line agreement-v-bg">בעת סימון תיבה זו את/ה מצהיר/ה כי מוסכמים עליך התנאים הנ"ל.</label>
						<select class="text agreement center" name="payment">
							<option value="">בחר אמצעי תשלום</option>
							<option value="transfer">העברה בנקאית</option>
							<option value="check">צ'ק</option>
							<option value="credit">אשראי</option>
							<option value="cash">מזומן</option>
						</select><!-- 
					 --><input type="submit" class="text agreement center submit" name="id" value="שלח">
						</form>
				</div>
			</div>
		</div>

	<script src="{{asset('js/smoothscroll.js')}}"></script>
@endsection
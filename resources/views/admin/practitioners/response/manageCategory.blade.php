<div class="row">
	<div class="col-12">
		<form method="post" action="{{route('admin.practitioners.manageCategory.update')}}">
			@csrf
			<input type="hidden" name="uid" value="{{base64_encode($uid)}}">
			@foreach($categories as $val)
				<div class="category_list">
					<input  type="checkbox" name="cat_id[]" value="{{base64_encode($val->id)}}"
						@foreach($userCat as $cval)
							@if($cval->category_id == $val->id)
								checked 
							@endif
						@endforeach
					>
					&nbsp;&nbsp;{{$val->category}}
				</div>
			@endforeach
			<br>
			<button type="submit" class="btn btn-primary pull-right">Update</button>		
		</form>
	</div>
</div>

@extends('includes.master')
@section('title', 'Completed Bookings')

@section('sidebar')@include('admin.includes.sidebar')@endsection
@section('topbar')@include('admin.includes.topbar')@endsection

@section("content")
<div class="dashboard-wrapper">
    <div class="box-type4">
      <div class="page-title">
        <h3 class="col-white"> {{ (@$is_edit) ? 'update' : 'Add' }} Category </h3>
      </div>
       <div class="box-type1">
        <form action="{{route('admin.add_categories')}}" method="post" enctype='multipart/form-data'>
        <div class="row">

                    @csrf
                    <input type="hidden" name="id" value="{{@$edit_data->id}}">
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"> <br>
                        <div class="form-field3">
                            <p> Category Name </p>
                            <input type="text" name="cat_name" value="{{@$edit_data->category}}" required="">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12"> <br>
                        <div class="form-field3">
                            <p> Image </p>
                            <input type="file" name="cat_img"  {{ (@$is_edit) ? '' : 'required' }}>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                        <div class="form-field3">
                        <input type="hidden" name="cat_id" value="{{@$edit_data->id}}">
                        <button class="normal-btn bg-blue col-white rounded"> Save </button>
                        </div>
                    </div>

          </div>
        </form>
       </div>
    </div>
    <div class="box-type4">
    <div class="page-title">
       <h3 class="col-white"> All Category </h3>
    </div>
    <div class="box-type1">
       <div class="table-overlay table-type1">
          <table>
             <thead>
                <tr>
                   <th> # </th>
                   <th> Category Name </th>
                   <th>Image</th>
                   <th width='35%'> Actions </th>
                </tr>
             </thead>
             <tbody>
                 @foreach ($category as $key => $item)
                    <tr>
                    <td> {{$key+1}} </td>
                    <td> {{$item->category}} </td>
                    <td><img src="{{URL::to('/')}}/{{$item->image}}"> </td>
                    <td>
                        <a href="{{route('admin.edit_category',base64_encode($item->id))}}" class="custom-btn1"> Edit  </a>
                        <a onclick="return confirm_click();" href="{{route('admin.delete_category',base64_encode($item->id))}}" class="custom-btn1"> Delete  </a>
                        <a href="{{route('admin.manage_services',base64_encode($item->id))}}" class="custom-btn1"> Manage Services  </a>
                     </td>
                    </tr>
                @endforeach
             </tbody>
          </table>
       </div>
    </div>
 </div>

 </div>
 @endsection
<script type="text/javascript">
   function confirm_click()
   {
    return confirm("Are you sure ?");
   }
</script>

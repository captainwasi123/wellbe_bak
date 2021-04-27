@extends('includes.master')
@section('title', 'Custom Services')

@section('sidebar')@include('admin.includes.sidebar')@endsection
@section('topbar')@include('admin.includes.topbar')@endsection

@section("content")
<div class="dashboard-wrapper">
    <div class="box-type4">
    <div class="page-title">
       <h3 class="col-white"> Custom Services </h3>
    </div>


    <div class="box-type1">



       <div class="tabs-handlers3">
        <ul class="nav nav-tabs" role="tablist">
<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"> All </a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"> Pending </a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"> Approved </a>
</li>
<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#tabs-4" role="tab"> Rejected </a>
</li>
</ul><!-- Tab panes -->
       </div>

       <div class="tabs-content3">
       <div class="tab-content">
<div class="tab-pane active" id="tabs-1" role="tabpanel">
<div class="table-overlay table-type1">
          <table>
             <thead>
                <tr>
                   <th> Services Name </th>
                   <th> Price </th>
                   <th> Description </th>
                   <th> Practitioner </th>
                   <th> Added On </th>
                   <th> Status </th>
                   <!-- <th> Actions </th> -->
                </tr>
             </thead>
             <tbody>
               @foreach($all_services as $all_services)
                <tr>
                   <td class="col-blue"> {{$all_services->name}} </td>
                   <td> ${{$all_services->price}} </td>
                   <td> {{$all_services->duration}}  </td>
                   <td class="col-blue"> {{$all_services->practitioner->first_name}} {{$all_services->practitioner->last_name}} </td>
                   <td>  {{date('d, M Y - h:i a', strtotime($all_services->created_at))}}</td>
                   <td>
                     {{$all_services->status == 1 ? 'Pending' : ''}}
                     {{$all_services->status == 2 ? 'Approved' : ''}} 
                     {{$all_services->status == 3 ? 'Rejected' : ''}}
                   </td>
                   <!-- <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td> -->
                </tr>
              @endforeach
             </tbody>
          </table>
       </div>
</div>
<div class="tab-pane" id="tabs-2" role="tabpanel">
<div class="table-overlay table-type1">
          <table>
             <thead>
                <tr>
                   <th> Services Name </th>
                   <th> Price </th>
                   <th> Description </th>
                   <th> Practitioner </th>
                   <th> Added On </th>
                   <th> Status </th>
                   <th> Actions </th>
                </tr>
             </thead>
             <tbody>
             @foreach($pending_services as $pending_services)
                <tr>
                   <td class="col-blue"> {{$pending_services->name}} </td>
                   <td> ${{$pending_services->price}} </td>
                   <td> {{$pending_services->duration}}  </td>
                   <td class="col-blue"> {{$pending_services->practitioner->first_name}} {{$pending_services->practitioner->last_name}} </td>
                   <td>  {{date('d, M Y - h:i a', strtotime($pending_services->created_at))}}</td>
                   <td> Pending </td>
                   <td class="actions-box3"> 
                     <a class="bg-green col-white" href="{{route('admin.custom_services.update',['status' => 'approve', 'id' => base64_encode($pending_services->id)])}}"> <i class="fa fa-check"> </i> </a>
                     <a class="bg-red col-white" href="{{route('admin.custom_services.update',['status' => 'rejected', 'id' => base64_encode($pending_services->id)])}}"> <i class="fa fa-times"> </i> </a>
                   </td>
                </tr>
              @endforeach  
             </tbody>
          </table>
       </div>
</div>
<div class="tab-pane" id="tabs-3" role="tabpanel">
<div class="table-overlay table-type1">
          <table>
             <thead>
                <tr>
                   <th> Services Name </th>
                   <th> Price </th>
                   <th> Description </th>
                   <th> Practitioner </th>
                   <th> Added On </th>
                   <th> Status </th>
                   <!-- <th> Actions </th> -->
                </tr>
             </thead>
             <tbody>
             @foreach($approved_services as $approved_services)
                <tr>
                   <td class="col-blue"> {{$approved_services->name}} </td>
                   <td> ${{$approved_services->price}} </td>
                   <td> {{$approved_services->duration}}  </td>
                   <td class="col-blue"> {{$approved_services->practitioner->first_name}} {{$approved_services->practitioner->last_name}} </td>
                   <td>  {{date('d, M Y - h:i a', strtotime($approved_services->created_at))}}</td>
                   <td> Approved </td>
                   <!-- <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td> -->
                </tr>
              @endforeach  
             </tbody>
          </table>
       </div>
</div>
<div class="tab-pane" id="tabs-4" role="tabpanel">
<div class="table-overlay table-type1">
          <table>
             <thead>
                <tr>
                   <th> Services Name </th>
                   <th> Price </th>
                   <th> Description </th>
                   <th> Practitioner </th>
                   <th> Added On </th>
                   <th> Status </th>
                   <!-- <th> Actions </th> -->
                </tr>
             </thead>
             <tbody>
               @foreach($rejected_services as $rejected_services)
                <tr>
                   <td class="col-blue"> {{$rejected_services->name}} </td>
                   <td> ${{$rejected_services->price}} </td>
                   <td> {{$rejected_services->duration}}  </td>
                   <td class="col-blue"> {{$rejected_services->practitioner->first_name}} {{$rejected_services->practitioner->last_name}} </td>
                   <td>  {{date('d, M Y - h:i a', strtotime($rejected_services->created_at))}}</td>
                   <td> Rejected </td>
                   <!-- <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td> -->
                </tr>
              @endforeach
             </tbody>
          </table>
       </div>
</div>
</div>
       </div>




    </div>
 </div>




 </div>
@endsection

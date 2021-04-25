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
                   <th> Actions </th>
                </tr>
             </thead>
             <tbody>
                <tr>
                   <td class="col-blue"> Relaxing Message </td>
                   <td> $80 </td>
                   <td> A soothing message using gentle...  </td>
                   <td class="col-blue"> Paige </td>
                   <td> Jan 24, 2021 - 12:00 AM </td>
                   <td> Pending </td>
                   <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td>
                </tr>

                <tr>
                   <td class="col-blue"> Deep Tissue Massage </td>
                   <td> $80 </td>
                   <td> A soothing message using gentle...  </td>
                   <td class="col-blue"> Paige </td>
                   <td> Jan 24, 2021 - 12:00 AM </td>
                   <td> Pending </td>
                   <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td>
                </tr>


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
                <tr>
                   <td class="col-blue"> Relaxing Message </td>
                   <td> $80 </td>
                   <td> A soothing message using gentle...  </td>
                   <td class="col-blue"> Paige </td>
                   <td> Jan 24, 2021 - 12:00 AM </td>
                   <td> Pending </td>
                   <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td>
                </tr>

                <tr>
                   <td class="col-blue"> Deep Tissue Massage </td>
                   <td> $80 </td>
                   <td> A soothing message using gentle...  </td>
                   <td class="col-blue"> Paige </td>
                   <td> Jan 24, 2021 - 12:00 AM </td>
                   <td> Pending </td>
                   <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td>
                </tr>
                   <tr>
                   <td class="col-blue"> Relaxing Message </td>
                   <td> $80 </td>
                   <td> A soothing message using gentle...  </td>
                   <td class="col-blue"> Paige </td>
                   <td> Jan 24, 2021 - 12:00 AM </td>
                   <td> Pending </td>
                   <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td>
                </tr>

                <tr>
                   <td class="col-blue"> Deep Tissue Massage </td>
                   <td> $80 </td>
                   <td> A soothing message using gentle...  </td>
                   <td class="col-blue"> Paige </td>
                   <td> Jan 24, 2021 - 12:00 AM </td>
                   <td> Pending </td>
                   <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td>
                </tr>


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
                   <th> Actions </th>
                </tr>
             </thead>
             <tbody>
                <tr>
                   <td class="col-blue"> Relaxing Message </td>
                   <td> $80 </td>
                   <td> A soothing message using gentle...  </td>
                   <td class="col-blue"> Paige </td>
                   <td> Jan 24, 2021 - 12:00 AM </td>
                   <td> Pending </td>
                   <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td>
                </tr>

                <tr>
                   <td class="col-blue"> Deep Tissue Massage </td>
                   <td> $80 </td>
                   <td> A soothing message using gentle...  </td>
                   <td class="col-blue"> Paige </td>
                   <td> Jan 24, 2021 - 12:00 AM </td>
                   <td> Pending </td>
                   <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td>
                </tr>

                <tr>
                   <td class="col-blue"> Relaxing Message </td>
                   <td> $80 </td>
                   <td> A soothing message using gentle...  </td>
                   <td class="col-blue"> Paige </td>
                   <td> Jan 24, 2021 - 12:00 AM </td>
                   <td> Pending </td>
                   <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td>
                </tr>


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
                   <th> Actions </th>
                </tr>
             </thead>
             <tbody>
                <tr>
                   <td class="col-blue"> Relaxing Message </td>
                   <td> $80 </td>
                   <td> A soothing message using gentle...  </td>
                   <td class="col-blue"> Paige </td>
                   <td> Jan 24, 2021 - 12:00 AM </td>
                   <td> Pending </td>
                   <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td>
                </tr>

                <tr>
                   <td class="col-blue"> Deep Tissue Massage </td>
                   <td> $80 </td>
                   <td> A soothing message using gentle...  </td>
                   <td class="col-blue"> Paige </td>
                   <td> Jan 24, 2021 - 12:00 AM </td>
                   <td> Pending </td>
                   <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td>
                </tr>


                 <tr>
                   <td class="col-blue"> Relaxing Message </td>
                   <td> $80 </td>
                   <td> A soothing message using gentle...  </td>
                   <td class="col-blue"> Paige </td>
                   <td> Jan 24, 2021 - 12:00 AM </td>
                   <td> Pending </td>
                   <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td>
                </tr>

                <tr>
                   <td class="col-blue"> Deep Tissue Massage </td>
                   <td> $80 </td>
                   <td> A soothing message using gentle...  </td>
                   <td class="col-blue"> Paige </td>
                   <td> Jan 24, 2021 - 12:00 AM </td>
                   <td> Pending </td>
                   <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td>
                </tr>



                 <tr>
                   <td class="col-blue"> Relaxing Message </td>
                   <td> $80 </td>
                   <td> A soothing message using gentle...  </td>
                   <td class="col-blue"> Paige </td>
                   <td> Jan 24, 2021 - 12:00 AM </td>
                   <td> Pending </td>
                   <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td>
                </tr>

                <tr>
                   <td class="col-blue"> Deep Tissue Massage </td>
                   <td> $80 </td>
                   <td> A soothing message using gentle...  </td>
                   <td class="col-blue"> Paige </td>
                   <td> Jan 24, 2021 - 12:00 AM </td>
                   <td> Pending </td>
                   <td class="actions-box3"> <a class="bg-green col-white"> <i class="fa fa-check"> </i> </a>  <a class="bg-red col-white"> <i class="fa fa-times"> </i> </a> </td>
                </tr>


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

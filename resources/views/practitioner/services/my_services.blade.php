@extends('includes.master')
@section('title', 'Your Services')

@section('sidebar')@include('practitioner.includes.sidebar')@endsection
@section('topbar')@include('practitioner.includes.topbar')@endsection

@section('content')
     
  <div class="dashboard-wrapper">
    <div class="box-type4">
      <div class="page-title">
         <h3 class="col-white"> Your Services </h3>
      </div>
      <div class="block-element cat-buttons mob-text-left m-t-20 pad-1">
         <button class="normal-btn2 bg-blue col-white"> Approved </button>
         <button class="normal-btn2 bg-white col-black"> Pending </button>
         <button class="normal-btn2 bg-white col-black"> Rejected </button>
      </div>
      <div class="block-element pad-1">
         <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
               <div class="box-type3 height-custom1" style="overflow:visible;" style="position: relative;">
                  <div class="cat-head">
                     <h5 class="col-black"> Category (2) </h5>
                  </div>
                  <div class="all-categories">
                     <div class="cat-box1">
                        <h5> Nails  </h5>
                        <div class="dropdown">
                           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                           <i class="fas fa-ellipsis-v"></i>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="#">Add Services</a></li>
                              <li><a href="#">Disable</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="cat-box1">
                        <h5> Brows and Lashes  </h5>
                        <div class="dropdown">
                           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                           <i class="fas fa-ellipsis-v"></i>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="#">Add Services</a></li>
                              <li><a href="#">Disable</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>

                  <div class="category-message">
                  <p> Want to offer a new service category? <a href="#" class="col-blue"> Contact us to let us know! </a> </p>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
               <div class="box-type3 height-custom1" style="overflow:visible;">
                  <div class="cat-head">
                     <h5 class="col-black"> Services (7) </h5>
                     <div class="action-buttons"> <a href=""> <i class="fa fa-search"> </i> </a> <a href="" class="fa fa-plus"></a> </div>
                  </div>
                  <div class="all-categories">
                     <div class="cat-box1">
                        <h5> Classic Manicure </h5>
                        <div class="dropdown">
                           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                           <i class="fas fa-ellipsis-v"></i>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="#">Delete</a></li>
                              <li><a href="#">Edit</a></li>
                              <li><a href="#">Duplicate</a></li>
                              <li><a href="#">Cariants/Add-ons</a></li>
                              <li><a href="#">Disable</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="cat-box1">
                        <h5> Classic Pedicure </h5>
                        <div class="dropdown">
                           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                           <i class="fas fa-ellipsis-v"></i>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="#">Delete</a></li>
                              <li><a href="#">Edit</a></li>
                              <li><a href="#">Duplicate</a></li>
                              <li><a href="#">Cariants/Add-ons</a></li>
                              <li><a href="#">Disable</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="cat-box1">
                        <h5> Gel Manicure </h5>
                        <div class="dropdown">
                           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                           <i class="fas fa-ellipsis-v"></i>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="#">Delete</a></li>
                              <li><a href="#">Edit</a></li>
                              <li><a href="#">Duplicate</a></li>
                              <li><a href="#">Cariants/Add-ons</a></li>
                              <li><a href="#">Disable</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="cat-box1">
                        <h5> Gel Pedicure </h5>
                        <div class="dropdown">
                           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                           <i class="fas fa-ellipsis-v"></i>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="#">Delete</a></li>
                              <li><a href="#">Edit</a></li>
                              <li><a href="#">Duplicate</a></li>
                              <li><a href="#">Cariants/Add-ons</a></li>
                              <li><a href="#">Disable</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="cat-box1">
                        <h5> Classic Manicure & Classic Pedicure </h5>
                        <div class="dropdown">
                           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                           <i class="fas fa-ellipsis-v"></i>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="#">Delete</a></li>
                              <li><a href="#">Edit</a></li>
                              <li><a href="#">Duplicate</a></li>
                              <li><a href="#">Cariants/Add-ons</a></li>
                              <li><a href="#">Disable</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="cat-box1">
                        <h5> Gel Manicure & Gel Pedicure </h5>
                        <div class="dropdown">
                           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                           <i class="fas fa-ellipsis-v"></i>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="#">Delete</a></li>
                              <li><a href="#">Edit</a></li>
                              <li><a href="#">Duplicate</a></li>
                              <li><a href="#">Cariants/Add-ons</a></li>
                              <li><a href="#">Disable</a></li>
                           </ul>
                        </div>
                     </div>
                     <div class="cat-box1">
                        <h5> Gel Manicure & Classic Pedicure</h5>
                        <div class="dropdown">
                           <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                           <i class="fas fa-ellipsis-v"></i>
                           </button>
                           <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="#">Delete</a></li>
                              <li><a href="#">Edit</a></li>
                              <li><a href="#">Duplicate</a></li>
                              <li><a href="#">Cariants/Add-ons</a></li>
                              <li><a href="#">Disable</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
               <div class="box-type3 height-custom1" style="overflow: visible;">
                  <div class="cat-head">
                     <h5 class="col-black"> Services Details </h5>
                  </div>
                  <div class="manicure-text">
                     <h5 class="col-black"> Classic Manicure </h5>
                     <h6 class="col-blue"> NZ$ 0.00 </h6>
                     <p> A classic manicure with cuticle work, hand massage, shaping and painting with po <a href="" class="col-blue"> Read more </a> </p>
                  </div>

                  <div class="manicure-variants">
                     <h4> Variants/Add-ons <a href="" class="col-blue"> Add </a> </h4>
                     <table>
                      <thead>
                        <tr>
                          <th> Extras </th>
                          <th> <a href=""> <i class="fa fa-pencil-alt"> </i> </a> <a href=""> <i class="fa fa-trash"> </i> </a> </th>
                        </tr>
                      </thead>
                        <tbody>
                           <tr>
                              <td> Nail Art </td>
                              <td> NZ$ 15.00 </td>
                           </tr>
                           <tr>
                              <td> Glitter </td>
                              <td> NZ$ 5.00 </td>
                           </tr>
                           <tr>
                              <td> Gel Polish Removal </td>
                              <td> NZ$ 15.00 </td>
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
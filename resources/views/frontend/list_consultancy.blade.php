@extends('frontend.welcome')
@section('body')
   <div class="list_collage">
       <div class="container-fluid">
           <div class="list_collage_add">
               <h2>LIST OF TOP CONSULTANCY IN NEPAL BASED ON 2019 RANKING</h2>
               <img src="{{asset('public/frontend/images/listCollage/ads1.gif')}}" alt="">
           </div>
           <div class="row">
               <div class="col-md-3">
                  <div class="list_collage_search">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search for...">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                          </span>
                      </div><!-- /input-group -->
                  </div>
               </div>
               <div class="col-md-9">
                   <div class="total_list_collage">
                       <div class="row">
                           @foreach($AllConsultancy as $colleges)
                           <div class="col-md-4">
                               <div class="list_of_collage">
                                   <a class="twPc-bg twPc-block" style="background-image: url('{{asset('public/frontend/images/uploads/college/feature').'/'.$colleges->featured_image}}');"></a>
                                   <div class="twPc-button">
                                       <div class="top_feature_collage_view">
                                           <p>
                                               <i class="fa fa-eye"></i>3232
                                           </p>
                                       </div>
                                   </div>
                                   <a title="Mert S. Kaplan" href="#" class="twPc-avatarLink">
                                       <img alt="" src="{{url('public/frontend/images/uploads/college/logo').'/'.$colleges->logo}}" class="twPc-avatarImg">
                                   </a>
                                   <div class="twPc-divUser">
                                       <div class="collage_name">
                                          <h2> <a href="{{url('').'/'.$colleges->user->name}}">{{$colleges->company_name}}</a></h2>
                                       </div>
                                       <span>
                                        <a href="#">
                                             <i class="fa fa-map-marker"></i>
                                             <span> {{$colleges->address}}</span>
                                          </a>
                                        </span>
                                   </div>
                                   <div class="list_admission_course">
                                       <a href="#"> Admission 2019</a> <a href="{{url($colleges->user->name.'/'.'course-fee')}}"> Course & Fee</a>
                                   </div>
                                   <div class="list_apply_brochure">
                                       <h2 class="Apply_now_l_c"><a href="#">APPLY NOW</a> <a class="Apply_now_l_b" href="#">BROCHURE</a></h2>
                                   </div>
                               </div>
                           </div>{{--COL-MD 4 END--}}
                               @endforeach
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection

@extends('backend.superadmin.index')
@section('body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add New
                @if(request()->segment('2') =='add-college') College
                @elseif(request()->segment('2') =='add-consultancy') Consultancy
                @elseif(request()->segment('2') =='add-university') University
                @elseif(request()->segment('2') =='add-school') School
                @elseif(request()->segment('2') =='add-institute') Institute
                @else
                @endif
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <div style="clear: both;"></div>
            @if(session('success'))
                <div class="col-sm-12">
                    <div role="alert" style="background-color:#d4edda; color:#155724; border-radius: 5px;" class="alert  alert-dismissible show">
                        <span class="btn btn-success btn-xs">Success</span> {{session('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div style="clear: both;"></div>
            @endif
            @if($errors->any())
                <div class="col-sm-12">
                    <div role="alert" style="background-color:#d4edda; color:#155724; border-radius: 5px;" class="alert  alert-dismissible show">
                        @foreach($errors->all() as $error)
                            <span class="btn btn-danger btn-xs">Error</span> {{$error}}<br>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div style="clear: both;"></div>
            @endif
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="College_name">Full Name <font color="#ff0000">*</font></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="College_name" name="College_name"  placeholder="" data-validation="required" data-validation-error-msg="College name is required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="name">User Name <font color="#ff0000">*</font></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="name" class="form-control" placeholder="username" data-validation="required" data-validation-error-msg="User Name Required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="College_nature">Nature Of Company <font color="#ff0000">*</font></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="College_nature_id" id="College_nature_id" data-validation="required" data-validation-error-msg="College nature is required" >
                                                    @if(request()->segment('2') =='add-college')
                                                        <option value="1">College</option>
                                                        @elseif(request()->segment('2') =='add-university')
                                                        <option value="2">University</option>
                                                        @elseif(request()->segment('2') =='add-consultancy')
                                                        <option value="3">Consultancy</option>
                                                        @elseif(request()->segment('2') =='add-institute')
                                                        <option value="4">Institute</option>
                                                        @elseif(request()->segment('2') =='add-school')
                                                        <option value="5">School</option>
                                                    @endif
                                                    {{--@foreach($Nature as $CompanyNature)--}}
                                                        {{--<option value="{{$CompanyNature->id}}">{{$CompanyNature->name}}</option>--}}
                                                    {{--@endforeach--}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="College_nature">Company Type <font color="#ff0000">*</font></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="College_type" id="College_type" data-validation="required" data-validation-error-msg="Status is required" >
                                                    <option value="">Select Type</option>
                                                    <option value="General">General</option>
                                                    <option value="Featured">Featured</option>
                                                    <option value="Sponser">Sponser</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="College_address">Country <font color="#ff0000">*</font></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <select name="country_id" id="country_id" class="form-control" data-validation="required" data-validation-error-msg="Country is required">
                                                    <option value="">Select Country</option>
                                                    @foreach($Country as $countries)
                                                        <option value="{{$countries->id}}" >{{$countries->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="district_id">State/District <font color="#ff0000">*</font></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <select name="district_id" id="district_id" class="form-control">
                                                    <option value="">Select District</option>
                                                    @foreach($District as $districts)
                                                        <option value="{{$districts->id}}">{{$districts->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>District Not Found? <a href="{{url('superadmin/district')}}">Click here</a></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="College_address">Address</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" id="College_address" name="College_address" placeholder="Location">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="office_contact">Office Contact</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="office_contact" class="form-control" id="office_contact" placeholder="Contact Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="website">Website</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="website" class="form-control" id="website" placeholder="www.example.com" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="contact_person">Contact Person</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="contact_person"  class="form-control"  id="contact_person" placeholder="Contact Person">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="mobile">Mobile</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="text" name="mobile"  class="form-control"  id="mobile" placeholder="Mobile Number"  >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="College_nature">Status</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="status" id="status">
                                                    <option value="1">InActive</option>
                                                    <option value="2">Active</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="com_establised">Company Established Date</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <input type="date" name="com_establised" id="com_establised" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="photo">Logo</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <i style="font-size: 13px; color: red;">(Minimum Size: width:100px height: 100px)</i>
                                                <input id="logo" name="logo" class="btn btn-warning" type="file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="photo">Feature Images</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <i style="font-size: 13px; color: red;">(Minimum Size: width:100px height: 100px)</i>
                                                <input id="featured_image" name="featured_image" class="btn btn-warning" type="file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label for="photo">Banner</label>
                                            </div>
                                            <div class="col-sm-8">
                                                <i style="font-size: 13px; color:red;">(Minimum Size: width:1300px height: 350px)</i>
                                                <input id="banner" name="banner" class="btn btn-warning" type="file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="College_profile">Company Profile; </label>
                                        <textarea id="editor1" name="College_profile" rows="10" cols="80"></textarea>
                                        {{--<textarea class="form-control content" id="editor1" name="College_profile" placeholder="College profile" ></textarea>--}}
                                    </div>

                                    <div class="row">
                                        <div class="form-group  col-xs-offset-4  col-sm-4">
                                            <button type="submit" class="btn  btn-primary">Create</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
@section('script')

@endsection
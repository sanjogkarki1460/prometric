@extends('Admin.Layout.master')
@section('main_content')

    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">Add Visitor Log</div>
                        </div>
                        <div class=" pull-right">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                       href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li></i>&nbsp;<a class="parent-item"
                                                 href="{{route('IncomingCallLog.index')}}">Visitor Log
                                        View</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Visitor Log Create</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="{{route('VisitorLog.store')}}" method="post" enctype="multipart/form-data">
                        <input required type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 40px;margin-bottom:0px;">Visited By*</p>
                                    <input style="margin-left: 0px;" id="applicant_select" type="radio" name="visited_by" value="Applicant" >Applicant
                                    <input type="radio" name="visited_by" id="enquiry_select" value="Enquiry">Enquiry
                                </div>
                            </div>
                        </div>
                        <div class="container d-none" id="select_applicant">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 0px;">Select Applicant*</p>
                                    <select class="form-control form select2" id="applicant"
                                            style="height:50%;width:80%;margin-top: -20px;" name="applicant_id">
                                        <option value="" selected disabled></option>
                                        @foreach($applicant as $applicant)
                                            <option value="{{$applicant->id}}">{{$applicant->first_name}} {{$applicant->middel_name}} {{$applicant->surname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container d-none" id="select_enquiry">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 0px;">Select Enquiry*</p>
                                    <select class="form-control form select2" id="enquiry"
                                            style="height:50%;width:80%;margin-top: -20px;" name="enquiry_id">
                                        <option value="" selected disabled></option>
                                        @foreach($enquiry as $enquiry)
                                            <option value="{{$enquiry->id}}">{{$enquiry->first_name}} {{$enquiry->middle_name}} {{$enquiry->last_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 0px;">Date*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;"
                                           type="date" name="date">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 0px;">Time*</p>
                                    <input required class="form form-control"
                                           style="width: 80%;height:34px;"
                                           type="time" name="time">
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 0px;">Purpose of Visit*</p>
                                    <textarea class="form form-control"
                                              style="width: 80%;" rows="5"
                                              type="time" name="purpose"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="ah1" style="margin-top: 20px;margin-bottom: 0px;">Remarks*</p>
                                    <textarea class="form form-control"
                                              style="width: 80%;" rows="5"
                                              type="time" name="remarks"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="submit" style="margin-top: 40px;margin-bottom: 30px;">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#applicant').select2({
                        placeholder: "Select a Applicant",
                        allowClear:true
                    });
                    $('#enquiry').select2({
                        placeholder: "Select a Enquiry",
                        allowClear:true
                    });

                    $("#applicant_select").click(function () {
                        $("#select_applicant").removeClass('d-none');
                        $("#select_enquiry").addClass('d-none');
                    });
                    $("#enquiry_select").click(function () {
                        $("#select_enquiry").removeClass('d-none');
                        $("#select_applicant").addClass('d-none');
                    });

                });
            </script>
@endsection
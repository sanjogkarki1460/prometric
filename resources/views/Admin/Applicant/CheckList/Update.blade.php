@extends('Admin.Layout.master')
@section('main_content')

    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">Update Applicant CheckList</div>
                        </div>
                        <div class=" pull-right">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                       href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li></i>&nbsp;<a class="parent-item"
                                                 href="{{route('CheckList.index')}}">Applicant CheckList View</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>
                                <li class="active">Applicant CheckList Update</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <form action="{{route('CheckList.update',$checklist->id)}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input  type="hidden" name="_method" value="put">
                        <input class="d-none" type="hidden" name="applicant_id" readonly value="{{$checklist->applicant_id}}">
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label" for="name">password_citizenship_certificate</label>
                                        <input @if($checklist->password_citizenship_certificate=='Yes') Checked @endif  type="checkbox" name="password_citizenship_certificate" id="a1"
                                           class="toggleswitch" value="@if($checklist->password_citizenship_certificate=='Yes' ? 'Yes' : 'No') @endif">
                                    <br>
                                    <label class="control-label" for="name">slc_certificate</label>
                                    <input @if($checklist->slc_certificate=='Yes') Checked @endif type="checkbox" name="slc_certificate" class="toggleswitch" id="a2" value="Yes">

                                    <br>
                                    <label class="control-label" for="name">plus_two_isc_pcl_certificate</label>
                                    <input @if($checklist->plus_two_isc_pcl_certificate=='Yes') Checked @endif type="checkbox" name="plus_two_isc_pcl_certificate" id="a3" value="Yes">
                                    <br>

                                    <label class="control-label" for="name">diploma_degree_certificate</label>
                                    <input @if($checklist->diploma_degree_certificate=='Yes') Checked @endif type="checkbox" name="diploma_degree_certificate" id="a4" value="Yes">
                                    <br>
                                    <label class="control-label"
                                           for="name">mark_sheet_of_each_year_final_transcript</label>
                                    <input @if($checklist->mark_sheet_of_each_year_final_transcript=='Yes') Checked @endif type="checkbox" name="mark_sheet_of_each_year_final_transcript" id="a5"
                                           value="Yes">
                                    <br>
                                    <label class="control-label" for="name">equivalent_certificate</label>
                                    <input @if($checklist->equivalent_certificate=='Yes') Checked @endif type="checkbox" name="equivalent_certificate" id="a6" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">council_registration_certificate</label>
                                    <input @if($checklist->council_registration_certificate=='Yes') Checked @endif type="checkbox" name="council_registration_certificate" id="a7" value="Yes">
                                    <br>
                                    <label class="control-label"
                                           for="name">council_registration_certificate_renew</label>
                                    <input @if($checklist->council_registration_certificate_renew=='Yes') Checked @endif type="checkbox" name="council_registration_certificate_renew" id="a8"
                                           value="Yes">
                                    <br>
                                    <label class="control-label" for="name">good_standing_letter_from_council</label>
                                    <input @if($checklist->good_standing_letter_from_council=='Yes') Checked @endif type="checkbox" name="good_standing_letter_from_council" id="a9" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">work_experience_letter_till_date</label>
                                    <input @if($checklist->work_experience_letter_till_date=='Yes') Checked @endif type="checkbox" name="work_experience_letter_till_date" id="a10" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">basic_life_support_for_nurses</label>
                                    <input @if($checklist->basic_life_support_for_nurses=='Yes') Checked @endif type="checkbox" name="basic_life_support_for_nurses" id="a11" value="Yes">
                                    <br>
                                    <label class="control-label" for="name">mrp_size_photo_in_white_background</label>
                                    <input @if($checklist->mrp_size_photo_in_white_background=='Yes') Checked @endif type="checkbox" name="mrp_size_photo_in_white_background" id="a12" value="Yes">

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

@endsection
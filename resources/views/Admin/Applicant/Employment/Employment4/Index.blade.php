@extends('Admin.Layout.master')
@section('main_content')
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class=" pull-left">
                            <div class="page-title">View EmploymentList</div>
                        </div>
                        <ol class="breadcrumb page-breadcrumb pull-right">
                            <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                        class="fa fa-angle-right"></i>
                            </li>
                            <li class="active">EmploymentView</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-topline-aqua">
                            <div class="card-head">
                                <header>Applicant Employment Detail Table</header>
                                <div class="cards pull-right">
                                    <a href="{{route('Employment4.create')}}" class="btn btn-success fa fa-plus">Add
                                        New</a>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div class="table-scrollable">
                                    <table id="example1" class="display" style="width:100%;">
                                        <thead>
                                        <tr >
                                            <th>APPLICANTS NAME</th>
                                            <th>DESIGNATION</th>
                                            <th>ISSUING AUTHORITY NAME</th>
                                            <th>ISSUING AUTHORITY ADDRESS</th>
                                            <th>ISSUING AUTHORITY COUNTRY</th>
                                            <th>ISSUING AUTHORITY STATE</th>
                                            <th>ISSUING AUTHORITY CITY</th>
                                            <th>ISSUING AUTHORITY COUNTRY CODE</th>
                                            <th>ISSUING AUTHORITY PHONE</th>
                                            <th>ISSUING AUTHORITY EMAIL</th>
                                            <th>ISSUING AUTHORITY WEBSITE</th>
                                            <th>REASON FOR LEAVING</th>
                                            <th>NATURE OF EMPLOYMENT</th>
                                            <th>EMPLOYMENT FROM</th>
                                            <th>EMPLOYMENT TO</th>
                                            <th>EMPLOYEE CODE</th>
                                            <th>DEPARTMENT</th>
                                            <th>EXPERIENCE LETTER</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($employment as $employment)
                                            <tr>
                                                <td><a href="{{route('ApplicantDetail',$employment->applicant_id)}}">{{$employment->Applicant_Employment4->first_name}} {{$employment->Applicant_Employment4->middel_name}} {{$employment->Applicant_Employment4->surname}}</a></td>
                                                <td>{{$employment->designation}}</td>
                                                <td>{{$employment->issuing_authority_name}}</td>
                                                <td>{{$employment->issuing_authority_address}}</td>
                                                <td>{{$employment->issuing_authority_country}}</td>
                                                <td>{{$employment->issuing_authority_state}}</td>
                                                <td>{{$employment->issuing_authority_city}}</td>
                                                <td>{{$employment->issuing_authority_country_code}}</td>
                                                <td>{{$employment->issuing_authority_phone}}</td>
                                                <td>{{$employment->issuing_authority_email}}</td>
                                                <td>{{$employment->issuing_authority_website}}</td>
                                                <td>{{$employment->reason_for_leaving}}</td>
                                                <td>{{$employment->nature_of_employment}}</td>
                                                <td>{{$employment->employment_from}}</td>
                                                <td>{{$employment->employment_to}}</td>
                                                <td>{{$employment->employee_code}}</td>
                                                <td>{{$employment->department}}</td>
                                                @if($employment->experience_letter)
                                                    <td><a target="_blank"
                                                           href="{{asset('/upload/Employment/'.$employment->experience_letter)}}">Experience Letter</a></td>
                                                @else
                                                    <td>No Experience Letter</td>
                                                @endif
                                                <td class="text-left">
                                                    <form action="{{ route('Employment4.edit', $employment->id)}}"
                                                          method="GET"
                                                          style="display: inline-block">
                                                        {{csrf_field()}}
                                                        {{method_field('PUT')}}
                                                        <button class="btn btn-primary btn-sm" type="submit">Edit
                                                        </button>
                                                    </form>
                                                    <form action="{{ route('Employment4.destroy', $employment->id)}}"
                                                          method="post" style="display: inline-block">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                        <button class="btn btn-danger btn-sm" type="submit">Delete
                                                        </button>
                                                    </form>
                                                </td>
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
    </div>
    </div>
@endsection
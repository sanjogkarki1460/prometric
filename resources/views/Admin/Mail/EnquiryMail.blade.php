@extends('Admin.Layout.master')
@section('main_content')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#checkbox').click(function () {
                var checked = this.checked;
                $('input[type="checkbox"]').each(function () {
                    this.checked = checked;
                });
            })
        });
    </script>
    <div class="page-container" style="margin-top:-30px;">
        <div class="page-content-wrapper">
            <div class="page-content">
                <div class="page-bar">
                    <div class="page-title-breadcrumb">
                        <div class="pull-left">
                            <div class="page-title">Send Mail</div>
                        </div>
                        <div class=" pull-right">
                            <ol class="breadcrumb page-breadcrumb pull-right">
                                <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
                                                                       href="{{route('admin.home')}}">Dashboard</a>&nbsp;<i
                                            class="fa fa-angle-right"></i>
                                </li>

                                <li class="active">Send Mail</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-head">
                        <div class="col-md-12">
                            <div class="col-md-11">
                                <form action="{{route('EnquiryMail')}}" method="psot">
                                    <input required type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row col-md-12">
                                        <div class="col-md-9">
                                            <header>Search By:</header>
                                            <select name="category" id="" style="height: 40px;border-radius:120px;width: 120px;">
                                                <option value="" disabled selected>By Profession</option>
                                                @foreach($category as $category)
                                                    <option value="{{$category->id}}">{{$category->Name}}</option>
                                                @endforeach
                                            </select>
                                            <select name="color_code" id="" style="height: 40px;border-radius:120px;"
                                                    class="ml-3">
                                                <option value="" disabled selected>By Color Code</option>
                                                <option value="whitelist">White List</option>
                                                <option value="redlist">Red List</option>
                                                <option value="blacklist">Black List</option>
                                                <option value="greenlist">Green List</option>
                                            </select>
                                            <select name="eligibility" id="" style="height: 40px;border-radius:120px;"
                                                    class="ml-3">
                                                <option value="" disabled selected>By Eligibility</option>
                                                <option value="Eligible">Eligible</option>
                                                <option value="Noteligible">Not Eligible</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary mr-4">Search</button>
                                            <a href="{{route('EnquiryMail')}}" class="btn btn-danger">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('SendMail')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_type" value="Enquiry">
                        <label for="" class="ah1">
                            Enter Message
                        </label>
                        <div>
                            <textarea name="message" id="summernote" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Send</button>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card ">
                                    <div class="card-head">
                                        <div class="tools">
                                            <a class="fa fa-repeat btn-color box-refresh" href="javascript:;"></a>
                                            <a class="t-collapse btn-color fa fa-chevron-down" href="javascript:;"></a>
                                            <a class="t-close btn-color fa fa-times" href="javascript:;"></a>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <div class="table-scrollable">
                                            <table id="example1" class="display" style="width:100%;">
                                                <thead>
                                                <tr>
                                                    <th><input type="checkbox" id="checkbox" name="checkbox"></th>
                                                    <th>Id</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Category</th>
                                                    <th>Color Code</th>
                                                    <th>Eligibility</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($enquiry as $enquiry)
                                                    <tr>
                                                        <td><input @if($enquiry->id==@$id) checked @endif type="checkbox" id="email"
                                                                   value="{{ $enquiry->email }}"
                                                                   name="email[]">
                                                        </td>
                                                        <td>{{@$enquiry->id}}</td>
                                                        <td>{{@$enquiry->first_name}} {{@$enquiry->middle_name}} {{@$enquiry->last_name}}</td>
                                                        <td>{{@$enquiry->email}}</td>
                                                        <td>{{@$enquiry->phone}}</td>
                                                        <td>{{@$enquiry->Category_Enquiry->Name}}</td>
                                                        <td>
                                                            <div
                                                                    id="dropdownMenu2" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                @if($enquiry->color_code=='whitelist')
                                                                    <p class="text-center">white</p>
                                                                @elseif($enquiry->color_code=='redlist')
                                                                    <p class="btn-danger btn-circle text-center">Red</p>
                                                                @elseif($enquiry->color_code=='blacklist')
                                                                    <p class="btn-dark btn-circle text-center">Black</p>
                                                                @elseif($enquiry->color_code=='greenlist')
                                                                    <p class="btn-success btn-circle text-center">
                                                                        Green</p>
                                                                @else
                                                                    <p class="btn-default btn-circle text-center">
                                                                        None</p>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div
                                                                    id="dropdownMenu2" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                @if($enquiry->eligibility=='Eligible')
                                                                    <p style="padding: 5px;"
                                                                       class="btn-success btn-circle btn-sm text-center">
                                                                        Eligible</p>
                                                                @else
                                                                    <p style="padding: 5px;"
                                                                       class="btn-danger btn-circle btn-sm text-center">
                                                                        Not Eligible</p>
                                                                @endif
                                                            </div>
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
                    </form>
                </div>
            </div>

@endsection
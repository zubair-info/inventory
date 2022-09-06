@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">bitbirds</a></li>
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li> --}}
                    <li class="breadcrumb-item active">Company</li>
                </ol>
            </div>
            <h4 class="page-title">Company Edit</h4>
        </div>
    </div>
</div>

</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{route('companyUpdate')}}" method="post"  enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="company_id" value="{{$all_company->id }}">
                        
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" name="company_name" value="{{$all_company->company_name }}" id="company_name" class="form-control" placeholder="Enter company name">
                        </div>
                        <div class="mb-3">
                            <label for="company_phone" class="form-label">Company Phone</label>
                            <input type="text" name="company_phone" value="{{$all_company->company_phone }}"  id="company_phone" class="form-control" placeholder="Enter company phone">
                        </div>
                        <div class="mb-3">
                            <label for="company_email" class="form-label">Company Email</label>
                            <input type="text" name="company_email"  value="{{$all_company->company_email }}" id="company_email" class="form-control" placeholder="Enter company email">
                        </div>
                        <div class="mb-3">
                            <label for="company_address" class="form-label">Company Address</label>
                            <input type="text" name="company_address"  value="{{$all_company->company_address }}" id="company_address" class="form-control" placeholder="Enter project address">
                        </div>
                        <div class="mb-3">
                            <label for="company_logo" class="form-label">Company Logo</label>
                            <input type="file" name="company_logo"  value="{{$all_company->company_logo }}"  id="company_logo" class="form-control" placeholder="Enter project name">
                            <img src="{{ asset('/uploads/company') }}/{{$all_company->company_logo }}"
                            height="90px" alt="">
                        </div>

                        <div class="mb-3">
                            <label for="mobile_logo" class="form-label">Mobile Logo</label>
                            <input type="file" name="mobile_logo" id="mobile_logo" class="form-control" placeholder="Enter project name">
                            <img src="{{ asset('/uploads/company') }}/{{$all_company->mobile_logo }}"
                            height="90px" alt="">
                        </div>
                        <div class="mb-3">
                            <label for="company_favicon" class="form-label">Company Favicon</label>
                            <input type="file" name="company_favicon" id="company_favicon" class="form-control" placeholder="Enter project name">
                            <img src="{{ asset('/uploads/company') }}/{{$all_company->company_favicon }}"
                            height="90px" alt="">
                        </div>
                        <div class="text-sm-end">
                            <button type="submit" class="btn btn-danger">
                                <i class="mdi mdi-cash-multiple me-1"></i>Update Company </button>
                        </div>
                        

                    </form>      
                </div>
                <!-- end row -->
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>

<!-- end row-->
@endsection
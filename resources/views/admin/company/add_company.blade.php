@extends('layouts.dashboard')
@section('content')
@can('company')
    
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
            <h4 class="page-title">Company Add</h4>
        </div>
    </div>
</div>

</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{route('companyStore')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" name="company_name" id="company_name" class="form-control" placeholder="Enter company name">
                        </div>
                        <div class="mb-3">
                            <label for="company_phone" class="form-label">Company Phone</label>
                            <input type="text" name="company_phone" id="company_phone" class="form-control" placeholder="Enter company phone">
                        </div>
                        <div class="mb-3">
                            <label for="company_email" class="form-label">Company Email</label>
                            <input type="text" name="company_email" id="company_email" class="form-control" placeholder="Enter company email">
                        </div>
                        <div class="mb-3">
                            <label for="company_address" class="form-label">Company Address</label>
                            <input type="text" name="company_address" id="company_address" class="form-control" placeholder="Enter project address">
                        </div>
                        <div class="mb-3">
                            <label for="company_logo" class="form-label">Company Logo</label>
                            <input type="file" name="company_logo" id="company_logo" class="form-control" placeholder="Enter project name">
                        </div>

                        <div class="mb-3">
                            <label for="mobile_logo" class="form-label">Company Logo</label>
                            <input type="file" name="mobile_logo" id="mobile_logo" class="form-control" placeholder="Enter project name">
                        </div>
                        <div class="mb-3">
                            <label for="company_favicon" class="form-label">Company Favicon</label>
                            <input type="file" name="company_favicon" id="company_favicon" class="form-control" placeholder="Enter project name">
                        </div>
                        <div class="text-sm-end">
                            <button type="submit" class="btn btn-danger">
                                <i class="mdi mdi-cash-multiple me-1"></i>Add Company </button>
                        </div>
                        

                    </form>      
                </div>
                <!-- end row -->
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
@else
    @include('admin.role.error');
@endcan 

<!-- end row-->
@endsection
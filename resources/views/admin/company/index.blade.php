@extends('layouts.dashboard')
@section('content')
@can('company')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">bitbirds</a></li>
                    <li class="breadcrumb-item active">Company</li>
                </ol>
            </div>
            <h4 class="page-title">Company Setup</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-7 p-3">
                            <form action="{{route('companyUpdate')}}" method="post" enctype="multipart/form-data">
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
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-5 mt-3">

                            <form action="{{route('logoCompanyUpdate')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" name="company_id" value="{{$all_company->id }}">
                                <div class="mb-3">   
                                    <label for="company_address" class="form-label">Company Logo</label>
                                    <input type="file" name="company_logo"  value="{{$all_company->company_logo }}"  id="company_logo" class="form-control" placeholder="Enter project name">
                                    <img style="background:#343a40;padding:5px;" src="{{ asset('/uploads/company') }}/{{$all_company->company_logo }}"
                                    height="80px" width="250" alt="" class="mt-1">
                                 </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Update</button>
                                </div>
                            </form>
                            <form action="{{route('mobilelogoCompanyUpdate')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" name="company_id" value="{{$all_company->id }}">
                                <div class="mb-3">   
                                    <label for="mobile_logo" class="form-label">Mobile Logo</label>
                                    <input type="file" name="mobile_logo" id="mobile_logo" class="form-control" placeholder="Enter project name">
                                    <img style="background:#343a40;padding:5px;" src="{{ asset('/uploads/company') }}/{{$all_company->mobile_logo }}"
                                    height="90px"  width="250" alt=""  class="mt-1">
                                 </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Update</button>
                                </div>
                            </form>
                            <form action="{{route('favIconCompanyUpdate')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                    <input type="hidden" name="company_id" value="{{$all_company->id }}">
                                <div class="mb-3">   
                                    <label for="company_favicon" class="form-label">Company Favicon</label>
                                    <input type="file" name="company_favicon" id="company_favicon" class="form-control" placeholder="Enter project name">
                                    <img style="background:#343a40;padding:5px;" src="{{ asset('/uploads/company') }}/{{$all_company->company_favicon }}"
                                    height="90px"  width="90" alt=""  class="mt-1">
                                 </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Update</button>
                                </div>
                            </form>                 
                        </div>                   
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
</div>
<!-- end row-->
@else
    @include('admin.role.error');
@endcan 
@endsection

@section('footer_script')
  	{{--  delete code  --}}
    <script>
        $(document).ready(function() {
            $('.btn_delete').click(function() {
                var id=  $(this).attr('name');
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url:"/companyDelete/"+id,
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(data){
                        $('.delete_modal').hide();
                        toastr.error(data.success);
                        window.location.reload();
                    }
                });
            });
        });
    </script>
@endsection
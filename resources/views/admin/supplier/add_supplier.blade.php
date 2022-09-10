@extends('layouts.dashboard')
@section('content')
@can('supplier')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">bitbirds</a></li>
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li> --}}
                    <li class="breadcrumb-item active">supplier</li>
                </ol>
            </div>
            <h4 class="page-title">Supplier Add</h4>
        </div>
    </div>
</div>

</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{route('supplierStore')}}" method="post"  enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="supplier_name" class="form-label">Supplier Name</label>
                            <input type="text" name="supplier_name" id="supplier_name" class="form-control" placeholder="Enter supplier name">
                        </div>
                        <div class="mb-3">
                            <label for="supplier_phone" class="form-label">Supplier Phone</label>
                            <input type="text" name="supplier_phone" id="supplier_phone" class="form-control" placeholder="Enter supplier phone">
                        </div>
                        <div class="mb-3">
                            <label for="supplier_email" class="form-label">Supplier Email</label>
                            <input type="text" name="supplier_email" id="supplier_email" class="form-control" placeholder="Enter supplier email">
                        </div>
                        <div class="mb-3">
                            <label for="supplier_address" class="form-label">Supplier Address</label>
                            <input type="text" name="supplier_address" id="supplier_address" class="form-control" placeholder="Enter project address">
                        </div>
                        <div class="mb-3">
                            <label for="supplier_logo" class="form-label">Supplier Logo</label>
                            <input type="file" name="supplier_logo" id="supplier_logo" class="form-control" placeholder="Enter project name">
                        </div>

                        <div class="text-sm-end">
                            <button type="submit" class="btn btn-danger">
                                <i class="mdi mdi-cash-multiple me-1"></i>Add Supplier </button>
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
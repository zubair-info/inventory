@extends('layouts.dashboard')
@section('content')
@can('supplier')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">bitBirds</a></li>
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li> --}}
                    <li class="breadcrumb-item active">Supplier</li>
                </ol>
            </div>
            <h4 class="page-title">Supplier Edit</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{route('supplierUpdate')}}" method="post"  enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" value="{{$all_supplier->id }}"  name="supplier_id" value="{{$all_supplier->id }}">
                        <div class="mb-3">
                            <label for="supplier_name" class="form-label">Supplier Name</label>
                            <input type="text" value="{{$all_supplier->supplier_name }}"  name="supplier_name" id="supplier_name" class="form-control" placeholder="Enter supplier name">
                        </div>
                        <div class="mb-3">
                            <label for="supplier_phone" class="form-label">Supplier Phone</label>
                            <input type="text" value="{{$all_supplier->supplier_phone }}"  name="supplier_phone" id="supplier_phone" class="form-control" placeholder="Enter supplier phone">
                        </div>
                        <div class="mb-3">
                            <label for="supplier_email" class="form-label">Supplier Email</label>
                            <input type="text" value="{{$all_supplier->supplier_email }}"  name="supplier_email" id="supplier_email" class="form-control" placeholder="Enter supplier email">
                        </div>
                        <div class="mb-3">
                            <label for="supplier_address" class="form-label">Supplier Address</label>
                            <input type="text" value="{{$all_supplier->supplier_address }}"  name="supplier_address" id="supplier_address" class="form-control" placeholder="Enter project address">
                        </div>
                        <div class="mb-3">
                            <label for="supplier_logo" class="form-label">Supplier Logo</label>
                            <input type="file" value="{{$all_supplier->id }}"  name="supplier_logo" id="supplier_logo" class="form-control" placeholder="Enter project name">
                            <img src="{{ asset('/uploads/supplier') }}/{{$all_supplier->supplier_logo }}"
                            height="90px" alt="">
                        </div>

                        <div class="text-sm-end">
                            <button type="submit" class="btn btn-danger">
                                <i class="mdi mdi-cash-multiple me-1"></i>Update supplier </button>
                        </div>
                    </form>      
                </div>
                <!-- end row -->
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
<!-- end row-->
    
@else
    @include('admin.role.error');
@endcan 

@endsection
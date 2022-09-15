@extends('layouts.dashboard')
@section('content')
@can('product_received')
    
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">bitBirds</a></li>
                    <li class="breadcrumb-item active">Product Feature</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table  id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                {{-- <th>Id</th> --}}
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Feature</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_product_received as $key=>$product_received)       
                                <tr>
                                    {{-- <td>{{$key+1}}</td> --}}
                                    <td> {{$product_received->product_name}}</td>
                                    <td>

                        
                                    </td>                                         
                                
                                    {{-- <td class="table-action">
                                        <a title="Edit" href="{{route('product_received_edit',$product_received->id)}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                        <a title="Delete" class="action-icon" data-bs-target="#delete_modal_{{$product_received->id}}" data-bs-toggle="modal" href="#delete_modal_{{$product_received->id}}"> <i class="mdi mdi-delete"></i></a>
                                    </td> --}}

                                    {{-- <div id="delete_modal_{{$product_received->id}}" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-colored-header bg-danger">
                                                    <h4 class="modal-title" id="danger-header-modalLabel">Delete</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="mb-4">Are you sure want to delete?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button name="{{$product_received->id }}" id="toastr-two" class="btn btn-danger btn_delete" id="btn-save-event">Delete</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div> --}}
                                </tr>
                            @endforeach
                        
                        </tbody>
                    </table>
                    <!-- end row -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
</div>
@else
    @include('admin.role.error');
@endcan 
@endsection
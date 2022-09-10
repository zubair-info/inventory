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
                    <li class="breadcrumb-item active">Supplier</li>
                </ol>
            </div>
            {{-- <h4 class="page-title">Supplier </h4> --}}
        </div>
    </div>
</div>
{{-- <div class="row mb-2">
    <div class="col-sm-12  mr-5">
        <a href="{{route('supplierAdd')}}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add Supplier</a>
    </div>
</div> --}}

<div class="row">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h4 class="card-title">Manage Supplier</h4>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a href="{{route('supplierAdd')}}" class="btn btn-danger mb-3"><i class="mdi mdi-plus-circle me-2"></i> Add Supplier</a>
                            
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Supplier Logo</th>
                                        <th>Supplier Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_supplier as $supplier)       
                                        <tr>
                                            <td  class="img-thumbnail">
                                                <img src="{{ asset('/uploads/supplier') }}/{{$supplier->supplier_logo }}" alt="supplier logo" height="80" width="250"/>
                                            
                                            </td>
                                            <td> {{$supplier->supplier_name}}</td>
                                            <td> {{$supplier->supplier_phone}}</td>
                                            <td> {{$supplier->supplier_email}}</td>
                                            <td> {{$supplier->supplier_address}}</td>
                                            <td class="table-action">
                                                <a href="{{route('supplierEdit',$supplier->id)}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                                <a class="action-icon" data-bs-target="#delete_modal_{{$supplier->id}}" data-bs-toggle="modal" href="#delete_modal_{{$supplier->id}}"> <i class="mdi mdi-delete"></i></a>
                                            </td>

                                            <div id="delete_modal_{{$supplier->id}}" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
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
                                                            <button name="{{$supplier->id }}" id="toastr-two" class="btn btn-danger btn_delete" id="btn-save-event">Delete</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                        </tr>
                                    @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- end row -->
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
                    url:"/supplierDelete/"+id,
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(data){
                        $('.delete_modal').hide();
                        // $('.modal-backdrop').hide();
                        toastr.error(data.success);
                        window.location.reload();
                        // toastr.success(data.success);
                        

                    }
                });
            });
        });
    </script>


    
@endsection
@extends('layouts.dashboard')
@section('content')
@can('brand')
<div class="content container-fluid">
					
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
                <h4 class="page-title">Brand</h4>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xl-8 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h4 class="card-title">Brand Name List</h4>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button class="btn btn-danger btn-rounded mb-3" type="button" data-bs-target="#brandAdd" data-bs-toggle="modal"><i class="mdi mdi-plus-circle me-2"></i> Add Brand</button>

                            </div>
                            <div id="brandAdd" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-info">
                                            <h4 class="modal-title" id="danger-header-modalLabel">Add Brand Form</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('brandNameStore')}}"method="post" id="addform" >
                                                @csrf
                                            
                                                <div class="form-group row mx-1">
                                                    <label class="form-label">Brand Name</label>
                                                    <input type="text" class="form-control brand_name" name="brand_name"  placeholder="Enter Brand Name :S.F">
                                                    <span style="color:red;" id="brand_error"></span>
                                                </div>
                                                <div class="text-sm-end mt-2">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="mdi mdi-cash-multiple me-1 submit"></i>Add Brand</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div class="card-body">
                        <table  id="basic-datatable" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Brand Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table_list">
                                @foreach ($all_brand_name as $key=>$brand)  
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$brand->brand_name}}</td>
                                        <td class="text-left">                                              
                                            <div class="actions">
                                                <a  class="action-icon" data-bs-target="#edit_modal_{{$brand->id}}" data-bs-toggle="modal" >
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                
                                                <a class="action-icon" data-bs-target="#delete_modal_{{$brand->id}}" data-bs-toggle="modal"> <i class="mdi mdi-delete"></i></a>
                                                </a>
                                
                                            </div>                                            
                                        </td>    
                                    </tr>  
                                     <!-- /Delete Modal -->
                                     <div id="delete_modal_{{$brand->id}}" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
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
                                                    <button name="{{$brand->id }}" class="btn btn-danger btn_delete">Delete</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <!-- /Delete Modal -->

                                    <!-- Edit Modal -->
                                    <div id="edit_modal_{{$brand->id}}" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-colored-header bg-danger">
                                                    <h4 class="modal-title" id="danger-header-modalLabel">Delete</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('brandUpdate')}}" id="editform" method="post">
                                                        @csrf
                            
                                                        <input type="hidden" name="id" class="form-control"  value="{{ $brand->id}}"  placeholder="Enter Brand Name :S.F">
                                                        
                                                        <div class="form-group row">
                                                            <label class="form-label">brand Name</label>
                                                            <input type="text" class="form-control" name="brand_name"  value="{{ $brand->brand_name}}">
                                                            <span style="color:red;" id="brand_error"></span>
                                                        </div>
                                            
                                                        <div class="text-sm-end mt-2">
                                                            <button type="button" class="btn btn-info">
                                                                <i class="mdi mdi-cash-multiple me-1"></i>Update Brand </button>
                                                        </div>
                                                    </form>
                                                </div>
                                               
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <!-- /edit Modal -->
                                @endforeach                                 
                            </tbody>
                                
                        </table>
                    </div>                
                </div>
            </div>
        </div>
    </div>    
</div>	
@else
    @include('admin.role.error');
@endcan 	  
@endsection

@section('footer_script')

{{-- brand validation  --}}
 <script>
 $('#addform').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: "brand-name-store",
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,

            success: function(data) {

                if (data.errors) {
                    toastr.error(data.errors.brand_name);
                    $('#brand_error').text(data.errors.brand_name);  
                                           
                                                                                 
                }else{
                    toastr.success(data.success);
                    window.location.reload();

                }
            }
        })
    });
    get_data_edit();
    function get_data_edit(){
        $('#editform').on('button', function(event) {
        event.preventDefault();

        $.ajax({
            url: "/brand-name-update",
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,

            success: function(data) {

                if (data.errors) {
                    // get_data_edit();
                    toastr.error(data.errors.brand_name);
                    $('#brand_error').text(data.errors.brand_name);  
                                           
                                                                                 
                }else{
                    // get_data_edit();
                    toastr.success(data.success);
                    window.location.reload();
                }
            }
        })
    });

    }
    
 </script>


	{{--  delete code  --}}
    <script>

        $(document).ready(function() {            
            $('.btn_delete').click(function() {
                var id=  $(this).attr('name');
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url:"/brandDelete/"+id,
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
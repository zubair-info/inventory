@extends('layouts.dashboard')
@section('content')
<div class="content container-fluid">
					
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">bitbirds</a></li>
                        {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li> --}}
                        <li class="breadcrumb-item active">Department</li>
                    </ol>
                </div>
                {{-- <h4 class="page-title">Department</h4> --}}
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xl-8 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h4 class="card-title">Manage Department</h4>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button class="btn btn-danger btn-rounded mb-3" type="button" data-bs-target="#departmentAdd" data-bs-toggle="modal"><i class="mdi mdi-plus-circle me-2"></i> Add Department</button>

                            </div>
                            <div id="departmentAdd" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-info">
                                            <h4 class="modal-title" id="danger-header-modalLabel">Add department Form</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                {{-- @csrf --}}

                                            
                                                <div class="form-group row">
                                                    <label class="form-label">Department Name</label>
                                                    <input type="text" class="form-control department_name" name="department_name"  placeholder="Enter department name">
                                                    <span style="color:red;" id="department_error"></span>
                                                </div>
                                                <div class="text-sm-end mt-2">
                                                    {{-- <button  class="btn btn-primary">
                                                        <i class="mdi mdi-cash-multiple me-1"></i>Add Department</button> --}}
                                                        <button class="btn btn-success btn-submit">Add Department</button>
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
                                    <th>Department Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table_list">
                                @foreach ($all_department as $key=>$department)  
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$department->department_name}}</td>
                                        <td class="text-left">                                              
                                            <div class="actions">
                                                <a  class="action-icon" data-bs-target="#edit_modal_{{$department->id}}" data-bs-toggle="modal" >
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                
                                                <a class="action-icon" data-bs-target="#delete_modal_{{$department->id}}" data-bs-toggle="modal"> <i class="mdi mdi-delete"></i></a>
                                                </a>
                                
                                            </div>                                            
                                        </td>    
                                    </tr>  
                                     <!-- /Delete Modal -->
                                     <div id="delete_modal_{{$department->id}}" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
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
                                                    <button name="{{$department->id }}" class="btn btn-danger btn_delete">Delete</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <!-- /Delete Modal -->

                                    <!-- Edit Modal -->
                                    <div id="edit_modal_{{$department->id}}" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-colored-header bg-danger">
                                                    <h4 class="modal-title" id="danger-header-modalLabel">Edit Department</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <input type="hidden" name="id" id="depid" data-id="{{ $department->id}}" class="form-control depid"  value="{{ $department->id}}">
                                                        
                                                        <div class="form-group row">
                                                            <label class="form-label">Department Name</label>
                                                            <input type="text" class="form-control department_name_{{$department->id}}" name="department_name"  value="{{ $department->department_name}}" placeholder="Enter department name">
                                                            <span style="color:red;" class="department_error_{{$department->id}}" id="department_error_{{$department->id}}"></span>
                                                        </div>
                                            
                                                        <div class="text-sm-end mt-2">
                                                            <button class="btn btn-info update-btn" data-id="{{$department->id}}">
                                                                <i class="mdi mdi-cash-multiple me-1"></i>Update </button>
                                                        </div>
                                                    </form>
                                                </div>
                                               
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
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
@endsection

@section('footer_script')

{{-- department validation  --}}
<script>
      
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
    $(".btn-submit").click(function(e){ 
        e.preventDefault();
        var department_name = $(".department_name").val();
        $.ajax({
           type:'POST',
           url:"{{ route('departmentStore') }}",
           data:{department_name:department_name},
           success:function(data){
                if($.isEmptyObject(data.error)){
                    location.reload();
                }else{
                    $('#department_error').html(data.error);  
                }
           }
        });
    
    });
    $('.update-btn').click(function (e) {
        e.preventDefault();
        var data = $(this).attr('data-id');
        var department_name = $(".department_name_"+data).val();
        $.ajax({
           type:'POST',
           url:"{{ route('departmentUpdate') }}",
           data:{department_name:department_name,id:data},
           success:function(result){
                if($.isEmptyObject(result.error)){
                    // alert(data.success);
                    location.reload();
                }else{
                    $('.department_error_'+data).text(result.error);  
                    // location.reload();
                }
           }
        });
    });

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
                url:"/departmentDelete/"+id,
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
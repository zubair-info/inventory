@extends('layouts.dashboard')
@section('content')
@can('yarn')

<div class="content container-fluid">
					
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">bitbirds</a></li>
                        {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li> --}}
                        <li class="breadcrumb-item active">Yarn</li>
                    </ol>
                </div>
                {{-- <h4 class="page-title">yarn</h4> --}}
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xl-8 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <h4 class="card-title">Manage Yarn</h4>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <button class="btn btn-danger btn-rounded mb-3" type="button" data-bs-target="#yarnAdd" data-bs-toggle="modal"><i class="mdi mdi-plus-circle me-2"></i> Add Yarn</button>

                            </div>
                            <div id="yarnAdd" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-info">
                                            <h4 class="modal-title" id="danger-header-modalLabel">Add Yarn</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                                <div class="form-group row mx-1">
                                                    <label class="form-label">Yarn Name</label>
                                                    <input type="text" class="form-control yarn_name" name="yarn_name"  placeholder="Enter yarn name">
                                                    <span style="color:red;" id="yarn_error"></span>
                                                </div>
                                                <div class="text-sm-end mt-2">
                                                        <button class="btn btn-success btn-submit">Add Yarn</button>
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
                                    <th>Yarn Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table_list">
                                @foreach ($all_yarn as $key=>$yarn)  
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$yarn->yarn_name}}</td>
                                        <td class="text-left">                                              
                                            <div class="actions">
                                                <a  class="action-icon" data-bs-target="#edit_modal_{{$yarn->id}}" data-bs-toggle="modal" >
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                
                                                <a class="action-icon" data-bs-target="#delete_modal_{{$yarn->id}}" data-bs-toggle="modal"> <i class="mdi mdi-delete"></i></a>
                                                </a>
                                
                                            </div>                                            
                                        </td>    
                                    </tr>  
                                     <!-- /Delete Modal -->
                                     <div id="delete_modal_{{$yarn->id}}" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-colored-header bg-danger">
                                                    <h4 class="modal-title" id="danger-header-modalLabel">Yarn Delete</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="mb-4">Are you sure want to delete?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                                    <button name="{{$yarn->id }}" class="btn btn-danger btn_delete">Delete</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <!-- /Delete Modal -->

                                    <!-- Edit Modal -->
                                    <div id="edit_modal_{{$yarn->id}}" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header modal-colored-header bg-danger">
                                                    <h4 class="modal-title" id="danger-header-modalLabel">Edit yarn</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <input type="hidden" name="id" id="depid" data-id="{{ $yarn->id}}" class="form-control depid"  value="{{ $yarn->id}}">
                                                        
                                                        <div class="form-group row mx-1">
                                                            <label class="form-label">Yarn Name</label>
                                                            <input type="text" class="form-control yarn_name_{{$yarn->id}}" name="yarn_name"  value="{{ $yarn->yarn_name}}" placeholder="Enter yarn name">
                                                            <span style="color:red;" class="yarn_error_{{$yarn->id}}" id="yarn_error_{{$yarn->id}}"></span>
                                                        </div>
                                            
                                                        <div class="text-sm-end mt-2">
                                                            <button class="btn btn-info update-btn" data-id="{{$yarn->id}}">
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
@else
    @include('admin.role.error');
@endcan   
@endsection

@section('footer_script')

{{-- yarn validation  --}}
<script>
      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
    $(".btn-submit").click(function(e){ 
        e.preventDefault();
        var yarn_name = $(".yarn_name").val();
        $.ajax({
           type:'POST',
           url:"{{ route('yarnStore') }}",
           data:{yarn_name:yarn_name},
           success:function(data){
                if($.isEmptyObject(data.error)){
                    location.reload();
                    toastr.success(data.success);
                }else{
                    $('#yarn_error').html(data.error);  
                }
           }
        });
    
    });
    $('.update-btn').click(function (e) {
        e.preventDefault();
        var data = $(this).attr('data-id');
        var yarn_name = $(".yarn_name_"+data).val();
        $.ajax({
           type:'POST',
           url:"{{ route('yarnUpdate') }}",
           data:{yarn_name:yarn_name,id:data},
           success:function(result){
                if($.isEmptyObject(result.error)){
                    // alert(data.success);
                    location.reload();
                }else{
                    $('.yarn_error_'+data).text(result.error);  
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
                url:"/yarnDelete/"+id,
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
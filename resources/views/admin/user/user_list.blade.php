@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                    <li class="breadcrumb-item active">Starter</li>
                </ol> --}}
            </div>
            {{-- <h4 class="page-title">Starter</h4> --}}
        </div>
    </div>
</div>


<div class="row">
    <div class="card">
        <div class="table-responsive">
            <table class="table table-borderless table-nowrap mb-0">
                <thead class="table-light">
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Create at</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
    
                <tbody>
                    @foreach ($all_users as $key => $user)
                    <tr>
                        <td class="table-user">
                            <img src="{{ asset('/uploads/users') }}/{{ $user->profile_photo }}" alt="table-user" class="me-2 rounded-circle" />
                            {{ $user->name }}
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>
                            {{-- data-on-label="{{ $user->status ? 'yes' : '' }}" --}}
                            <!-- Switch-->
                            <div>
                                <input type="checkbox" data-id="{{$user->id}}" id="switch_{{$user->id}}" class="checks" data-switch="success">
                                <label for="switch_{{$user->id}}"   data-off-label="No" data-on-label="Yes" class="mb-0 d-block"></label>
                            </div>
                        </td>
                        <td class="table-action text-center">
                            <a href="{{route('userEdit',$user->id)}}" class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                            <a class="action-icon" data-bs-target="#delete_modal_{{$user->id}}" data-bs-toggle="modal" href="#delete_modal_{{$user->id}}"> <i class="mdi mdi-delete"></i></a>
                        </td>
    
                        <div id="delete_modal_{{$user->id}}" class="modal fade delete_modal" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-hidden="true">
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
                                        <button name="{{$user->id }}" id="toastr-two" class="btn btn-danger btn_delete" id="btn-save-event">Delete</button>
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
</div>

@endsection

@section('footer_script')
<script>
    // alert();
    $(function() {

      $('.checks').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;  
          var user_id = $(this).attr('data-id'); 
        //   alert(status);
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/changeStatus',
              data: {'status': status, 'user_id': user_id},
              success: function(data){
                // $('#switch_'+user_id).attr('checked',true);
                toastr.success(data.success);
                // console.log(data)
              }
          });
      });
    })
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
                    url:"/userDelete/"+id,
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(data){
                        $('.delete_modal').hide();
                        $('.modal-backdrop').hide();
                        // toastr.success(data.success);
                        window.location.reload();
                        // toastr.success(data.success);
                        

                    }
                });
            });
        });
    </script>


    
@endsection
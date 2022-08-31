@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">bitbirds</a></li>
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li> --}}
                    <li class="breadcrumb-item active">User</li>
                </ol>
            </div>
            <h4 class="page-title">User Edit</h4>
        </div>
    </div>
</div>

</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="{{route('userUpdate')}}" method="post"  enctype="multipart/form-data">
                        @csrf

                        <input type="text" name="user_id" value="{{$all_user->id }}">
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" value="{{$all_user->name }}" id="name" class="form-control" placeholder="Enter name">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label"> Phone</label>
                            <input type="text" name="phone" value="{{$all_user->phone }}"  id="phone" class="form-control" placeholder="Enter  phone">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email"  value="{{$all_user->email }}"  class="form-control" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" name="address"  value="{{$all_user->address }}"  class="form-control" placeholder="Enter  address">
                        </div>
                        <div class="mb-3">
                            <label for="profile_photo" class="form-label">Profile Photo</label>
                            <input type="file" name="profile_photo" id="profile_photo" class="form-control" placeholder="Enter project name">
                            <img src="{{ asset('/uploads/user') }}/{{$all_user->profile_photo }}"
                            height="90px" alt="">
                        </div>

                        <div class="text-sm-end">
                            <button type="submit" class="btn btn-danger">
                                <i class="mdi mdi-cash-multiple me-1"></i>Update Info </button>
                        </div>
                        

                    </form>      
                </div>
                <!-- end row -->
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>

<!-- end row-->
@endsection
@extends('layouts.dashboard')
@section('content')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Role Edit</a></li>
        </ol>
    </div>
    <div class="row">

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold text-black">Edit Permission</h4>

                </div>
                <div class="card-body">
                    <form action="{{ url('/update/role/permission') }}" method="post">
                        @csrf
                        <div class="form-group mb-4">

                            <div class="form-group mb-4">
                                <label for="" class="form-label">User Name</label>

                                <input type="hidden" name="user_id" value="{{ $user_info->id }}">
                                <input type="text" readonly class="form-control" name="user_name"
                                    value="{{ $user_info->name }}">
                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Permission Name</label>
                                </br>
                                @foreach ($permissions as $permission)
                                    <input type="checkbox" name="permission[]"
                                        {{ $user_info->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                        value="{{ $permission->id }}">
                                    {{ $permission->name }} </br>
                                @endforeach

                            </div>

                        </div>

                        <button class="btn btn-primary btn-xs" type="submit">Update Permission</button>


                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection

@extends('layouts.dashboard')
@section('content')
@can('role_manage')
    <div class="page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Role Manager</a></li>
        </ol>
    </div>
    <div class="row">

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="cart-tittle">
                        Role Manager
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <style>

                                .last_coma_hide span:last-child{
                                    display: none;
                                }
                            </style>
                            <tr>
                                <th>SL</th>
                                <th>Role Name</th>
                                <th>Permission</th>
                                <th>Action</th>
                            </tr>

                            @foreach ($roles as $key => $role)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td class="last_coma_hide">
                                        @foreach ($role->getPermissionNames() as $permissions)
                                          <span>  {{ $permissions }}</span> <span>,</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.permissions', $role->id) }}"
                                            class="action-icon"><i class="mdi mdi-pencil"></i></a>
                                            <a href="{{ route('role.delete_role_permission', $role->id) }}"
                                                class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>

            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <div class="cart-tittle">
                        Assigning  roles to a user 
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                           
                            <tr>
                                <th>SL</th>
                                <th>User Name</th>
                                <th>Role</th>
                                <th>Permission</th>
                                <th>Action</th>

                            </tr>

                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-capitalize">{{ $user->name }}</td>
                                    <td class="last_coma_hide">
                                        @forelse ($user->getRoleNames() as $role)
                                            {{ $role }} <span>,</span>
                                        @empty
                                            Not Assigned Yet!
                                        @endforelse
                                    </td>
                                    <td class="last_coma_hide">
                                        @forelse ($user->getAllPermissions() as $permissions)
                                            {{ $permissions->name }}<span>,</span>
                                        @empty
                                            Not Assigned Yet!
                                        @endforelse
                                    </td>
                                    <td>

                                        <div class="d-flex">
                                            {{-- <a href="{{ route('edit.role.permissions', $user->id) }}"
                                                class="btn btn-primary shadow btn-xs sharp mr-1"><i
                                                    class="fa fa-pencil"></i></a> --}}
                                            <a href="{{ route('role.permission', $user->id) }}"  class="action-icon"
                                               > <i class="mdi mdi-delete"></i></a>

                                            {{-- <button name="{{ route('categorySoft.delete', $category->id) }}"
                                                type="button" class="delete_btn btn btn-danger shadow btn-xs sharp"><i
                                                    class="fa fa-trash"></i></button> --}}
                                        </div>
                                    </td>

                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold text-black">Add Permission </h4>

                </div>
                <div class="card-body">
                    <form action="{{ url('/add/permission') }} " method="post">
                        @csrf
                        <div class="form-group mb-4">

                            <div class="form-group mb-4">
                                <label for="" class="form-label">Permission Name</label>

                                <input type="text" name="permission_name" class="form-control"
                                    placeholder="Permission Name">

                                @error('permission_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>
                        <div class="text-end">
                             <button class="btn btn-primary btn-xs" type="submit">Add Permission</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold text-black">Assign permissions to roles</h4>

                </div>
                <div class="card-body">
                    <form action="{{ url('/add/role') }}" method="post">
                        @csrf
                        <div class="form-group mb-4">

                            <div class="form-group mb-4">
                                <label for="" class="form-label">Role Name</label>

                                <input type="text" name="role_name" class="form-control" placeholder="Role Name">

                                @error('role_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group mb-4">
                                <label for="" class="form-label">Permission Name</label>
                                <br>
                                @foreach ($permission as $permission)
                                <div class="form-check  mb-2 form-check-inline">
                                    <input type="checkbox"  name="permission[]" value="{{ $permission->id }}"
                                    placeholder="Role Name"  class="form-check-input"> 
                                    <label class="form-check-label" >{{ $permission->name }}</label>
                                </div>

                                @endforeach
                                @error('permission_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>


                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary btn-xs" type="submit">Add Role</button>
                        </div>


                    </form>
                </div>

            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold text-black">Assign  role to a user</h4>

                </div>
                <div class="card-body">
                    <form action="{{ url('/assign/role') }}" method="post">
                        @csrf
                        <div class="form-group mb-4">

                            <div class="mb-3">
                                <label for="" class="form-label">User Name</label>
                                <select name="user_id" id="user_id" class="form-control">
                                    <option value="">----Select User----
                                        @foreach ($users as $user)
                                    <option value="{{ $user->id }}" class="text-capitalize">{{ $user->name }}</option>
                                    @endforeach
                                    </option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Role Name</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="">----Select User----
                                        @foreach ($roles as $key => $role)
                                    <option value="{{ $role->id }}" class="text-capitalize">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>



                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary btn-xs" type="submit">Assign Role</button>
                        </div>


                    </form>
                </div>
            </div>

        </div>
    </div>
@else
    @include('admin.role.error');
@endcan 

@endsection

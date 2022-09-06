
@extends('layouts.dashboard')
@section('content')


    <div class="content container-fluid mt-5">
        <div class="row">
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Name Change</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/profile/name/update') }}" method="post">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="" class="form-label"> Name Change</label>
    
                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
    
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Password Change</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/profile/password/update') }} " method="post">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="old_password" class="form-label">Old Password</label>
    
                                <input type="password" name="old_password" id="old_password" class="form-control">
                                @if (session('wrong_pass'))
                                    <strong class="text-danger mt-2"> {{ session('wrong_pass') }} </strong>
                                @endif
    
                                @if (session('same_pass'))
                                    <strong class="text-danger mt-2"> {{ session('same_pass') }} </strong>
                                @endif
                                @error('old_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
    
    
    
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="form-label">New Password</label>
    
                                <input type="password" id="password" name="password" class="form-control">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
    
                            </div>
                            <div class="form-group mb-4">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
    
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control">
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
    
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
    
    
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Picture Change</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/profile/picture/update') }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="custom-file mb-4">
                                <label class="">Choose file</label>
                                <input type="file" name="profile_photo" class="form-control">
                                @error('profile_photo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary mt-4" type="submit">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        
    </div>	
@endsection
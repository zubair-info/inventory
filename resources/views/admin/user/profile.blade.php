@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">bitbirds</a></li>
                    {{-- <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li> --}}
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
            <h4 class="page-title">Profile Update</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-4 col-lg-5">
        <div class="card text-center">
            <div class="card-body">
                <img src="{{ asset('/uploads/users') }}/{{ Auth::user()->profile_photo }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                <h4 class="mb-0 mt-2 text-capitalize">{{ Auth::user()->name }}</h4>
                <p class="text-muted font-14">Founder</p>
                <div class="text-start mt-3">
                    {{-- <h4 class="font-13 text-uppercase">About Me :</h4>
                    <p class="text-muted font-13 mb-3">
                        Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                        1500s, when an unknown printer took a galley of type.
                    </p> --}}
                    {{-- <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">Geneva
                            D. McKnight</span></p> --}}

                    <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-1">{{ Auth::user()->phone}}</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-1 ">{{ Auth::user()->email}}</span></p>

                    <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-1">{{ Auth::user()->address }}</span></p>
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->


    </div> <!-- end col-->

    <div class="col-xl-8 col-lg-7">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                    <li class="nav-item">
                        <a href="#aboutme" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                            About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#timeline" data-bs-toggle="tab" aria-expanded="true" class="nav-link rounded-0 active">
                            Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0">
                            Profile Picture
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="aboutme">

                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info Update</h5>
                        <form action="{{ url('/profile/name/update') }}" method="post">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="" class="form-label"> Name</label>
    
                                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
    
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label"> Phone</label>
                                <input type="text" name="phone" value="{{ Auth::user()->phone }}"  id="phone" class="form-control" placeholder="Enter  phone">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email"   value="{{ Auth::user()->email }}"  class="form-control disabled"  placeholder="Enter email">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address"  value="{{ Auth::user()->address }}"  class="form-control" placeholder="Enter  address">
                            </div>
                    
                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Update</button>
                            </div>
                        </form>
                    </div> <!-- end tab-pane -->
                    <!-- end about me section content -->

                    <div class="tab-pane show active" id="timeline">
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
                   

                        <div class="text-end">
                            <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Update</button>
                        </div>
                    </form>

                    </div>
                    <!-- end timeline content-->

                    <div class="tab-pane" id="settings">
                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>Profile Picture Change</h5>
                        <form action="{{ url('/profile/picture/update') }} " method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="custom-file mb-4">
                                <label class="">Choose file</label>
                                <input type="file" name="profile_photo" class="form-control">
                                
                                @error('profile_photo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <img src="{{ asset('/uploads/users') }}/{{ Auth::user()->profile_photo }}" alt="table-user" height="90" class="mt-1" />
                            </div>
                        
                            <div class="text-end">
                                <button type="submit" class="btn btn-success mt-2"><i class="mdi mdi-content-save"></i> Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- end settings content-->

                </div> <!-- end tab-content -->
            </div> <!-- end card body -->
        </div> <!-- end card -->
    </div> <!-- end col -->
</div>
<!-- end row-->

</div>
<!-- container -->

</div>
<!-- content -->
@endsection
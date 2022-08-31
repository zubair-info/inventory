@extends('layouts.dashboard')
@section('content')

    <div class="content container-fluid">
					
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Home</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->
    
        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card">
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
        </div>
        
        
    </div>	


    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    
                    
                </div>
            </div>
        </div>
    </div>
@endsection
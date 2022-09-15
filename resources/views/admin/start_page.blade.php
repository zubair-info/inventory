@extends('layouts.dashboard')
@section('content')
@can('product_received')
    
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">bitBirds</a></li>
                    <li class="breadcrumb-item active">Product Feature</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h1>ok</h1>
                    <!-- end row -->
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
</div>
@else
    @include('admin.role.error');
@endcan 
@endsection
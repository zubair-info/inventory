@extends('layouts.dashboard')

@section('content')
@can('home')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Inventory Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@else
@include('admin.role.error');
@endcan

@endsection

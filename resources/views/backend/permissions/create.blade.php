@extends('layouts.admin')
@section('title', 'Dashboard | Permission Add')
@section('content')

    <div class="pagetitle">
        <h1>Permission Add</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Permission Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add New</h5>
                        @if (Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ Session::get('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <!-- No Labels Form -->
                        <form class="row g-3" action="{{ route('permission.store') }}" method="post">
                            @csrf
                            <div class="col-md-8">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Permission Name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="text-start col-md-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form><!-- End No Labels Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

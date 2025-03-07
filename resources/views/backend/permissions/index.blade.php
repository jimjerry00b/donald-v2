@extends('layouts.admin')
@section('title', 'Permissions')
@section('content')

    <div class="pagetitle">
        <h1>Permissions</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Permissions</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">All Permissions</h5>

                        <a href="{{ route('permission.create') }}"><button type="button" class="btn btn-outline-primary btn-sm">Add</button></a>
                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $permission->name }}</td>

                                        <td>
                                            <div class="" role="group" aria-label="Basic outlined example">
                                                <a class="btn btn-outline-primary btn-sm" href="{{ route('role.edit', $permission->id) }}">Edit</a>

                                                <form class="d-inline" action="{{ route('role.destroy', $permission->id ) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger btn-sm" type="submit"
                                                        onclick="return confirm('Are you sure you want to delete {{ $permission->name }}?')">Delete</button>
                                                </form>

                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-5 d-inline">Create Category</h5>
                        <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4 mt-4">
                                <input type="text" name="name" id="form2Example1"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Name" />
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <!-- Submit button -->
                            <button type="submit" name="submit" class="btn btn-primary text-center">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

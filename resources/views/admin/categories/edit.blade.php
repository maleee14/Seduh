@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-5 d-inline">Edit Category</h5>
                        <form method="POST" action="{{ route('categories.update', $category->id) }}"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <!-- Email input -->
                            <div class="form-outline mb-4 mt-4">
                                <input type="text" name="name" id="form2Example1" class="form-control"
                                    value="{{ $category->name }}" />
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <!-- Submit button -->
                            <button type="submit" name="submit" class="btn btn-primary text-center">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

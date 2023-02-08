@extends('admin.layouts.app')
@section('title')
Categories

@endsection
@php
    $page='Categories';
@endphp

@section('mainpart')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
          <h3 class="card-title">All Categories</h3>
          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addCategorytModal">Add Category</button>
    </div>
    <div class="card-body">
       <table class="table table-bordered" id="dataTable">
           <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Description</th>
                <th>Action</th>
              </tr>
           </thead>
           <tbody>
            @foreach($categories as $key=>$category)
            <tr>
                <td>{{ ++$key }}</td>
                <td> {{ $category->name }}</td>
                <td> {{ $category->description }}</td>
                <td>
                    <div class="d-flex">
                        <button class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="{{ '#edit'.$category->id .'CategorytModal' }}" ><i class="fa fa-edit"></i></button>
                    <form action="{{ route('category.destroy',$category->id) }}" method="post" >
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                       </form>
                    {{-- <button class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button> --}}
                    </div>
                </td>
            </tr>
            <!-- Edit Category Modal-->
    <div class="modal fade" id="{{ 'edit'.$category->id .'CategorytModal' }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $category->name }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <form action="{{ route('category.update',$category->id) }}" method="post">
            @csrf
            @method('PUT')
              <div class="modal-body">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{ $category->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_name">Category Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" name="description" rows="5">
                            {{ $category->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

              </div>
              <div class="modal-footer">
                <a href="" class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>

            </div>
        </form>
        </div>
    </div>
</div>
            @endforeach
           </tbody>
       </table>
    </div>
</div>
    <!-- Add Category Modal-->
    <div class="modal fade" id="addCategorytModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <form action="{{ route('category.store') }}" method="post">
                @csrf
                  <div class="modal-body">
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_name">Category Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" name="description" rows="5">
                                {{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                  </div>
                  <div class="modal-footer">
                    <a href="" class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                    <button class="btn btn-primary" type="submit" href="login.html">Add Category</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection

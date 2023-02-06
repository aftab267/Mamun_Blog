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
                    <button class="btn btn-primary btn-sm" ><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button>

                </td>
            </tr>
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
                            <input type="text" class="form-control" name="name" >
                        </div>
                        <div class="form-group">
                            <label for="category_name">Category Description</label>
                            <textarea class="form-control" name="description" rows="5"></textarea>
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

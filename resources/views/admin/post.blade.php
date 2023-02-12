@extends('admin.layouts.app')
@section('title')
Post

@endsection
@php
    $page='post';
@endphp

@section('mainpart')
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
          <h3 class="card-title">All post</h3>
          <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addpostModal">Add post</button>
    </div>
    <div class="card-body">
       <table class="table table-bordered" id="dataTable">
           <thead>
              <tr>
                <th>SL</th>
                <th>Name</th>
                <th>Description</th>
                <th>Category</th>
                <th>Thumbnail</th>
                <th>Action</th>
              </tr>
           </thead>
           <tbody>
            @foreach($posts as $key=>$post)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }} </td>
                <td> </td>
                <td> </td>
                <td>
                    {{-- <div class="d-flex">
                        <button class="btn btn-primary btn-sm mr-1" data-toggle="modal" data-target="{{ '#edit'.$post->id .'postModal' }}" ><i class="fa fa-edit"></i></button>
                    <form action="{{ route('post.destroy',$post->id) }}" method="post" >
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
                    </form> --}}
                    {{-- <button class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button> --}}
                    {{-- </div> --}}
                </td>
            </tr>
            @endforeach
            <!-- Edit post Modal-->
    {{-- <div class="modal fade" id="{{ 'edit'.$post->id .'postModal' }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $post->name }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        <form action="{{ route('post.update',$post->id) }}" method="post">
            @csrf
            @method('PUT')
              <div class="modal-body">
                    <div class="form-group">
                        <label for="post_name">post Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  value="{{ $post->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="post_name">post Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" name="description" rows="5">
                            {{ $post->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

              </div>
                    <div class="modal-footer">
                        <a href="" class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                        <button class="btn btn-primary" type="submit">Update post</button>

                    </div>
            </form>
            </div>
        </div>
    </div>
            @endforeach
           </tbody>
       </table> --}}
    </div>
</div>
    <!-- Add post Modal-->
    <div class="modal fade" id="addpostModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add post</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="modal-body">
                        <div class="form-group">
                            <label for="post_name">Post Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="post_name">Post Category</label>
                            <select class="form-control" name="category_id" id="">
                                <option  selected disabled value="">Select Category</option>
                                @foreach ($categories as $category )
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post_name">Post Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" name="description" rows="5">
                                {{ old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="post_name">Post Thumbnail</label>
                            <input type="file" class="form-control-file"  name="thumbnail" >
                        </div>

                            <label for="status" class="form-check-label">
                                <input type="checkbox" value="1" name="status" id="status">  Status
                            </label>
                  </div>
                  <div class="modal-footer">
                    <a href="" class="btn btn-light" type="button" data-dismiss="modal">Cancel</a>
                    <button class="btn btn-primary" type="submit" href="login.html">Add post</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection

@extends('layoutAdmin')
@section('content')

    <form method="post" action="{{ url('categories/' .$category->id) }}" class="form-inline" role="form">
        @csrf
        @method("PATCH")

        <input type="hidden" name="id" id="id" value="{{$category->id}}" id="id" />

        <div class="form-group">
            <label class="label-form" for="name">Category</label>
            <input type="text" class="form-control" name="name" placeholder="Category name" value="{{$category->name}}" required>
        </div>

        <input type="submit" class="btn btn-primary" value="Edit Category"></input>
    </form>

@stop
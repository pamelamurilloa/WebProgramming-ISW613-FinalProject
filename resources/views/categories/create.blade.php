@extends('layoutAdmin')
@section('content')

    <form method="post" action="{{ url('categories') }}" class="form-inline" role="form">
        @csrf

        <div class="form-group">
            <label class="label-form" for="name">Category</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Category name" required>
        </div>

        <input type="submit" class="btn btn-primary" value="Add Category">
    </form>

@stop
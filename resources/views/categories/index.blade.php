@extends('layout')
@section('content')

categories
<!-- 
    <div class="main-content">

        <h2>Your Unique News Cover</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category) :
                    <tr>
                        <td>{{ $loop->id }}</td>
                        <td>{{ $item->name }}</td>

                        <a href="{{ url('/category/' . $item->id . '/edit') }}" title="Edit Category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    </tr>

                    <form method="POST" action="{{ url('/category' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Category" onclick="return confirm('Confirm delete?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                @endforeach; 
            </tbody>
        </table>

        <a href="{{ url('/category/create') }}" class="btn btn-success btn-sm" title="Add New Category">Add New </a>
        
    </div> -->

@stop
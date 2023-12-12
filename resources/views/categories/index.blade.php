@extends('layoutAdmin')
@section('content')

    <div class="main-content">

        <h2>Category Administration</h2>

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
                @if (isset($categories))    
                    @foreach ($categories as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                        
                            <td>
                                <a href="{{ url('/categories/' . $item->id . '/edit') }}" title="Edit Category"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button></a>
                            </td>
                            <td>
                                <form method="post" action="{{ url('/categories' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Category"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                        
                    @endforeach
                @endif
            </tbody>
        </table>

        <a href="{{ url('/categories/create') }}" class="btn btn-success btn-sm" title="Add New Category">Add New </a>
        
    </div>

@stop
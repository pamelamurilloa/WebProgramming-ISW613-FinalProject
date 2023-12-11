@extends('layoutUser')
@section('content')

    <div class="main-content">

        <h2>News Sources Administration</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>News Source Name</th>
                    <th>rss url</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($newsSources))    
                    @foreach ($newsSources as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->url }}</td>
                            <td>{{ $item->category->name }}</td>
                        
                            <td>
                                <a href="{{ url('/news-sources/' . $item->id . '/edit') }}" title="Edit Source"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</button></a>
                            </td>
                            <td>
                                <form method="post" action="{{ url('/news-sources' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Source"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                        
                    @endforeach;
                @endif
            </tbody>
        </table>

        <a href="{{ url('/news-sources/create') }}" class="btn btn-success btn-sm" title="Add New Source">Add New </a>
        
    </div>

@stop
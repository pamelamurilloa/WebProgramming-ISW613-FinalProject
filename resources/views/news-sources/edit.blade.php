@extends('layoutUser')
@section('content')

    <form method="post" action="{{ url('news-sources/' .$newsSource->id ) }}" class="form-inline" role="form">
        @csrf
        @method("PATCH")

        <input type="hidden" name="id" id="id" value="{{$newsSource->id}}" id="id" />

        <div class="form-group">
            <label class="label-form" for="name">News Source</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter news source name" value="{{$newsSource->name}}" required>
        </div>

        <div class="form-group">
            <label class="label-form" for="url">RSS link</label>
            <input type="text" class="form-control" id="url" name="url" placeholder="Enter RSS link" value="{{$newsSource->url}}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select id="category_id" class="form-control" name="category_id" required>
                <?php
                    foreach($categories as $category) {
                        $selected = ($category->id === $newsSource->category_id) ? 'selected' : '';
                        echo "<option value=".$category->id." $selected>$category->name</option>";
                    }
                ?>
            </select>
        </div>

        <input type="submit" class="btn btn-primary" value="Edit News Source">
    </form>

@stop
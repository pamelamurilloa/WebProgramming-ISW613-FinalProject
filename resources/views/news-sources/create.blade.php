@extends('layoutUser')
@section('content')

    <form method="post" action="{{ url('news-sources') }}" class="form-inline" role="form">
        @csrf

        <div class="form-group">
            <label class="label-form" for="name">News Source</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter news source name" required>
        </div>

        <div class="form-group">
            <label class="label-form" for="url">RSS link</label>
            <input type="text" class="form-control" id="url" name="url" placeholder="Enter RSS link" required>
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select id="category_id" class="form-control" name="category_id" required>
                <?php
                    foreach($categories as $category) {
                        echo "<option value=$category->id>$category->name</option>";
                    }
                ?>
            </select>
        </div>

        <input type="submit" class="btn btn-primary" value="Add News Source">
    </form>

@stop
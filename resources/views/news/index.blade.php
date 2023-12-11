@extends('layoutUser')
@section('content')

    <h2>Your Unique News Cover</h2>

    <div class='filters'>
        <div class="form-group">
            <form method="get" action="{{ url('search') }}">
            @csrf
                <div class="input-group">
                    <input class="form-control" name="search" placeholder="Search..." value="{{ isset($search) ? $search : ''}}">
                    <button type="submit" class="btn btn-warning">Search</button>
                </div>
            </form>
        </div>

        <div class="form-group">
            <form method="get" action="{{ url('category') }}">
            @csrf
                <label for="category_id">Category</label>
                <select id="category_id" class="form-control" name="category_id">
                    <?php
                        foreach ($categories as $category) {
                            echo '<option value="' . $category->id . '">' . $category->name . '</option>';
                        }
                    ?>
                </select>   

                <input type="submit" class="btn btn-warning" value="Aplicar">

            </form>
        </div>

        <div class="form-group">
            <form method="get" action="{{ url('labels') }}">
            @csrf
                <label for="label_id">Tags</label>
                <select id="label_id[]" class="form-control" data_style="btn-primary" name="label_id" multiple>
                    <?php
                        foreach($labels as $label) {
                            echo '<option value="' . $label->id . '">'.$label->name.'</option>';
                        }
                    ?>
                </select>
                <input type="submit" class="btn btn-primary" value="Aplicar">
            </form>
        </div>
    </div>

    <?php

        echo '<div class="card-columns">';

            foreach ($news as $item) {
                echo '<div class="card text-center border-dark mb-3">';
                
                    echo '<div class="card-header">';
                        echo '<p class="card-text">' . $item->date . '</p>';
                        echo '<a href="' . $item->permalink . '"><img class="card-img-top" src="' . $item->image . '" alt="news image"></a>';
                    echo '</div>';

                    echo '<div class="card-body">';
                        echo '<a class="card-title" href="' . $item->permalink . '">' . $item->title . '</a>';
                        echo '<p  class="card-text">' . $item->category->name . '</p>';
                    echo '</div>';
                    
                    echo '<p class="card-text" >' . $item->short_description . '</p>';
                    echo '<div>';

                    foreach ($newsLabels[$item->id] as $labels) {
                        echo '<span class="card-text" >' . $labels->name . '</span>';
                    }
                echo '</div>';
                    echo '<a class="card-link" href="' . $item->permalink . '">Show More</a>';
                    
                echo '</div>';
            }

        echo '</div>';
    ?>

@stop

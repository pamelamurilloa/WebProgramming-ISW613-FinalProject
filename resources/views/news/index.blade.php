@extends('layoutUser')
@section('content')

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
                foreach ($newsLabels as $label) {
                    if ($label['news_id'] === $item->id) {
                        echo '<p class="card-text" >' . $label . ' </p>';
                    }
                }
            echo '</div>';
                echo '<a class="card-link" href="' . $item->permalink . '">Show More</a>';
                
            echo '</div>';
        }

    echo '</div>';
    ?>

@stop

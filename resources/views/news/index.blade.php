@extends('layoutUser')
@section('content')

    <h2>Your Unique News Cover</h2>
            
    <h3>Categories</h3>
    <div class="button-list category-list">
        <?php
            if ( !empty($categories) ) {
                foreach ($categories as $category) :
                    echo '<a class="btn btn-primary" href="myCover.php?id=' . $category->id . '">'.$category->name.'</a>';
                endforeach;
            }
        ?>
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

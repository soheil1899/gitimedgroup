@extends('website.layouts.main')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/js/app.js') }}"></script>
@endsection
@section('main')



    <div id="carouselExampleFade" class="carousel slide carousel-fade position-relative" data-ride="carousel">

        <ol class="carousel-indicators position-absolute">
            <li data-target="#carouselExampleFade" data-slide-to="0" class="active"></li>
            <?php
            for ($i = 1 ; $i < count($slider) ; $i++){
            ?>
            <li data-target="#carouselExampleFade" data-slide-to="{{$i}}"></li>
            <?php
            }
            ?>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="{{$slider[0]['picture']}}" alt="{{$i}} slide">
            </div>
            <?php
            for ($i = 1 ; $i < count($slider) ; $i++){
            ?>
            <div class="carousel-item">
                <img class="d-block w-100" src="{{$slider[$i]['picture']}}" alt="{{$i}} slide">
            </div>
            <?php
            }
            ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <img class="prev-button" src="/media/temp/button_prev.png">
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <img class="next-button" src="/media/temp/button_next.png">
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="title-index">
        <strong>درباره شرکت</strong>
    </div>
    <div class="text-index">

        @if(isset($id))
            <{{ $component }} :id="{{ $id }}">
    </{{ $component }}>
    @else
        <{{ $component }}></{{ $component }}>
        @endif

        </div>




        <div class="title-index">
            <strong>آخرین اخبار</strong>
        </div>
        <div class="text-index">
            <ul>
                <?php


                if (count($news['toArticle']) > 5) {
                    $newscounter = 5;
                } else {
                    $newscounter = count($news['toArticle']);
                }

                for ($i = 0; $i < $newscounter; $i++){
                ?>
                <li>
                    <a href="/article/news/{{$news['toArticle'][$i]['url']}}">{{$news['toArticle'][$i]['name']}}</a>
                </li>
                <?php
                }
                ?>



            </ul>
        </div>





        <div class="title-index">
            <strong>همکاران ما</strong>
        </div>
        <div class="text-index">

        <partner-component></partner-component>



        </div>















@endsection

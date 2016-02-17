@extends('website')


@section('content')
    <div class="container">
        <h1>{{ $article->title }}</h1>
        <h5>{{ $article->published_at }}</h5>
        <hr>
        <div class="col-md-8">
            {!!$article->content_raw !!}
        </div >

        <div class="col-md-4" style="border: 1px solid red;" >
            asdasd
        </div>
    </div>
        <hr>




        <button class="btn btn-primary" onclick="history.go(-1)">
            « Back
        </button>
    </div>


@stop
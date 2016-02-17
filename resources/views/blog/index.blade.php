@extends('website')

@section('content')
        <div class="container">
        <h1>文章类表</h1>

        <hr>


            <input type="hidden" id="articleUpdateTime" value="{{ $lastArticleUpdatetime }}">
            <div id="articlesList">
            @foreach ($articles as $article)
                <div class="article-list">
                    <div class="row">
                        <div class="article-thumbnail-image ">
                            <img src="{{ $article->page_image}}">
                        </div>

                        <div class="article-thumbnail-content  ">
                            <a href="/blog/{{ $article->slug }}" class="title">{{ $article->title }}</a>
                            <em class="time hidden-xs">({{ $article->published_at }})</em>
                            <p class="subtitle hidden-xs">
                                所以，Uber或者滴滴是否应该告诉大家，动态定价到底是怎么算出来的？
                            </p>
                        </div>

                    </div>
                </div>
                <hr/>
            @endforeach


            </div>
            <div class="view-more" id="viewMore">
                浏览更多
            </div>

        <hr>

    </div>
@stop

@section('script')
    <script type="text/javascript">

        $('#viewMore').click(function (){

            $(this).text('加载中.....');
            $.ajax({
                type: 'POST',
                url: '/ajax/loadMoreArticle',
                data: {lastArticleUpdateTime: $('#articleUpdateTime').val()},
                dataType: 'json',
                async:false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success: function(data)
                {
                    var articles = data.articles;
                    var html="";
                    for(var i=0; i<articles.length;i++)
                    {
                        html+= "<div class=\"article-list\">" +
                                    "<div class=\"row\">"+
                                        "<div class=\"article-thumbnail-image\">"+
                                            "<img src=\""+ articles[i]['page_image']+"\">"+
                                        "</div>"+

                                        "<div class=\"article-thumbnail-content  \">"+
                                            "<a href=\"/blog/"+ articles[i]['slug']+"\" class=\"title\">"+ articles[i]['title']+"</a>"+
                                            "<em class=\"time hidden-xs\">("+articles[i]['published_at'] +")</em>"+
                                            "<p class=\"subtitle hidden-xs\">"+
                                                "所以，Uber或者滴滴是否应该告诉大家，动态定价到底是怎么算出来的？"+
                                            "</p>"+
                                        "</div>"+
                                    "</div>"+
                                "</div>"+
                                "<hr/>";

                        if(i===(articles.length-1))
                        {

                            $('#articleUpdateTime').val(articles[i]['updated_at']);
                        }
                    }

                    $('#articlesList').append(html);

                    if(articles.length ===0){
                        $('#viewMore').text('没有更多文章');
                    }
                    else
                    {
                        $('#viewMore').text('加载更过');
                    }
                },
                error: function(xhr, type){
                    alert('Ajax error!')
                }

            });

        })


    </script>
@stop
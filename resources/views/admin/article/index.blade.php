@extends('website')

@section('content')

    <br/><br/>
    <div class="container">
        <div class="row ">
            <div class="col-md-6">
                <h3>文章 <small>» 列表</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/article/create" class="a_black">
                <div  class="btn-reg btn-base right">
                    <i class="icon-plus"></i> 新建文章
                </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">

                {{--@include('admin.partials.errors')--}}


                <table id="articles-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>发布时间</th>
                        <th>作者</th>
                        <th>标题</th>
                        <th>Subtitle</th>
                        <th data-sortable="false">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td data-order="{{ $article->published_at->timestamp }}">
                                {{ $article->published_at->format('j-M-y g:ia') }}
                            </td>
                            <td>{{ $article->author }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->subtitle }}</td>
                            <td>
                                <a href="/admin/article/{{ $article->id }}/edit" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> 编辑
                                </a>
                                <a href="/blog/{{ $article->slug }}" class="btn btn-xs btn-warning">
                                    <i class="fa fa-eye"></i> 查看
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {!! $articles->render() !!}
    </div>

    <script type="text/javascript">

    </script>
    @stop
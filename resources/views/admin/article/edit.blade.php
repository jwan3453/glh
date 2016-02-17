
@extends('website')
@include('UEditor::head')




@section('resources')
    <script src="{{ asset('/js/jquery.form.js') }}"></script>
@stop



@section('content')

    <div class="margin">
    </div>

    <div class="container">
        <form action="{{url('/admin/article/'.$article->id)}}" method="post" id="articleForm">
            <input type="hidden" name="_method" value="PUT">
            @include('admin.article._form')


        </form>

        <div class="article-input-section">
            <form method="POST" action="{{url('/upload/image')}}"  enctype="multipart/form-data" id="uploadForm">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="coverImageFilePath" id="coverImageFilePath" value="">
                <div class="upload-article-image-show" id="uploadImageShow" >
                    <span>上传封面图片</span>
                    <img src=""/>
                </div>
                <input type="file"  id="uploadImage" name="uploadImage" class="upload-image"/>
            </form>
        </div>

        <div class="margin"></div>
        <div class="article-input-section align-center">
            <div class="article-btn-section">
                <div  class="btn-base btn-reg left" id="submitPost">
                    发布
                </div>
                <div class="btn-base btn-reg right">
                    保存为草稿
                </div>
            </div>
        </div>
        <div class="margin">
        </div>

    </div>
    </div>
    <div class="margin">
    </div>
@stop

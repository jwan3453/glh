@extends('website')


@section('content')
    <br/><br/>
    <div class="container">
        <div class="row ">
            <div class="col-md-6">
                <h3>评分 <small>» 列表</small></h3>
            </div>
            <div class="col-md-6 text-right">
                <a href="/admin/hotel/createStandardSysRec" class="a_black">
                    <div  class="btn-reg btn-base right">
                        <i class="icon-plus"></i> 新建评分
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
                        <th>酒店名称</th>
                        <th>酒店总分</th>
                        <th data-sortable="false">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($records as $record)
                        <tr>

                            <td>{{ $record->name }}</td>
                            <td>{{ $record->totalPoints }}</td>
                            <td>
                                <a href="/admin/hotel/{{ $record->id }}/editStandardSysRec" class="btn btn-xs btn-info">
                                    <i class="fa fa-edit"></i> 编辑
                                </a>
                                <a href="/admin/hotel/showStandardSysRec/{{ $record->id }}" class="btn btn-xs btn-warning">
                                    <i class="fa fa-eye"></i> 查看
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@stop
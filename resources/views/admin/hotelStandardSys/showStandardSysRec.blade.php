@extends('website')

@section('content')


    <div class="margin-top"></div>
    <br/><br/>
    <form  method="POST" action="{{url('admin/hotel/updateStandardSysRec')}}"  enctype="multipart/form-data" id="newHotelForm">

        <div class="container">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="col-sm-12">

                    <div  class="hotel-score-detail">
                        <input type="hidden"  name="recordId" id="recordId" value="{{$record->id}}">
                        <div class="left"  >
                            <label>酒店名</label> <input type="text" name="hotelName" value="{{$record->name}}">
                        </div>

                        <div class="right" style="height:38px; line-height:38px;">
                            <label>总分:</label><span class="total-score" >{{$record->totalPoints}}</span>
                            <input type="hidden" name="totalScore" id="totalScore" value="{{$record->totalPoints}}"/>
                            <input type="hidden" name="totalRow" id="totalRow" value="{{sizeof($standardwithPoints)}}"/>
                        </div>
                    </div>
                    <table id="articles-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>标准描述</th>
                            <th>分类</th>
                            <th>部门</th>
                            <th>基本分数</th>
                            <th>得分</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($standardwithPoints as $standard)
                            <tr>

                                <td>{{ $standard['standard_desc'] }}</td>
                                <td>{{ $standard['category'] }}</td>
                                <td>{{ $standard['department'] }}</td>
                                <td><input type="text" class="points" value="{{$standard['points']}}" ></td>
                                <td><input type="text" class="score" name="score_{{$standard['id']}}" value="{{$standard['score']}}"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div  class="hotel-score-detail">


                        <div class="right" style="height:38px; line-height:38px;">
                            <label>总分:</label><span class="total-score" value="{{$record->totalPoints}}"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>
@stop


@section('script')
    <script type="text/javascript">

        $('input[type=text]').attr('disabled','disabled');

    </script>
@stop
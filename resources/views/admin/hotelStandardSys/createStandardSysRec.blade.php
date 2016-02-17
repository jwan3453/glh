@extends('website')

@section('content')


    <div class="margin-top"></div>
    <br/><br/>
    <form  method="POST" action="{{url('admin/hotel/newStandardSysRec')}}"  enctype="multipart/form-data" id="newHotelForm">

        <div class="container">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="col-sm-12">

                <div  class="hotel-score-detail">
                    <div class="left"  >
                        <label>酒店名</label> <input type="text" name="hotelName">
                     </div>

                    <div class="right" style="height:38px; line-height:38px;">
                        <label>总分:</label><span class="total-score" ></span>
                        <input type="hidden" name="totalScore" id="totalScore"/>
                        <input type="hidden" name="totalRow" id="totalRow" value="{{sizeof($standards)}}"/>
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
                    @foreach ($standards as $standard)
                        <tr>

                            <td>{{ $standard->standard_desc }}</td>
                            <td>{{ $standard->category }}</td>
                            <td>{{ $standard->department }}</td>
                            <td><input type="text" class="points" ></td>
                            <td><input type="text" class="score" name="score_{{$standard->id}}"></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div  class="hotel-score-detail">


                    <div class="right" style="height:38px; line-height:38px;">
                        <label>总分:</label><span class="total-score"></span>
                    </div>
                </div>
            </div>
            <button class="btn-base btn-reg nextStep-mid ">提交</button>
        </div>
    </div>

    </form>
@stop


@section('script')
    <script type="text/javascript">


        $('.score,.points').keyup(function(){


            $(this).val($(this).val().replace(/[^0-9.]/g,''));

           if($(this).attr('class')==='score'){


           }


        }).bind("paste",function(){  //CTR+V事件处理
            $(this).val($(this).val().replace(/[^0-9.]/g,''));
        }).css("ime-mode", "disabled"); //CSS设置输入法不可用

        $('.score').change(function(){
            var totalScore=0.0;

            $('.score').each(function(){



                if(parseFloat($(this).val()) !=='' && !isNaN(parseFloat($(this).val())) && parseFloat($(this).val()) !=='0')
                {
//
//                  alert(totalScore);
                    totalScore += parseFloat($(this).val());

                }
            });

            $('.total-score').text(totalScore);
            $('#totalScore').val(totalScore);
        })

    </script>
@stop
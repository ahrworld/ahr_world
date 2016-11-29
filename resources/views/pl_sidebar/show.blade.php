@extends('pl_sidebar/sidebar')
@section('line_menu')
<div style="height:20px;"></div>
@endsection
@section('content')
<style>
.panel-default .default_photo{
   padding: 0px !important;
 }
 .default_photo .bs_background{
   background-position: center;
   background-size: cover;
   width:100%;
   height:250px;
   display: block;
 }
 .default_photo .bs_background .update_bt{
   position: absolute; bottom: 5px; right: 30px;
 }
 .default_photo .bs_photo{
   display: block;
   background-position: center;
   background-size: cover;
   height:100px; position: absolute; width:100px; bottom: -10px; left: 35px;
 }
 .default_photo .bs_photo .update_bt{
   position: absolute; bottom: 5px; right: 10px;
 }
  input[type="radio"],input[type="checkbox"]{
    margin: 10px !important;
    width: 16px;
    height: 16px;
  }

.summary_A .image {
    width: 130px;
    height: 130px;
    border: 1px solid #CCC;
    float: left;
    background-position: center;
    background-size: cover;
}

.summary_A .text {
    width: 470px;
    float: left;
    margin-left: 20px;
}
</style>
 <!-- news_modal_1 modal -->
<div class="modal fade" id="news_modal_1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">応募しますか？</h4>
      </div>
      <div class="modal-body">
      <form class="form_a" action="{{url('/ttt')}}" method="POST" >
        {{ csrf_field() }}
       
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="b_id" id="b_id" value="">

        <textarea name="content" class="form-control"  rows="5">ご連絡頂き、ありがとうございます。
ぜひ、「 」について、更にお話を伺えればと思っております。
お忙しいところ恐縮ですが、よろしくお願い致します。</textarea>
      </div>
      <div class="modal-footer rk_wrapper">
        <button type="button" class="btn btn-default back" data-dismiss="modal">キャンセル</button>
        <button type="submit" class="btn btn-primary" >送信する</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- modal end -->

<div class="scorl" style="width:60%; float:left; margin-left:15px;">

<div class="wrapper" style="margin-top:0px !important;">
<div class="s1 search">

<div class="panel panel-default">
    <div class="panel-body">
        <!-- photo left -->
        @if(isset($bs_image->image_small))
        <div class="img-left">
            <img height="175" src="data:image/png;base64,{{$bs_image->image_small}}" alt="">
        </div>
        @else
        <div class="img-left">
            <img height="175" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
        </div>
        @endif
               <!-- content -->
        <div class="panel-content">
            <label style="font-size:18px;">{{$res->company_name}}</label>

            <p>
                <label class="label-gray">業種</label><span>{{$res->name}}</span></p>
            <p>
                <label class="label-gray">仕事内容</label><span>{{$res->content}}</span></p>
            <p>
                <label class="label-gray">応募条件</label><span></span></p>
            <p>
                <label class="label-gray">給与</label><span>000万円～000万円</span></p>
            <p>
                <label class="label-gray">勤務地</label><span></span></p>
        </div>
       
        <div class="img-right">
            <div style="width:150px; float:left;">
                <a href="#" class="btn ahr-label-blue ahr-btn-lg bt_1" attr="{{$r_id->r_id}}" bs="{{$res->user_id}}" data-toggle="modal" data-target="#news_modal_1">応募する</a>
                <a href="#" class="btn ahr-label-yellow ahr-btn-lg bt_2" attr="{{$r_id->r_id}}">お気に入り</a>
            </div>
        </div>
    </div>
</div>


</div>
</div>


@if(isset($bs_image))
<style>
.bs_background{
background-image:url(data:image/png;base64,{{$bs_image->image_big}});
}
.bs_photo{
background-image:url(data:image/png;base64,{{$bs_image->image_small}});
}
</style>
@endif


    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#a1" aria-controls="a1" role="tab" data-toggle="tab">企業情報</a></li>
        <li role="presentation"><a href="#a2" aria-controls="a2" role="tab" data-toggle="tab">採用情報</a></li>
        <li role="presentation"><a href="#a3" aria-controls="a3" role="tab" data-toggle="tab">企業カラー</a></li>
    </ul>
    <!-- 企業情報 Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane ahr-panel active" id="a1">
            <div class="wrapper">
                <!-- 1 -->
                <div class="panel panel-default">
                    <div class="panel-body default_photo">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="img-thumbnail bs_background">
                                </div>
                                <div class="img-thumbnail bs_photo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <!-- 2 -->
                    @if($res->company_name)
                    <div style="margin:30px auto;">
                        <h4 style="font-weight:bold;">会社名:<span>{{$res->company_name}}</span></h4>
                    </div>
                    @endif 
                    
                    <!-- 3 -->
                    @foreach ($bs_summary_A as $value_summary)
                    @if($value_summary->summary_title)
                    <div class="panel panel-default summary_A">
                      <div class="panel-body update-panel1" style="padding-top: 0px !important;">
                          <div class="row">
                                  <div class="col-md-12">
                                       <div class="form-group" style="margin:20px auto;">
                                          <h4>■{{$value_summary->summary_title}}</h4>
                                       </div>
                                       <div class="panel-content default_content">
                                          <div class="form-group">
                                              <div class="image" style="background-image:url('ahr/busineses_img/{{$value_summary->image}}');
                                              ">
                                              </div>

                                              <div class="text">
                                                <h5>{{$value_summary->summary}}</h5>
                                              </div>

                                          </div>
                                       </div>
                                  </div>
                          </div>
                          <!-- row end -->
                      </div>
                    </div>
                    @endif
                    @endforeach
                    <!-- 4 -->
                    <div class="default_summary">
                        <a href="#" class="float-right update_bt none" style="position: absolute; text-align: right; width: 57%;">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <h6>■会社概要</h6>
                        <table class="table table-bordered ahr-table">
                            <tbody>
                                <tr>
                                    <th scope="row" width="20%">担当者氏名</th>
                                    <td>{{ $res->name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="20%">本社所在地</th>
                                    <td>{{ $res->address }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="20%">企業URL</th>
                                    <td>{{ $res->web_url }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="20%">創業・設立</th>
                                    <td>{{ $res->set_up }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="20%">社員国籍</th>
                                    <td>{{ $res->nationality_members }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="20%">総従業員数</th>
                                    <td>{{ $res->member_count }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="20%">資本金</th>
                                    <td>{{ $res->capital }}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="20%">売上高</th>
                                    <td>{{ $res->amount_of_sales }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            <!-- wrapper end -->
        </div>
 
        <!-- 採用情報 Tab panes -->
        <div role="tabpanel" class="tab-pane ahr-panel" id="a2">
            <div class="panel-group" id="accordion" role="tablist" >
          @foreach ($recruitments as $key => $recruitment)
           <div class="panel panel-default">
             <div class="panel-heading" role="tab" id="heading{{ $key }}">
               <a style="float:left; height:30px;" role="button" data-toggle="collapse" data-parent="#accordion{{ $key }}" href="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}" >
                 <h4 class="panel-title" style="height:18px;">
                   <span>{{ $key+1 }}</span>
                   <a style="float:left; width:80%; height: 27px;" role="button" data-toggle="collapse" data-parent="#accordion{{ $key }}" href="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}" >
                     {{ $recruitment->name}}
                   </a>
                   <i class="fa fa-caret-down float-right"></i>
                 </h4>
               </a>
             </div>
             <div id="collapse{{ $key }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $key }}">
               <div class="panel-body">
               <table class="table table-bordered ahr-table">
                    <tbody>
                         <tr>
                         <th scope="row" width="20%">募集職種</th>
                         <td>{{ $recruitment->name }}</td>
                         </tr>
                         <tr>
                         <th scope="row" width="20%">職務内容</th>
                         <td>{{ $recruitment->content }}</td>
                         </tr>
                         <tr>

                         <th scope="row" width="20%">雇用形態</th>
                         <td>
                         @foreach ($employments as $key => $value)
                         @if ($recruitment->id == $value->recruitments_id)
                         {{ $value->employment_name }}<br>
                         @endif
                         @endforeach
                         </td>

                         </tr>
                         <tr>
                         <th scope="row" width="20%">募集経歴</th>
                         <td>
                         @foreach ($experiences as $key => $value)
                         @if ($recruitment->id == $value->recruitments_id)
                             {{$value->experiences_name}}<br>
                         @endif
                         @endforeach
                         </td>
                         </tr>
                         <tr>
                         <th scope="row" width="20%">募集学科</th>
                         <td>{{ $recruitment->subject }}</td>
                         </tr>
                         <tr>
                         <th scope="row" width="20%">語学・母語レベル</th>
                         <td>

                         </td>
                         </tr>
                         <tr>
                         <th scope="row" width="20%">必須技能・資格</th>
                         <td>{{ $recruitment->need_skill }}</td>
                         </tr>
                         <tr>
                         <th scope="row" width="20%">あれば嬉しい技能・資格</th>
                         <td>{{ $recruitment->if_skill }}</td>
                         </tr>
                         <tr>
                         <th scope="row" width="20%">その他の技能・資格</th>
                         <td>{{ $recruitment->other_skill }}</td>
                         </tr>
                    </tbody>
               </table>
               <h6>■雇用条件</h6>
               <table class="table table-bordered ahr-table">
                    <tbody>
                         <tr>
                         <th scope="row" width="20%">勤務地</th>
                         <td>{{ $recruitment->work_site }}</td>
                         </tr>
                         <tr>
                         <th scope="row" width="20%">勤務時間</th>
                         <td>{{ $recruitment->work_time }}</td>
                         </tr>
                         <tr>
                         <th scope="row" width="20%">給与</th>
                         <td>月收 {{ $recruitment->annual_income }} 円 <br>年收 {{ $recruitment->monthly_income }} 円</td>
                         </tr>
                         <tr>
                         <th scope="row" width="20%">ボーナス</th>
                         <td>{{ $recruitment->bonus }}</td>
                         </tr>
                         <tr>
                         <th scope="row" width="20%">福利厚生</th>
                         <td>{{ $recruitment->holiday }}</td>
                         </tr>
                         <tr>
                         <th scope="row" width="20%">休日休暇</th>
                         <td>{{ $recruitment->welfare }}</td>
                         </tr>
                         <tr>
                         <th scope="row" width="20%">諸手当</th>
                         <td>{{ $recruitment->allowances }}</td>
                         </tr>
                         <tr>
                         <th scope="row" width="20%">教育制度</th>
                         <td>{{ $recruitment->education }}</td>
                         </tr>
                    </tbody>
               </table>
               </div>
             </div>
           </div>
           @endforeach
           </div>
        </div>
        <!-- 採用情報 tab-panel end -->
        <!-- 企業カラー Tab panes -->
        <div role="tabpanel" class="tab-pane ahr-panel" id="a3">
            <div class="wrapper">
                <!-- 1 -->
               @foreach($bs_blog as $value)
               <div class="panel panel-default">
                   <div class="panel-body">
                       <div class="row">
                          
                           <!-- video -->
                           <div class="col-md-12">
                           <div class="col-sm-3 img-thumbnail dsa_s bs_photo" style="width:60px; height:60px;"></div>
                           <a href="javascritp:;" class="blog_name">{{ $value->company_name }}</a>
                           <span class="blog_time">{{ $value->created_at }}</span>
                               <div class="panel-content" style="width:100%; font-size:25px; padding-right:50px;">
                                       <pre style="font-size: 16px;">{{ $value->blog_content }}</pre>
                               </div>
                               <div style="width:100%;">
                               <img src="{{$value->blog_image}}" width="100%">
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               @endforeach
            </div>
            <!-- wrapper end -->
        </div>
        
    </div>
    <!-- tab-content end -->
</div>
<!-- colmd9 end -->
@endsection

<style>
input[type="radio"],
input[type="checkbox"] {
    margin: 10px !important;
    width: 16px;
    height: 16px;
}
.fileUpload {
    position: relative;
    overflow: hidden;
}
.fileUpload span{
    font-size: 13px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.blog_image{
   background-repeat: no-repeat;
   width:100%;
   height:100%;
}
pre{
    background: #FFF !important;
    border:0px !important;

}
/*blog*/
 .dsa_s{
     display: block;
     background-position: center;
     background-size: cover;
     height:100px;
     width:100px;
 }
 .kv-fileinput-caption{
     height: 26px !important;
 }
 .blog_name{
     line-height: 40px;
     padding-left: 5px;
     float: left;
     color: rgba(28, 126, 187, 0.79);
     height: 0px;
     font-size: 21px;
 }
 .blog_time{
     line-height: 107px; padding-left:5px; float: left; height: 0px;
 }
</style>

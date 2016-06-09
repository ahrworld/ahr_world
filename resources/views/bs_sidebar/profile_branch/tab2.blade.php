    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var token = '{{ Session::token() }}';
    $(document).ready(function(e) {
      $('.language .add').click(function(){
        $('.language .append').append($('<select class=form-control name=language[] style="width:100px;float:left;margin-right:5px; margin-bottom:5px;"><option value=日本語>日本語<option value=中囯語>中囯語<option value=英語>英語<option value=ベトナム語>ベトナム語</select><select class=form-control name=languagelv[] style="width:100px;margin-right:5px; margin-bottom:5px;"><option value=ビジネス>ビジネス<option value=日常会話>日常会話<option value=母語>母語</select>'));
      });
      $(".select11").select2({
        closeOnSelect: true
      });
      $(".select22").select2({
        maximumSelectionLength: 5,
      });

      $(".finish_sumbit").click(function(){
        $('.form_a').submit();
    });

      $(".cancel").click(function(){
        $(this).parent("div").hide();
      });
      $(".add_all").click(function(){
        $('.push_all').append('<div class="row"> <div class="col-md-12"> <form action="#"> <div class="panel panel-default"> <table class="table table-bordered"> <tbody> <tr> <th scope="row" align="right" width="20%">募集職種<span class="color-red">※</span></th> <td> <select class="select11" style="width:100%;" > <optgroup label="Mountain Time Zone"> <option value="AZ">Arizona</option> <option value="CO">Colorado</option> <option value="ID">Idaho</option> <option value="MT">Montana</option> </optgroup> <optgroup label="Central Time Zone"> <option value="AL">Alabama</option> <option value="AR">Arkansas</option> <option value="IL">Illinois</option> <option value="IA">Iowa</option> <option value="KS">Kansas</option> </optgroup> </select> </td></tr><tr> <th scope="row" align="right" width="20%">職務内容<span class="color-red">※</span></th> <td> <input type="text" class="form-control ahr-input_1"> </td></tr><tr> <th scope="row" align="right" width="170px"> 雇用形態 <span class="color-red">※</span> <p>（複数選択可）</p></th> <td> <button type="button" class="btn ahr-button_3">正社員(外国人歓迎</button> <button type="button" class="btn ahr-button_3">インターンシップ生</button> <button type="button" class="btn ahr-button_3">アルバイト</button> <button type="button" class="btn ahr-button_3">正社員(新卒)</button> <button type="button" class="btn ahr-button_3">正社員(第二新卒)</button> <button type="button" class="btn ahr-button_3">正社員(中途採用)</button> </td></tr><tr> <th scope="row" align="right" width="170px"> 募集経歴 <span class="color-red">※</span> <p>（複数選択可）</p></th> <td style="padding-top:15px;"> <button type="button" class="btn ahr-button_2">大 学</button> <button type="button" class="btn ahr-button_2">短期大学</button> <button type="button" class="btn ahr-button_2">専門学校</button> <button type="button" class="btn ahr-button_2">大学院</button> <button type="button" class="btn ahr-button_2">高等学校</button> <button type="button" class="btn ahr-button_2">不問</button> </td></tr><tr> <th scope="row" align="right" width="20%">理想人物像</th> <td> <textarea class="form-control" rows="3"></textarea> </td></tr><tr> <th scope="row" align="right" width="20%">募集学科<span class="color-red">※</span></th> <td> <select class="select22" style="width:100%;" multiple="multiple" > <optgroup label="Mountain Time Zone"> <option value="AZ">Arizona</option> <option value="CO">Colorado</option> <option value="ID">Idaho</option> <option value="MT">Montana</option> </optgroup> <optgroup label="Central Time Zone"> <option value="AL">Alabama</option> <option value="AR">Arkansas</option> <option value="IL">Illinois</option> <option value="IA">Iowa</option> <option value="KS">Kansas</option> </optgroup> </select> </td></tr><tr> <th scope="row" align="right" width="20%">語学・母語レベル</th> <td class="language"> <div style="width:100%;"> <select class="form-control" style="width:100px; float:left; margin-right:5px;"> <option value="AZ">日本語</option> <option value="CO">中囯語</option> <option value="ID">英語</option> <option value="ID">ベトナム語</option> </select> <select class="form-control" style="width:100px; float:left; margin-right:5px;"> <option value="AZ">ビジネス</option> <option value="CO">日常会話</option> <option value="ID">母語</option> </select> </div><div style="width:100%; height: 40px;"> <label class="add" style="top:7px !important;"></label> </div><div class="append"></div></td></tr><tr> <th scope="row" align="right" width="20%">必須技能・資格</th> <td> <input name="tags" id="singleFieldTags1" value="PHP, JAVA"> </td></tr><tr> <th scope="row" align="right" width="20%">あれば嬉しい技能・資格</th> <td><input name="tags" id="singleFieldTags2" value="ORACLE"> </td></tr><tr> <th scope="row" align="right" width="20%">その他の技能・資格</th> <td> <input name="tags" id="singleFieldTags3" value="文書管理"> </td></tr></table> </div><h3 style="color: #585656; font-weight:bold;  margin-top:50px;">雇用基本条件</h3> <div class="panel panel-default"> <table class="table table-bordered"> <tbody> <tr> <th scope="row" align="right" width="20%">勤務地（複数記入可）</th> <td> <input type="text" class="form-control ahr-input_1"> </td></tr><tr> <th scope="row" align="right" width="20%">年收</th> <td> <input type="text" class="form-control ahr-input_1" style="width:200px; float:left; margin-right:10px;"> <select class="form-control" style="width:100px; float:left; margin-right:20px;"> <option value="AZ">円</option> <option value="CO">元</option> <option value="ID">米ドル</option> </select> <div style="width:50px; float:left;">月收</div><input type="text" class="form-control ahr-input_1" style="width:200px; float:left; margin-right:10px;"> <select class="form-control" style="width:100px; float:left; margin-right:20px;"> <option value="AZ">円</option> <option value="CO">元</option> <option value="ID">米ドル</option> </select> </td></tr><tr> <th scope="row" align="right" width="20%">勤務時間</th> <td> <input type="text" class="form-control ahr-input_1" style="width:85%; float:left;"><button type="button" class="btn btn-default" style="border-radius:0px !important;">時間</button> </td></tr><tr> <th scope="row" align="right" width="20%">ボーナス</th> <td> <input type="text" class="form-control ahr-input_1"> </td></tr><tr> <th scope="row" align="right" width="20%">休日休暇</th> <td> <input type="text" class="form-control ahr-input_1" style="width:85%; float:left;"><button type="button" class="btn btn-default" style="border-radius:0px !important;">日</button> </td></tr><tr> <th scope="row" align="right" width="20%">福利厚生</th> <td> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> あり </label> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> なし </label> </td></tr><tr> <th scope="row" align="right" width="20%">諸手当</th> <td> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> あり </label> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> なし </label> </td></tr><tr> <th scope="row" align="right" width="20%">教育制度</th> <td> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> あり </label> <label class="radio-inline"> <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> なし </label> </td></tr></table> </div></form> </div></div>');

      });


    });
    </script>
<div class="wrapper">
    <div class="row">
      <div class="col-md-12">
         <div class="panel-group" id="accordion" role="tablist" >
          @foreach ($recruitments as $key => $recruitment)
           <div class="panel panel-default">
             <div class="panel-heading" role="tab" id="heading{{ $key }}">
               <a style="float:left; height:30px;" role="button" data-toggle="collapse" data-parent="#accordion{{ $key }}" href="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}" >
                 <h4 class="panel-title" style="height:18px;">
                   <span>{{ $key+1 }}</span>
                   <a style="float:left; width:80%; height: 27px;" role="button" data-toggle="collapse" data-parent="#accordion{{ $key }}" href="#collapse{{ $key }}" aria-expanded="true" aria-controls="collapse{{ $key }}" >
                     {{ $recruitment->name }}
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
                         @foreach ($languagelvs as $key => $value)
                         @if ($recruitment->id == $value->recruitments_id)
                         {{ $value->languagelv_name }}<br>
                         @endif
                         @endforeach
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

           <div style="text-align:right;">
              <label class="add add_recruitment"  data-toggle="modal" data-target="#recruitment" style="width:30px; height:30px;"></label>
           </div>
           <!-- Modal -->
           <div class="modal fade" id="recruitment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
             <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                 <div class="modal-header">

                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   <h4 class="modal-title" id="myModalLabel">title</h4>
                 </div>
                 <form action="{{url('/business/recruitments_add')}}" method="POST">
                 {{ csrf_field() }}
                     <div class="modal-body">
                       <div class="row"> <div class="col-md-12"> <div class="panel panel-default"> <table class="table table-bordered"> <tbody> <tr> <th scope="row" align="right" width="20%">募集職種<span class="color-red">※</span></th> <td> <select class="select11" name="recruitment_name" style="width:100%;" > <optgroup label="Mountain Time Zone"> <option value="AZ">Arizona</option> <option value="CO">Colorado</option> <option value="ID">Idaho</option> <option value="MT">Montana</option> </optgroup> <optgroup label="Central Time Zone"> <option value="AL">Alabama</option> <option value="AR">Arkansas</option> <option value="IL">Illinois</option> <option value="IA">Iowa</option> <option value="KS">Kansas</option> </optgroup> </select> </td></tr><tr> <th scope="row" align="right" width="20%">職務内容<span class="color-red">※</span></th> <td> <input type="text" name="content" class="form-control ahr-input_1"> </td></tr><tr> <th scope="row" align="right" width="170px"> 雇用形態 <span class="color-red">※</span> <p>（複数選択可）</p></th> <td> <input type="checkbox" name="employment[]" value="正社員(外国人歓迎)">正社員(外国人歓迎) <input type="checkbox" name="employment[]" value="インターンシップ生">インターンシップ生 <input type="checkbox" name="employment[]" value="アルバイト">アルバイト <input type="checkbox" name="employment[]" value="正社員(新卒)">正社員(新卒) <input type="checkbox" name="employment[]" value="正社員(第二新卒)">正社員(第二新卒) <br><input type="checkbox" name="employment[]" value="正社員(中途採用)">正社員(中途採用) </td></tr><tr> <th scope="row" align="right" width="170px"> 募集経歴 <span class="color-red">※</span> <p>（複数選択可）</p></th> <td style="padding-top:15px;"> <input type="checkbox" name="experience[]" value="大 学">大 学 <input type="checkbox" name="experience[]" value="短期大学">短期大学 <input type="checkbox" name="experience[]" value="専門学校">専門学校 <input type="checkbox" name="experience[]" value="大学院">大学院 <input type="checkbox" name="experience[]" value="高等学校">高等学校 <input type="checkbox" name="experience[]" value="不問">不問 </td></tr><tr> <th scope="row" align="right" width="20%">理想人物像</th> <td> <textarea name="ideal" class="form-control" rows="3"></textarea> </td></tr><tr> <th scope="row" align="right" width="20%">募集学科<span class="color-red">※</span></th> <td> <select name="subject" class="select22" style="width:100%;" multiple="multiple" > <optgroup label="Mountain Time Zone"> <option value="AZ">Arizona</option> <option value="CO">Colorado</option> <option value="ID">Idaho</option> <option value="MT">Montana</option> </optgroup> <optgroup label="Central Time Zone"> <option value="AL">Alabama</option> <option value="AR">Arkansas</option> <option value="IL">Illinois</option> <option value="IA">Iowa</option> <option value="KS">Kansas</option> </optgroup> </select> </td></tr><tr> <th scope="row" align="right" width="20%">語学・母語レベル</th> <td class="language"> <div style="width:100%;" class="append"> <select class="form-control" name="language[]" style="width:100px; float:left; margin-right:5px;"> <option value="日本語">日本語</option> <option value="中囯語">中囯語</option> <option value="英語">英語</option> <option value="ベトナム語">ベトナム語</option> </select> <select class="form-control" name="languagelv[]" style="width:100px; float:left; margin-right:5px;"> <option value="ビジネス">ビジネス</option> <option value="日常会話">日常会話</option> <option value="母語">母語</option> </select> <div style="width:100%; height:40px;"> <label class="add" style="top:7px !important;"></label> </div></div></td></tr><tr> <th scope="row" align="right" width="20%">必須技能・資格</th> <td> <input name="need_skill" id="singleFieldTags1" value="PHP, JAVA"> </td></tr><tr> <th scope="row" align="right" width="20%">あれば嬉しい技能・資格</th> <td><input name="if_skill" id="singleFieldTags2" value="ORACLE"> </td></tr><tr> <th scope="row" align="right" width="20%">その他の技能・資格</th> <td> <input name="other_skill" id="singleFieldTags3" value="文書管理"> </td></tr></tbody> </table> </div><h3 style="color: #585656; font-weight:bold; margin-top:50px;">雇用基本条件</h3> <div class="panel panel-default" style="margin-bottom:5px !important;"> <table class="table table-bordered"> <tbody> <tr> <th scope="row" align="right" width="20%">勤務地（複数記入可）</th> <td> <input name="site" type="text" class="form-control ahr-input_1"> </td></tr><tr> <th scope="row" align="right" width="20%">年收</th> <td> <input name="annual_income" type="text" class="form-control ahr-input_1" style="width:150px; float:left; margin-right:10px;"> <select class="form-control" style="width:100px; float:left; margin-right:20px;"> <option value="AZ">円</option> <option value="CO">元</option> <option value="ID">米ドル</option> </select> <div style="width:50px; float:left;">月收</div><input name="monthly_income" type="text" class="form-control ahr-input_1" style="width:150px; float:left; margin-right:10px;"> <select class="form-control" style="width:100px; float:left; margin-right:20px;"> <option value="AZ">円</option> <option value="CO">元</option> <option value="ID">米ドル</option> </select> </td></tr><tr> <th scope="row" align="right" width="20%">勤務時間</th> <td> <input type="text" name="work_time" class="form-control ahr-input_1" style="width:85%; float:left;"><button type="button" class="btn btn-default" style="border-radius:0px !important;">時間</button> </td></tr><tr> <th scope="row" align="right" width="20%">ボーナス</th> <td> <input type="text" name="bonus" class="form-control ahr-input_1"> </td></tr><tr> <th scope="row" align="right" width="20%">休日休暇</th> <td> <input type="text" name="holiday" class="form-control ahr-input_1" style="width:85%; float:left;"><button type="button" class="btn btn-default" style="border-radius:0px !important;">日</button> </td></tr><tr> <th scope="row" align="right" width="20%">福利厚生</th> <td> <input type="radio" name="welfare" id="inlineRadio1" value="1"> あり <input type="radio" name="welfare" id="inlineRadio2" value="0"> なし </td></tr><tr> <th scope="row" align="right" width="20%">諸手当</th> <td> <input type="radio" name="allowances" id="inlineRadio1" value="1"> あり <input type="radio" name="allowances" id="inlineRadio2" value="0"> なし </td></tr><tr> <th scope="row" align="right" width="20%">教育制度</th> <td> <input type="radio" name="education" id="inlineRadio1" value="1"> あり <input type="radio" name="education" id="inlineRadio2" value="0"> なし </td></tr></tbody> </table> </div></div></div>
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                       <button type="submit" class="btn btn-primary">Save changes</button>
                     </div>
                 </form>
               </div>
             </div>
           </div>
           <!-- modal end -->

         </div>
       </div>
   </div><!-- row end -->
</div><!-- wrapper end -->
<!-- ■　基本情報 -->
<div class="panel panel-default panel_1">

    <div class="panel-body" style="padding-top: 0px !important;">
    <!-- EDIT BUTTON -->
    <a href="javascript:;" class="float-right update_bt none" onclick="update_panel('.panel_1','.panel_1_update');">
      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </a>
                @foreach($personnels as $value)
                <h6 style="margin-bottom:0px !important;">■　基本情報</h6>
                <div class="panel-content">
                    <table class="user-view_table">
                        <tbody>
                            <tr>
                                <th width="80px">氏名</th>
                                <td>：{{ $value->family_name.$value->surname}}</td>
                            </tr>
                            <tr>
                                <th width="80px">英語名</th>
                                <td>：{{ $value->family_name_en.$value->surname_en }}</td>
                            </tr>
                            <tr>
                                <th width="80px">国籍</th>
                                <td>：{{ $value->country }}</td>
                            </tr>
                            <tr>
                                <th width="80px">性別</th>
                                @if($value->sex === 1)
                                <td>：男</td>
                                @endif
                                @if($value->sex === 0)
                                <td>：女</td>
                                @endif
                            </tr>
                            <tr>
                                <th width="80px">生年月日</th>
                                <td>：{{ $value->birthday }}</td>
                            </tr>
                            <tr>
                                <th width="80px">現住所</th>
                                <td>：{{ $value->post.$value->city.$value->address}}</td>
                            </tr>
                            <tr>
                                <th width="80px">E-mail</th>
                                <td>：{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th width="80px">Skype ID</th>
                                <td>：{{ $value->skype_id }}</td>
                            </tr>
                            <tr>
                                <th width="80px">Line ID</th>
                                <td>：{{ $value->line_id }}</td>
                            </tr>
                            <tr>
                                <th width="80px">電話番号</th>
                                <td>：{{ $value->phone }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    <!-- ■　基本情報update -->
     <div class="panel panel-update panel_1_update none">
         <div class="panel-body" style="padding-top: 0px !important;">
              <!-- Close BUTTON -->
              <a href="javascript:;" class="float-right close_bt" onclick="update_panel('.panel_1_update','.panel_1');">
                <i class="fa fa-times-circle" aria-hidden="true"></i>
              </a>

              <h6 style="margin-bottom:0px !important;">■　基本情報</h6>
                <div class="panel-content">
                <form action="{{url('/personnels/update')}}" method="POST" style="text-align:center;">
                {{ csrf_field() }}
                    <table class="user-view_table">
                        <tbody>
                            <tr>
                                <th width="80px">姓<span style="color:red;">*</span>：</th>
                                <td><input type="text" name="family_name" class="form-control ahr-input_1" value="{{ $value->family_name}}"></td>
                            </tr>
                            <tr>
                                <th width="80px">名<span style="color:red;">*</span>：</th>
                                <td><input type="text" name="surname" class="form-control ahr-input_1" value="{{ $value->surname}}"></td>
                            </tr>
                            <tr>
                                <th width="80px">英語姓：</th>
                                <td><input type="text" name="family_name_en" class="form-control ahr-input_1" value="{{ $value->family_name_en }}"></td>
                            </tr>
                             <tr>
                                <th width="80px">英語名：</th>
                                <td><input type="text" name="surname_en" class="form-control ahr-input_1" value="{{ $value->surname_en }}"></td>
                            </tr>
                            <tr>
                                <th width="80px">国籍<span style="color:red;">*</span>：</th>
                                <td><select name="country" class="js-example-templating js-states" style="width: 100%">
                                  <option value="jp">日本</option>
                                  <option value="tw">台湾</option>
                                  <option value="vn">ベトナム</option>
                                  <option value="kr">韓国</option>
                                  <option value="hk">香港</option>
                                  <option value="cn">中国</option>
                                  <option value="in">インド</option>
                                  <option value="id">インドネシア</option>
                                  <option value="my">マレーシア</option>
                                </select>
                                </td>
                            </tr>
                           <!--  <tr>
                                <th width="80px">性別：</th>
                                @if($value->sex === 1)
                                <td>男</td>
                                @endif
                                @if($value->sex === 0)
                                <td>女</td>
                                @endif
                            </tr> -->
                            <tr>
                                <th width="80px">生年月日<span style="color:red;">*</span></th>
                                <td><input type="text" name="birthday" class="form-control ahr-input_1" value="{{ $value->birthday }}"></td>
                            </tr>
                            <tr>
                                <th width="80px">現住所 <span style="color:red;">*</span>：</th>
                                <td><input type="text" name="name" class="form-control ahr-input_1" value="{{ $value->post.$value->city.$value->address}}"></td>
                            </tr>
                            
                            <tr>
                                <th width="80px">Skype ID <span style="color:red;">*</span>：</th>
                                <td><input type="text" name="skype_id" class="form-control ahr-input_1" value="{{ $value->skype_id }}"></td>
                            </tr>
                            <tr>
                                <th width="80px">Line ID ：</th>
                                <td><input type="text" name="line_id" class="form-control ahr-input_1" value="{{ $value->line_id }}"></td>
                            </tr>
                            <tr>
                                <th width="80px">電話番号 <span style="color:red;">*</span>：</th>
                                <td><input type="text" name="phone" class="form-control ahr-input_1" value="{{ $value->phone }}"></td>
                            </tr>
                        </tbody>

                    </table>
                    <button type="submit" class="btn btn-w-md btn-gap-v btn-primary  btn_btom">
                    變更
                    </button>
                </form>

                </div>
        </div>
    </div>
<!-- ■　学歴 -->
<div class="panel panel-default panel_2">
    <div class="panel-body" style="padding-top: 0px !important;">
        <div class="row">
            <!-- logo left -->
            <div class="col-md-12">
            <!-- EDIT BUTTON -->
            <a href="javascript:;" class="float-right update_bt none" onclick="update_panel('.panel_2','.panel_2_update');">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
                <h6>■　学歴</h6>
                <div class="panel-content">
              
                    <table class="user-view_table">
                        <tbody>
                            <tr>
                                <th width="100px">最終学歴</th>
                                <td>：{{ $value->school}}</td>
                            </tr>
                            <tr>
                                <th width="100px">学歴囯名</th>
                                <td>：{{ $value->school_country}}</td>
                            </tr>
                            <tr>
                                <th width="100px">専攻</th>
                                <td>：{{ $value->subject}}</td>
                            </tr>
                            <tr>
                                <th width="100px">卒業年度(予定)</th>
                                <td>：{{ $value->end_year}}</td>
                            </tr>
                        </tbody>
                    </table>
               
                </div>
            </div>
        </div>
        <!-- row end -->
     
    </div>
</div>
<div class="panel panel-update panel_2_update none">
    <div class="panel-body" style="padding-top: 0px !important;">
        <div class="row">
            <!-- logo left -->
            <div class="col-md-12">
            <!-- Close BUTTON -->
            <a href="javascript:;" class="float-right close_bt" onclick="update_panel('.panel_2_update','.panel_2');">
              <i class="fa fa-times-circle" aria-hidden="true"></i>
            </a>
                <h6>■　学歴</h6>
                <div class="panel-content">
                <form action="{{url('/personnels/update')}}" method="POST" style="text-align:center;">
                {{ csrf_field() }}
                    <table class="user-view_table">
                        <tbody>
                             <tr>
                                <th width="100px">最終学歴：</th>
                                <td><input type="text" name="school" class="form-control ahr-input_1" value="{{ $value->school}}"></td>
                            </tr>
                            <tr>
                                <th width="100px">学歴囯名：</th>
                                <td><input type="text" name="school_country" class="form-control ahr-input_1" value="{{ $value->school_country}}"></td>
                            </tr>
                            <tr>
                                <th width="100px">学科：</th>
                                <td>
                                <select name="subject" class="js-example-templating3 js-states" style="width: 100%">
                                    @foreach($subject as $value)
                                    <option value="{{$value->id}}">{{$value->subject}}</option>
                                    @endforeach
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <th width="100px">卒業年度(予定)：</th>
                                <td><input type="text" name="end_year" class="form-control ahr-input_1" value="{{ $value->end_year}}"></td>
                            </tr>
                           
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-w-md btn-gap-v btn-primary btn_btom">變更</button>
                 </form>
                </div>
            </div>
        </div>
        <!-- row end -->
        @endforeach
    </div>
</div>
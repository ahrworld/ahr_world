<!-- ■　語学スキル -->
<div class="panel panel-default panel_3">
    <div class="panel-body" style="padding-top: 0px !important;">
        <div class="row">
            <!-- logo left -->
            <div class="col-md-12">
            <!-- EDIT BUTTON -->
            <a href="javascript:;" class="float-right update_bt none" onclick="update_panel('.panel_3','.panel_3_update');">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
                <h6>■　語学スキル</h6>
                <div class="panel-content">
                    <table class="user-view_table">
                        <tbody>
                            @foreach($languagelv as $value)
                            @if($value->lv == 3)
                            <tr>
                                <th width="100px"><span style="color:#000;">・母語レベル</span>
                                <td>：
                                {{ $value->languagelv_name }}
                                </td>
                            </tr>
                            @endif
                            @if($value->lv == 2)
                            <tr>
                                <th width="100px"><span style="color:#000;">・ビジネスレベル</span>
                                <td>：
                                {{ $value->languagelv_name }}
                                </td>
                            </tr>
                            @endif
                            @if($value->lv == 1)
                            <tr>
                                <th width="100px"><span style="color:#000;">・日常会話レベル</span>
                                <td>：
                                {{ $value->languagelv_name }}
                                </td>
                            </tr>
                            @endif
                            @if($value->lv == 0)
                            <tr>
                                <th width="100px"><span style="color:#000;">・初級レベル</span>
                                <td>：
                                {{ $value->languagelv_name }}
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- row end -->
    </div>
</div>
<div class="panel panel-update panel_3_update none">
    <div class="panel-body" style="padding-top: 0px !important;">
        <div class="row">
            <!-- logo left -->
            <div class="col-md-12">
                   <div class="form-group language_append">
                    <div class="form-inline">
                        <div class="form-group">
                            <h5>語言</h5>
                            <input type="text" class="form-control" name="language[]" placeholder="language">
                        </div>
                        <div class="form-group">
                            <h5>程度</h5>
                            <select class="form-control" name="languagelv[]">
                                <option value="3">母語</option>
                                <option value="2">ビジネス</option>
                                <option value="1">日常会話</option>
                                <option value="0">初級</option>
                            </select>
                        </div>
                         <div class="form-group" style="margin-top: 30px;">
                            <label class="add"></label>
                        </div>
                    </div>
                  </div>
            <!-- Close BUTTON -->
            <a href="javascript:;" class="float-right close_bt" onclick="update_panel('.panel_3_update','.panel_3');">
              <i class="fa fa-times-circle" aria-hidden="true"></i>
            </a>
                <h6>■　語学スキル</h6>
                <div class="panel-content">
                    <table class="user-view_table">
                        <tbody>
                            @foreach($languagelv as $value)
                            @if($value->lv == 3)
                            <tr>
                                <th width="100px"><span style="color:#000;">・母語レベル</span>
                                <td>：
                                {{ $value->languagelv_name }}
                                </td>
                            </tr>
                            @endif
                            @if($value->lv == 2)
                            <tr>
                                <th width="100px"><span style="color:#000;">・ビジネスレベル</span>
                                <td>：
                                {{ $value->languagelv_name }}
                                </td>
                            </tr>
                            @endif
                            @if($value->lv == 1)
                            <tr>
                                <th width="100px"><span style="color:#000;">・日常会話レベル</span>
                                <td>：
                                {{ $value->languagelv_name }}
                                </td>
                            </tr>
                            @endif
                            @if($value->lv == 0)
                            <tr>
                                <th width="100px"><span style="color:#000;">・初級レベル</span>
                                <td>：
                                {{ $value->languagelv_name }}
                                </td>
                            </tr>
                            @endif
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- row end -->
    </div>
</div>
<!-- ■　スキル -->
<div class="panel panel-default panel_4">
    <div class="panel-body" style="padding-top: 0px !important;">
        <div class="row">
            <!-- logo left -->
            <div class="col-md-12">
            <!-- EDIT BUTTON -->
            <a href="javascript:;" class="float-right update_bt none" onclick="update_panel('.panel_4','.panel_4_update');">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
            </a>
                <h6>■　スキル</h6>
                <div class="panel-content">
                    <table class="user-view_table">
                        <tbody>

                           <!--  <tr>
                                <th width="400px" style="color:#000;">{{ $value->skill_category }}</th>
                                <td></td>
                            </tr> -->
                        @foreach($per_skill as $value)
                            <tr>
                                <th width="160px">・{{ $value->skill_name }}</th>
                                @if($value->year == 1)
                                <td>：1年未滿</td>
                                @endif
                                @if($value->year == 2)
                                <td>：1年～3年</td>
                                @endif
                                @if($value->year == 3)
                                <td>：3年～5年</td>
                                @endif
                                @if($value->year == 4)
                                <td>：5年以上</td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- row end -->
    </div>
</div>
 <div class="panel panel-update panel_4_update none">
    <div class="panel-body" style="padding-top: 0px !important;">
        <div class="row">
            <!-- logo left -->
            <div class="col-md-12">
            <!-- Close BUTTON -->
            <a href="javascript:;" class="float-right close_bt" onclick="update_panel('.panel_4_update','.panel_4');">
              <i class="fa fa-times-circle" aria-hidden="true"></i>
            </a>
                <h6>■　スキル</h6>
                          @foreach($skill_titles as $key_title => $value_title)
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading{{ $key_title }}" style="color:#FFF; background:#9ED8F6;">
                               <h4 class="panel-title">
                                       <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $key_title }}" aria-expanded="true" aria-controls="collapse{{ $key_title }}">
                                         &nbsp;{{ $value_title->skill_title }}
                                       </a>
                                       <i class="fa fa-caret-up float-right"></i>
                                     </h4>
                            </div>

                            <div id="collapse{{ $key_title }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $key_title }}">
                              <div class="panel-body">
                                  @foreach($skill_categorys as $skill_category)
                                @if ($value_title->id == $skill_category->skill_title_id)
                                <h5>{{ $skill_category->skill_category }}</h5>

                                <table class="table table-bordered">
                                <thead>
                                <tr>
                                <th></th>
                                <th>学習中</th>
                                <th>1年未満</th>
                                <th>1年～3年</th>
                                <th>3年～5年</th>
                                <th>5年以上</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($skill_datas as $key => $value)
                                @if ($skill_category->id == $value->skill_category_id)
                                <tr>
                                <th width="30%" scope="row"><input type="hidden" name="per_skill[]" value="{{ $value->id }}">{{ $value->skill_name }}</th>

                                <td align="center" class="in_value"><input type="radio" class="in" name="value_{{ $key+1 }}" value="no"></td>
                                <td align="center"><input type="radio" class="in" name="value_{{ $key+1 }}" value="1"></td>
                                <td align="center"><input type="radio" class="in" name="value_{{ $key+1 }}" value="2"></td>
                                <td align="center"><input type="radio" class="in" name="value_{{ $key+1 }}" value="3"></td>
                                <td align="center"><input type="radio" class="in" name="value_{{ $key+1 }}" value="4"></td>
                                <input type="hidden" name="skill_value[]" class="in_value" value="no">
                                </tr>
                                @endif
                                @endforeach
                                </tbody>
                                </table>
                                @endif
                                @endforeach

                              </div>
                            </div>
                          </div>
                          @endforeach
            </div>
        </div>
        <!-- row end -->
    </div>
</div>
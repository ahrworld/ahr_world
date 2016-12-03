<div role="tabpanel" class="tab-pane ahr-panel active" id="b1">
     <ul class="nav nav-tabs" role="tablist" style="border:none;">
         <li role="presentation" class="lis active">
         <a href="#b1s1" aria-controls="b1s1" role="tab" data-toggle="tab" class="btn btn-default ahr-button_bs" style="color: #6A6666 !important;">新着応募者</a>
         </li>
         <li role="presentation" class="lis"><a href="#b1s2" aria-controls="b1s2" role="tab" data-toggle="tab" class="btn btn-default ahr-button_bs" style="color: #6A6666 !important;">お気に入り登録者</a></li>
         <li role="presentation" class="lis"><a href="#b1s3" aria-controls="b1s3" role="tab" data-toggle="tab" class="btn btn-default ahr-button_bs" style="color: #6A6666 !important;">保 留</a></li>
         <li role="presentation" class="lis"><a href="#b1s4" aria-controls="b1s4" role="tab" data-toggle="tab" class="btn btn-default ahr-button_bs" style="color: #6A6666 !important;">足 跡</a></li>
     </ul>
     <div class="tab-content" >
     <div style="float:right;">
         <a href="{{ url('bs_e') }}">不合格</a>
     </div>
     <!-- tabepanel -->
     <div role="tabpanel" class="tab-pane ahr-panel active s" id="b1s1">
     <div class="wrapper animated fadeIn">
            <!-- 新応募者 -->
            <div class="s1 search">
            @foreach($Recruitment as $key => $value)
            <div class="panel panel-default">
                <div class="panel-body" style="padding:0px !important;">
                    <!-- photo left -->
                    <?php $check = 0; $ok;?>
                    @foreach($Recruitment_img as $va)
                    @if($va->u_id == $value->user_id)
                    <?php
                          $check = 1;
                          $ok = $va->image_small;
                       ?>
                      @break
                    @endif
                    @endforeach
                    @if($check == 1)
                    <div class="img-left">
                        <a class="show_pl_vi" href="{{ route('personnels.show', $value->rs_id) }}">
                                <img height="208" src="data:image/png;base64,{{$ok}}" alt="">
                            </a>
                    </div>
                    @else
                    <div class="img-left">
                        <a class="show_pl_vi" href="{{ route('personnels.show', $value->rs_id) }}">
                        <img height="208" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                    </a>
                    </div>
                    @endif
                    <!-- content -->
                    <div class="panel-content" style="margin:15px 0px 0px 15px;">
                       <a class="show_pl_vi" href="{{ route('personnels.show', $value->rs_id) }}">
                            <label class="ahr-label_bs" style="cursor: pointer; font-size: 16px;">
                            氏名:{{ $value->family_name.$value->surname }}
                            @if($value->sex == 1)
                            <span>♂</span>
                            @else
                            <span style="font-weight:bold; color:rgba(233, 75, 59, 0.64) !important;">♀</span>
                            @endif
                            </label>
                            </a>
                        <p><label class="label-gray" style="width:80px;">技能</label><span></span></p>
                        <p><label class="label-gray" style="width:80px;">応募職位</label><span>{{ $value->job_name }}</span></p>
                        <p><label class="label-gray" style="width:80px;">最終学歴</label><span>{{ $value->school }}</span><span>({{$value->school_country}})</span></p>
                        <p><label class="label-gray" style="width:80px;">言語レベル</label><span>{{ $value->language_lv }}</span></p>
                        <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                    </div>
                    <!-- ? right -->
                    <div class="img-right" style="margin:15px;">
                      <a href="#" class="assess-default" data-toggle="modal" data-target="#assess_modal" attr="{{$value->rs_id}}" >
                        ？
                      </a>
                    </div>
                </div>
            </div>

            @endforeach
            </div>

            </div>
     </div>
     <div role="tabpanel" class="tab-pane ahr-panel s" id="b1s2">
     <div class="wrapper animated fadeIn">
        <!-- お気に入り登錄者 -->
        <div class="s2 search">
        @foreach($Recruitment_like as $key => $value)
        <div class="panel panel-default">
            <div class="panel-body" style="padding:0px !important;">
                <!-- photo left -->
                <?php $check = 0; $ok;?>
                @foreach($Recruitment_img as $va)
                @if($va->u_id == $value->user_id)
                <?php
                      $check = 1;
                      $ok = $va->image_small;
                   ?>
                  @break
                @endif
                @endforeach
                @if($check == 1)
                <div class="img-left">
                    <a class="show_pl_vi" href="{{ route('personnels.show', $value->rs_id) }}">
                                <img height="208" src="data:image/png;base64,{{$ok}}" alt="">
                            </a>
                </div>
                @else
                <div class="img-left">
                    <a class="show_pl_vi" href="{{ route('personnels.show', $value->rs_id) }}">
                        <img height="208" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                    </a>
                </div>
                @endif
                <!-- content -->
                <div class="panel-content" style="margin:15px 0px 0px 15px;">
                    <a class="show_pl_vi" href="{{ route('personnels.show', $value->rs_id) }}">
                            <label class="ahr-label_bs" style="cursor: pointer; font-size: 16px;">
                            氏名:{{ $value->family_name.$value->surname }}
                            @if($value->sex == 1)
                            <span>♂</span>
                            @else
                            <span style="font-weight:bold; color:rgba(233, 75, 59, 0.64) !important;">♀</span>
                            @endif
                            </label>
                            </a>
                    <p><label class="label-gray" style="width:80px;">技能</label><span></span></p>
                    <p><label class="label-gray" style="width:80px;">応募職位</label><span>{{ $value->job_name }}</span></p>
                    <p><label class="label-gray" style="width:80px;">最終学歴</label><span>{{ $value->school }}</span></p>
                    <p><label class="label-gray" style="width:80px;">言語レベル</label><span>{{ $value->language_lv }}</span></p>
                    <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                </div>
                <!-- ? right -->
                <div class="img-right" style="margin:15px;">
                  <a href="#" class="assess-default">
                    ？
                  </a>
                </div>
            </div>
        </div>
        @endforeach
        </div>

        </div>
     </div>
     <div role="tabpanel" class="tab-pane ahr-panel s" id="b1s3">
     <div class="wrapper">

         <!-- 保留 -->
        <div class="s3 search">
        @foreach($Recruitment_c as $key => $value)
        <div class="panel panel-default">
            <div class="panel-body" style="padding:0px !important;">
                <!-- photo left -->
                 <?php $check = 0; $ok;?>
                @foreach($Recruitment_img as $va)
                @if($va->u_id == $value->user_id)
                <?php
                      $check = 1;
                      $ok = $va->image_small;
                   ?>
                  @break
                @endif
                @endforeach
                @if($check == 1)
                <div class="img-left">
                    <a class="show_pl_vi" href="{{ route('personnels.show', $value->rs_id) }}">
                                <img height="208" src="data:image/png;base64,{{$ok}}" alt="">
                            </a>
                </div>
                @else
                <div class="img-left">
                    <a class="show_pl_vi" href="{{ route('personnels.show', $value->rs_id) }}">
                        <img height="208" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                    </a>
                </div>
                @endif
                <!-- content -->
                <div class="panel-content" style="margin:15px 0px 0px 15px;">
                    <a class="show_pl_vi" href="{{ route('personnels.show', $value->rs_id) }}">
                            <label class="ahr-label_bs" style="cursor: pointer; font-size: 16px;">
                            氏名:{{ $value->family_name.$value->surname }}
                            @if($value->sex == 1)
                            <span>♂</span>
                            @else
                            <span style="font-weight:bold; color:rgba(233, 75, 59, 0.64) !important;">♀</span>
                            @endif
                            </label>
                            </a>
                    <p><label class="label-gray" style="width:80px;">応募職位</label><span>{{ $value->job_name }}</span></p>
                    <p><label class="label-gray" style="width:80px;">最終学歴</label><span>{{ $value->school }}</span></p>
                    <p><label class="label-gray" style="width:80px;">SKILL</label><span></span></p>
                    <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                    <p><label class="label-gray" style="width:80px;">言語レベル</label><span>日本語(Native),中国語(Business),英語(Communication)....</span></p>
                </div>

                <!-- ? right -->
                <div class="img-right" style="margin:15px;">
                  <a href="#" class="assess-default">
                    C
                  </a>
                </div>
            </div>
        </div>
        @endforeach
        @foreach($Recruitment_d as $key => $value)
        <div class="panel panel-default">
            <div class="panel-body" style="padding:0px !important;">
                <!-- photo left -->
                 <?php $check = 0; $ok;?>
                @foreach($Recruitment_img as $va)
                @if($va->u_id == $value->user_id)
                <?php
                      $check = 1;
                      $ok = $va->image_small;
                   ?>
                  @break
                @endif
                @endforeach
                @if($check == 1)
                <div class="img-left">
                    <a class="show_pl_vi" href="{{ route('personnels.show', $value->rs_id) }}">
                                <img height="208" src="data:image/png;base64,{{$ok}}" alt="">
                            </a>
                </div>
                @else
                <div class="img-left">
                    <a class="show_pl_vi" href="{{ route('personnels.show', $value->rs_id) }}">
                        <img height="208" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                    </a>
                </div>
                @endif
                <!-- content -->
                <div class="panel-content" style="margin:15px 0px 0px 15px;">
                    <a class="show_pl_vi" href="{{ route('personnels.show', $value->rs_id) }}">
                            <label class="ahr-label_bs" style="cursor: pointer; font-size: 16px;">
                            氏名:{{ $value->family_name.$value->surname }}
                            @if($value->sex == 1)
                            <span>♂</span>
                            @else
                            <span style="font-weight:bold; color:rgba(233, 75, 59, 0.64) !important;">♀</span>
                            @endif
                            </label>
                            </a>
                    <p><label class="label-gray" style="width:80px;">応募職位</label><span>{{ $value->job_name }}</span></p>
                    <p><label class="label-gray" style="width:80px;">最終学歴</label><span>{{ $value->school }}</span></p>
                    <p><label class="label-gray" style="width:80px;">言語レベル</label><span>{{ $value->language_lv }}</span></p>
                    <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                </div>

                <!-- ? right -->
                <div class="img-right" style="margin:15px;">
                  <a href="#" class="assess-default">
                    D
                  </a>
                </div>
            </div>
        </div>
        @endforeach
        </div>
        </div>
     </div>
     <div role="tabpanel" class="tab-pane ahr-panel s" id="b1s4">
     <div class="wrapper animated fadeIn">
            <!-- 足跡 -->
            <div class="s1 search">
            @foreach($history as $key => $value)
            <div class="panel panel-default">
                <div class="panel-body" style="padding:0px !important;">
                    <!-- photo left -->
                    <?php $check = 0; $ok;?>
                    @foreach($Recruitment_img as $va)
                    @if($va->u_id == $value->user_id)
                    <?php
                          $check = 1;
                          $ok = $va->image_small;
                       ?>
                      @break
                    @endif
                    @endforeach
                    @if($check == 1)
                    <div class="img-left">
                        <a class="show_pl_vi" href="{{ route('personnels.show', $value->rs_id) }}">
                                <img height="208" src="data:image/png;base64,{{$ok}}" alt="">
                            </a>
                    </div>
                    @else
                    <div class="img-left">
                        <a class="show_pl_vi" href="{{ route('personnels.show', $value->rs_id) }}">
                        <img height="208" src="{{ asset('ahr/assets/user_img/default_user.png')}}" alt="">
                    </a>
                    </div>
                    @endif
                    <!-- content -->
                    <div class="panel-content" style="margin:15px 0px 0px 15px;">
                       <a class="show_pl_vi" href="{{ route('personnels.show', $value->rs_id) }}">
                            <label class="ahr-label_bs" style="cursor: pointer; font-size: 16px;">
                            氏名:{{ $value->family_name.$value->surname }}
                            @if($value->sex == 1)
                            <span>♂</span>
                            @else
                            <span style="font-weight:bold; color:rgba(233, 75, 59, 0.64) !important;">♀</span>
                            @endif
                            </label>
                            </a>
                        <p><label class="label-gray" style="width:80px;">技能</label><span></span></p>
                        <p><label class="label-gray" style="width:80px;">最終学歴</label><span>{{ $value->school }}</span><span>({{$value->school_country}})</span></p>
                        <p><label class="label-gray" style="width:80px;">言語レベル</label><span>{{ $value->language_lv }}</span></p>
                        <p><label class="label-gray" style="width:80px;">國籍</label><span>{{ $value->country }}</span></p>
                    </div>
                    <!-- ? right -->
                    <div class="img-right" style="margin:15px;">
                      <!-- <a href="#" class="assess-default" data-toggle="modal" data-target="#assess_modal" attr="{{$value->rs_id}}" >
                        ？
                      </a> -->
                      <span>最後觀看:{{$value->updated_at->format('Y年m月d日- H時:i分')}}</span>
                    </div>
                </div>
            </div>

            @endforeach
            </div>

            </div>
     </div>

     </div>
     <!-- tab-content -->
</div>
<!-- 応募者管理 tab-panel end -->
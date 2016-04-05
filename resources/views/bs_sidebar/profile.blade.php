
@extends('bs_sidebar/sidebar')

@section('content')

<div class="col-sm-7 scorl">
                 <!-- Nav tabs -->
                 <ul class="nav nav-tabs" role="tablist">
                   <li role="presentation" class="active"><a href="#a1" aria-controls="a1" role="tab" data-toggle="tab">企業情報編集</a></li>
                   <li role="presentation"><a href="#a2" aria-controls="a2" role="tab" data-toggle="tab">採用情報編集</a></li>
                   <li role="presentation"><a href="#a3" aria-controls="a3" role="tab" data-toggle="tab">企業カラー</a></li>
                   <li role="presentation"><a href="#a4" aria-controls="a4" role="tab" data-toggle="tab">面接日程編集</a></li>
                 </ul>
                 <!-- 企業情報編集 Tab panes -->
                 <div class="tab-content">
                   <div role="tabpanel" class="tab-pane ahr-panel active" id="a1">
                    <div class="wrapper">
                        <!-- 1 -->
                         <div class="panel panel-default">
                           <div class="panel-body">
                                   <div class="row">
                                   <!-- logo left -->
                                        <!-- video -->
                                        <div class="col-md-12">
                                             <span class="img-thumbnail" style="width:100%; height:150px;"></span>
                                             <span class="img-thumbnail" style="width:100%; height:100px; position: absolute; width:100px; top: 60px; left: 35px;"></span>
                                        </div>
                                   </div>
                           </div>
                         </div>
                         <!-- 2 -->
                         <div class="panel panel-default">
                           <div class="panel-body" style="padding-top: 0px !important;">
                                   <div class="row">
                                   <!-- logo left -->
                                        <div class="col-md-12">
                                        <h6>■どんな仕事をする会社？</h6>
                                     <div class="panel-content">
                                             <label style="font-size:13px;">国名:<span>○○○○○</span></label>
                                             <label style="font-size:13px;">会社名:<span>○○○○○</span></label>
                                             <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                             <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                             <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                             <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                          </div>
                                        </div>
                                     </div>
                           </div>
                         </div>
                         <!-- 3 -->
                         <div class="panel panel-default">
                           <div class="panel-body" style="padding-top: 0px !important;">
                                   <div class="row">
                                   <!-- logo left -->
                                        <div class="col-md-12">
                                        <h6>■会社のコンセプト・仕事の流れは？</h6>
                                     <div class="panel-content">
                                       <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                            <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                             <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                            <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                            <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                            <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                          </div>
                                        </div>
                                   </div>
                           </div>
                         </div>
                         <!-- 4 -->
                         <h6>■会社概要<span class="red-color">※マークは必須項目です。</span></h6>
                         <table class="table table-bordered ahr-table">
                              <tbody>
                                   <tr>
                                   <th scope="row" width="20%">本社所在地<span class="red-color">※</span></th>
                                   <td></td>
                                   </tr>
                                   <tr>
                                   <th scope="row" width="20%">企業URL<span class="red-color">※</span></th>
                                   <td></td>
                                   </tr>
                                   <tr>
                                   <th scope="row" width="20%">社員国籍<span class="red-color">※</span></th>
                                   <td></td>
                                   </tr>
                                   <tr>
                                   <th scope="row" width="20%">創業・設立</th>
                                   <td></td>
                                   </tr>
                                   <tr>
                                   <th scope="row" width="20%">総従業員数</th>
                                   <td></td>
                                   </tr>
                                   <tr>
                                   <th scope="row" width="20%">資本金</th>
                                   <td></td>
                                   </tr>
                                   <tr>
                                   <th scope="row" width="20%">売上高</th>
                                   <td></td>
                                   </tr>
                              </tbody>
                         </table>
                         <!-- 5 -->
                         <h6>■雇用条件<span class="red-color">※マークは必須項目です。（正社員）</span></h6>
                         <table class="table table-bordered ahr-table">
                              <tbody>
                                   <tr>
                                   <th scope="row" width="20%">勤務地<span class="red-color">※</span></th>
                                   <td></td>
                                   </tr>
                                   <tr>
                                   <th scope="row" width="20%">勤務時間<span class="red-color">※</span></th>
                                   <td></td>
                                   </tr>
                                   <tr>
                                   <th scope="row" width="20%">給与<span class="red-color">※</span></th>
                                   <td></td>
                                   </tr>
                                   <tr>
                                   <th scope="row" width="20%">福利厚生<span class="red-color">※</span></th>
                                   <td></td>
                                   </tr>
                                   <tr>
                                   <th scope="row" width="20%">休日休暇<span class="red-color">※</span></th>
                                   <td></td>
                                   </tr>
                                   <tr>
                                   <th scope="row" width="20%">諸手当<span class="red-color">※</span></th>
                                   <td></td>
                                   </tr>
                                   <tr>
                                   <th scope="row" width="20%">教育制度</th>
                                   <td></td>
                                   </tr>
                              </tbody>
                         </table>
                    </div><!-- wrapper end -->
                   </div><!-- 企業情報編集 tab-panel end -->
                    <!-- 採用情報編集 Tab panes -->
                   <div role="tabpanel" class="tab-pane ahr-panel" id="a2">
                    <div class="wrapper">
                        <div class="row">
                                  <div class="col-md-12">
                             <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                               <div class="panel panel-default">
                                 <div class="panel-heading" role="tab" id="headingOne">
                                   <h4 class="panel-title">
                                     <span>1</span>
                                     <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                       Webクリエイター
                                     </a>
                                     <i class="fa fa-caret-up float-right"></i>
                                   </h4>
                                 </div>
                                 <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                   <div class="panel-body">
                                   <table class="table table-bordered ahr-table">
                                        <tbody>
                                             <tr>
                                             <th scope="row" width="30%">募集職種</th>
                                             <td></td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="30%">職務内容</th>
                                             <td></td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="30%">雇用形態<br><span style="font-size:12px;">（複数選択可）</span></th>
                                             <td></td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="30%">募集経歴<br><span style="font-size:12px;">（複数選択可）</span></th>
                                             <td></td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="30%">募集学科</th>
                                             <td></td>
                                             </tr>
                                             <tr>
                                             <th scope="row" width="30%">必須技能・資格</th>
                                             <td></td>
                                             </tr>
                                        </tbody>
                                   </table>
                                   </div>
                                 </div>
                               </div>
                               <div class="panel panel-default">
                                 <div class="panel-heading" role="tab" id="headingTwo">
                                   <h4 class="panel-title">
                                     <span>2</span>
                                     <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                       プログラマー
                                     </a>
                                     <i class="fa fa-caret-down float-right"></i>
                                   </h4>
                                 </div>
                                 <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                   <div class="panel-body">
                                     Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                   </div>
                                 </div>
                               </div>
                               <div class="panel panel-default">
                                 <div class="panel-heading" role="tab" id="headingThree">
                                   <h4 class="panel-title">
                                     <span>3</span>
                                     <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
                                       ディレクター
                                     </a>
                                     <i class="fa fa-caret-down float-right"></i>
                                   </h4>
                                 </div>
                                 <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                   <div class="panel-body">
                                     Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                   </div>
                                 </div>
                               </div>
                             </div>
                           </div>
                       </div><!-- row end -->
                    </div><!-- wrapper end -->
                   </div><!-- 採用情報編集 tab-panel end -->

                    <!-- 企業カラー Tab panes -->
                   <div role="tabpanel" class="tab-pane ahr-panel" id="a3">

                    <div class="wrapper">
                        <!-- 1 -->
                         <div class="panel panel-default">
                           <div class="panel-body">
                                   <div class="row">
                                        <!-- video -->
                                        <div class="col-md-12">
                                             <span class="img-thumbnail" style="width:100%; height:150px;"></span>
                                        </div>
                                   </div>
                           </div>
                         </div>
                         <!-- 2 -->
                         <div class="panel panel-default">
                           <div class="panel-body" style="padding-top: 0px !important;">
                                   <div class="row">
                                        <div class="col-md-12">
                                        <table style="margin-bottom:20px;">
                                             <tbody>
                                                  <tr>
                                                       <th style="text-align:right !important; font-size:14px; padding-top:15px;">Title:</th>
                                                       <td ></td>
                                                  </tr>
                                                  <tr>
                                                       <th style="text-align:right !important; font-size:14px; padding-top:15px;">Sub Title:</th>
                                                       <td></td>
                                                  </tr>
                                             </tbody>
                                        </table>
                                     <div class="panel-content">
                                             <label style="font-size:14px;">內容:</label>
                                             <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                            <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                            <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                            <p>○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○○</p>
                                          </div>
                                        </div>
                                   </div>
                           </div>
                         </div>
                    </div><!-- wrapper end -->
                   </div><!-- 企業カラー tab-panel end -->
                   <!-- 面接日程 Tab panes -->
                   <div role="tabpanel" class="tab-pane ahr-panel" id="a4">

                    <div class="wrapper">
                        <div class="btn-group">
                          <button type="button" class="btn btn-default ahr-button_6 active">面接調整完了者</button>
                          <button type="button" class="btn btn-default ahr-button_6">選考進行中</button>
                          <button type="button" class="btn btn-default ahr-button_6">内定確定者</button>
                        </div>
                    </div><!-- wrapper end -->
                   </div><!-- 面接日程 tab-panel end -->
                 </div><!-- tab-content end -->
</div><!-- colmd9 end -->
@endsection


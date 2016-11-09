<div class="wrapper" style="margin-top:0px !important;">
    <!-- add 作品 -->
    <div class="panel panel-info">
            <div class="panel-heading"><strong><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;ポートフォリオ</strong></div>
            <div class="panel-body">
            <form method="POST" action="{{url('/portfolio/add')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                 <input type="hidden" name="_token" value="{{ csrf_token()}}">

                 <div class="form-group" style="height: 40px;">
                     <label for="p_title" class="col-sm-3 control-label">タイトル</label>
                     <div class="col-sm-9">
                      <input type="text" class="form-control" name="p_title" id="p_title" placeholder="例：ランサーズ株式会社のロゴ制作">
                     </div>
                 </div>

                 <div class="form-group" style="height: 75px;">
                   <label for="p_content" class="col-sm-3 control-label">說明文</label>
                   <div class="col-sm-9">
                     <textarea class="form-control" required="required" name="p_content" placeholder="例：サイトリニューアルのデザインを担当させて頂きました。画像は納品したときのトップページのデザイン案です。" name="blog_content" rows="3"></textarea>
                   </div>
                 </div>
                 <div class="form-group">
                    <label for="p_File" class="col-sm-3">ポートフォリオ画像</label>
                    <div  class="col-sm-9">
                    <input accept="image/*" type="file" id="p_File">
                    <input type="hidden" name="p_file" class="p_file">
                    <p class="help-block">Example block-level help text here.</p>
                    </div>
                 </div>
                 <div class="form-group" class="col-sm-12" style="text-align: center;">
                 <button type="submit" style="padding: 5px 45px; margin-top: 15px;" class="btn btn-success btn-lg"><i class="fa fa-check" aria-hidden="true"></i>新增</button>
                 </div>
            </form>
            </div>
    </div>
    <!-- show portfolio -->
    <div class="row">
    @foreach($portfolio as $value)
    <div class="col-sm-6">
        <div class="thumbnail portfolio_view" title="{{$value->p_title}}" content="{{$value->p_content}}" data-toggle="modal" data-target="#portfolio_modal">
            <img alt="{{$value->p_title}}" src="{{$value->p_file}}">
            <div class="caption">
                <h3>{{$value->p_title}}</h3>
                <p>{{$value->p_content}}</p>
            </div>
        </div>    
    </div>
    @endforeach
    </div>
    <!-- end add -->
</div>

<!-- portfolio_modal -->
<div class="modal fade" id="portfolio_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">ポートフォリオ</h4>
      </div>
      <div class="modal-body">
        <img src="" alt="" class="portfolio_img" width="100%"> 
        <h3 class="portfolio_title"></h3>
        <h5 class="portfolio_content"></h5>
      </div>
    </div>
  </div>
</div>
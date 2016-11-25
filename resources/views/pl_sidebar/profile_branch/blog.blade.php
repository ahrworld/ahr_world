 <!-- wall_blog -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <form action="{{url('/personnel/blog')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                            </div>
                            <div class="form-group">
                                 <div class="col-sm-3 img-thumbnail dsa_s photo"></div>
                                 <textarea class="col-sm-10 text_rd" required="required" placeholder="上がります！" name="blog_content" rows="3" style="border-left:none; margin-bottom:20px; height:100px;"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="fileUpload btn btn-warning">
                                    <span><i class="fa fa-picture-o"></i></span>
                                    <input id="uploadBtn_blog" name="image" type="file" accept="image/*" class="upload upl" />
                                    <input type="hidden" name="p_file" class="p_file">
                                </div>
                                <button type="submit" class="btn btn-primary float-right">投槁</button>
                                <span class="float-right">&nbsp;</span>
                                <button type="button"  class="btn btn-info float-right preview_btn dass" >預覽</button>
                                <hr>
                                <div class="preview_wrapper">
                                    <pre></pre>
                                    <img src="" class="img_view" style="max-width: 200px;">
                                </div>
                               
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="wrapper">
                  @foreach($pl_blog as $value)
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="row">
                              <!-- video -->
                              <div class="col-md-12">
                              <div class="col-sm-3 img-thumbnail dsa_s photo" style="width:60px; height:60px;"></div>
                              <a href="javascritp:;" class="blog_name">{{ $value->surname.$value->family_name }}</a>
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
<style>
  .sidebar-ct{
    list-style: none;
    background: #6CC9F3;
    color:#FFF;
    padding: 10px;
    font-weight: bold;
    font-size: 14px;

  }
  .list-group-link{
    list-style: none;
    padding: 10px;
    font-size: 12px;
    border-bottom: 1px solid #E6E5E5;
  }
  .list-group-link a{
    display: block;
  }
  .sidebar li.list-group-item{
    padding: 10px !important;
  }
  #nav>li{
    background: #FFF;
    font-size: 12px;
    list-style: none;
  }
  #nav li .icon{
    padding:0px !important;
    height: 41px !important;
  }
  #nav li img{
    margin-right: 20px !important;
  }
  .sidebar_block{
    height:40px;
    width:40px;
  }
  #nav li .smile{
    padding: 2px 0px 0px 60px!important;
    height: 30px;
    border-bottom: 0px !important;
    line-height: 25px;
  }
  .open>.dropdown-menu {
    display: block !important;
  }
  .custom_sidebar{
    width:100%;
    background: #FFF !important;
  }
</style>
<div class="sidebar" style="width:200px; float:left; margin-left:30px; ">
      <div id="nav-wrapper">
          <ul id="nav">
              <li><a href="{{ url('profile_b2') }}" class="icon"><img src="{{ asset('ahr/assets/img/b_sidebar1.jpg')}}" height="40">企業情報</a></li>
              <li><a href="{{ url('mail_box_bs')}}" class="icon"><img src="{{ asset('ahr/assets/img/b_sidebar2.jpg')}}" height="40">チャット通知</a></li>
              <li><a href="#" class="icon"><img src="{{ asset('ahr/assets/img/b_sidebar3.jpg')}}" height="40">おすすめ人材</a></li>
              <li class="dropdown">
                  <a href="javascript:;" class="icon dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                  <img src="{{ asset('ahr/assets/img/b_sidebar4.jpg')}}" height="40">応募者管理
                  </a>
                  <ul class="dropdown-menu custom_sidebar" aria-labelledby="dropdownMenu1">
                       <li><a href="{{ url('news_b2') }}" class="smile">応募者管理</a></li>
                       <li><a href="#" class="smile">選考管理</a></li>
                       <li><a href="#" class="smile">面接管理</a></li>
                  </ul>
              </li>
            
          </ul>
      </div>
</div>
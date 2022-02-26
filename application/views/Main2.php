
    <link rel="stylesheet" href="/assets2/css/marketing-1.css">

    <!-- ========== Start Slider ========== -->
    <section class="slider d-flex align-items-center">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6">
                    <div class="text">
                        <h1 class="wow fadeInUp noto-bold">3분 설정으로 끝내는 <br>
                         <span class="color-1">룰렛 업보 & 포인트 보상</span> 관리 <br>
                        </h1>
                        <p class="wow fadeInUp noto">이제 더 이상 디코, 트게더에서 힘들게 룰렛 업보 관리할 필요 없습니다.<br>다양한 환경에서 편하게 시청자와 소통해보세요!</p>
                        <?php if($pg["login"]) { ?>
                            <a href="/<?=$personal->tw_name?>" style="font-size: 20px" id="mainbtn-home" class="noto-medium btn-green wow fadeInUp"><i class="fas fa-home"></i> &nbsp;&nbsp;마이 홈으로 이동</a>
                        <?php } else { ?>
                            <a href="/main/auth/login?redto=/" style="font-size: 20px" id="mainbtn-login" class="noto-medium btn-purple wow fadeInUp"><i class="fab fa-twitch"></i> &nbsp;&nbsp;트위치 아이디로 로그인</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="image">
                        <img src="/assets2/img/stock.png" alt="" class="img-fluid wow fadeInUp">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== End Slider ========== -->

    <style>
        .home-method1-bg {
            display: inline-block;
            width: 80px;
            height: 80px;
            background-color: rgb(254,238,239);
            border-radius: 20px;
            position: relative;
        }
        .home-method1-ico {
            position: absolute;
            font-size: 40px;
            color: rgb(236,93,111);
            top: 20px;
            left: 20px;
        }

        .home-method2-bg {
            display: inline-block;
            width: 80px;
            height: 80px;
            background-color: rgb(237,241,254);
            border-radius: 20px;
            position: relative;
        }
        .home-method2-ico {
            position: absolute;
            font-size: 40px;
            color: rgb(139,154,218);
            top: 20px;
            left: 20px;
        }

        .home-method3-bg {
            display: inline-block;
            width: 80px;
            height: 80px;
            background-color: rgb(233,254,239);
            border-radius: 20px;
            position: relative;
        }
        .home-method3-ico {
            position: absolute;
            font-size: 40px;
            color: rgb(88,147,99);
            top: 20px;
            left: 20px;
        }
    </style>

    <!-- ========== Start About ========== -->
    <section class="about">
        <p style="text-align: center; color: #5A5E74; font-size: 32px; margin-bottom: 60px; padding-left: 10px; padding-right: 10px; line-height: 40px" class="noto-bold"><span style="color: #558ee9">다양한 환경</span>에서 관리해보세요</p>
        <div class="container">
            <div class="row">
                <!-- Box-1 -->
                <div class="col-md-4 wow fadeInUp">
                    <div class="box">
                        <div class="home-method1-bg"><i class="fas fa-globe-americas home-method1-ico"></i></div>
                        <h3 class="noto-bold">UpBoard.kr 웹사이트</h3>
                        <p class="noto-light">웹사이트를 통해 간편하게 룰렛 업보를 조회하고 등록하고 사용할 수 있습니다! 필요한 건 단 하나, 트위치 계정만 있으면 됩니다!</p>
                    </div>
                </div>
                <!-- Box-2 -->
                <div class="col-md-4 wow fadeInUp">
                    <div class="box">
                        <div class="home-method2-bg"><i class="fab fa-discord home-method2-ico"></i></div>
                        <h3 class="noto-bold">UpBoard 디스코드 봇 <span style="font-size: 16px">(예정)</span></h3>
                        <p class="noto-light">디스코드에서도 간편하게 룰렛 업보 관리가 가능합니다! 간편하게 채팅으로 조회, 등록, 수정, 삭제가 가능합니다!</p>
                    </div>
                </div>
                <!-- Box-3 -->
                <div class="col-md-4 wow fadeInUp">
                    <div class="box">
                        <div class="home-method3-bg"><i class="fas fa-comment-dots home-method3-ico"></i></div>
                        <h3 class="noto-bold">UpBoard 트위치 채팅봇 <span style="font-size: 16px">(예정)</span></h3>
                        <p class="noto-light">트위치 채팅 명령어를 이용해 룰렛 업보를 관리할 수 있습니다! 섬세한 권한 설정을 지원해 방송 성향에 맞게 활용할 수 있습니다!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== End About ========== -->


    <!-- ========== Start creative ========== -->
    <section class="creative">
        <div class="container">
            <div class="row d-flex align-items-center">

                <div class="col-lg-5 wow fadeInUp">
                    <div class="text">
                        <h2 class="noto-bold"><span class="noto-black">보상 유효기간</span> 설정 가능!</h2>
                        <p class="noto-light">
                            룰렛으로 뽑은 신청곡 보상. 근데 왜 사용을 안 하고 모으기만 하는거지? 이제 이런 걱정은 떨쳐버리세요!
                            최소 하루부터 1년까지 스트리머가 설정해둔 기간이 지나면 보상은 쌓이지 않고 사라집니다. 물론 기간 제한이 없을 수도 있죠.
                            복잡할 것 같다구요? 전혀요! 누구나 쉽게 사용할 수 있도록 편리한 UI를 제공하고 있답니다
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp">
                    <div class="image">
                        <img src="/assets2/img/stock2.png" alt="" class="img-fluid wow fadeInUp">
                        <!-- <img src="http://placehold.jp/560x496.png" alt="creative" class="img-fluid"> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== End creative ========== -->

    <!-- ========== Start Remember ========== -->
    <section class="remember" style="padding-bottom: 170px">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-7 wow fadeInUp">
                    <div class="image">
                        <img src="/assets2/img/stock3.png" alt="" class="img-fluid wow fadeInUp">
                        <!-- <img src="http://placehold.jp/520x507.png" alt="remember" class="img-fluid"> -->
                    </div>
                </div>
                <div class="col-lg-5 wow fadeInUp">
                    <div class="text">
                        <h2 class="noto-bold"><span class="noto-black">매니저 설정</span> 기능 제공!</h2>
                        <p class="noto-light">
                            매번 스트리머가 직접 등록하는게 귀찮다구요? 업보 보상의 등록/사용 권한을 가지는 매니저를 언제든지 등록할 수 있답니다!
                            관리자 설정 페이지에서 매니저의 아이디만 등록해주면 바로 적용됩니다. (매니저도 트위치 계정으로 로그인 필요)
                            <!-- 고정 매니저가 따로 없어서 시청자에게 잠시만 부탁하고 싶다구요? 그럼 임시 매니저 지목도 가능하답니다! 임시 매니저로 등록된 시청자에게는 12시간동안 매니저 권한이 부여됩니다 -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========== End Remember ========== -->

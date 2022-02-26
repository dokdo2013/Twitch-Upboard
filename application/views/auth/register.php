<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>UpBoard 약관동의</title>
    <meta name="description" content="약관동의" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/dist/css/style.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="/dist/css/font-awesome.min.css">
	<link rel="stylesheet" href="/dist/css/custom.css">
</head>

<body>
    
   
	<!-- HK Wrapper -->
	<div class="hk-wrapper">

        <!-- Main Content -->
        <div class="hk-pg-wrapper hk-auth-wrapper">
            <header class="d-flex justify-content-between align-items-center">
                <a class="navbar-brand text-red real-logo" href="/">
                    UpBoard
                    <span style="margin-left: 5px;" class="font-16 badge badge-dark">BETA</span>
                </a>
            </header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12 pa-0">
                        <div class="auth-form-wrap pt-xl-0 pt-100">
                            <div class="auth-form w-xl-25 w-sm-50 w-100">
                                <form>
                                    <div class="d-block avatar avatar-lg mx-auto mb-20">
                                        <img src="<?=$rg["profile_img"]?>" alt="user" class="avatar-img rounded-circle">
                                    </div>
                                    <p style="text-align: center; font-size: 22px" class="noto-light"><span class="noto-bold" style="font-size: 24px"><?=$rg["nickname"]?></span> 님,<br>약관 동의 후 서비스 이용이 가능합니다.</p>
                                    <div style="margin-top: 50px" class="noto">
                                        <p style="text-align: center"><a class="noto-bold" href="/main/term" target="_blank" style="font-size: 20px">이용약관 보기</a> <span style="font-size: 12px">(* 필수 동의 항목입니다)</span></p>
                                        <p style="text-align: center"><a class="noto-bold" href="/main/privacy" target="_blank" style="font-size: 20px">개인정보처리방침 보기</a> <span style="font-size: 12px">(* 필수 동의 항목입니다)</span></p>
                                        <p style="text-align: center; margin-top: 15px; font-size: 14px;">UpBoard는 사이트 운영에 필요한 최소한의 개인정보 5가지<span class="noto-bold">(트위치 아이디, 트위치 닉네임, 프로필 사진, 이메일, 팔로워 수)</span>를 트위치 소셜 로그인을 통해 수집하고 있습니다. 스트리머와 시청자의 개인정보 보호를 위해 서버 보안 인증서(SSL) 적용, 정기 보안점검 진행 등 개인정보처리방침에 따른 보호책임을 다하고 있음을 알려드립니다.</p>
                                    </div>
                                    <div class="row" style="margin-top:50px">
                                        <!-- <div class="col-12" style="margin-bottom: 10px">
                                            <a onclick="agree_no()" class="noto btn btn-light btn-block btn-lg">동의하지 않음</a>
                                        </div> -->
                                        <div class="col-12">
                                            <a onclick="agree_yes()" style="color: white" class="noto btn btn-gradient-primary btn-block btn-lg">전체 동의 후 서비스 이용하기</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->
    </div>
   <!-- /HK Wrapper -->

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Slimscroll JavaScript -->
    <script src="dist/js/jquery.slimscroll.js"></script>

    <!-- Fancy Dropdown JS -->
    <script src="dist/js/dropdown-bootstrap-extended.js"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="dist/js/feather.min.js"></script>

    <!-- Tablesaw JavaScript -->
    <script src="vendors/tablesaw/dist/tablesaw.jquery.js"></script>
    <script src="dist/js/tablesaw-data.js"></script>

    <!-- Init JavaScript -->
    <script src="dist/js/init.js"></script>

    <!-- Main JS Code -->
    <script>
        function agree_yes() {
            location.href = "/main/auth/term_agree";
        }
    </script>
</body>

</html>
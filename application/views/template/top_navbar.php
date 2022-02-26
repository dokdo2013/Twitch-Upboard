<body>
    
	<!-- HK Wrapper -->
	<div class="hk-wrapper hk-alt-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar hk-navbar-alt">
            <a class="navbar-toggle-btn nav-link-hover navbar-toggler" href="javascript:void(0);" data-toggle="collapse" data-target="#navbarCollapseAlt" aria-controls="navbarCollapseAlt" aria-expanded="false" aria-label="Toggle navigation"><span class="feather-icon"><i data-feather="menu"></i></span></a>
            <a class="navbar-brand text-red real-logo" href="/">
                UpBoard
                <span style="margin-left: 5px;" class="font-16 badge badge-dark">BETA</span>
            </a>
            <div class="collapse navbar-collapse" id="navbarCollapseAlt">
                <?php if(!isset($is_sch)) { ?>
                <form class="navbar-search-alt" action="/main/search" method="get">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><span class="feather-icon"><i data-feather="search"></i></span></span>
                        </div>
                        <input class="form-control noto" type="search" name="q" placeholder="검색" aria-label="Search">
                    </div>
                </form>
                <?php } ?>
            </div>
            <ul class="navbar-nav hk-navbar-content">
            <?php if($pg["login"]){ ?>
                <li class="nav-item dropdown dropdown-authenticate">
                    <a class="nav-link" style="visibility: hidden">.</a>
                </li>
                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="<?=$personal->tw_profile_img?>" alt="user" class="avatar-img rounded-circle">
                                </div>
                                <!-- <span class="badge badge-success badge-indicator"></span> -->
                            </div>
                            <div class="media-body">
                                <span class="noto"><?=$personal->tw_nickname?><i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="/<?=$personal->tw_name?>"><i class="dropdown-icon zmdi zmdi-account"></i><span class="noto">마이 홈</span></a>
                        <a class="dropdown-item" href="/<?=$personal->tw_name?>/manage"><i class="dropdown-icon zmdi zmdi-settings"></i><span class="noto">관리자 페이지</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/main/auth/logout"><i class="dropdown-icon zmdi zmdi-power"></i><span class="noto">로그아웃</span></a>
                    </div>
                </li>
            <?php }else{ ?>
                <li class="nav-item dropdown dropdown-authenticate">
                    <a class="nav-link" style="visibility: hidden">.</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-gradient-primary btn-rounded noto btn-wth-icon font-14" style="width: 90px; text-align: right" href="/main/auth/login?redto=/<?=$us['sid']?>">
                        <span class="icon-label"><i class="fab fa-twitch"></i> </span>
                        <span>로그인</span>
                    </a>
                </li>
            <?php } ?>
            </ul>
        </nav>
        <!-- /Top Navbar -->

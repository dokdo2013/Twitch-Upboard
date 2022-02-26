<!-- Main Content -->
<div class="hk-pg-wrapper px-0">
    <!-- Container -->
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12 pa-0">
                <div class="faq-search-wrap bg-red-light-2">
                    <div class="container">
                        <h1 class="display-5 text-white mb-20 noto-bold" style="text-align: center; margin-bottom: 40px !important;">검색</h1>
                        <div class="form-group w-100 mb-0">
                            <form action="" method="get">
                                <div class="input-group">
                                        <input class="form-control form-control-lg filled-input bg-white noto" name="q" placeholder="검색어를 입력하세요" type="text" value="<?=$q?>">
                                        <div class="input-group-append">
                                            <span class="input-group-text"><span class="feather-icon"><i data-feather="arrow-right"></i></span></span>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="faq-content container mt-sm-60 mt-30">
                    <div class="hk-row">
                        <?php if($sch) { /*$this->load->model('Auth_model');*/ foreach($sch_res as $res) { ?>
                        <div class="col-12 col-sm-6">
                            <a href="/<?=$res->tw_name?>">
                                <div class="media pa-20 border border-2 border-light rounded">
                                    <img class="mr-15 circle d-74" src="<?=$res->tw_profile_img?>" alt="Profile Image">
                                    <div class="media-body" style="margin: auto">
                                        <span class="mb-5 noto-medium" style="font-size: 24px; color: black"><?=$res->tw_nickname?></span>&nbsp;&nbsp;&nbsp;<?=$this->Auth_model->get_followers($res->tw_name)?> Followers
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } } else { ?>
                        <div class="col-12">
                            <p style="font-size: 16px;" class="noto">검색결과가 없습니다.</p>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row -->
    </div>
    <!-- /Container -->
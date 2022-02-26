        <!-- Main Content -->
        <div class="hk-pg-wrapper">
			<!-- Container -->
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12 pa-0">
                        <div class="profile-cover-wrap overlay-wrap">
                            <!-- <div class="profile-cover-img" style="background-image:url('dist/img/gallery/mock7.jpg')"></div> -->
							<div class="bg-overlay bg-trans-dark-60"></div>
							<div class="container profile-cover-content py-50">
								<div class="hk-row"> 
									<div class="col-lg-6">
										<div class="media align-items-center">
											<div class="media-img-wrap  d-flex">
												<div class="avatar">
													<img src="<?=$us["pimg"]?>" alt="user" class="avatar-img rounded-circle">
												</div>
											</div>
											<div class="media-body">
												<div class="text-white text-capitalize display-6 mb-5 font-weight-400 noto-bold"><?=$us["name"]?></div>
												<div class="font-14 text-white"><span class="mr-5" style="margin-right: 0 !important"><span class="font-weight-500 pr-5"><?=$us["followers"]?></span><span class="mr-5" style="margin-right: 0 !important">Followers</span></div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="button-list">
											<!-- <a href="#" class="btn btn-dark btn-wth-icon icon-wthot-bg btn-rounded"><span class="btn-text">Message</span><span class="icon-label"><i class="icon ion-md-mail"></i> </span></a> -->
											<a href="https://twitch.tv/<?=$us["sid"]?>" target="_blank" class="btn btn-icon btn-icon-circle btn-indigo btn-icon-style-2" style="margin-right: 15px"><span class="btn-icon-wrap"><i class="fab fa-twitch"></i></span></a>
											<!-- <a href="#" class="btn btn-icon btn-icon-circle btn-purple btn-icon-style-2"><span class="btn-icon-wrap"><i class="fa fa-instagram"></i></span></a> -->
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
							function nav_pick($target, $now) {
								if($target == $now) {
									echo "active";
								}
							}
						?>
                        <div class="bg-white">
							<div class="container">
								<ul class="nav nav-light nav-tabs" role="tablist">
									<li class="nav-item">
										<a href="/<?=$us["sid"]?>/home" class="d-flex h-60p align-items-center nav-link <?php nav_pick('home', $nav_pick); ?> noto">홈</a>
									</li>
									<li class="nav-item">
										<a href="/<?=$us["sid"]?>/list" class="d-flex h-60p align-items-center nav-link <?php nav_pick('list', $nav_pick); ?> noto">업보 현황</a>
									</li>
									<li class="nav-item">
										<a href="/<?=$us["sid"]?>/history" class="d-flex h-60p align-items-center nav-link <?php nav_pick('history', $nav_pick); ?> noto">이용 기록</a>
									</li>
									<li class="nav-item">
										<a href="/<?=$us["sid"]?>/notice" class="d-flex h-60p align-items-center <?php nav_pick('notice', $nav_pick); ?> nav-link">공지사항</a>
									</li>
									<?php if( $perm >= 3 ){ ?>
									<li class="nav-item">
										<a href="/<?=$us["sid"]?>/manage" target="_blank" class="d-flex h-60p align-items-center nav-link">관리자&nbsp;<i class="fas fa-external-link-alt"></i></a>
									</li>
									<?php } ?>
								</ul>
							</div>	
						</div>	
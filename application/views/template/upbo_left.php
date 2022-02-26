<div class="tab-content mt-sm-60 mt-30">
							<div class="tab-pane fade show active" role="tabpanel">
								<div class="container">
									<div class="hk-row">
										<div class="col-lg-4">
											<div class="card card-profile-feed">
												<div class="row text-center">
													<div class="col-4 border-right pr-0">
														<div class="pa-15">
															<span class="d-block display-6 text-dark mb-5"><?=$cnt["cnt1"]?></span>
															<span class="d-block text-capitalize font-14 noto-light">업보 보유자</span>
														</div>
													</div>
													<div class="col-4 border-right px-0">
														<div class="pa-15">
															<span class="d-block display-6 text-dark mb-5"><?=$cnt["cnt2"]?></span>
															<span class="d-block text-capitalize font-14 noto-light">남은 업보</span>
														</div>
													</div>
													<div class="col-4 pl-0">
														<div class="pa-15">
															<span class="d-block display-6 text-dark mb-5"><?=$cnt["cnt3"]?></span>
															<span class="d-block text-capitalize font-14 noto-light">누적 업보</span>
														</div>
													</div>
												</div>
											 </div>

											<div id="upbo-notice-card" class="card card-profile-feed">
												<div class="card-header card-header-action">
													<h6><span class="noto-bold">공지사항 <span class="badge badge-soft-success ml-5"><?=$notice_num?></span></span></h6>
													<a href="/<?=$us["sid"]?>/notice" class="font-14 ml-auto noto">전체 보기</a>
												</div>	
												<ul class="list-group list-group-flush">
													<?php foreach($notices as $notice) { ?>
														<li class="list-group-item border-0">
															<div class="media align-items-center">
																<div class="media-body" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
																	<a href="/<?=$us["sid"]?>/notice/<?=$notice->contents_uid?>"><span class="d-block text-dark font-16 noto" style="display: inline !important"><?=$notice->title?></span></a>
																	<span class="d-block font-13 noto-light"><?=date("Y-m-d", strtotime($notice->write_datetime))?></span>
																</div>
															</div>
														</li>
													<?php } if( $notice_num == 0 ) { ?>
														<p style="text-align: center; margin: 30px 0" class="noto-light">아직 등록된 공지사항이 없습니다.</p>
													<?php } ?>
												</ul>
											</div>
											<?php if($perm >= 3) { ?>
											<div class="card card-profile-feed">
												<a href="/<?=$us["sid"]?>/manage" id="goToManage" class="btn btn-light btn-block noto"><i class="fa fa-cog"></i> 관리자 페이지</a>
											 </div>
											 <?php } ?>

										</div>
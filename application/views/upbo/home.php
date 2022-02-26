										<div class="col-lg-8">
											<div class="btn-group" style="display: flex; height: 66px">
												<a href="javascript: upboHomeChangeView('add')" class="btn btn-gradient-info" style="flex: 1; vertical-align: middle">
													<span class="noto-light" style="font-size: 22px; line-height: 48px">업보 <span class="noto-bold">등록</span></span>
												</a>
												<a href="javascript: upboHomeChangeView('use')" class="btn btn-gradient-danger" style="flex: 1">
													<span class="noto-light" style="font-size: 22px; line-height: 48px">업보 <span class="noto-bold">사용</span></span>
												</a>
											</div>
											<input type="hidden" id="view_sel" value="<?=$pg["view_sel"]?>">
											<div id="upbo-bigcard-add" class="card card-profile-feed user-activity" style="margin-top: 14px; border-top: 0; display: none; position: relative">
												<?php if( $perm < 3 ) { ?>
												<div id="blockuser-add" style="width: 100%; height: 100%; position: absolute; background-color: rgba(255,255,255,0.5); z-index: 99999">
													<p style="font-size: 24px; text-align: center; margin-top: 130px; color: black" class="noto-medium">권한이 부족해<br>이용할 수 없습니다.</p>
												</div>
												<?php } ?>
                                                <div class="card-header card-header-action" style="border-top: 4px solid #1ebccd">
													<p class="noto font-20" style="color: black">업보 등록</p>
												</div>
												<div class="card-body">
													<div class="media">
														<div class="media-img-wrap">
															<div class="avatar avatar-sm">
																<div class="avatar-img rounded-circle bg-gradient-info" style="width: 100%; height: 100%; color: white; text-align: center;">
																	<span class="noto-bold font-16" style="line-height: 42px">1</span>
																</div>
																<!-- <img src="dist/img/avatar2.jpg" alt="user" class="avatar-img rounded-circle"> -->
															</div>
														</div>
														<div class="media-body">
															<div>
																<span class="d-block mb-5 noto-light font-20" style="color: black; margin-top: 5px"><span class="noto-bold">누가</span> 얻은 업보인가요?</span>
															</div>
															<div>
																<div class="form-group" style="margin-top: 20px">
																	<label for="addNameAdd" class="noto-light">대상 닉네임</label>
																	<input type="text" class="form-control noto" name="addNameAdd" id="addNameAdd" aria-describedby="helpId" placeholder="직접 입력하거나 아래 목록에서 선택하세요">
																</div>
															</div>

															<div style="max-height:150px; overflow: auto">
																<?php if( count($upbo_people) > 0){
																	foreach($upbo_people as $up){ ?>
																		<button onclick="upboHomeChangeInput1('<?=$up->name?>')" class="noto btn btn-sm btn-light"><?=$up->name?></button>
																	<?php } ?>
																	<button onclick="upboHomeResetInput1()" class="noto btn btn-sm btn-dark">초기화</button>
																<?php } ?>
															</div>

														</div>
													</div>
													<style>
														@media (max-width: 575.98px) {
															#pcAddType {
																display: none;
															}
															#mobAddType {
																display: block !important;
															}
														}
														#mobAddType {
															display: none;
														}
													</style>
													<div class="media">
														<div class="media-img-wrap">
															<div class="avatar avatar-sm">
																<div class="avatar-img rounded-circle bg-gradient-info" style="width: 100%; height: 100%; color: white; text-align: center;">
																	<span class="noto-bold font-16" style="line-height: 42px">2</span>
																</div>
																<!-- <img src="dist/img/avatar2.jpg" alt="user" class="avatar-img rounded-circle"> -->
															</div>
														</div>
														<div class="media-body">
															<div>
																<span class="d-block mb-5 noto-light font-20" style="color: black; margin-top: 5px"><span class="noto-bold">어떤</span> 업보를 등록할까요?</span>
															</div>
															<style>.upbo-btn{margin: 5px}</style>
															<div style="margin-top: 20px">

																<div id="pcAddType" style="text-align: right; float: right; margin-top: -50px">
																	<div class="btn-group btn-group-rounded mb-25 mr-10" role="group" style="margin-bottom: 0 !important" aria-label="Basic example">
																		<button type="button" id="addTypeList" onclick="pickFromPC('list')" class="btn btn-sm btn-primary">목록에서 선택</button>
																		<button type="button" id="addTypeText" onclick="pickFromPC('text')" class="btn btn-sm btn-outline-primary">직접 입력</button>
																	</div>
																	<input type="hidden" id="addType" value="0">
																</div>

																<div id="mobAddType" style="text-align: center;">
																	<div class="btn-group btn-group-rounded mb-25 mr-10" role="group" style="margin-bottom: 0 !important" aria-label="Basic example">
																		<button type="button" id="addTypeListMob" onclick="pickFromPC('list')" class="btn btn-sm btn-primary">목록에서 선택</button>
																		<button type="button" id="addTypeTextMob" onclick="pickFromPC('text')" class="btn btn-sm btn-outline-primary">직접 입력</button>
																	</div>
																</div>

																<div class="row" id="upbo-add-list-block">
																<?php foreach($upbo_full as $uf){?>
																	<div class="upbo-card" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
																		<p class="noto font-15" style="color: black; padding-bottom: 5px; display: inline"><?=$uf->upbo_name?></p>
																		<div class="input-group input-group-sm">
																			<div class="input-group-prepend">
																				<button style="min-width: 40px" class="upbo-cnt-minus btn btn-decrement btn-light" type="button" upbo-type="add" upbo-target="<?=$uf->upbo_uid?>">
																					<strong>
																						-
																					</strong>
																				</button>
																			</div>
																			<input id="upbo-cnt-add-<?=$uf->upbo_uid?>" type="text" style="text-align: center; width: 50px" maxlength="1" class="form-control" pattern="[0-9]+" value="0">
																			<div class="input-group-append">
																				<button style="min-width: 2.5em" class="upbo-cnt-plus btn btn-increment btn-light" type="button" upbo-type="add" upbo-target="<?=$uf->upbo_uid?>">
																					<strong>
																						+
																					</strong>
																				</button>
																			</div>
																		</div>
																	</div>
																	<?php } ?>
																	<div class="upbo-card" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap; border-color: lightgrey">
																		<a href="/<?=$us["sid"]?>/manage/upbo" target="_blank">
																			<p class="noto font-15" style="padding-top: 5px;padding-bottom: 5px; text-align: center; color: grey">+<br>업보 추가</p>
																		</a>
																	</div>
																</div>
																<div id="upbo-add-text-block">
																	<div class="form-group" style="margin-top: 20px">
																		<label for="addNameAdd" class="noto-light">업보명</label>
																		<input type="text" class="form-control noto" name="addNameAdd" id="addNameAdd" aria-describedby="helpId" maxlength="8" placeholder="등록할 업보명을 직접 입력해주세요 (8자 이내)">
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div style="text-align: center">
														<a style="width: 50%; max-width: 150px" class="btn btn-gradient-info" href="javascript: addSubmit()" role="button">등록</a>
													</div>

												</div>
                                            </div>

											<div id="upbo-bigcard-use" class="card card-profile-feed user-activity" style="margin-top: 14px; border-top: 0; display: none">
												<?php if( $perm < 3 ) { ?>
												<div id="blockuser-use" style="width: 100%; height: 100%; position: absolute; background-color: rgba(255,255,255,0.5); z-index: 99999">
													<p style="font-size: 24px; text-align: center; margin-top: 130px; color: black" class="noto-medium">권한이 부족해<br>이용할 수 없습니다.</p>
												</div>
												<?php } ?>
                                                <div class="card-header card-header-action" style="border-top: 4px solid #ff2f26">
													<p class="noto font-20" style="color: black">업보 사용</p>
												</div>
												<div class="card-body">
													<div class="media">
														<div class="media-img-wrap">
															<div class="avatar avatar-sm">
																<div class="avatar-img rounded-circle bg-gradient-danger" style="width: 100%; height: 100%; color: white; text-align: center;">
																	<span class="noto-bold font-16" style="line-height: 42px">1</span>
																</div>
																<!-- <img src="dist/img/avatar2.jpg" alt="user" class="avatar-img rounded-circle"> -->
															</div>
														</div>
														<div class="media-body">
															<div>
																<span class="d-block mb-5 noto-light font-20" style="color: black; margin-top: 5px"><span class="noto-bold">누구의</span> 업보를 사용할 것인가요?</span>
															</div>
															
															<div>
																<div class="form-group" style="margin-top: 20px">
																	<label for="addNameUse" class="noto-light">대상 닉네임</label>
																	<div class="input-group">
																		<input type="text" class="form-control noto" name="addNameUse" id="addNameUse" aria-describedby="helpId" placeholder="직접 입력하거나 아래 목록에서 선택하세요">
																		<div class="input-group-append">
																			<button onclick="upboHomeGetData();" class="btn btn-gradient-danger" type="button">조회</button>
																		</div>
																	</div>
																</div>
															</div>

															<div style="max-height:150px; overflow: auto">
															<?php if( count($upbo_people) > 0){
																	foreach($upbo_people as $up){ ?>
																<button onclick="upboHomeChangeInput2('<?=$up->name?>')" class="noto btn btn-sm btn-light"><?=$up->name?></button>
																<?php } ?>
																<button onclick="upboHomeResetInput2()" class="noto btn btn-sm btn-dark">초기화</button>
															<?php } ?>
															</div>

														</div>
													</div>

													<div id="upbo-use-step2" class="media" style="display: none">
														<div class="media-img-wrap">
															<div class="avatar avatar-sm">
																<div class="avatar-img rounded-circle bg-gradient-danger" style="width: 100%; height: 100%; color: white; text-align: center;">
																	<span class="noto-bold font-16" style="line-height: 42px">2</span>
																</div>
																<!-- <img src="dist/img/avatar2.jpg" alt="user" class="avatar-img rounded-circle"> -->
															</div>
														</div>
														<div class="media-body">
															<div>
																<span class="d-block mb-5 noto-light font-20" style="color: black; margin-top: 5px"><span class="noto-bold">어떤</span> 업보를 사용할까요?</span>
															</div>
															<div style="margin-top: 20px">
																<div class="row">
																	<?php foreach($upbo_full as $uf){?>
																	<div class="upbo-card" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
																		<p class="noto font-15" style="color: black; padding-bottom: 5px; display: inline"><?=$uf->upbo_name?></p>
																		<div class="input-group input-group-sm">
																			<div class="input-group-prepend">
																				<button style="min-width: 40px" class="upbo-cnt-minus btn btn-decrement btn-light" type="button" upbo-type="use" upbo-target="<?=$uf->upbo_uid?>">
																					<strong>
																						-
																					</strong>
																				</button>
																			</div>
																			<input id="upbo-cnt-use-<?=$uf->upbo_uid?>" type="text" style="text-align: center; width: 50px" maxlength="1" class="form-control" pattern="[0-9]+" value="0">
																			<div class="input-group-append">
																				<button style="min-width: 2.5em" class="upbo-cnt-plus btn btn-increment btn-light" type="button" upbo-type="use" upbo-target="<?=$uf->upbo_uid?>">
																					<strong>
																						+
																					</strong>
																				</button>
																			</div>
																		</div>
																	</div>
																	<?php } ?>
																</div>
															</div>
														</div>
													</div>

													<div id="upbo-use-submit" style="text-align: center; display: none">
														<a name="" id="" style="width: 50%; max-width: 150px" class="btn btn-gradient-danger" href="javascript: useSubmit()" role="button">사용</a>
													</div>

												</div>
                                            </div>
											
											<!-- <div class="card-columns card-column-1">
												<div class="card card-profile-feed mb-0 rounded-bottom-0">
													<div class="card-header card-header-action">
														<div class="media align-items-center">
															<div class="media-img-wrap d-flex mr-10">
																<div class="avatar avatar-sm">
																	<img src="/dist/img/avatar3.jpg" alt="user" class="avatar-img rounded-circle">
																</div>
															</div>
															<div class="media-body">
																<div class="text-capitalize font-weight-500 text-dark">Mitsoku Heid</div>
																<div class="font-13">3 hrs</div>
															</div>
														</div>
														<div class="d-flex align-items-center card-action-wrap">
															<div class="inline-block dropdown">
																<a class="dropdown-toggle no-caret" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="ion ion-ios-more"></i></a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a class="dropdown-item" href="#">Action</a>
																	<a class="dropdown-item" href="#">Another action</a>
																	<a class="dropdown-item" href="#">Something else here</a>
																	<div class="dropdown-divider"></div>
																	<a class="dropdown-item" href="#">Separated link</a>
																</div>
															</div>
														</div>
													</div>
													<div class="card-body">
														<p class="card-text mb-30">Not to mention, Cupcake Ipsum, Bob Ross Ipsum (“happy little clouds”), and the furry Cat Ipsum.</p>
														<div class="feed-img-layout">
															<div class="row h-200p">
																<div class="col-6 h-100">
																	<div class="feed-img h-100" style="background-image:url(dist/img/gallery/mock9.jpg);"></div>
																</div>
																<div class="col-6 h-100">
																	<div class="row h-100">
																		<div class="col-sm-12 h-95p mb-10">
																			<div class="feed-img h-100" style="background-image:url(dist/img/gallery/mock10.jpg);"></div>
																		</div>
																		<div class="col-sm-12 h-95p">
																			<div class="row h-100">
																				<div class="col-6 h-100">
																					<div class="feed-img h-100" style="background-image:url(dist/img/gallery/mock8.jpg);"></div>
																				</div>
																				<div class="col-6 h-100">
																					<div class="feed-img h-100" style="background-image:url(dist/img/gallery/mock9.jpg);"></div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="card-footer justify-content-between">
														<div>
															<a href="#"><i class="ion ion-md-heart text-danger"></i>94</a>
														</div>
														<div>
															<a href="#">1.5K comments</a>
															<a href="#">18 shares</a>
														</div>
													</div>
												</div>
												<div class="card card-profile-feed border-top-0 rounded-top-0">
													<div class="card-body">
														<button class="btn btn-light btn-sm btn-block mb-25">Hide comments</button>
														<div class="media">
															<div class="media-img-wrap d-flex mr-10">
																<div class="avatar avatar-xs">
																	<img src="/dist/img/avatar5.jpg" alt="user" class="avatar-img rounded-circle">
																</div>
															</div>
															<div class="media-body">
																<div class="text-capitalize font-14 font-weight-500 text-dark">Eziquiel Merideth</div>
																<div class="font-15"><p>So there you have it. The nonsense words unable to fully escape meaning.</p></div>
																<div class="d-flex mt-10">
																	<span class="font-14 text-light mr-15">1 hr</span>
																	<a href="#" class="font-14 text-light text-capitalize font-weight-500">reply</a>
																</div>
															</div>
														</div>
													</div>
													<div class="card-footer">
														<div class="media w-100 align-items-center">
															<div class="media-img-wrap d-flex mr-15">
																<div class="avatar avatar-xs">
																	<img src="/dist/img/avatar11.jpg" alt="user" class="avatar-img rounded-circle">
																</div>
															</div>
															<div class="media-body">
																<textarea class="form-control filled-input bg-transparent" rows="1" placeholder="Leave a comment..."></textarea>
															</div>
														</div>
													</div>
												</div>
											</div> -->
										</div>
									</div>
								</div>
							</div>
						</div>	
					</div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
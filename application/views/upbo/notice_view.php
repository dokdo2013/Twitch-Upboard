<div class="tab-content mt-sm-60 mt-30">
							<div class="tab-pane fade show active" role="tabpanel">
								<div class="container">
									<div class="hk-row">
										<div class="col-lg-12">

                                            <style>
                                                    .boardItemDetail{
                                                        margin-bottom: 0;
                                                    }
                                                    .boardItemDetail span{
                                                        margin-right: 20px;
                                                        color: grey;
                                                    }
                                                    .boardItemDetail .name{
                                                        font-size: 18px;
                                                        font-weight: 700;
                                                        color: black;
                                                    }
                                            </style>

                                            <div class="card">
                                                <div class="card-body">
                                                    <button class="btn btn-sm btn-outline-secondary" style="width:70px; position: absolute; top: 30px; right:30px" type="button" onclick="location.href='/<?=$us['sid']?>/notice'"><i class="fas fa-list-alt"></i> 목록</button>
                                                    <p class="noto" style="font-size:14px; color: grey; margin-bottom: 0">공지사항</p>
                                                    <p class="noto-bold" style="font-size:24px; color: black; margin-bottom: 10px"><?=$itemDetail->title?></p>
                                                    <p class="noto" class="boardItemDetail">
                                                        <span style="margin-right: 10px; color: black; font-size: 14px;" class="noto-bold name"><?=$itemDetail->writer_name?></span>
                                                        <span style="margin-right: 10px; color: grey" class="noto"><?=$itemDetail->write_datetime?></span>
                                                        <span style="margin-right: 10px; color: grey" class="noto"><i class="fas fa-eye"></i> <?=$itemDetail->views?>회</span>
                                                    </p>
                                                    <hr>
                                                    <div style="margin: 20px 0; min-height: 130px">
                                                        <!-- Text 내용 -->
                                                        <?=$itemDetail->contents?>
                                                    </div>

                                                </div>
                                            </div>


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
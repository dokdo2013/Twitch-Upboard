                        <div class="tab-content mt-sm-60 mt-30">
							<div class="tab-pane fade show active" role="tabpanel">
								<div class="container">
									<div class="hk-row">
										<div class="col-lg-12">

                                            <div class="card">
                                                <style>
                                                    #board-table_paginate > .pagination {
                                                        /* justify-content: unset; */
                                                    }
                                                    #board-table > thead > tr th, #board-table > tbody > tr > td:nth-child(1), #board-table > tbody > tr > td:nth-child(3)  {
                                                        text-align: center
                                                    }
                                                </style>
                                                <div class="noto-medium card-header" style="font-size: 20px; color: black; margin-top: 10px">공지사항</div>
                                                <div class="card-body">
                                                    <table id="board-table" class="table">
                                                        <thead>
                                                            <tr>
                                                                <th class="noto-bold" style="width: 100px">번호</th>
                                                                <th class="noto-bold">제목</th>
                                                                <th class="noto-bold" style="width: 200px">작성일</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $cnt=count($board_data); foreach($board_data as $bd){ ?>
                                                            <tr>
                                                                <td class="noto"><?=$cnt--?></td>
                                                                <td class="noto"><a href="/<?=$us["sid"]?>/notice/<?=$bd->contents_uid?>"><?=$bd->title?></a></td>
                                                                <td class="noto"><?=date("Y-m-d", strtotime($bd->write_datetime))?></td>
                                                            </tr>
                                                            <?php } ?>
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
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->
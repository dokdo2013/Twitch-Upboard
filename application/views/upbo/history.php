                            <div class="col-lg-8">
                                <div id="upbo-list-search" class="card card-profile-feed user-activity" style="position: relative">
                                        <style>
                                            #history-table_paginate > .pagination {
                                                /* justify-content: unset; */
                                            }
                                            #history-table > thead > tr th, #history-table > tbody > tr > td:nth-child(1), #history-table > tbody > tr > td:nth-child(3)  {
                                                text-align: center
                                            }
                                        </style>
                                        <div class="noto-medium card-header" style="font-size: 20px; color: black; margin-top: 10px">이용 기록&nbsp;&nbsp;&nbsp;<span class="noto-light" style="color: grey; font-size: 14px">최근 50건의 업보 등록/이용 기록</span></div>
                                        <div class="card-body">
                                            <?php $real_cnt=$cnt=count($history_data); if($real_cnt > 0){ ?>
                                            <table id="history-table" class="table">
                                                <thead>
                                                    <tr>
                                                        <th class="noto-bold" style="width: 100px">번호</th>
                                                        <th class="noto-bold">제목</th>
                                                        <th class="noto-bold" style="width: 200px">작성일</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($history_data as $bd){ ?>
                                                    <tr>
                                                        <td class="noto"><?=$cnt--?></td>
                                                        <td class="noto"><a href="/<?=$us["sid"]?>/notice/<?=$bd->contents_uid?>"><?=$bd->title?></a></td>
                                                        <td class="noto"><?=date("Y-m-d", strtotime($bd->write_datetime))?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <?php } } else {  ?>
                                            <p style="text-align: center; font-size: 18px; margin: 20px 0">이용 기록이 없습니다.</p>
                                            <?php } ?>
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
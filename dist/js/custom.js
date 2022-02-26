$(() => {
    // Preset
    const viewSel = $("#view_sel").val();
    if(viewSel == 'use'){
        $("#upbo-bigcard-use").show();
    }else{
        $("#upbo-bigcard-add").show();
    }
    $("#upbo-add-text-block").hide();

    $(".upbo-cnt-plus").click(function(){
        const targetInput = '#upbo-cnt-' + $(this).attr("upbo-type") + '-' + $(this).attr("upbo-target");
        const targetValue = $(targetInput).val();
        if(targetValue < 9){
            $(targetInput).val(parseInt(targetValue) + 1);
        }else{
            $(targetInput).val("9");
        }
    });

    $(".upbo-cnt-minus").click(function(){
        const targetInput = '#upbo-cnt-' + $(this).attr("upbo-type") + '-' + $(this).attr("upbo-target");
        const targetValue = $(targetInput).val();
        if(targetValue > 0){
            $(targetInput).val(parseInt(targetValue) - 1);
        }else{
            $(targetInput).val("0");
        }
    });
});

function upboHomeChangeView(type){
    if(type == 'use'){
        $("#upbo-bigcard-add").hide();
        $("#upbo-bigcard-use").show();
    }else{
        $("#upbo-bigcard-use").hide();
        $("#upbo-bigcard-add").show();
    }
}

function upboHomeChangeInput1(name){
    $("#addNameAdd").val(name);
}
function upboHomeChangeInput2(name){
    $("#addNameUse").val(name);
}

function upboHomeResetInput1(){
    $("#addNameAdd").val('');
}
function upboHomeResetInput2(){
    $("#addNameUse").val('');
}

function upboHomeGetData(){
    $("#upbo-use-step2").show();
    $("#upbo-use-submit").show();
}


function swal_error(message){
    Swal.fire({
        title: '오류',
        text: message,
        icon: 'error',
        confirmButtonText: '확인'
    });
}

function swal_success(message){
    Swal.fire({
        title: '성공',
        text: message,
        icon: 'success',
        confirmButtonText: '확인'
    });
}


function addSubmit(){

    // 권한 부족
    swal_error('업보 등록에 필요한 권한이 부족합니다');
}

function useSubmit(){
    swal_error('업보 사용에 필요한 권한이 부족합니다');

}

function pickFromPC(type){
    if(type == 'list') {
        //  Buttons
        $("#addTypeList").removeClass('btn-outline-primary');
        $("#addTypeList").addClass('btn-primary');
        $("#addTypeText").removeClass('btn-primary');
        $("#addTypeText").addClass('btn-outline-primary');
        $("#addTypeListMob").removeClass('btn-outline-primary');
        $("#addTypeListMob").addClass('btn-primary');
        $("#addTypeTextMob").removeClass('btn-primary');
        $("#addTypeTextMob").addClass('btn-outline-primary');
        // Divs
        $("#upbo-add-list-block").show();
        $("#upbo-add-text-block").hide();
        // Value
        $("#addType").val('0');
    }else if(type == 'text'){
        // Buttons
        $("#addTypeList").addClass('btn-outline-primary');
        $("#addTypeList").removeClass('btn-primary');
        $("#addTypeText").addClass('btn-primary');
        $("#addTypeText").removeClass('btn-outline-primary');
        $("#addTypeListMob").addClass('btn-outline-primary');
        $("#addTypeListMob").removeClass('btn-primary');
        $("#addTypeTextMob").addClass('btn-primary');
        $("#addTypeTextMob").removeClass('btn-outline-primary');
        // Divs
        $("#upbo-add-list-block").hide();
        $("#upbo-add-text-block").show();
        // Value
        $("#addType").val('1');
    }
}
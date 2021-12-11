
// 检查是否可以登录
function submit1() {
    var u_nameHint = document.querySelector("#u_nameHint").innerHTML;
    var u_pswHint = document.querySelector("#u_pswHint").innerHTML;
    var u_repswHint = document.querySelector("#u_repswHint").innerHTML;
    if ((u_nameHint == '') && (u_pswHint == '') && (u_repswHint == '')) {
        if ((document.querySelector("#u_name").value != '') && (document.querySelector("#u_psw").value != '') && (document.querySelector("#u_repsw").value != '')) {
            return true;
        }
        if (document.querySelector("#u_name").value == "") {
            document.querySelector("#u_nameHint").innerHTML = "用户名不能为空";
        }
        if (document.querySelector("#u_repsw").value == "") {
            document.querySelector("#u_repswHint").innerHTML = "确认密码不能为空";
        }
        if (document.querySelector("#u_psw").value == "") {
            document.querySelector("#u_pswHint").innerHTML = "密码不能为空";
        }
        return false;
    }
    return false;
}
var show = function (i) {
    console.log(i);
    var id = "#detail-" + i;
    $(".item-show").addClass("visually-hidden");
    $(id).removeClass("visually-hidden");
    console.log($(id));
}
var reshow = function (i) {
    var id = "#detail-" + i;
    $(".item-show").removeClass("visually-hidden");
    $(id).addClass("visually-hidden");
}
var isLogin = function (i) {
    $(function () {
        if (!document.cookie) {
            alert("请登录");
            return false;
        } else {
            if (i.id.split("-")[0] == "like") {
                var id1 = "#" + i.id;
                // 获取点赞人的id
                var u_id = document.cookie.split(";")[1].split("=")[1];
                var b_id = $(id1).parent().parent().parent()[0].id;
                $.ajax({
                    type: 'POST',
                    url: "../php/like.php",
                    data: { "u_id": u_id, "b_id": b_id },
                    success: function (result) {
                        var like_id = "#likenums-" + b_id;
                        var flag = result.split(":")[0];
                        if (flag == '1') {
                            $(like_id).siblings()[0].src = "../image_1/liked.png";
                        }
                        else {
                            $(like_id).siblings()[0].src = "../image_1/like.png";
                        }

                        $(like_id).html(result.split(":")[0]);
                    }
                });
            }
        }
    })

}

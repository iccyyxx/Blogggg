$(document).ready(function () {
    $("#u_name").blur(function () {
        $.ajax({
            type: 'POST',
            url: "../php/checkName.php",
            data: { "u_name": $(this).val() },
            success: function (result) {
                $("#u_nameHint").html(result);
            }
        });
    })
    $('#u_psw').blur(function () {
        var reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
        if (!reg.test($(this).val())) {
            $("#u_pswHint").html("密码至少6位，包含数字，大写字母和小写字母");
        }
        else {
            $("#u_pswHint").html("");
        }
    })
    $('#u_repsw').blur(function () {
        if ($(this).val() != $("#u_psw").val()) {
            $("#u_repswHint").html("输入的两次密码不一致,请重新输入");
        }
        else {
            $("#u_repswHint").html("");
        }
    })
})
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

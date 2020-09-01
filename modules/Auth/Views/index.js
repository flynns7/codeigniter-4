window.form = $("#form");

$(document).ready(function () {

    form.validate({
        rules: {
            username: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            username: {
                required: "Email is required",
                maxlength: "Please input valid email."
            },
            password: {
                required: "Password is required"
            }
        }
    });

});

function beforeRequesting(code) {
    form.find("button[type=submit]").attr("disabled", "disabled");
}

function onErrorRequest(code, textStatus) {
    form.find("button[type=submit]").removeAttr("disabled");
    showMessage("error", "Failed to proccess data", textStatus)
}

function onFinishRequest(code, result) {
    form.find("button[type=submit]").removeAttr("disabled");
    if (result.error != 0) {
        $(".error-message").text(result.message);
        $(".error-message").slideDown();
    } else {
        $(".error-message").slideDown();
        $(".error-message").text('');
        showMessage("success", "Login Successfully", "Please wait....");
        setTimeout(function () {
            window.location.reload();
        }, 500);
    }
}
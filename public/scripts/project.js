$(document).ready(function () {

    $(".breadcrumb").on("click", ".btn", function (e) {
        e.preventDefault();
        const type = $(this).data("type");

        switch (type) {
            case "refresh-datatable": refreshData(); break;
            case "add-data": openForm(); break;
            case "export-excel-datatable": exportData(); break;
            case "chart-datatable": chartData(); break;
            case "filter-datatable": openFilterForm(); break;
            default: break;
        }
    });

    Ladda.bind('.btn-ladda', {
        timeout: 2000
    });

    Ladda.bind('.btn-ladda-progress', {
        callback: function callback(instance) {
            var progress = 0;
            var interval = setInterval(function () {
                progress = Math.min(progress + Math.random() * 0.1, 1);
                instance.setProgress(progress);

                if (progress === 1) {
                    instance.stop();
                    clearInterval(interval);
                }
            }, 200);
        }
    });

    $('.money').mask("#.##0", {
        reverse: true
    });

    $('.phone').mask('9999-9999-99999');

    $('.ip-address').mask('999.999.999.999');

    $(".form-check").click(function () {
        var check = $(this).find("input[type='checkbox']:checked").length;
        if (check > 0) {
            $(this).parent().parent().find("select").attr("disabled", false);
            $(this).parent().parent().find("input[type='text']").attr("disabled", false);
            $(this).parent().parent().find("input[type='radio']").attr("disabled", false);
        } else {
            $(this).parent().parent().find("select").attr("disabled", true);
            $(this).parent().parent().find("input[type='text']").attr("disabled", true);
            $(this).parent().parent().find("input[type='radio']").attr("disabled", true);
            $(this).parent().parent().find("input[type='text']").val("");
            $(this).parent().parent().find("select").val("").trigger('change');
        }
    })
});

function filterReset() {
    alert("asdasdas")
    var check = $(".form-check").find("input[type='checkbox']:checked").length;
    if (check > 0) {
        $(".form-check").parent().parent().find("select").attr("disabled", false);
        $(".form-check").parent().parent().find("input[type='text']").attr("disabled", false);
        $(".form-check").parent().parent().find("input[type='radio']").attr("disabled", false);
    } else {
        $(".form-check").parent().parent().find("select").attr("disabled", true);
        $(".form-check").parent().parent().find("input[type='text']").attr("disabled", true);
        $(".form-check").parent().parent().find("input[type='radio']").attr("disabled", true);
        $(this).parent().parent().find("input[type='text']").val("");
        $(this).parent().parent().find("select").val("").trigger('change');
    }
}

String.prototype.firstCapitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

String.prototype.eachUpperCase = function() {
    const words = this.split(" ");
    let wordsResult = "";
    words.forEach((element,index) => {
        if(index == 0){
        wordsResult += element.firstCapitalize();
        }else{
        wordsResult += " "+element.firstCapitalize();
        }
    })
    return wordsResult;
}

function clearRupiah(string) {
    var str = string;
    var res = str.replace(/\./g, "");
    return res;
}

function clearPhone(string) {
    var str = string;
    var res = str.replace(/\-/g, "");
    return res;
}

function rupiah(angka, type = true) {
    var parser = parseInt(angka, 10);
    if (isNaN(parser)) return "NaN";

    var rev = parser.toString().split('').reverse().join('');

    var rev2 = '';
    for (var i = 0; i < rev.length; i++) {
        rev2 += rev[i];
        if ((i + 1) % 3 === 0 && i !== (rev.length - 1))
            rev2 += '.';
    }
    var prefix = (type) ? "Rp" : "";
    return prefix + rev2.split('').reverse().join('');
}

function clearCurrency(money) {
    return money.replace(".", "");
}

function uploadFile(target, data) {
    $.ajax({
        url: target, // point to server-side PHP script 
        dataType: 'JSON',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: data,                         
        type: 'POST',
        beforeSend: function (xhr) {
            beforeRequesting("upload");
        },
        success: function (data) {
            onFinishRequest("upload", data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            onErrorRequest("upload", textStatus);
        },
    })
}

function modalDocument(type, link = "") {
    $("#image-view").empty();
    console.log(link);
    switch (type) {
        case 'image':
            $("#modal-image-view").find("h5.modal-title").html("<i class='fa fa-file' aria-hidden='true'></i> Gambar");
            var url = baseUrl + "panel/" + role + "news/get-image-view?id=" + link;
            var content = "<object data='" + url + "' type='image/jpg' class='w-100' height='480'>"
            content += "<embed src='" + url + "' type='image/jpg' class='w-100' height='380'>"
            content += "</object>";
            $("#image-view").append(content);
            break;

        default:
            break;
    }

    $("#modal-image-view").modal();
}

function formatDateTime(date) {
    return moment(date).format('YYYY-MM-DD h:mm:ss');
}

function formatDateTimeDefaultStart(date) {
    return moment(date).format('YYYY-MM-DD 00:00:00');
}

function formatDateTimeDefaultEnd(date) {
    return moment(date).format('YYYY-MM-DD 23:59:59');
}

function toBadge(type,text,padding,pill=true){
    return `<span class="badge ${pill ? 'badge-pill' : ''} badge-${type}" ${padding}>${text}</span>`
}
toastr.option = {
    closeButton: false,
    debug: false,
    newestOnTop: false,
    progressBar: true,
    positionClass: "toast-bottom-right",
    preventDuplicates: false,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut"
};

$.extend(true, $.fn.dataTable.defaults, {
    language: {
        processing: '<img src="' + baseUrl.replace("/panel", "") + 'images/loading.gif" style="width:100%"> <span style="color:#000000;">Proses</span>',
        searchPlaceholder: 'Cari...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
        lengthMenu: "_MENU_ data",
        info: "Data ke _START_ s/d _END_ dari _TOTAL_ data",
        infoEmpty: "Data tidak ditemukan",
        infoFiltered: "",
        zeroRecords: "Data tidak ditemukan",
        emptyTable: "Data tidak ditemukan",
        paginate: {
            first: "Pertama",
            previous: "<i class='fa fa-angle-left'></i>",
            next: "<i class='fa fa-angle-right'></i>",
            last: "Terakhir"
        },
    },
    processing: true,
    serverSide: true,
    response: true,
    drawCallback: function (settings) {
        $("i.fa-refresh").removeClass("fa-spin");
    },
    lengthMenu: [
        [10, 30, 50, 100, 200, 300, -1],
        [10, 30, 50, 100, 200, 300, "Semua"]
    ],
    order: [0, 'asc'],
    ajax: {
        type: "post",
        data: function (d) {
            var formData = $('#form-filter').serializeArray();
            $.each(formData, function (key, val) {
                d[val.name] = val.value;
            });
        }
    }
});

$.validator.setDefaults({
    errorElement: 'em',
    onfocusout: function (element) { $(element).valid(); },
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        if (element.prop('type') === 'checkbox') { error.insertAfter(element.parent('label')); }
        else { error.insertAfter(element); }
    },
    highlight: function highlight(element) {
        $(element).addClass('is-invalid').removeClass('is-valid');
    },
    unhighlight: function unhighlight(element) {
        $(element).addClass('is-valid').removeClass('is-invalid');
    },
    submitHandler: function (form) {
        var url = $(form).attr("action");
        var data = $(form).serialize();
        var code = $(form).data("code");
        submitData(url, data, code);
        return false;
    }
});

$.validator.addMethod("selectRequired", (value, element, arg) => {
    return arg !== value;
}, "");

function refreshData(datatableObject) {
    try {
        datatableObject.fnDraw();
        $("i.fa-refresh").addClass("fa-spin");
    } catch (err) {
    }
}

function refreshData() {
    try {
        table.fnDraw();
        $("i.fa-refresh").addClass("fa-spin");
    } catch (err) {
    }
}

function showMessage(type, title, body) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    toastr[type](body, title);
}

function submitData(url, submitData, code) {
    $.ajax({
        url: url,
        type: "POST",
        data: submitData,
        dataType: "JSON",
        beforeSend: function (xhr) {
            beforeRequesting(code);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            onErrorRequest(code, textStatus);
        },
        success: function (data) {
            onFinishRequest(code, data);
        }
    })
}

function checkPassword(password, callback) {
    $.ajax({
        url: baseUrl + "panel/" + role + "/web/checkpassword",
        type: "POST",
        data: {
            password: password
        },
        dataType: "json",
        success: function (data) {
            callback(data)
        }
    });
}

function simpleConfirmation(title = "Confirmation", message = "Are you sure?", callback = null) {
    $.confirm({
        title: title,
        content: message,
        buttons: {
            No: {
                btnClass: 'btn-warning text-white',
                action: function () { }
            },
            Yes: {
                btnClass: 'btn-primary',
                action: function () {
                    if (callback != null) {
                        callback()
                    }
                }
            },
        }
    });
}
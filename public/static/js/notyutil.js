function display_noty(text, type) {
    var n = noty({
        text: text,
        type: type,
        dismissQueue: true,
        layout: 'topCenter',
        theme: 'bootstrapTheme',
        timeout: 3000
    });
}

var Info = {
    success: function(msg) {
        display_noty(msg, "success");
    },
    error: function(msg) {
        display_noty(msg, "error");
    },
    alert: function(msg) {
        display_noty(msg, "alert");
    },
    warning: function (msg) {
        display_noty(msg, "warning");
    }
}

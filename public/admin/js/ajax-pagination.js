/**
 * Funcion que pagina los resultado ajax
 * @param {type} url
 * @returns {undefined}
 */
function getresult(url) {
    $.ajax({
        url: url,
        type: "GET",
        beforeSend: function () {
            $("#overlay").show();
        },
        success: function (data) {
            $("#pagination-result").html("");
            $("#pagination-result").html(data);
            setInterval(function () {
                $("#overlay").hide();
            }, 500);
        },
        error: function ()
        {}
    });
}
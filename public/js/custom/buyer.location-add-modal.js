function openModal() {
    $("#add-loc-modal").on("shown.bs.modal", function () {
        google.maps.event.trigger(map, "resize");
    });
    $('#add-loc-modal').modal('show');
}

function submitForm(){
    $.ajax({
        type: "POST",
        url: $("#add_loc_form").attr('action'),
        data: $('#add_loc_form').serialize(),
        success: function (data) {
            $("#add-loc-modal").modal('hide');
            $("#loc-menu").hide().html(data).fadeIn();
        },
        error: function () {
            alert("failure");
        }
    });
    return false;
}
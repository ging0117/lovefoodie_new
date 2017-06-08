function getBidData(wishId) {
    $.ajax({
        cache: false,
        type: 'GET',
        url: "{{url('/seller/bid-modify')}}",
        data: {_token: "{{ csrf_token() }}", view: 'seller.bid-add', wish_id: wishId},
        success: function (data) {
            $('#bid_div').hide().html(data).fadeIn();
            $('#bid-modal').modal('toggle', $(this));
        }
    });
}

function modifyBid() {
    $.ajax({
        type: 'POST',
        url: "{{url('/seller/bid-modify')}}",
        data: $('#modal_form').serialize(),
        success: function (data) {
            $('#data-container').hide().html(data).fadeIn();
        },
        error: function () {
            alert("Problem Occurred!");
        }
    });

    $('#bid-modal').modal('hide');
}

function hideBidModel() {
    $('#bid-modal').modal('hide');
}
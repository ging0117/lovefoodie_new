function showTypeOption() {
    $('#type_option').show();
}

function autoAddress(){
    var input = document.getElementById('location');
    var autocomplete = new google.maps.places.Autocomplete(input);
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            $('#search_latitude').val(place.geometry.location.lat());
            $('#search_longitude').val(place.geometry.location.lng());
        });
}

function setOptions(isLogin) {
    // if this is a logined user, show his/her locations, otherwise, 
    // set google address autocomplete
    if(isLogin){
        $("#location").on("click", function () {
            $("#location_option").show();
        });

        $("#location").on("blur", function () {
            $("#newAddress").on("blur", function () {
                $("#location_option").hide();
            });
            $("#location_option").hide();
        });
    }else{
        google.maps.event.addDomListener(window, 'load', autoAddress);
    }
    
    // show seller/dish options
    $("#type_showoption").on("click", function (e) {
        $("#type_option").show();
        $(document).on("click", function () {
            $("#type_option").hide();
        });
        e.stopPropagation();
    });

    $("#type_option").on("click", function (e) {
        e.stopPropagation();
    });
}

function choose(option) {
    var op = $('#'+option);
    $('#selected_'+op.data('id')).show();
}

function unchoose(option) {
    var op = $('#'+option);
    $('#selected_'+op.data('id')).hide();
}

function pitched(e, optionid) {
    e.preventDefault();
    var opt = $('#'+optionid);
    var $target = $(e.target);
    if ($target.hasClass('close')) {          
        deleteLoc(opt);
    } else {
        $('#location').val(opt.data('address'));
        $('#location_option').hide();
        $('#search_longitude').val(opt.data('longitude'));
        $('#search_latitude').val(opt.data('latitude'));
    }
}

function setOption(option) {
    $('#type_showoption').html(option.id);
    $('#type_option').hide();
    $('#hidden_type').val(option.id);
}

function deleteLoc(optionObj){
    var r = confirm("Are you srue you want to delete address ["+optionObj.data('address')+"] ?");
    if (r == true) {
        $.ajax({
            type: "DELETE",
            url: optionObj.data('deleteurl'),
            data: { _token: optionObj.data('token'), view: 'buyer.location-menu' },
            success: function (data) {
                $("#loc-menu").hide().html(data).fadeIn();
            },
            error: function () {
                alert("failure");
            }
        });
    }
}

var StripeUtil = StripeUtil || (function () {
    var _STRIPE_KEY = ''; // private

    function getBankToken() {
        Stripe.bankAccount.createToken({
            country: 'US',
            currency: 'USD',
            routing_number: $('#routing_number').val(),
            account_number: $('#account_number').val(),
            account_holder_name: $('#account_holder_name').val(),
            account_holder_type: 'individual',
        }, function (status, response) {
            handleResult(response, 'bank_account_token');
        });
    }

    function getFileToken() {
        var data = new FormData();
        var publishableKey = _STRIPE_KEY;
        data.append('file', $('#identity_document')[0].files[0]);
        data.append('purpose', 'identity_document');
        $.ajax({
            url: 'https://uploads.stripe.com/v1/files',
            data: data,
            headers: {'Authorization': 'Bearer ' + publishableKey, },
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
        }).done(function (response) {
            handleResult(response, 'identity_document_token');
        }).fail(function (response) {
            handleResult(response, 'identity_document_token');
        });
    }

    function getPIIToken() {
        Stripe.piiData.createToken({
            personal_id_number: $('#social_security_number').val(),
        }, function (status, response) {
            handleResult(response, 'social_security_number_token');
        });
    }

    function handleResult(response, tokenType) {
        //alert(handleResult + JSON.stringify(response));
        if (response.error) {
            // Show the errors on the form
            alert(response.error.message);
            $('.bank-errors').text(response.error.message);
            $('.bank-errors').addClass('alert alert-danger');
            $('#bank_modal_submit_btn').prop('disabled', false);
            $('#bank_modal_submit_btn').button('reset');
        } else {
            alert(response.id);
            $('#' + tokenType).val(response.id);
            checkSubmitStatus();
        }
    }

    function checkSubmitStatus() {
        if (!$('#bank_account_token').val() || !$('#identity_document_token').val() || !$('#social_security_number_token').val()) {
            return false;
        } else {
            submitModal();
        }
    }

    function submitModal() {
        var frm = $('#bank_form');
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
                alert('success!');
                $('#account-modal').modal('hide');
                $('.modal-backdrop').remove();
            },
            error: function (data) {
                alert('error!' + JSON.stringify(data));
            }
        });
    }

    return {
        init: function (STRIPE_KEY) {
            _STRIPE_KEY = STRIPE_KEY;
        },
        beforeSubmit: function () {
            var $form = $('#bank_form');
            // Before passing data to Stripe, trigger Parsley Client side validation
            $form.parsley().subscribe('parsley:form:validate', function (formInstance) {
                formInstance.submitEvent.preventDefault();
                return false;
            });

            // Disable the submit button to prevent repeated clicks
            $form.find('#bank_modal_submit_btn').prop('disabled', true);

            // Get tokens from stripe 
            if (!$('#bank_account_token').val()) {
                getBankToken();
            }
            if (!$('#identity_document_token').val()) {
                getFileToken();
            }
            if (!$('#social_security_number_token').val()) {
                getPIIToken();
            }

            // Prevent the form from submitting with the default action
            return false;
        }
    };
}());

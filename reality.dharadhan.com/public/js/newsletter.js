/*----------------------------------
//---- NEWSLETTER SUBSCRIPTION ----//
-----------------------------------*/
(function () {

    $('#newsletterForm').on('submit', function(e) {
        e.preventDefault();

        let email = $('#subscribeEmail').val().trim();

        // ======= Email Validation (JavaScript) =======
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (email === "") {
            toastr.error("Email field is required.");
            return;
        }

        if (!emailRegex.test(email)) {
            toastr.error("Please enter a valid email address.");
            return;
        }

        // ======= AJAX Request =======
        $.ajax({
            url: "/newsletter",
            type: "POST",
            data: {
                email: email
            },
            success: function(response) {
                if (response.status === 'exists') {
                    toastr.warning(response.message);   // already subscribed
                } else {
                    toastr.success(response.message);   // successful subscribe
                    $('#newsletterForm')[0].reset();
                }
            },
            error: function(xhr) {
                if (xhr.status === 422) {
                    let error = xhr.responseJSON.errors.email[0];
                    toastr.error(error);
                } else {
                    toastr.error("Something went wrong!");
                }
            }
        });
    });

    // $('.mailchimp').ajaxChimp({
    //     callback: mailchimpCallback,
    //     //replace bellow url with your own mailchimp form post url inside the url: "---".
    //     //to learn how to get your own URL, please check documentation file.
    //     url: ""
    // });

    // function mailchimpCallback(resp) {
    //     if (resp.result === 'success') {
    //         $('.subscription-success').html('<i class="fa fa-check"></i>' + resp.msg).fadeIn(1000);
    //         $('.subscription-error').fadeOut(500);

    //     } else if (resp.result === 'error') {
    //         $('.subscription-error').html('<i class="fa fa-times"></i>' + resp.msg).fadeIn(1000);
    //     }
    // }
}());

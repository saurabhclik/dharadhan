// Show loader
function showLoader() {
    $('#status').fadeIn();
    $('#preloader').delay(200).fadeIn('slow');
}

// Hide loader
function hideLoader() {
    $('#status').fadeOut();
    $('#preloader').delay(200).fadeOut('slow');
}

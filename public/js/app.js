$(document).ready(function () {
    //Gallerei erfassen
    $("#addGallerie").click(function () {
        $(".gallerieForm").removeClass("hidden");
    });
    $("#submitGallerie").click(function () {
        $("#submitGalleriev").addClass("hidden");
    });

    //On hover show hideDelete
    $('.card').hover(function () {
        $('.hideDelete').toggleClass('hideDelete');
    });

});
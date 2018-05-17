$(document).ready(function () {
    //Gallerei erfassen
    $("#addGallerie").click(function () {
        $(".gallerieForm").removeClass("hidden");
    });
    $("#submitGallerie").click(function () {
        $("#submitGalleriev").addClass("hidden");
    });
});
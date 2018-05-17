$(document).ready(function () {
    //Gallerei erfassen
    $("#addGallerie").click(function () {
        $(".gallerieForm").toggle(".hidden");
    });
    $("#submitGallerie").click(function () {
        $("#submitGalleriev").addClass("hidden");
    });
});
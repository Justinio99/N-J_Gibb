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

    //Admin: 
    $('.searchButton').click(function () {
        $('.user-container').addClass('.hidden')
    });


    //Profil Bearbeiten

    $('#changePw').click(function () {
        $('.test').toggleClass('hidden')
    });

    //Bilder vergrössern
    $('.materialboxed').materialbox();

    // Navbar Toggle
    $(document).ready(function () {
        $('.sidenav').sidenav();
    });
});



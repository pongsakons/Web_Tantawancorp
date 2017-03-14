/**
 * Created by Jo-NOTEBOOK on 3/12/2017.
 */

$(document).ready(function () {
    // Function create
    function loadContentPage() {
        $("#div1").load("Map.html");
        $("#script").load("script.html");
        $("#footer").load("footer.html");
    }

    loadContentPage();
    $(".owl-carousel").owlCarousel(
        {
            loop: true,
            singleItem: true,
            pagination: false,
            navigation: true,
        }
    );
});



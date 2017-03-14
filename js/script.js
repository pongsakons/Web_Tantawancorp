/**
 * Created by Jo-NOTEBOOK on 3/12/2017.
 */

$(document).ready(function () {
    // Function create
    function loadPage() {
        $("#div1").load("Map.html");
        $("#script").load("script.html");
        $("#footer").load("footer.html");
        console.log("work")
    }

    loadPage();
    $(".owl-carousel").owlCarousel(
        {
            loop: true,
            singleItem: true,
            pagination: false,
            navigation: true,
        }
    );
});



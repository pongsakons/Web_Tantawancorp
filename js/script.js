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
            navigationText: [
                "<i class='fa fa-angle-left'></i>",
                "<i class='fa fa-angle-right'></i>"
            ],
            autoPlay:true,
            slideSpeed: 1000
        },
        $(function(){
            var owlCarousel = $(".owl-carousel .owl-controls");
            owlCarousel.addClass("col-lg-10 col-lg-offset-1");
        })
    );
});



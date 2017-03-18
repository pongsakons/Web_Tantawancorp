/**
 * Created by Jo-NOTEBOOK on 3/12/2017.
 */
function loadContentPage() {
    $("#div1").load("Map.html");
    $("#script").load("script.html");
    $("#footer").load("footer.html");
    $("#navBar").load("navbar.html");
    $("#myModal").load("modal-img.html");
}
function hamburgerToggle() {
    $(".navbar-toggle").on("click", function () {
        $(this).toggleClass("active");
    });
}
loadContentPage();
$(document).ready(function () {
    $('img').on('click', function () {
        var image = $(this).attr('src');
        //alert(image);
        $('#myModal').on('show.bs.modal', function () {
            $(".showimage").attr("src", image);
        });
    });
    hamburgerToggle();
    //Call slider
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
            autoHeight: true,
            //autoPlay:true,
            slideSpeed: 1000
        },
        $(function () {
            var owlCarousel = $(".owl-carousel .owl-controls");
            owlCarousel.addClass("col-lg-10 col-lg-offset-1 visible-lg-block");
        })
    );

});



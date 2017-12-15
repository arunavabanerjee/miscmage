
<script>
 require(["jquery", "bootstrapJS"], function($){
   $(document).ready(function(){
       $('.carousel').carousel({
          interval: 5000 //changes the speed
       });
   });
 });
</script>






<script>
require(["jquery", "owlCarouselJS"], function($){
    $(document).ready(function() {
      $("#owl-demo").owlCarousel({
        autoPlay: 3000,
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });
      $("#owl-demo2").owlCarousel({
        autoPlay: 3000,
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });
      $("#owl-demo3").owlCarousel({
        autoPlay: 3000,
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });
      $("#owl-demo4").owlCarousel({
        autoPlay: 3000,
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });
      $("#owl-demo5").owlCarousel({
        autoPlay: 3000,
        items : 5,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });
      $("#owl-demo6").owlCarousel({
        autoPlay: 3000,
        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]
      });
   $(document).ready(function(){
      //  $(".categoryButton").click(function(){
      //      $(".categoryMenu").slideToggle("slow");
      //});
        
        $('.searchBtn').click( function() {
        var toggleWidth = $(".topText").width() == 300 ? "0" : "300px";
        $('.topText').animate({ width: toggleWidth });
        });
      });

    });
});
</script>

<!-- grids block 5 -->
<section class="w3l-footer-29-main">
    <div class="footer-29">
        <div class="wrapper">
            <div class="d-grid grid-col-2 bottom-copies">
                <p class="copy-footer-29">&#169; All Rights Reserved to Smelting Afrika Consultants&nbsp; &nbsp; </p>

                <ul class="list-btm-29">
                    <li><a href="{{$facebook}}" target="_blank"> <i class="fab fa-facebook" style="color: #3b5998"></i> FaceBook</a></li>
                    <li><a href="{{$linkedin}}"  target="_blank"> <i class="fab fa-linkedin" style="color: #0077b5"></i> LinkedIn</a></li>
                    <li><a href="https://techgiants.co.ke/" target="_blank">Designed By  TECH GIANTS</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-angle-up"></span>
    </button>
    <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>
    <!-- /move top -->
</section>
<!-- // grids block 5 -->

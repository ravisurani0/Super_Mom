<footer>
    <div class="footer theme-bg">
        
        
        
    </div>
    <div class="copyrights text-center theme-bg">
        <span>&#169;  {{ \Carbon\Carbon::now()->year }} Gopal Snacks Limited. All rights reserved.</span>
    </div>
</footer>


<button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top">
    <i class="fa-solid fa-chevron-up"></i>
</button>
{{-- <script src="{{ asset('front/js/jquery-3.6.3.min.js') }}"></script> --}}
<script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/sweetalert2@11.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/toastr.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/custom.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>
<script src="{{ asset('front/js/addtocart.js') }}"></script>
<script src="{{ asset('front/js/reviewfilter.js') }}"></script>
<!-- scroll to top -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>

    $(document).ready(function() {

        AOS.init({
	        duration: 1200
    //         //     disable: 'mobile',
    //         //     disable: function() {
    //         //     var maxWidth = 767;
    //         //     return window.innerWidth < maxWidth;
    //         //   }
    //             // $aos-distance: 50px;
        });

    });
</script>
<script>
    let mybutton = document.getElementById("btn-back-to-top");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction();
    };
    //add scroll event
    document.querySelectorAll("*").forEach(
        element => element.addEventListener("scroll",
            ({
                target
            }) => scrollFunction()
        )
    );

    function scrollFunction() {

        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    // When the user clicks on the button, scroll to the top of the document
    mybutton.addEventListener("click", backToTop);

    function backToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

</script>

@yield('inline-footer-js')
</body>
<style>
    .theme-bg {
        background-color: var(--theme-yFFEE00) !important;
    }

    #btn-back-to-top {
        position: fixed;
        background-color: var(--txt-b0034AD) !important;
        height: 37px;
        width: 37px;
        bottom: 30px;
        right: 30px;
        display: none;
        border-radius: 100%;
        display: flex !important;
        justify-content: center;
        align-items: center;
    }

    .fa-solid.fa-chevron-up {
        color: #FFEE00 !important;
        font-size: 1.3rem;
    }

    #btn-back-to-top .fa-solid.fa-chevron-up:hover {
        font-size: 1rem;
        transition: 0.3s ease-in;

    }

    .header-cart {
        display: flex;
        align-items: flex-start;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: center;
        margin-right: 20px;
        padding-top: 5px;
        position: relative;
        width: 32px;
        height: auto;
    }

    .header-cart span {
        position: absolute;
        bottom: 25px;
        right: -10px;
        border-radius: 50%;
        background: #E51B21;
        width: 20px;
        height: auto;
        text-align: center;
        font-size: 14px;
        color: #fff;
    }

    .user-name {
        /* text-align: right; */
    }

    .download-btn {
        text-decoration: none;
        font-size: 16px;
        font-weight: 500;
        color: #000000;
    }

    .download-btn:hover {
        color: var(--txt-b0034AD);
        text-decoration-line: underline;
    }
</style>

</html>

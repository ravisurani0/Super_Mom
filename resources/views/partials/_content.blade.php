<!--begin::Entry-->
<div class="d-flex flex-column-fluid">

    <!--begin::Container-->
    {{-- <div class="container"> --}}
    @yield('content')
    {{-- </div> --}}
    <!--end::Container-->
    {{-- <button type="button" class="btn btn-hover-bg-success btn-text-danger btn-hover-text-warning   rounded-circle" id="btn-back-to-top"> --}}
    <button type="button" class="btn btn-light-success  btn-hover-text-warning btn-floating rounded-circle" id="btn-back-to-top">
        <i class="fa fa-arrow-up"></i>
    </button>
</div>
<style>
    #btn-back-to-top {
        position: fixed;
        bottom: 25px;
        right:25px;
        display: none;
        /* height: 30px;
        width: 30px; */
    }
</style>

<script>
    let mybutton = document.getElementById("btn-back-to-top");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction();
    };

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

<!--end::Entry-->

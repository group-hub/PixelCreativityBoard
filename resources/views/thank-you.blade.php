@include ('partials/_head')

<div class="wrapper">

    @include ('partials/_left')

    <div class="right">
        <!--<img src="/images/logo.svg" alt="logo" class="logo animated fadeInDown" />-->
        <div class="main-screen">
            <h5>Thank You! Your pixels have been saved!</h5>
        </div>
        <div class="bottom animated fadeInUp">
            <img src="/images/eap-logo.png" alt="East African Playgrounds" class="eap-logo" />
        </div>
    </div>

</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/jquery.tooltipster.min.js"></script>
<script src="/js/sweetalert.min.js"></script>
<script>
    var selectedUrl = "{{ route('selected') }}";
</script>
<script src="/js/all.js"></script>

@include ('partials/_foot')
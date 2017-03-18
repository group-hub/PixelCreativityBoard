@include ('partials/_head')

<div class="wrapper">

    @include ('partials/_left')

    <div class="right">
        <img src="/images/cs-logo.png" alt="logo" class="logo animated fadeInDown" />
        <div class="main-screen">
            <h5>Thank You! Your pixels have been saved!</h5>
            <a href="https://www.facebook.com/dialog/share?app_id=1135780893118642&href=http%3A%2F%2Fpixtivity.org" target="_blank" class="button facebook">Share on Facebook</a>
            <a href="https://twitter.com/intent/tweet?text=I%27ve%20just%20donated%20money%20and%20created%20art%20for%20charity%20-%20http%3A%2F%2Fpixtivity.org" target="_blank" class="twitter button">Share on Twitter</a>
        </a>
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
@include ('partials/_head')

<noscript>Pixtivity will not work without javascript</noscript>

<div class="wrapper">
    <div class="left animated fadeInLeft">
        <div class="grid">
            <svg>
                @foreach($pixels as $gridRow)
                    @foreach($gridRow as $pixel)
                        <rect x="{{ 1.42857 * $pixel->x }}%" y="{{ 1.25 * $pixel->y }}%" width="1.42857%" height="1.25%"
                              style="fill:@if ($pixel->color != null) {{ $pixel->color }} @else #333 @endif;stroke:#555;stroke-width:1;stroke-opacity:1.0" id="{{ $pixel->x }}x{{ $pixel->y }}"
                              @if ($pixel->color != null) class="disabled" title="{{ $pixel->name }}"@endif
                        />
                    @endforeach
                @endforeach
            </svg>
        </div>
        <div class="creators">
            <p>Created by <a href="#">John Wheal</a>, <a href="#">Ming Wu</a> &amp; <a href="#">Hannah Storey</a></p>
            <p>Supported by <a href="https://www.grouphub.co">Group Hub</a> &amp; <a href="http://www.uu-u.uk">UU-U</a></p>
        </div>
    </div>

    <div class="right">
        <!--<img src="/images/logo.svg" alt="logo" class="logo animated fadeInDown" />-->
        <h2 class="animated fadeInDown">Help Build Playgrounds</h2>
        <h3 class="animated fadeInDown"><span>Create and Donate</span></h3>
        <a href="#" class="button start animated fadeInUp">Start</a>
        <img src="/images/justgiving.png" alt="JustGiving" class="powered-by-just-giving animated fadeInUp" />
        <div class="bottom animated fadeInUp">
            <img src="/images/eap-logo.png" alt="East African Playgrounds" class="eap-logo" />
        </div>
    </div>
</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/jquery.tooltipster.min.js"></script>
<script>
    $(document).ready(function() {
        setTimeout(function() {
            $('.grid rect').tooltipster();
        }, 1500);
    });
</script>

@include ('partials/_foot')
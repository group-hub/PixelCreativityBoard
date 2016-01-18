@include ('partials/_head')

<div class="wrapper">

    <div class="left">
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
        <div class="main-screen">
            <h2 class="animated fadeInDown">Help Build Playgrounds</h2>
            <h3 class="animated fadeInDown"><span>Create and Donate</span></h3>
            <a href="/#select" class="button start animated fadeInUp">Start</a>
            <img src="/images/justgiving.png" alt="JustGiving" class="powered-by-just-giving animated fadeInUp" />
        </div>
        <div class="select-screen" style="display: none">
            <h4>Select Pixels on the Grid</h4>
            <div class="color-selector" style="display: none">
                <select>
                    <option value="#c70101">#c70101</option>
                    <option value="#ff2000">#ff2000</option>
                    <option value="#ff6600">#ff6600</option>
                    <option value="#fffa00">#fffa00</option>
                    <option value="#018400">#018400</option>
                    <option value="#02b801">#02b801</option>
                    <option value="#00d4ff">#00d4ff</option>
                    <option value="#00b2d6">#00b2d6</option>
                    <option value="#0031ff">#0031ff</option>
                    <option value="#a500ef">#a500ef</option>
                    <option value="#f42494">#f42494</option>
                    <option value="#b70063">#b70063</option>
                    <option value="#888888">#888888</option>
                    <option value="#bbbbbb">#bbbbbb</option>
                    <option value="#dddddd">#dddddd</option>
                    <option value="#ffffff">#ffffff</option>
                </select>
            </div>
            <a href="/select" class="button start">Donate &pound;<span id="donation-amount">0.00</span></a>
            <img src="/images/justgiving.png" alt="JustGiving" class="powered-by-just-giving" />
        </div>
        <div class="bottom animated fadeInUp">
            <img src="/images/eap-logo.png" alt="East African Playgrounds" class="eap-logo" />
        </div>
    </div>

</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/jquery.tooltipster.min.js"></script>
<script src="/js/all.js"></script>

@include ('partials/_foot')
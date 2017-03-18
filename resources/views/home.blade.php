@include ('partials/_head')

<div class="wrapper">

    <div class="right">
        <div class="main-screen">
            <div id="image-swap">
                <img src="/images/pixtivity.png" alt="Pixtivity" id="logo-1" class="logo animated fadeInDown" />
            </div>
            <h3 class="animated fadeInDown"><span>Welcome to Pixtivity!</span></h3>
            <p>The online fundraising donation game where you can have fun, creating pixel art and donate to charity!</p>
            <p>This game has been designed to fundraise money by University of Portsmouth students for <a href="http://www.childrenssociety.org.uk/">The Children's Society</a> a UK children's charity. Charity Registration No. 221124</p>
            <a href="/#select" class="button start animated fadeInUp">Start</a>
            <a href="#instructions" class="instructions-button button animated fadeInUp">Instructions</a>
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
            <div class="donate-more"></div>
            <a href="#donate" class="button donate">Donate &pound;<span id="donation-amount">0.00</span></a>
            <div class="anonymous-warning"><strong>Warning:</strong> If you make the donation anonymous, we can't save your pixels :(</div>
            <img src="/images/justgiving.png" alt="JustGiving" class="powered-by-just-giving" />
        </div>
    </div>

    @include ('partials/_left')

</div>

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/jquery.tooltipster.min.js"></script>
<script src="/js/sweetalert.min.js"></script>
<script>
    var selectedUrl = "{{ route('selected') }}";
</script>
<script src="/js/all.js"></script>

@include ('partials/_foot')
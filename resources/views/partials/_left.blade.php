<div class="left">
    @if ($_SERVER['HTTP_USER_AGENT'] != 'Twitterbot' && $_SERVER['HTTP_USER_AGENT'] != 'Googlebot')
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
    @endif
    <div class="bottom">
        <div class="creators">
            <p>Created by <a href="https://uk.linkedin.com/in/johnwheal">John Wheal</a>, <a href="https://www.linkedin.com/in/ming-wu-4ab66931">Ming Wu</a> &amp; <a href="https://www.linkedin.com/in/hannahemilystorey">Hannah Storey</a></p>
            <p>Supported by <a href="https://www.grouphub.co">Group Hub</a> &amp; <a href="http://uu-u.uk">UU-U</a></p>
        </div>
        <img src="/images/logo.png" alt="Pixtivity" />
    </div>
</div>
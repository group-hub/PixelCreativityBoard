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
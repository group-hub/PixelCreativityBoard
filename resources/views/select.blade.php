@include ('partials/_head')
    @include ('partials/_header')

    <div class="container">
        <h1>Selected <span id="selected-pixels">0</span> of <span id="max-pixels">{{ $maxPixels }}</span> pixels</h1>
        <div class="grid">
            <table>
                @foreach($pixels as $gridRow)
                    <tr class="row-{{ $gridRow[0]->y }}">
                        @foreach($gridRow as $pixel)
                            <td id="{{ $pixel->x }}x{{ $pixel->y }}" @if ($pixel->color != null) style="background-color: {{ $pixel->color }}" class="disabled"@endif></td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="color-selector" style="display: none">
            <select>
                <option value="#c70101">#c70101</option>
                <option value="#ff2000">#ff2000</option>
                <option value="#ff6600">#ff6600</option>
                <option value="#fffa00">#fffa00</option>
                <option value="#018400">#018400</option>
                <option value="#02b801">#02b801</option>
                <option value="#769641">#769641</option>
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

        <div class="page-container main-contents fundraiser-container select-fundraiser">
            <h4>Select a Fundraiser</h4>
            <ul>
                <li id="0" class="whole-team selected">
                    <p>Whole Team</p>
                </li>
                @foreach($fundraisers as $fundraiser)
                    <li id="{{ $fundraiser->id }}">
                        <img src="{{ $fundraiser->image }}" alt="{{ $fundraiser->name }}" />
                        <p>{{ $fundraiser->name }}</p>
                    </li>
                @endforeach
            </ul>
            <div class="clear-fix"></div>
        </div>
        <div class="save-button">Save</div>
        @include('partials/instructions')
    </div>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        var saveUrl = "{{ $siteUrl }}/save/{{ $donationId }}";
        var siteUrl = "{{ $siteUrl }}";
    </script>
    <script src="/js/all.js"></script>
    </body>
</html>

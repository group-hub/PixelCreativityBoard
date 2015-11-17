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
                <option value="#ffffff">#ffffff</option>
                <option value="#ac725e">#ac725e</option>
                <option value="#d06b64">#d06b64</option>
                <option value="#f83a22">#f83a22</option>
                <option value="#fa573c">#fa573c</option>
                <option value="#ff7537">#ff7537</option>
                <option value="#ffad46">#ffad46</option>
                <option value="#42d692">#42d692</option>
                <option value="#16a765">#16a765</option>
                <option value="#7bd148">#7bd148</option>
                <option value="#b3dc6c">#b3dc6c</option>
                <option value="#fbe983">#fbe983</option>
                <option value="#fad165">#fad165</option>
                <option value="#92e1c0">#92e1c0</option>
                <option value="#9fe1e7">#9fe1e7</option>
                <option value="#9fc6e7">#9fc6e7</option>
                <option value="#4986e7">#4986e7</option>
                <option value="#9a9cff">#9a9cff</option>
                <option value="#b99aff">#b99aff</option>
                <option value="#c2c2c2">#c2c2c2</option>
                <option value="#cabdbf">#cabdbf</option>
                <option value="#cca6ac">#cca6ac</option>
                <option value="#f691b2">#f691b2</option>
                <option value="#cd74e6">#cd74e6</option>
                <option value="#a47ae2">#a47ae2</option>
            </select>
        </div>

        <div class="page-container main-contents fundraiser-container select-fundraiser">
            <h4>Optionally select a fundraiser</h4>
            <ul>
                <li id="0" class="whole-team selected">
                    <p>Donate to Pixtivity Creators</p>
                </li>
                @foreach($fundraisers as $fundraiser)
                    <li id="{{ $fundraiser->id }}">
                        <img src="https://scontent-lhr3-1.xx.fbcdn.net/hprofile-xta1/v/t1.0-1/p320x320/12116001_890728967641152_4429159945721636821_n.jpg?oh=577d5d19fd841f2c6e53638290da583b&oe=56F92A1F" alt="Name" />
                        <p>{{ $fundraiser->name }}</p>
                    </li>
                @endforeach
            </ul>
            <div class="clear-fix"></div>
        </div>
        <div class="save-button">Save</div>
        <a href="#" class="instructions-button">Instructions</a>
    </div>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>
        var saveUrl = "{{ $siteUrl }}/save/{{ $donationId }}";
        var siteUrl = "{{ $siteUrl }}";
    </script>
    <script src="/js/all.js"></script>
    </body>
</html>

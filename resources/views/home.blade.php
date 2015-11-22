@include ('partials/_head')

    @include ('partials/_header')

    <div class="container">
        <div class="grid">
            <table>
                @foreach($pixels as $gridRow)
                    <tr class="row-{{ $gridRow[0]->y }}">
                        @foreach($gridRow as $pixel)
                            <td id="{{ $pixel->x }}x{{ $pixel->y }}" @if ($pixel->color != null) style="background-color: {{ $pixel->color }}" class="disabled" title="{{ $pixel->name }}"@endif></td>
                        @endforeach
                    </tr>
                @endforeach
            </table>
        </div>
        @include ('partials/_instructions')
        <a href="{{ $justGivingUrl }}" class="donate-button">Donate</a>
        <div class="page-container main-contents">
            <h2>Why did we create Pixtivity?</h2>
            <p>INSERT TEXT ABOUT PROJECT</p>
        </div>
        <div class="page-container main-contents fundraiser-container">
            <h2>University of Portsmouth Team 2015-16</h2>
            <ul>
                @foreach($fundraisers as $fundraiser)
                    <li>
                        <img src="{{ $fundraiser->image }}" alt="{{ $fundraiser->name }}" />
                        <p>{{ $fundraiser->name }}</p>
                    </li>
                @endforeach
            </ul>
            <div class="clear-fix"></div>
        </div>
        <div class="page-container main-contents">
            <h2>About the charity</h2>
            <p>East African Playgrounds aims to enhance the lives of children across Uganda by developing children’s learning opportunities, creativity and environments through building playgrounds and running arts and play sessions. These playgrounds enable the children to make the most of their childhood by developing their social, mental and physical selves through play. We provide arts and play programs to emphasize the importance of play and help the children develop.</p>
            <p>Our objectives are to train young men and women across East Africa to become professional builders and welders; to then use their new skills to build high quality playgrounds across East Africa. In doing this we aim to provide high quality training and employment through our playground building workshops. Uganda has a high youth unemployment rate, with 62% of has one of the world’s youngest population (78% being under 30). By constructing our playgrounds using local material and our teams of locally trained playground builders we are able to increase the impact we have on development in Uganda. The volunteers from our projects aren’t there to replace staff, these volunteers help with the building of the playground but also so we can train and employ more local staff.</p>
        </div>
        <div class="page-container main-contents impact-container">
            <h2>East African Playgrounds impact so far</h2>
            <ul>
                <li>
                    <img src="/images/impact/image3.jpg" alt="" />
                    <p>131000</p>
                    <h3>Children Impacted</h3>
                </li>
                <li>
                    <img src="/images/impact/image1.jpg" alt="" />
                    <p>85</p>
                    <h3>Playgrounds</h3>
                </li>
                <li>
                    <img src="/images/impact/image4.jpg" alt="" />
                    <p>30</p>
                    <h3>Arts and Play</h3>
                </li>
                <li>
                    <img src="/images/impact/image2.jpg" alt="" />
                    <p>25</p>
                    <h3>Ugandans Trained</h3>
                </li>
            </ul>
            <div class="clear-fix"></div>
        </div>
        <div class="page-container main-contents">
            <h2>Team donation target</h2>
            <div class="target">
                <div class="amount-raised" style="width: {{ $percentageRaised }}%"></div>
            </div>
        </div>
        <div class="page-container main-contents">
            <h2>Photo Gallery</h2>
        </div>
        <div class="main-contents footer">
            <footer class="supported-by">
                <h5>Supported by:</h5>
                <a href="http://uu-u.uk/">
                    <img src="/images/uu-u-logo.png" alt="uu-u design" height="50" width="185" />
                </a>
                <a href="https://www.grouphub.co">
                    <img src="/images/group-hub-logo.png" alt="Group Hub - Group Management Platform" height="50" width="204" />
                </a>
            </footer>
            <footer class="created-by">
                <h5>Created by:
                    <a href="https://www.linkedin.com/in/ming-wu-4ab66931">Ming Wu</a> |
                    <a href="https://uk.linkedin.com/in/johnwheal">John Wheal</a> |
                    <a href="#">Hannah Storey</a>
                </h5>
            </footer>
            <footer class="social-media">
                <a href="#">
                    <span class='symbol'>circlefacebook</span>
                </a>
                <a href="#">
                    <span class='symbol'>circletwitterbird</span>
                </a>
                <a href="#">
                    <span class='symbol'>circlerss</span>
                </a>
            </footer>

        </div>
    </div>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="/js/jquery.tooltipster.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.grid td').tooltipster();
        });
    </script>
@include ('partials/_foot')
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
        <a href="{{ $justGivingUrl }}" class="donate-button">Donate<br/><div class="eap-donate">to East African Playgrounds</div></a>
        <img src="/images/justgiving.png" class="justgiving" alt="Just Giving" />
        @include ('partials/_instructions')
        <div class="page-container main-contents">
            <h2>Why did we create Pixtivity?</h2>
            <p>Pixtivity was made by University of Portsmouth students to fundraise for our volunteering trip to Uganda with East African Playground. We are going there to help build a playground and help save silverback gorillas.</p>
            <p>We encourage everyone to get imaginative together to create an ever evolving piece of art and to also have fun.</p>
        </div>
        <div class="page-container main-contents">
            <h2>About <a href="http://www.eastafricanplaygrounds.org/">East African Playgrounds</a></h2>
            <p>East African Playgrounds aims to enhance the lives of children across Uganda by developing children’s learning opportunities, creativity and environments through building playgrounds and running arts and play sessions. These playgrounds enable the children to make the most of their childhood by developing their social, mental and physical selves through play. They provide arts and play programs to emphasize the importance of play and help the children develop.</p>
            <p>Their objectives are to train young men and women across East Africa to become professional builders and welders; to then use their new skills to build high quality playgrounds across East Africa. In doing this they aim to provide high quality training and employment through their playground building workshops.</p>
            <p>Uganda has a high youth unemployment rate, with 62% of has one of the world’s youngest population (78% being under 30). By constructing our playgrounds using local material and their teams of locally trained playground builders they are able to increase the impact we have on development in Uganda. The volunteers from their projects aren’t there to replace staff, these volunteers help build the playgrounds but also so they can train and employ more local staff. </p>
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
            <h2>Donation target</h2>
            <div class="target">
                <div class="amount-raised" style="width: {{ $percentageRaised }}%"></div>
            </div>
        </div>
        <div class="page-container main-contents">
            <div class="picture" itemscope itemtype="http://schema.org/ImageGallery">
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject" id="photo1">
                    <a href="/images/gallery/photo1.jpg" itemprop="contentUrl" data-size="551x960" data-index="0">
                        <img src="/images/gallery/photo1.jpg" height="355" width="190" itemprop="thumbnail" alt="East African Playgrounds">
                    </a>
                </figure>
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                    <a href="/images/gallery/photo2.jpg" itemprop="contentUrl" data-size="960x640" data-index="1">
                        <img src="/images/gallery/photo2.jpg" height="166" width="250" itemprop="thumbnail" alt="">
                    </a>
                </figure>
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                    <a href="/images/gallery/photo3.jpg" itemprop="contentUrl" data-size="960x640" data-index="1">
                        <img src="/images/gallery/photo3.jpg" height="166" width="250" itemprop="thumbnail" alt="">
                    </a>
                </figure>
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                    <a href="/images/gallery/photo4.jpg" itemprop="contentUrl" data-size="960x640" data-index="1">
                        <img src="/images/gallery/photo4.jpg" height="166" width="250" itemprop="thumbnail" alt="">
                    </a>
                </figure>
                <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                    <a href="/images/gallery/photo5.jpg" itemprop="contentUrl" data-size="960x640" data-index="1">
                        <img src="/images/gallery/photo5.jpg" height="166" width="250" itemprop="thumbnail" alt="">
                    </a>
                </figure>
            </div>
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
                    <a href="https://www.linkedin.com/in/hannahemilystorey">Hannah Storey</a>
                </h5>
            </footer>
            <footer class="social-media">
                <a href="https://www.facebook.com/hellopixtivity">
                    <span class='symbol'>circlefacebook</span>
                </a>
                <a href="https://www.twitter.com/HelloPixtivity">
                    <span class='symbol'>circletwitterbird</span>
                </a>
                <a href="https://ugandagorillatrekeap.wordpress.com">
                    <span class='symbol'>circlerss</span>
                </a>
            </footer>

        </div>
    </div>
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="/photoswipe/photoswipe.css">
    <link rel="stylesheet" href="/photoswipe/default-skin/default-skin.css">
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="/photoswipe/photoswipe.min.js"></script>
    <script src="/photoswipe/photoswipe-ui-default.min.js"></script>
    <script src="/js/jquery.tooltipster.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.grid td').tooltipster();

            var $pswp = $('.pswp')[0];
            var image = [];

            $('.picture').each( function() {
                var $pic     = $(this),
                        getItems = function() {
                            var items = [];
                            $pic.find('a').each(function() {
                                var $href   = $(this).attr('href'),
                                        $size   = $(this).data('size').split('x'),
                                        $width  = $size[0],
                                        $height = $size[1];

                                var item = {
                                    src : $href,
                                    w   : $width,
                                    h   : $height
                                }

                                items.push(item);
                            });
                            return items;
                        }

                var items = getItems();

                $.each(items, function(index, value) {
                    image[index]     = new Image();
                    image[index].src = value['src'];
                });

                $pic.on('click', 'figure', function(event) {
                    event.preventDefault();

                    var $index = $(this).index();
                    var options = {
                        index: $index,
                        bgOpacity: 0.7,
                        showHideOpacity: true
                    }

                    var lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                    lightBox.init();
                });
            });
        });
    </script>
@include ('partials/_foot')
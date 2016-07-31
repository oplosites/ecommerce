<footer data-section-name="footer">

    <div class="container-fluid cf-padding">
        <div class="row">
            <div class="col-md-6">
                <div id="slidemenu-right-bottom">
                    <ul class="list-unstyled list-inline lnk-footer line-balk">
                        <li>
                            <a id="followlink" href="#followlink">Follow</a>
                            <div id="lienssmo" style="display: none;">
                                <span>
                                    <a href="https://instagram.com/shopatvelvet" target="_blank">instagram</a>
                                </span>
                              <span>
                                  <a href="http://www.facebook.com/SHOPATVELVET" target="_blank">facebook</a>
                              </span>
                                <span>
                                    <a href="https://twitter.com/SHOPATVELVET" target="_blank">twitter</a>
                                </span>

                            </div>
                        </li>

                        <li>
                            <a id="newsletterlink" href="#nieuwsbrief">Newsletter</a>
                            <div id="nieuwsbrief" style="display: none;">

                                <form id="mc-embedded-subscribe-form" class="form-inline validate" target="_blank" name="mc-embedded-subscribe-form" method="post" action="http://shopatvelvet.us4.list-manage1.com/subscribe/post?u=258a0b1ca488d7b87315ec2ee&id=139537e9d1">
                                    <div class="form-group" style="vertical-align:top;">
                                        <input id="mce-EMAIL" class="email" type="email" style="" placeholder="Email" name="EMAIL" value="" required="required" />
                                        <input id="mc-embedded-subscribe" type="submit" style="" name="subscribe" value="join" />
                                    </div>
                                </form>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="copyright">

                    <ul class="list-unstyled list-inline lnk-footer">

                        <li>
                            &copy; 2016 <a href="https://twitter.com/shopatvelvet" target="_blank">shopatvelvet</a>
                        </li>
                        <li>
                            site by: <a href="http://www.flitts.com/" target="_blank">flitts</a>
                        </li>

                    </ul>

                </div>
            </div>

        </div>
    </div>
</footer>

</div>

<script src="{{ asset('/bundles/bootstrap.js') }}"></script>

<script src="{{ asset('/bundles/modernizr.js') }}"></script>

<script type="text/javascript" src="{{ asset('/Scripts/jquery.fancybox.pack.js') }}"></script>

<script src="{{ asset('/SAV/script.js') }}"></script>

@yield('foot')

<script type="text/javascript">
    AjaxCart.init(false, '.cart-qty', '.wishlist-qty', '#flyout-cart');
</script>

<div class="ajax-loading-block-window" style="display: none;">
    <div class="loading-image">
    </div>
</div>

</body>

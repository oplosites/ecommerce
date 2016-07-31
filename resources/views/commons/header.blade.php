<head>

    <meta name="robots" content="noindex,follow">

    <title>shopatvelvet</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="Author" content="shopatvelvet, flitts">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link href="{{ asset('/Content/bootstrap.css') }}" rel="stylesheet"/>

    <link href="{{ asset('/SAV/css.css') }}" rel="stylesheet"/>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--[if lt IE 10]>
      <style>.transparent { opacity: 1; }</style>
    <![endif]-->

    @yield('head')

    <link rel="stylesheet" href="{{ asset('/Content/fancybox/jquery.fancybox.css') }}" type="text/css" media="screen" />

    <script src="{{ asset('/bundles/jquery.js') }}"></script>

</head>

<body>

    <div id="body-wrapper">

<!--[if lte IE 7]>
    <div style="clear:both;height:59px;text-align:center;position:relative;">
        <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx" target="_blank">
            <img src="{{ asset('/Themes/sav/Content/images/ie_warning.jpg') }}" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
        </a>
    </div>
<![endif]-->

<!--Top balk-->
<div class="navbar navbar-collapse collapse top-balk" role="navigation">
    <div class="container-fluid cf-padding">
        <div class="row">
            <div class="col-xs-12">

                <nav id="top-nav" class="navbar-right">

                    <ul id="tabs" class="nav navbar-nav" role="tablist">
                        <li role="presentation" class="tab-menu eerst tab-toggle">
                            <a data-toggle="tab" href="#search">Search</a>
                        </li>

                        <li role="presentation" class="tab-menu tweede tab-toggle">
                            <a data-toggle="tab" href="#help">Help</a>
                        </li>
                        <li role="presentation" class="tab-menu tab-toggle">
                            <a data-toggle="tab" href="#contact">Contact</a>
                        </li>

                        <li role="presentation" class="tab-menu derde tab-toggle">
                            <a data-toggle="tab" href="#myaccount">My account</a>
                        </li>

                        <li role="presentation" class="tab-menu  laatste tab-toggle">

                                <a href="#bag" data-toggle="tab" data-hover="tab">
                                    <span class="cart-label">Bag:</span><span class="cart-qty">0</span>
                                </a>

                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-container">
                            <div role="tabpanel" id="search" class="tab-pane" style="height:82px">
                                @include('commons.search')
                            </div>

                            <div role="tabpanel" id="help" class="tab-pane" style="height:140px">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#">Order and shipping information</a>

                                    </li>
                                    <li><a href="#">FAQ</a> </li>
                                    <li><a href="#">Conditions of use</a></li>
                                    <li><a href="#">Return policy</a> </li>
                                </ul>
                            </div>
                            <div role="tabpanel" id="contact" class="tab-pane" style="height:120px">
                                <ul class="list-unstyled">
                                    <li><a href="#">Contact customer care</a></li>
                                    <li>Email: <a href="mailto:contact@shopatvelvet.com">contact@shopatvelvet.com</a></li>
                                    <li><a href="#">Jobs</a></li>
                                </ul>
                            </div>

                            <div role="tabpanel" id="myaccount" class="tab-pane" style="height:185px">

                                <ul class="list-unstyled">

                                    <li>
                                        <a class="account" href="#">My account</a>
                                    </li>
                                    <li><a href="#">Orders</a></li>
                                    <li><a href="#">Confirm payment</a></li>

                                </ul>

                                <div class="tab-pane-footer">
                                    <div class="row">
                                        <div class="col-xs-6 text-center">
                                            <h3><a href="#" class="ico-login">Log in</a></h3>
                                        </div>
                                        <div class="col-xs-6 text-center">
                                            <h3><a href="#" class="ico-register">Register</a></h3>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div role="tabpanel" id="bag" class="tab-pane">

<div id="flyout-cart" class="flyout-cart">
    <div class="mini-shopping-cart">

        <div class="count">
You have no items in your shopping cart.        </div>


    </div>
</div>
                            </div>

                        </div>
                    </div>
                </nav>

                <div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="notificationModalLabel">Notification</h4>
                            </div>
                            <div class="modal-body">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end top balk-->

<nav class="navbar navbar-fixed-top top-balk-mobile hidden visible-xs visible-sm" role="navigation">
    <div class="container-fluid cf-padding">
        <table>
            <tr>
                <td class="burger">
                    <a class="cd-nav-trigger">
                    </a>
                </td>
                <td class="logo" style="text-align:center; vertical-align:middle;">
                    <a href="{{ URL::to('demo') }}" class="clean">
                        <img title="shopatvelvet" alt="shopatvelvet" src="{{ asset('/Themes/sav/Content/images/logo.png') }}" class="img-responsive sav-logo center-block" />
                    </a>
                </td>
                <td class="tas">
                    <div class="mini-menu">
                            <a class="ico-cart" href="{{ URL::to('demo') }}"><span id="mCartItemsQty" class="cart-qty"></span></a>
                    </div>
                </td>

            </tr>
        </table>
    </div>
</nav>

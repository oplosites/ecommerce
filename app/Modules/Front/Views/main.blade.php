<!DOCTYPE html>
<html lang="en">

    @include('Products::commons.header')

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                @include('Products::commons.sidebar')

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>{{ isset($pageTitle) != null ? $pageTitle : config('app.app_name') }}</h3>
                            </div>

                            @include('Products::commons.search')

                        </div>

                        <div class="clearfix"></div>

                        @include ('Products::commons.notifications')

                        @yield('content')

                    </div>
                </div>
            </div>
        </div>

        @include('Products::commons.footer')

    </body>
</html>

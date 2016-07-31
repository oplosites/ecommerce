<!DOCTYPE html>
<html lang="en">

    @include('admin.commons.header')

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">

                @include('admin.commons.sidebar')

                <!-- page content -->
                <div class="right_col" role="main">
                    <div class="">
                        <div class="page-title">
                            <div class="title_left">
                                <h3>{{ isset($pageTitle) != null ? $pageTitle : config('app.app_name') }}</h3>
                            </div>

                            @include('admin.commons.search')

                        </div>

                        <div class="clearfix"></div>

                        @include ('admin.commons.notifications')

                        @yield('content')

                    </div>
                </div>
            </div>
        </div>

        @include('admin.commons.footer')

    </body>
</html>

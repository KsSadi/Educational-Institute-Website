<!DOCTYPE html>
<html class="loading" lang="en">
<!-- BEGIN: Head -->

<head>
    @include('frontend.theme1.layouts.partials.styles')
</head>
<!-- END: Head -->
<body>
    <!-- BEGIN: Top Bar -->
         @include('frontend.theme1.layouts.partials.topbar')
    <!-- END: Top Bar -->
    <!-- BEGIN: Side Menu -->
    <!-- END: Side Menu -->
<!-- BEGIN: Content-->

                @yield('frontend-section')



        <!-- END: Content -->

    @include('frontend.theme1.layouts.partials.footer')
    <!-- BEGIN: JS Assets-->
    @include('frontend.theme1.layouts.partials.scripts')
    <!-- END: JS Assets-->

    </body>
</html>

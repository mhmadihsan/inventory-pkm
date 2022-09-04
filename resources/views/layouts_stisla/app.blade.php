<!DOCTYPE html>
<html lang="en">

@include('layouts_stisla.head')

<body>
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>

        @include('layouts_stisla.navbar')

        @include('layouts_stisla.leftbar')
        <!-- Main Content -->
        <div class="main-content">
            @yield('content_main')
{{--            <section class="section">--}}
{{--                <div class="section-header">--}}
{{--                    <h1>Blank Page</h1>--}}
{{--                </div>--}}

{{--                <div class="section-body">--}}
{{--                </div>--}}
{{--            </section>--}}
        </div>

        @include('layouts_stisla.footer')
    </div>
</div>

@include('layouts_stisla.js')
</body>
</html>

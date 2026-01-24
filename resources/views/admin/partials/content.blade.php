<div class="container-fluid">
    <div class="row min-vh-100">

        @include('admin.partials.sidebar')

        <!-- MAIN CONTENT -->
        <div class="col-md-10 p-4">

            <h3 class="mb-4">@yield('header')</h3>

            @yield('content')

        </div>
    </div>
</div>

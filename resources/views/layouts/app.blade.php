<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.partials.link')
</head>
<body data-sidebar="dark">
    
    {{-- Begin Wrapper --}}
    <div id="layout-wrapper">
        @include('layouts.partials.header')

        {{-- ========== LEFT SIDE BAR ========== --}}
            @include('layouts.partials.sidebar')
        {{-- ========== END LEFT SIDE BAR ========== --}}

        {{-- ========== CONTENT ========== --}}
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">
                    {{-- Page Title --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">@yield('title-page')</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Utility</a></li>
                                        <li class="breadcrumb-item active">Starter Page</li>
                                    </ol>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    {{-- End Page Title --}}

                    {{-- CONTENT PAGE --}}
                    @yield('content')
                    {{-- END CONTENT PAGE --}}
                </div>
            </div>
            @include('layouts.partials.footer')
        </div>
        {{-- ========== END CONTENT ========== --}}
    </div>
    {{-- End Wrapper --}}
    @include('layouts.partials.script')
    @yield('script')
</body>
</html>
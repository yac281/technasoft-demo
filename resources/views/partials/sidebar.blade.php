<div class="navbar navbar-expand-lg p-0 bg-transparent">
    <button id="menu-toggle" class="custom-navbar-toggler rounded-circle btn-primary" type="button"
            aria-controls="main-nav" aria-expanded="false" aria-label="Apri menu" title="Apri menu" data-target="#main-nav">
        <svg class="icon">
            <use xlink:href="{{asset('svg/sprite.svg#it-burger')}}"></use>
        </svg>
    </button>
    <button id="menu-close" class="custom-navbar-toggler rounded-circle btn-white" type="button" style="display: none" aria-label="Chiudi menu" title="Chiudi menu">
        <svg class="icon icon-primary">
            <use xlink:href="{{asset('svg/sprite.svg#it-close-big')}}"></use>
        </svg>
    </button>
    <nav id="main-nav" class="navbar-collapsable position-fixed z-100">
        <div class="overlay"></div>
        <div class="sidebar-wrapper menu-wrapper theme-dark pt-0 w-100">
            <div class="sidebar-linklist-wrapper">
                <div class="link-list-wrapper">
                    <ul id="tablist" class="link-list mb-0 py-2" role="tablist">
                        <li>
                            <a class="list-item left-icon py-3 py-lg-2 px-3 "
                               href="{{route('points.index')}}">
                                <span>Point</span>
                            </a>
                        </li>
                        <li>
                            <a class="list-item left-icon py-3 py-lg-2 px-3 "
                               href="{{route('services.index')}}">
                                <span>Servizi</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
@push('script')
    <script>
        $('#menu-toggle').on('click', function (){
            $('#menu-close').show();
        });
        $('#menu-close').on('click', function (){
            $('.overlay').trigger('click');
            $(this).hide();
        });
    </script>
@endpush

<div class="dropdown">
    <button type="button"
            class="btn btn-xs btn-icon btn-icon-only btn-nofocus dropdown-toggle ml-auto"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="sr-only">{{__('messages.tools')}}</span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-option" viewBox="0 0 16 16">
            <path d="M1 2.5a.5.5 0 0 1 .5-.5h3.797a.5.5 0 0 1 .439.26L11 13h3.5a.5.5 0 0 1 0 1h-3.797a.5.5 0 0 1-.439-.26L5 3H1.5a.5.5 0 0 1-.5-.5zm10 0a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5z"/>
          </svg>
    </button>
    <div class="dropdown-menu dropdown-menu-right dropdown-tool rounded shadow-y0">
        <div class="link-list-wrapper">
            <ul class="link-list">

                        <li class="left-icon">
                            <a href="{{ route( 'services.edit', [ 'service' => $id ] ) }}"
                                class="list-item left-icon">

                                <span>Modifica</span>
                            </a>
                        </li>

                        <li class="left-icon">
                            <a href="{{ route( 'services.associate', [ 'service' => $id ] ) }}"
                                class="list-item left-icon">

                                <span>Prezzi associati al Point</span>
                            </a>
                        </li>

            </ul>
        </div>
    </div>
</div>

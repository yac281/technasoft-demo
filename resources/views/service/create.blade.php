@extends('partials.layout')
@section('title', 'Nuovo servizio')
@section('page-title', 'Nuovo servizio')

@section('content')
    <!-- Side Bar principale -->
    @include('partials.sidebar')
    <!-- Content -->
    <section id="page-content" class="col px-0 pb-5 mb-5 pb-lg-4 mb-lg-0">
        <!-- include toolbar -->
        <div class="px-3">
        </div>
        <div class="px-3">
            <section class="card no-after shadow-y0 bg-white rounded">
                <div class="card-header rounded-top border-0 px-4 py-0 d-flex">
                    <header class="d-flex align-items-center">
                        <h2 class="card-title mb-0 text-primary text-truncate">Inserisci dati</h2>
                    </header>
                </div>
                <div class="card-body">
                    {!! Form::open(['route'=>'services.store', 'method'=>'POST', 'class'=>'', 'id'=>'create-item']) !!}
                    <div class="form-row">
                        <div class="form-group form-boxed col-md-6">
                            {!! Form::label('service_name', 'Nome '.'<b class="text-danger">* <span class="sr-only">'.__('forms.required').'</span></b>','', false) !!}
                            {!! Form::text('service_name', old('service_name'), ['class' => 'form-control form-control-sm ']) !!}
                        </div>
                        <div class="form-group form-boxed col-md-6">
                            {!! Form::label('service_desc', 'Descrizione '.'<b class="text-danger">* <span class="sr-only">'.__('forms.required').'</span></b>','', false) !!}
                            {!! Form::text('service_desc', old('service_desc'), ['class' => 'form-control form-control-sm ']) !!}
                        </div>
                    </div>

                    <small class="form-text text-muted"><span class="text-danger">*</span>{{__('messages.required')}}</small>
                    <hr class="form-divider">
                    <div class="form-row">
                        <div class="form-group col-auto mb-0">
                            <a href="{{route('services.index')}}"
                               class="btn btn-sm btn-icon btn-outline-secondary px-3" title="Indietro">

                                <span class="d-none d-md-inline">Indietro</span>
                            </a>
                        </div>
                        <div class="form-group col-auto mb-0 ml-auto">
                            <button class="btn btn-sm btn-icon btn-secondary px-3 ml-auto" type="reset" title="Reset">
                                <span class="d-none d-md-inline">Reset</span>

                            </button>
                            <button type="submit" class="btn btn-sm btn-icon btn-success px-3 ml-2 button_send" title="Salva">
                                <span class="d-none d-md-inline">Salva</span>

                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </section>
        </div>
    </section>
@endsection
{{-- Extra CSS File --}}
@push('css')
<style type="text/css">
    .hidden{
        display: none;
    }
    .upperCase{
        text-transform: uppercase;
    }
</style>
@endpush
{{-- Extra JS File --}}
@push('script')
@endpush

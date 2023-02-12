@extends('partials.layout')
@section('title', 'Associa servizi al point: '.$point->point_name)
@section('page-title', 'Associa servizi al point: '.$point->point_name)

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
                        <h2 class="card-title mb-0 text-primary text-truncate">Associa al Point "{{$point->point_name}}" uno o più servizi disponibili</h2>
                    </header>
                </div>
                <div class="card-body">
                    {!! Form::open(['route'=>['points.association', $point->id], 'method'=>'POST', 'class'=>'', 'id'=>'create-item']) !!}
                    <div class="form-group form-boxed col-md-6 mb-md-3">
                        <div class="bootstrap-select-wrapper">
                            {!! Form::label('services_id', 'Servizi '.'<b class="text-danger">* <span class="sr-only">'.__('forms.required').'</span></b>','', false) !!}
                            {!! Form::select("services_id[]", \App\Models\Service::pluck('service_name','id')->toArray(), old('services_id[]',$services), ["multiple","class"=>"sec_id form-control ","data-live-search"=>"true", "title"=>_('forms.select'), "data-live-search-placeholder"=>ucfirst(_('forms.search'))]) !!}
                        </div>
                    </div>

                    <small class="form-text text-muted"><span class="text-danger">*</span>{{__('messages.required')}}</small>
                    <hr class="form-divider">
                    <div class="form-row">
                        <div class="form-group col-auto mb-0">
                            <a href="{{route('points.index')}}"
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

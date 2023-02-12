@extends('partials.layout')
@section('title', 'Associa prezzi e point al servizio: '.$service->service_name)
@section('page-title', 'Associa prezzi e point al servizio: '.$service->service_name)

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
                        <h2 class="card-title mb-0 text-primary text-truncate">Associa al Servizio "{{$service->service_name}}" un prezzo per uno o più Point disponibili</h2>
                    </header>
                </div>
                <div class="card-body">
                    {!! Form::open(['route'=>['services.association', $service->id], 'method'=>'POST', 'class'=>'', 'id'=>'create-item']) !!}

                    @foreach($points as $key => $point)
                    <div class="form-row">
                        <div class="form-group form-boxed col-md-6 mb-md-3 mt-4">
                            <div class="bootstrap-select-wrapper">
                                {!! Form::label("point_id_".$point, 'Point '.'<b class="text-danger">* <span class="sr-only">'.__('forms.required').'</span></b>','', false) !!}
                                {!! Form::select("point_id_".$point, \App\Models\Point::pluck('point_name','id')->toArray(), old("point_id_".$point,$point), ["class"=>"sec_id form-control ","data-live-search"=>"true", "title"=>_('forms.select'), "data-live-search-placeholder"=>ucfirst(_('forms.search'))]) !!}
                            </div>
                        </div>
                        <div class="form-group form-boxed col-md-6 mb-md-3 mt-4">
                            {!! Form::label('price_'.$point, 'Prezzo '.'<b class="text-danger">* <span class="sr-only">'.__('forms.required').'</span></b>','', false) !!}
                            <input type="number" class="form-control form-control-sm" name="price_{{$point}}" id="price_{{$point}}" value="{{$prices->where('point_id',$point)->first()->price}}">
                        </div>
                    </div>
                    @endforeach


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

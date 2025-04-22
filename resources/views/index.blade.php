@extends('layouts.master')

@section('content')

{{-- @dd($treni) --}}
    <div class="container mt-4">
        <h1 class="text-center mb-4">Treni in Partenza</h1>

        @if($treni->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                Nessun treno in partenza oggi o nei prossimi giorni.
            </div>
        @else
            <div class="row">
                @foreach($treni as $treno)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <strong>{{ $treno->azienda }}</strong> - {{ $treno->codice_treno }}
                            </div>
                            <div class="card-body">
                                <p><strong>Partenza:</strong> {{ $treno->stazione_partenza }} - {{ $treno->orario_partenza }}</p>
                                <p><strong>Arrivo:</strong> {{ $treno->stazione_arrivo }} - {{ $treno->orario_arrivo }}</p>
                                <p><strong>Data Partenza:</strong> {{ \Carbon\Carbon::parse($treno->data_partenza)->format('d/m/Y') }}</p>
                                <p><strong>Totale Carrozze:</strong> {{ $treno->carrozze_totali }}</p>
                                <p><strong>Status:</strong>
                                    @if($treno->in_orario)
                                        <span class="badge bg-success">In Orario</span>
                                    @else
                                        <span class="badge bg-danger">In Ritardo</span>
                                    @endif
                                </p>
                                <p><strong>Annullato:</strong>
                                    @if($treno->cancellato)
                                        <span class="badge bg-dark">Cancellato</span>
                                    @else
                                        <span class="badge bg-info">Attivo</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

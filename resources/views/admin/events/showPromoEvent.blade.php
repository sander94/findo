@extends('layouts.app')

@section('content')
<style>
.form-control { display: table; border: 0; margin-bottom: 5px; }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Üritus: {{ $event->title }}</strong></div>

                <div class="card-body">
                    
                    <form action="{{ route('events.store') }}" method=post autocomplete="off">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Üritus</label>
                            <div class="col-md-6">
                               <p class="form-control">{{ $event->title }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Kirjeldus</label>
                            <div class="col-md-6">
                                <p class="form-control">{!! nl2br($event->description) !!}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Toimumise kuupäev</label>
                            <div class="col-md-6">
                                <p class="form-control">{{ $event->date }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Toimumise kell</label>
                            <div class="col-md-6">
                                <p class="form-control">{{ $event->time }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Asukoht</label>
                            <div class="col-md-6">
                                <p class="form-control">{{ $event->location }} </p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Pileti hind</label>
                            <div class="col-md-6">
                               <p class="form-control">{{ $event->ticket_price }} €</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">Sissepääsu ja piletite lisainfo</label>
                            <div class="col-md-6">
                               <p class="form-control">{!! nl2br($event->additional_info) !!}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="organizator" class="col-md-4 col-form-label text-md-right">Organisaator</label>
                            <div class="col-md-6">
                                <p class="form-control">{{ $event->organizator }}</p>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Pilt</label>
                            <div class="col-md-6">
                                <p class="form-control"><img src="{{ asset('images/events/thumb/'.$event->image.'') }}"></p>
                            </div>
                        </div>






                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $( "#date" ).datepicker({
            beforeShowDay: '',
            dateFormat: 'dd.mm.yy'
        });
    });
</script>  

@endsection
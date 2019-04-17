@extends ('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2 style="display: inline-block;"><strong>Üritused</strong></h2><a href="/admin/events/create" class="btn btn-success" style="float: right;"><strong style="font-size: 26px; line-height: 26px;">+</strong></a></div>

                <div class="card-body">
                	
                	

           

                    <style>
                    .thingstable { width: 100%; }
                    .thingstable tr td.regular { padding: 4px 15px; }
                    </style>
                   
                   <table cellpadding=0 cellspacing=0 class="thingstable">

                    <tr style="background-color: #dadada; height: 40px;">
                        <td class="text-center">
                            <i class="fas fa-star" style="font-size: 12px;"> </i>
                        </td>

                        <td class="text-center">
                            <i class="fas fa-check" style="font-size: 12px;"> </i>
                        </td>

                        <td class="regular">
                            <strong>Ürituse nimi</strong>
                        </td>


                        <td class="regular">
                            <strong>Toimumisaeg</strong>
                        </td>

                        <td class="regular">
                            <strong>Pilet</strong>
                        </td>

                        <td class="regular">
                            <strong>Halda</strong>
                        </td>

					@foreach($events as $event)
						<tr style="border-top: 1px solid #eaeaea;">
                            <td class="text-center">
                                
                                    @if($event->is_promoted == '1')
                                        <i class="fas fa-star" style="color: gold;"> </i>
                                    @endif
                                
                            </td>

                            <td class="text-center">
                                
                                    @if($event->is_active == '1')
                                        <i class="fas fa-check" style="color: green;"> </i>
                                    @endif
                                
                            </td>

                            <td class="regular">
                                <a href="/event/{{ $event->id }}" target="_blank">{{ $event->title }}</a>
                            </td>

                            <td class="regular">
                                {{ $event->date }},  {{ $event->time }}
                            </td>


                            <td class="regular">
                                {{ $event->ticket_price }} €
                            </td>

                            <td class="regular">
                                <a href="/admin/events/{{ $event->id }}/edit" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"> </i></a>
                            </td>
                        </tr>
					@endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
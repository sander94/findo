@extends ('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Promoüritused slaideril</strong></div>

                <div class="card-body">
                	
                	<a href="/admin/promo-events/create">Lisa uus promoüritus</a>

                	<hr>

                   <table>

					@foreach($events as $event)
						<tr>
                            <td>
                                <a href="/admin/promo-events/{{ $event->id }}">{{ $event->title }}</a>
                            </td>
                            <td>
                                <a href="/admin/promo-events/{{ $event->id }}" class="btn btn-success">Vaata</a>
                            </td>
                            <td>
                                <a href="/admin/promo-events/{{ $event->id }}/edit" class="btn btn-success">Muuda</a>
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
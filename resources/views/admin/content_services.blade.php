<div style="margin:0 50px;">

    @if($services)
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№ п/п</th>
                <th>Ім'я</th>                
                <th>Текст</th>
                <th>Іконка</th>
                <th>Дата створення</th>
                <th>Видалити</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $k => $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{!! Html::link(route('servicesEdit', ['service' => $service->id]), $service->name, ['alt' => $service->name]) !!}</td>                
                <td>{{ $service->text }}</td>
                <td>
                    <span><i class="{{ $service->icon }}"></i></span>
                </td>
                <td>{{ $service->created_at }}</td>
                <td>
                    {!! Form::open(['url' => route('servicesEdit', ['service' => $service->id]), 'class' => 'form-horizontal', 'method' => 'POST']) !!}
                        <!-- {!! Form::hidden('_method', 'delete') !!} теж саме внизу-->
                        {{ method_field('DELETE')}}
                        {!! Form::button('Delete', [
                                                        'class' => 'btn btn-danger',
                                                        'type' => 'submit'
                                                    ]) !!}
                    {!! Form::close() !!}
                </td>                
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

{!! Html::link(route('servicesAdd'), 'New service') !!}  
</div>
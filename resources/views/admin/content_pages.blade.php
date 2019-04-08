<div style="margin:0 50px;">

    @if($pages)
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№ п/п</th>
                <th>Ім'я</th>
                <th>Псевдонім</th>
                <th>Текст</th>
                <th>Дата створення</th>
                <th>Видалити</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pages as $k => $page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>{!! Html::link(route('pagesEdit', ['page' => $page->id]), $page->name, ['alt' => $page->name]) !!}</td>
                <td>{{ $page->alias }}</td>
                <td>{{ $page->text }}</td>
                <td>{{ $page->created_at }}</td>
                <td>
                    {!! Form::open(['url' => route('pagesEdit', ['page' => $page->id]), 'class' => 'form-horizontal', 'method' => 'POST']) !!}
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

{!! Html::link(route('pagesAdd'), 'New page') !!}  
</div>
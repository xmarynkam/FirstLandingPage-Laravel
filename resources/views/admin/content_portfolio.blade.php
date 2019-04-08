<div style="margin:0 50px;">

    @if($portfolios)
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>№ п/п</th>
                <th>Ім'я</th>
                <th>Зображення</th>
                <th>Фільтер</th>
                <th>Дата створення</th>
                <th>Видалити</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portfolios as $k => $portfolio)
            <tr>
                <td>{{ $portfolio->id }}</td>
                <td>{!! Html::link(route('portfolioEdit', ['portfolio' => $portfolio->id]), $portfolio->name, ['alt' => $portfolio->name]) !!}</td>
                


                <td>
                    {!! Html::image('assets/img/'.$portfolio['images'], '', [
                                                                        'class' => 'img-responsive',
                                                                        'width' => '150px'
                                                                    ])!!}
                </td>
                <td>{{ $portfolio->filter }}</td>
                <td>{{ $portfolio->created_at }}</td>
                <td>
                    {!! Form::open(['url' => route('portfolioEdit', ['portfolio' => $portfolio->id]), 'class' => 'form-horizontal', 'method' => 'POST']) !!}
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

{!! Html::link(route('portfolioAdd'), 'New portfolio') !!}
</div>
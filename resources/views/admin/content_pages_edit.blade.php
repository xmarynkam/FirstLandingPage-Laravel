<div class="wrapper container-fluid">
    {!! Form::open(['url' => route('pagesEdit', array('page' => $data['id'])), 'class' => 'form-horizontal', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        
        <!-- Item group form -->
        <div class="form-group">
            {!! Form::hidden('id', $data['id']) !!}
            {!! Form::label('name', 'Name:', [
                                                'class' => 'col-xs-2 control-label'
                                            ]) !!}
            <div class="col-xs-8">
                {!! Form::text('name', $data['name'], [
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Enter page name'
                                                    ]) !!}
            </div>
        </div>
        <!-- /Item group form -->

        <!-- Item group form -->
        <div class="form-group">
            {!! Form::label('alias', 'Alias:', [
                                                'class' => 'col-xs-2 control-label'
                                            ]) !!}
            <div class="col-xs-8">
                {!! Form::text('alias', $data['alias'], [
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Enter page alias'
                                                    ]) !!}
            </div>
        </div>
        <!-- /Item group form -->

        <!-- Item group form -->
        <div class="form-group">
            {!! Form::label('text', 'Text:', [
                                                'class' => 'col-xs-2 control-label'
                                            ]) !!}
            <div class="col-xs-8">
                {!! Form::textarea('text', $data['text'], [
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Enter page text',
                                                        'id' => 'editor'
                                                    ]) !!}
            </div>
        </div>
        <!-- /Item group form -->

        <!-- Item group form -->
        <div class="form-group">
            {!! Form::label('old_images', 'Image:', [
                                                'class' => 'col-xs-2 control-label'
                                            ]) !!}
            <div class="col-xs-offset-2 col-xs-10">
                {!! Html::image('assets/img/'.$data['images'], '', [
                                                                        'class' => 'img-responsive',
                                                                        'width' => '250px'
                                                                    ])!!}
                {!! Form::hidden('old_images', $data['images']) !!}
            </div>
        </div>

        <!-- Item group form -->
        <div class="form-group">
            {!! Form::label('images', 'Image:', [
                                                'class' => 'col-xs-2 control-label'
                                            ]) !!}
            <div class="col-xs-8">
                {!! Form::file('images', [
                                            'class' => 'filestyle',
                                            'data-buttonText' => 'Choise page images',
                                            'data-buttonName' => 'btn-primary',
                                            'data-buttonText' => "This file isn't!",
                                        ]) !!}
            </div>
        </div>
        <!-- /Item group form -->

        <!-- Item group form -->
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                {!! Form::button('Save', [
                                            'class' => 'btn btn-primary',
                                            'type' => 'submit'
                                        ]) !!}
            </div>
        </div>
        <!-- /Item group form -->        
    {!! Form::close() !!}

    
</div>


<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'editor' );
</script>
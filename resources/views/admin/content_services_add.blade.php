<div class="wrapper container-fluid">
    {!! Form::open(['url' => route('servicesAdd'), 'class' => 'form-horizontal', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

        <!-- Item group form -->
        <div class="form-group">
            {!! Form::label('name', 'Name:', [
                                                'class' => 'col-xs-2 control-label'
                                            ]) !!}
            <div class="col-xs-8">
                {!! Form::text('name', old('name'), [
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Enter service name'
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
                {!! Form::textarea('text', old('text'), [
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Enter service text',
                                                        'id' => 'editor'
                                                    ]) !!}
            </div>
        </div>
        <!-- /Item group form -->

        <!-- Item group form -->
        <div class="form-group">
            {!! Form::label('icon', 'Icon:', [
                                                'class' => 'col-xs-2 control-label'
                                            ]) !!}
            <div class="col-xs-8">
                {!! Form::text('icon', old('icon'), [
                                                        'class' => 'form-control',
                                                        'placeholder' => 'Enter service fa-icon'
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
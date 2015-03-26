@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Code Stylus Guide</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'guide.store']) !!}

                            <div class="form-group">
                                {!! Form::label('subdomain', 'Subdomain (example laravel.codestyl.us)') !!}
                                {!! Form::text('subdomain', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('title', 'Title') !!}
                                {!! Form::text('title', null, ['class'=>'form-control']) !!}
                            </div>

                            {!! Form::label('content', 'Guide Markdown') !!}
                            <div id="epiceditor"></div>
                            <textarea name="content" id="content" style="display: none;">TEST</textarea>

                            {!! Form::submit('Create Guide', ['class'=>'btn btn-primary', 'id'=>'submit-guide']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
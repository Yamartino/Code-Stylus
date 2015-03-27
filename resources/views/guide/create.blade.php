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
                                {!! Form::label('slug', 'Slug (example codestyl.us/slug-title)') !!}
                                {!! $errors->first('slug','<div class="error">:message</div>') !!}
                                {!! Form::text('slug', null, ['class'=>'form-control']) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('title', 'Title') !!}
                                {!! $errors->first('title','<div class="error">:message</div>') !!}
                                {!! Form::text('title', null, ['class'=>'form-control']) !!}
                            </div>

                            {!! Form::label('content', 'Guide Markdown') !!}
                            {!! $errors->first('content','<div class="error">:message</div>') !!}
                            <div id="epiceditor"></div>
                            <textarea name="content" id="content" style="display: none;">@include('guide.create-content')</textarea>
                            <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="new">Markdown Cheatsheet</a>
                            <br>
                            *syntax highlighting does not show up in the preview mode on this page
                            <br><br>

                            <div class="form-group">
                                {!! Form::checkbox('private', '1') !!}
                                &nbsp;&nbsp;
                                {!! Form::label('private', 'Make Guide Private?') !!}
                            </div>

                            {!! Form::submit('Create Guide', ['class'=>'btn btn-primary', 'id'=>'submit-guide']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
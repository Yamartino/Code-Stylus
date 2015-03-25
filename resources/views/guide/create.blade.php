@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">
                        {!! Form::open(['route' => 'guide.store']) !!}

                        {!! Form::label('title', 'Title of ') !!}
                        http://approckt.com/share/{!! Form::text('name') !!}
                        <br>
                        {!! Form::label('description', 'App Store Link') !!}
                        {!! Form::text('url') !!}

                        {!! Form::label('example', 'App Store Link') !!}
                        {!! Form::text('url') !!}

                        {!! Form::submit('Send') !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><a href="/guides">&lt;&nbsp;back</a>&nbsp;&nbsp;|&nbsp;&nbsp;Give Users View Access</div>

                    <div class="panel-body">
                        <table class="table">
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        <a href="/guides/{{ $slug }}/privacy/{{ $user->username }}"><i class="fa fa-times-circle"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! Form::open(['url' => "guides/$slug/privacy", 'method' => 'post']) !!}

                        <div class="form-group">
                            {!! Form::label('username', 'GitHub Username') !!}
                            {!! $errors->first('username','<div class="error">:message</div>') !!}
                            {!! Form::text('username', null, ['class'=>'form-control']) !!}
                        </div>

                        {!! Form::submit('Add User', ['class'=>'btn btn-primary', 'id'=>'submit-guide']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Create Code Stylus Guide</div>

                    <div class="panel-body">
                        <a href="{{ route('guide.create') }}" class="btn btn-primary">Create New</a>
                        <table class="table">
                        @foreach($guides as $guide)
                            <tr>
                                <td>
                                    {!! $guide->private ? '<i class="fa fa-lock"></i>' : '<i class="fa fa-unlock"></i>' !!}
                                    {{ $guide->title }}
                                </td>
                                <td><a href="/{{ $guide->slug }}">View</a></td>
                                <td>Edit</td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
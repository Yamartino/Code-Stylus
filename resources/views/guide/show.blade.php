@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul>
                    @foreach($index as $each)
                        <li><a href="#{{ $each['id'] }}">{{ $each['title'] }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-9">

                <span class="title">{{ $title }}</span>
                <section>
                    {!! $content !!}
                </section>
            </div>
        </div>
    </div>
@endsection
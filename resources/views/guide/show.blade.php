@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="guide-affix visible-md-block visible-lg-block">
                    <h3>Style Guide</h3>
                    <ul>
                        @foreach($index as $each)
                            <li><a href="#{{ $each['id'] }}">{{ $each['title'] }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9 guide-content">

                <span class="title">{{ $title }}</span>
                <section>
                    {!! $content !!}
                </section>
            </div>
        </div>
        <footer>
            &copy;{{ date('Y') }} Code Stylus | Made with &lt;3 by <a href="http://twitter.com/StuYam">Stuart Yamartino</a>
        </footer>
    </div>
@endsection
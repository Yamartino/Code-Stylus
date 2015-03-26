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
                            <textarea name="content" id="content" style="display: none;">##1. Indentation
---

4 space indentations

```markup
<div>
    <span>This span is indented with 4 spaces</span>
</div>
```

##2. Brackets
---

Brackets should start on the next line of the expression except for controls

```php
class Stuart()
{
    public function make()
    {
        if($test){
            return true;
        }
    }
}
```</textarea>
                            <a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet" target="new">Markdown Cheatsheet</a>
                            <br>
                            *syntax highlighting does not show up in the preview mode on this page
                            <br>

                            {!! Form::submit('Create Guide', ['class'=>'btn btn-primary', 'id'=>'submit-guide']) !!}

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
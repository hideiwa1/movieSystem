<!DOCTYPE html>
<html lang="ja">
    <head>
    </head>
    <body>
        <h1>
            {{$subject}}
        </h1>
        <p>
            {{$name}}
        </p>
        <p>
            {{$comment}}
        </p>
        @if(!empty($url))
        <p id="button">
            <a href="{{$url}}">{{$url}}</a>
        </p>
        @endif
        
    </body>
</html>

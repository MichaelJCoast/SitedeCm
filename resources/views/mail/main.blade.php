@foreach($main as $key => $main )
<!DOCTYPE html>
<html>
<head>
    <title>{{$main->title}}</title>
</head>
    <body>
        <h1> {{$main->body}} </h1>
        <h3>{{$main->msg}} </h3>
        <h1>{{$main->footer}} </h1>
    </body>
</html>
@endforeach
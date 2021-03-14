<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h2>Test Email</h2>
    <b>hi</b>

    @foreach($body as $k => $v)

    <b>hi</b>
    {{count($body)}}
    {{$body[$k]}}
    @endforeach
    <b>hi</b>

  </body>
</html>
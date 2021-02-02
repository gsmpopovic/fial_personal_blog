@extends('layouts.master')

@section('content')

@if(count($posts) >= 1)

{{$posts}}

@else

{{$error}}

@endif

@endsection
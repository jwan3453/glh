@extends('website')
{!!isset($name) ? $name : 'Default'  !!}

@section('content')
    {{ isset($name) ? $name : 'Default' }}


@stop
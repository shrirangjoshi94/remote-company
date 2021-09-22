@extends('layouts.app')

@section('content')
    <div class="col-md-6 offset-md-4">
        <a class="btn btn-primary" href="{{ route('visitor') }}"> Visitor </a>
    </div>
    <br>
    <pdf-component></pdf-component>
    <br>
    <snippet-component></snippet-component>
    <br>
    <link-component></link-component>
@endsection

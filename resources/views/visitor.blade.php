@extends('layouts.app')

@section('content')
    <div class="col-md-6 offset-md-4">
        <a class="btn btn-primary" href="{{ route('management') }}"> Management </a>
    </div>
    <br>
    <pdf-display-component :pdf-details="{{ !empty($resourceDetails['pdfDetails']) ? $resourceDetails['pdfDetails'] : 'null' }}"></pdf-display-component>
    <br>
    <snippet-display-component :snippet-details="{{ !empty($resourceDetails['snippetDetails']) ? $resourceDetails['snippetDetails'] : 'null' }}"></snippet-display-component>
    <br>
    <link-display-component :link-details="{{ !empty($resourceDetails['linkDetails']) ? $resourceDetails['linkDetails'] : 'null' }}"></link-display-component>
@endsection

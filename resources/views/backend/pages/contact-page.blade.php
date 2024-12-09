@extends('backend.layouts.app')

@section('content')
    @include('backend.components.contact.contact-delete')
    @include('backend.components.contact.contact-list')
    @include('backend.components.contact.contact-update')
    
@endsection
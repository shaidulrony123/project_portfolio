@extends('backend.layouts.app')

@section('content')
    @include('backend.components.service.service-create')
    @include('backend.components.service.service-delete')
    @include('backend.components.service.service-list')
    @include('backend.components.service.service-update')
    
@endsection
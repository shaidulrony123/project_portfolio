@extends('backend.layouts.app')

@section('content')
    @include('backend.components.project.project-create')
    @include('backend.components.project.project-delete')
    @include('backend.components.project.project-list')
    @include('backend.components.project.project-update')
    
@endsection
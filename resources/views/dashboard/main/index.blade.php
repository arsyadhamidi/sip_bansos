@extends('dashboard.layout.master')
@section('title', 'Dashboard | SIBANSOS')
@section('menuDashboard', 'active')

@section('content')
    @if (Auth()->user()->level == 'Operator')
        @include('operator.index')
    @elseif (Auth()->user()->level == 'Masyarakat')
        @include('masyarakat.index')
    @endif
@endsection

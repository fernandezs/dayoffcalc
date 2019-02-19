@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{ asset('css/fullcalendar.css')}}">
@endsection
@section('content')

<div class="container">
        <calendario></calendario>
      </div>

@endsection
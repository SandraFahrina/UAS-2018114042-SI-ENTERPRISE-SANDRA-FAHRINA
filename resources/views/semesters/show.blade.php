@extends('layouts.app')

@section('title', 'semester')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>semester : {{ $semester['semester'] }}</h3>
               
    </div>
</div>
@endsection

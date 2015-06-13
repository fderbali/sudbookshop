@extends('maincontent')

@section('main')
    @foreach ($sections as $section)
    <div class="section_title">{{ $section->name }}</div>
    @endforeach    
    {!! $links !!}
@endsection



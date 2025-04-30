
@extends('frontend.app')
@section('title', 'Home')
@section('content')
    {{-- banner section start  --}}
    @include('frontend.layouts.banner')
    {{-- banner section end --}}

    {{-- html learn section  --}}
    @include('frontend.layouts.html')
    {{-- html learn section  end--}}

    {{-- another learning section  --}}
    @include('frontend.layouts.learn')
    {{-- another learning section end --}}
@endsection

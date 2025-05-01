@extends('frontend.app')
@section('title', $pageTitle ?? 'Topic'  )
@section('content')

    <!-- Sidebar and Main Content Container -->
    <div class="mx-auto flex container">
        @include('frontend.layouts.sidebar')
        <!--Main Content -->
        <main class="flex-1 px-4">

        </main>
    </div>

@endsection

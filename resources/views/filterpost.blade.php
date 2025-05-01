@extends('frontend.app')
@section('title', $pageTitle ?? 'Topic'  )
@section('content')

    <!-- Sidebar and Main Content Container -->
    <div class="mx-auto flex container">
        @include('frontend.layouts.sidebar')
        <!--Main Content -->
        <main class="flex-1 px-4 mt-32">
            <h2 class="text-5xl mb-10">{{$pageTitle}} Tutorial</h2>
            <div class="flex justify-between">
                <a href="" class="btn px-4 py-2 bg-green-600 text-white rounded-md">Home</a>
                <a href="" class="btn px-4 py-2 bg-green-600 text-white rounded-md">Next</a>

            </div>

        </main>

    </div>

@endsection

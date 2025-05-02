@extends('frontend.app')
@section('title', ($pageTitle ?? 'Topic') . ' Tutorial')
{{-- @section('title', ($pageTitle ?? 'Topic')) --}}

@section('content')

    <!-- Sidebar and Main Content Container -->
    <div class="mx-auto flex container">
        @include('frontend.layouts.sidebar')
        <!--Main Content -->
        <main class="flex-1 px-4 mt-32">
            <h2 class="text-5xl my-10">{{$pageTitle}} </h2>
            <div class="flex justify-between">
                <a href="/" class="btn flex items-center gap-1 pe-4 py-2 bg-green-600 text-white rounded-md">
                    <span class="material-symbols-outlined">chevron_left</span>
                    Home
                </a>

                <a href="#" class="btn flex items-center gap-1 ps-4 py-2 bg-green-600 text-white rounded-md">
                    Next
                    <span class="material-symbols-outlined">chevron_right</span>
                </a>
            </div>

        </main>

    </div>

@endsection

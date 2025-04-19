@extends('backend.app')
@section('content')
{{-- dashbord topbar  --}}
{{-- @include('backend.layouts.fixednav') --}}

{{-- dashbord topbar  end--}}
<div class="dashbord-main mt-20">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg p-6 shadow">Card 1</div>
        <div class="bg-white rounded-lg p-6 shadow">Card 2</div>
        <div class="bg-white rounded-lg p-6 shadow">Card 3</div>
    </div>
    <div class="py-96">hello</div>
    <div class="py-96">hello</div>

</div>
@endsection

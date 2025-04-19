@extends('backend.app')
@section('content')
<h2 class="text-2xl font-semibold ">Languages</h2>
<a href="{{ route('languages.create') }}" class="mt-16 text-white px-2 py-1 text-sm rounded-md bg-green-600 hover:bg-green-700 my-2 inline-block">Add<span class="material-symbols-outlined align-middle text-sm mx-2">add</span></a>
<div class="flex xl:w-8/12">
    <table class="min-w-full table-auto border text-center border-gray-200">
      <thead class="bg-gray-100">
        <tr>
          <th class="px-4 py-2  text-sm font-medium text-gray-600 border">Serial</th>
          <th class="px-4 py-2  text-sm font-medium text-gray-600 border">Name</th>
          <th class="px-4 py-2  text-sm font-medium text-gray-600 border">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($languages as $language )
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-2 border">{{$language->id}}</td>
          <td class="px-4 py-2 border">{{$language->name}}</td>
          <td class="flex space-x-4 justify-center">
            <a href="{{ route('languages.show',  $language) }}" class="text-white px-2 py-1 rounded-md bg-indigo-600 hover:bg-indigo-700 text-sm">Show</a>
            <a href="{{route('languages.edit',$language)}}" class="text-white px-2 py-1 rounded-md bg-sky-600 hover:bg-sky-700 text-sm">Edit</a>
            <form action="{{route('languages.destroy',$language->slug)}}" method="POST">
                @csrf
                @method("DELETE")
                <button type="submit" class="text-white px-2 py-1 rounded-md bg-red-600 hover:bg-red-700 text-sm">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="mt-4">
    {{-- {{$languages->links()}} //default --}}
    {{ $languages->links('vendor.pagination.custom') }}

</div>

@endsection

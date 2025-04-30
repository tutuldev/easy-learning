  <!-- Profile Section -->
  <div class="relative z-50">
    <button id="profile-btn" class="flex items-center space-x-2 focus:outline-none">
      <img class="w-8 h-8 rounded-full" src="https://fastly.picsum.photos/id/866/200/300.jpg?hmac=rcadCENKh4rD6MAp6V_ma-AyWv641M4iiOpe1RyFHeI" alt="Profile Picture" />
      <span>{{ Auth::user()->name }}</span>
      <svg class="w-4 h-4 transform transition-transform" id="profile-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </button>
    <div id="profile-dropdown" class="absolute right-0 mt-2 w-48 bg-white shadow-md rounded-md hidden">

        <a href="{{route("profile.edit")}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="w-full block text-start px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
        </form>


    </div>
  </div>

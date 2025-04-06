<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- google front 1  --}}
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    @vite('resources/css/app.css')



</head>
<body class="bg-gray-100">

    <div class="flex h-screen">
    <!-- Sidebar -->
    @include('backend.layouts.sidebar')
    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Fixed Top Navbar -->
       @include('backend.layouts.topbar')
        <!-- Content -->
        <main class="flex-1 p-6 pt-20 overflow-y-auto">
           @yield('content')
        </main>
      </div>
    </div>

    <!-- Scripts -->
    <script>
      const btn = document.getElementById('menu-btn');
      const sidebar = document.getElementById('sidebar');

      btn.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
      });

      function toggleDropdown(id) {
        const dropdown = document.getElementById(id);
        const icon = document.getElementById(`${id}-icon`);
        dropdown.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
      }

      // Profile dropdown toggle
      const profileBtn = document.getElementById('profile-btn');
      const profileDropdown = document.getElementById('profile-dropdown');
      const profileIcon = document.getElementById('profile-icon');

      profileBtn.addEventListener('click', () => {
        profileDropdown.classList.toggle('hidden');
        profileIcon.classList.toggle('rotate-180');
      });
    </script>
  </body>

</html>

    <!-- Sidebar -->
    <div id="sidebar" class="bg-white w-64 space-y-6 py-7 px-2 absolute inset-y-0 left-0 transform -translate-x-full md:relative md:translate-x-0 transition duration-200 ease-in-out shadow-md">
        <a href="#" class="text-black flex items-center space-x-2 px-4">
          <span class="text-2xl font-extrabold">Dashboard</span>
        </a>

        {{-- top nav bar  --}}
        <nav class="mt-10 space-y-1">
            <a href="/" class="block py-2.5 px-4 rounded hover:bg-blue-500 hover:text-white">Home</a>

            <!-- Dropdown Item -->
            <div>
              <button class="flex justify-between items-center w-full py-2.5 px-4 rounded hover:bg-blue-500 hover:text-white" onclick="toggleDropdown('dropdown1')">
                <span>Categories</span>
                <svg class="w-4 h-4 transform transition-transform" id="dropdown1-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>
              <div id="dropdown1" class="ml-6 mt-1 hidden space-y-1">
                <a href="#" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">Web Applications</a>
                <a href="#" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">Mobile Applications</a>
                <a href="#" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">Robotics</a>
                <a href="#" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">Securities</a>
              </div>
            </div>
            <div>
              <button class="flex justify-between items-center w-full py-2.5 px-4 rounded hover:bg-blue-500 hover:text-white" onclick="toggleDropdown('dropdown2')">
                <span>Language</span>
                <svg class="w-4 h-4 transform transition-transform" id="dropdown2-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>
              <div id="dropdown2" class="ml-6 mt-1 hidden space-y-1">
                <a href="#" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">PHP</a>
                <a href="#" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">Python</a>
              </div>
            </div>
            <div>
              <button class="flex justify-between items-center w-full py-2.5 px-4 rounded hover:bg-blue-500 hover:text-white" onclick="toggleDropdown('dropdown3')">
                <span>Framework</span>
                <svg class="w-4 h-4 transform transition-transform" id="dropdown3-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>
              <div id="dropdown3" class="ml-6 mt-1 hidden space-y-1">

                <a href="#" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">ASP.NET Core</a>
                <a href="#" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">Spring Boot</a>
                <a href="#" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">Express.js</a>
                <a href="#" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">Django</a>
                <a href="#" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">Ruby on Rails</a>
                <a href="#" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">Lavarel</a>
                <a href="#" class="block py-2 px-4 text-sm rounded hover:bg-gray-200">FastAPI</a>
              </div>
            </div>

            <a href="#" class="block py-2.5 px-4 rounded hover:bg-blue-500 hover:text-white">Settings</a>
          </nav>

      </div>

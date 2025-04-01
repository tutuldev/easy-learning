<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- google front 1  --}}
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=arrow_drop_down" />

    {{-- google fornt 2  --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @vite('resources/css/app.css')
    {{-- shiper js  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body class="font-sans antialiased">
    {{-- nav bar start --}}
    <section class="fixed top-0 left-0 w-full bg-white shadow-lg z-50">
        <nav class="w-full container mx-auto  flex ">
            <div class="flex w-full justify-between">
                <div class="flex bg-amber-2000 items-center">
                    <div class="logo">
                        <img src="{{ asset('image/logo.png') }}" alt="Logo" height="50px" width="60px">
                    </div>
                    <ul class="space-x-5 hidden 2xl:flex">
                        <li class="relative group">
                            Tutorials
                            <span class="material-symbols-outlined align-middle">arrow_drop_down</span>
                            <!-- Dropdown -->
                            <ul class="absolute left-0 hidden mt-0 space-y-2 bg-white shadow-lg w-36 group-hover:block">
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                        1</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                        2</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                        3</a></li>
                            </ul>
                        </li>
                        <li class="relative group">
                            Exercises
                            <span class="material-symbols-outlined align-middle">arrow_drop_down</span>
                            <!-- Dropdown -->
                            <ul class="absolute left-0 hidden mt-0 space-y-2 bg-white shadow-lg w-36 group-hover:block">
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                        1</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                        2</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                        3</a></li>
                            </ul>
                        </li>
                        <li class="relative group">
                            Certificates
                            <span class="material-symbols-outlined align-middle">arrow_drop_down</span>
                            <!-- Dropdown -->
                            <ul class="absolute left-0 hidden mt-0 space-y-2 bg-white shadow-lg w-36 group-hover:block">
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                        1</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                        2</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                        3</a></li>
                            </ul>
                        </li>
                        <li class="relative group">
                            Services
                            <span class="material-symbols-outlined align-middle">arrow_drop_down</span>
                            <!-- Dropdown -->
                            <ul class="absolute left-0 hidden mt-0 space-y-2 bg-white shadow-lg w-36 group-hover:block">
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                        1</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                        2</a></li>
                                <li><a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Option
                                        3</a></li>
                            </ul>
                        </li>
                    </ul>
                    {{-- menu  --}}
                    <div class="menu  2xl:hidden">
                        <span class="material-icons cursor-pointer">menu</span>
                    </div>
                    <div class="relative ml-5">
                        <input type="text" placeholder="Search..."
                            class="w-48 xl:w-full h-10 px-4 pr-12 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500">
                        <button class="absolute inset-y-0 right-3 flex items-center">
                            <span class="material-icons text-gray-500 text-xl cursor-pointer">search</span>
                        </button>
                    </div>

                </div>
                <div class="action flex space-x-5 bg-green-2000 items-center">
                    <div class="dark mood ml-5">
                        <span class="material-icons cursor-pointer">brightness_6</span>
                    </div>
                    <ul class="hidden 2xl:flex space-x-5">
                        <li class="cursor-pointer flex items-center">
                            <a href="#" class="flex items-center">
                                <span class="material-icons mr-2">credit_card</span> Plus
                            </a>
                        </li>
                        <li class="cursor-pointer flex items-center">
                            <a href="#" class="flex items-center">
                                <span class="material-icons mr-2">code</span> Spaces
                            </a>
                        </li>
                        <li class="cursor-pointer flex items-center">

                            <a href="#" class="flex items-center">
                                <span class="material-icons mr-2">school</span> For Teachers
                            </a>
                        </li>
                        <li class="cursor-pointer flex items-center">

                            <a href="#" class="flex items-center">
                                <span class="material-icons mr-2">shopping_cart</span> Get Certified
                            </a>

                        </li>
                    </ul>
                    <div class="authentication  flex space-x-2">
                        <button
                            class="py-2 px-8 bg-blue-500 text-white font-semibold rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50 cursor-pointer hidden sm:block">
                            Sign Up
                        </button>

                        <button
                            class="py-2 px-8 bg-green-500 text-white font-semibold rounded-full hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-50 cursor-pointer">
                            Log in
                        </button>

                    </div>
                </div>
            </div>
        </nav>
    </section>
    {{-- nav bar end --}}

    {{-- top bar start --}}
    <section class="bg-[#261F1E] fixed mt-15 left-0 w-full z-40">
        {{-- swiper js start  --}}
        <div class="swiper container cursor-pointer ">
            <div class="swiper-wrapper py-1">
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm ">HTML</span></div>
                <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">CSS</span>
                </div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">JAVASCRIPT</span></div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">SQL</span></div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">PYTHON</span></div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">JAVA</span></div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">PHP</span></div>
                <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">HOW
                        TO</span></div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">W3.CSS</span></div>
                <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">C</span>
                </div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">C++</span></div>
                <div class="swiper-slide !w-auto"><span class="px-4 py-2 hover:bg-black text-white  text-sm">C#</span>
                </div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">BOOTSTRAP</span></div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">REACT</span></div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">MYSQL</span></div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">JQUERY</span></div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">EXCEL</span></div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">XML</span></div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">DJANGO</span></div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">NUMPY</span></div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">PANDAS</span></div>
                <div class="swiper-slide !w-auto"><span
                        class="px-4 py-2 hover:bg-black text-white  text-sm">NODEJS</span></div>
            </div>

            <!-- Add next and previous buttons -->
            {{-- <div class="absolute swiper-button-next "></div>
                        <div class="absolute swiper-button-prev"></div> --}}
            <!-- Swiper Default Buttons (with Material Icons) -->
            <div class="absolute swiper-button-prev !left-0 bg-black">
                <span class="material-icons text-white text-sm ">chevron_left</span>
            </div>
            <div class="absolute swiper-button-next !right-0 bg-black">
                <span class="material-icons text-white text-sm ">chevron_right</span>
            </div>
        </div>
    </section>
    {{-- top bar end  --}}

    {{-- banner section start  --}}
    <section class="banner relative">
        <img src="{{ asset('image/banner.png') }}" alt="Banner Image" class="w-full h-[90vh]">

        <!-- Centered Text -->
        <div class="absolute inset-0 flex flex-col gap-4 items-center justify-center text-center px-4">
            <h1 class="text-white text-4xl sm:text-5xl md:text-6xl font-bold">Learn to Code</h1>
            <h4 class="text-yellow-600 text-lg sm:text-xl font-bold mt-2 sm:mt-4">With the world's largest web developer site.</h4>
            <div class="relative w-full max-w-md sm:max-w-lg my-2">
                <input type="text" placeholder="Search our tutorials, e.g. HTML"
                    class="w-full h-8 sm:h-10 bg-white px-4 py-5 sm:py-6 pr-10 sm:pr-12 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-green-500">
                <button class="absolute inset-y-0 right-0 bg-green-500 flex items-center justify-center rounded-r-full h-full px-3 sm:px-4">
                    <span class="material-icons text-white text-lg sm:text-xl cursor-pointer">search</span>
                </button>
            </div>
            <h4 class="text-white underline text-lg sm:text-xl font-bold mt-2">Not Sure Where To Begin?</h4>
        </div>

    </section>
    {{-- banner section end --}}
    {{-- html learn section  --}}
    <section class="html-learn-section mt-[-90px] ">
        <div class="pb-16 pt-32 bg-[#D9EEE1] flex flex-col md:flex-row justify-center items-center space-y-10 md:space-y-0 md:space-x-20 ">
            <div class="html-nav text-center">
                <h2 class="text-7xl font-bold">HTML</h2>
                <p class="font-semibold mb-5 mt-8">The language for building web pages</p>

                <!-- Button Section -->
                <div class="flex flex-col items-center space-y-4 mt-4">
                    <a href="#" class="rounded-full text-white bg-green-500 px-7 py-3 min-w-[280px] max-w-[350px] text-center">Learn HTML</a>
                    <a href="#" class="rounded-full bg-orange-300 px-7 py-3 min-w-[280px] max-w-[350px] text-center">Video Tutorials</a>
                    <a href="#" class="rounded-full text-white bg-black px-7 py-3 min-w-[280px] max-w-[350px] text-center">HTML Reference</a>
                    <a href="#" class="rounded-full bg-pink-400 px-7 py-3 min-w-[280px] max-w-[350px] text-center">Get Certified</a>
                </div>
            </div>

            <!-- HTML Editor Section -->
            <div class="html-editor sm:flex items-center justify-center hidden">
                <div class="w-96  bg-gray-200 rounded-lg shadow-2xl  px-5">
                    <h3 class="text-xl font-bold py-5">HTML Example:</h3>
                    <div class="border-l-4 min-h-[250px] border-green-400 p-2 bg-white">
<pre>
&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
&lt;title&gt;HTML Tutorial&lt;/title&gt;
&lt;/head&gt;
&lt;body&gt;

&lt;h1&gt;This is a heading&lt;/h1&gt;
&lt;p&gt;This is a paragraph.&lt;/p&gt;

&lt;/body&gt;
&lt;/html&gt;
</pre>

                    </div>
                    <a href="#" class="bg-green-500 px-10 py-3 rounded-full inline-block text-sm font-bold my-5 text-white">Try it Yourself</a>

                </div>
                <div class="code">

                </div>
            </div>
        </div>
    </section>

    {{-- learn css section --}}
    <section class="css-learn-section ">
        <div class="py-10 bg-[#FFF4A3] flex flex-col md:flex-row justify-center items-center space-y-10 md:space-y-0 md:space-x-20">
            <div class="css-nav text-center">
                <h2 class="text-7xl font-bold">CSS</h2>
                <p class="font-semibold mb-5 mt-8">The language for styling web pages</p>

                <!-- Button Section -->
                <div class="flex flex-col items-center space-y-4 mt-4">
                    <a href="#" class="rounded-full text-white bg-green-500 px-7 py-3 min-w-[280px] max-w-[350px] text-center">Learn CSS</a>
                    <a href="#" class="rounded-full bg-orange-300 px-7 py-3 min-w-[280px] max-w-[350px] text-center">CSS Reference</a>
                    <a href="#" class="rounded-full text-white bg-black px-7 py-3 min-w-[280px] max-w-[350px] text-center">Get Certified</a>
                </div>
            </div>

            <!-- css Editor Section -->
            <div class="css-editor sm:flex items-center justify-center hidden">
                <div class="w-96  bg-gray-200 rounded-lg shadow-2xl  px-5">
                    <h3 class="text-xl font-bold py-5">CSS Example:</h3>
                    <div class="border-l-4 min-h-[250px] border-green-400 p-2 bg-white">
<pre>
&lt;style&gt;
body {
  background-color: lightblue;
}

h1 {
  color: white;
  text-align: center;
}

p {
  font-family: verdana;
}
&lt;/style&gt;
</pre>


                    </div>
                    <a href="#" class="bg-green-500 px-10 py-3 rounded-full inline-block text-sm font-bold my-5 text-white">Try it Yourself</a>

                </div>
                <div class="code">

                </div>
            </div>
        </div>
    </section>

    {{-- learn javascript section  --}}
    <section class="javascript-learn-section ">
        <div class="py-10 bg-[#261F1E] flex flex-col md:flex-row justify-center items-center space-y-10 md:space-y-0 md:space-x-20">
            <div class="css-nav text-center">
                <h2 class="text-6xl text-white font-bold">JavaScript</h2>
                <p class="font-semibold text-white mb-5 mt-8">The language for programming web pages</p>

                <!-- Button Section -->
                <div class="flex flex-col items-center space-y-4 mt-4">
                    <a href="#" class="rounded-full text-white bg-green-500 px-7 py-3 min-w-[280px] max-w-[350px] text-center">Learn JavaScript</a>
                    <a href="#" class="rounded-full bg-orange-300 px-7 py-3 min-w-[280px] max-w-[350px] text-center">JavaScript Reference</a>
                    <a href="#" class="rounded-full text-white bg-black px-7 py-3 min-w-[280px] max-w-[350px] text-center">Get Certified</a>
                </div>
            </div>

            <!-- JavaScript Editor Section -->
            <div class="JavaScript-editor sm:flex items-center justify-center hidden">
                <div class="w-96  bg-gray-200 rounded-lg shadow-2xl  px-5">
                    <h3 class="text-xl font-bold py-5">JavaScript Example:</h3>
                    <div class="border-l-4 min-h-[250px] border-green-400 p-2 bg-white">
<pre>
&lt;button onclick=
&quot;myFunction()&quot;&gt;Click Me!&lt;/button&gt;

&lt;script&gt;
function myFunction() {
  let x = document.getElementById
  (&quot;demo&quot;);
  x.style.fontSize = &quot;25px&quot;;
  x.style.color = &quot;red&quot;;
}
&lt;/script&gt;
</pre>



                    </div>
                    <a href="#" class="bg-green-500 px-10 py-3 rounded-full inline-block text-sm font-bold my-5 text-white">Try it Yourself</a>

                </div>
                <div class="code">

                </div>
            </div>
        </div>
    </section>
    {{-- learn PHP  --}}
    <section class="PHP-learn-section ">
        <div class="py-10 bg-[#FFC0C7] flex flex-col md:flex-row justify-center items-center space-y-10 md:space-y-0 md:space-x-20">
            <div class="css-nav text-center">
                <h2 class="text-6xl  font-bold">PHP</h2>
                <p class="font-semibold  mb-5 mt-8">A web server programming language</p>

                <!-- Button Section -->
                <div class="flex flex-col items-center space-y-4 mt-4">
                    <a href="#" class="rounded-full text-white bg-green-500 px-7 py-3 min-w-[280px] max-w-[350px] text-center">Learn PHP</a>
                    <a href="#" class="rounded-full bg-orange-300 px-7 py-3 min-w-[280px] max-w-[350px] text-center">PHP Reference</a>
                    <a href="#" class="rounded-full text-white bg-black px-7 py-3 min-w-[280px] max-w-[350px] text-center">Get Certified</a>
                </div>
            </div>

            <!-- PHP Editor Section -->
            <div class="PHP-editor sm:flex items-center justify-center hidden">
                <div class="w-96  bg-gray-200 rounded-lg shadow-2xl  px-5">
                    <h3 class="text-xl font-bold py-5">PHP Example:</h3>
                    <div class="border-l-4 min-h-[250px] border-green-400 p-2 bg-white">
<pre>
&lt;?php
  echo &quot;Hello, World!&quot;;

  $name = &quot;Moumita&quot;;
  echo &quot;&lt;br&gt;Welcome, &quot; . $name . &quot;!&quot;;
?&gt;
</pre>




                    </div>
                    <a href="#" class="bg-green-500 px-10 py-3 rounded-full inline-block text-sm font-bold my-5 text-white">Try it Yourself</a>

                </div>
                <div class="code">

                </div>
            </div>
        </div>
    </section>
    {{-- learn Python  --}}
    <section class="Python-learn-section ">
        <div class="py-10 bg-[#F3ECEA] flex flex-col md:flex-row justify-center items-center space-y-10 md:space-y-0 md:space-x-20">
            <div class="css-nav text-center">
                <h2 class="text-6xl  font-bold">Python</h2>
                <p class="font-semibold  mb-5 mt-8">A popular programming language</p>

                <!-- Button Section -->
                <div class="flex flex-col items-center space-y-4 mt-4">
                    <a href="#" class="rounded-full text-white bg-green-500 px-7 py-3 min-w-[280px] max-w-[350px] text-center">Learn Python</a>
                    <a href="#" class="rounded-full bg-orange-300 px-7 py-3 min-w-[280px] max-w-[350px] text-center">Python Reference</a>
                    <a href="#" class="rounded-full text-white bg-black px-7 py-3 min-w-[280px] max-w-[350px] text-center">Get Certified</a>
                </div>
            </div>

            <!-- Python Editor Section -->
            <div class="Python-editor  sm:flex items-center justify-center hidden">
                <div class="w-96   bg-gray-200 rounded-lg shadow-2xl  px-5">
                    <h3 class="text-xl font-bold py-5">Python Example:</h3>
                    <div class="border-l-4 min-h-[250px] border-green-400 p-2 bg-white">
<pre>
 if 5 &gt; 2:
    print(&quot;Five is greater than two!&quot;)
</pre>




                    </div>
                    <a href="#" class="bg-green-500 px-10 py-3 rounded-full inline-block text-sm font-bold my-5 text-white">Try it Yourself</a>

                </div>
                <div class="code">

                </div>
            </div>
        </div>
    </section>
    {{-- learn Laravel  --}}
    <section class="Laravel-learn-section ">
        <div class="py-10 bg-[#261F1E] flex flex-col md:flex-row justify-center items-center space-y-10 md:space-y-0 md:space-x-20">
            <div class="css-nav text-center">
                <h2 class="text-6xl text-white font-bold">Laravel</h2>
                <p class="font-semibold text-white mb-5 mt-8">A PHP framework for building modern web applications.</p>

                <!-- Button Section -->
                <div class="flex flex-col items-center space-y-4 mt-4">
                    <a href="#" class="rounded-full text-white bg-green-500 px-7 py-3 min-w-[280px] max-w-[350px] text-center">Learn Laravel</a>
                    <a href="#" class="rounded-full bg-orange-300 px-7 py-3 min-w-[280px] max-w-[350px] text-center">Laravel Reference</a>
                    <a href="#" class="rounded-full text-white bg-black px-7 py-3 min-w-[280px] max-w-[350px] text-center">Get Certified</a>
                </div>
            </div>

            <!-- Laravel Editor Section -->
            <div class="Laravel-editor sm:flex items-center justify-center hidden">
                <div class="w-96  bg-gray-200 rounded-lg shadow-2xl  px-5">
                    <h3 class="text-xl font-bold py-5">Laravel Example:</h3>
                    <div class="border-l-4 min-h-[250px] border-green-400 p-2 bg-white">
<pre>
&lt;?php
use App\Models\User;

$user = User::where
('email', 'example@example.com')
-&gt;first();

if ($user) {
echo 'User found: ' . $user-&gt;name;
} else {
echo 'User not found';
}
?&gt;
</pre>



                    </div>
                    <a href="#" class="bg-green-500 px-10 py-3 rounded-full inline-block text-sm font-bold my-5 text-white">Try it Yourself</a>

                </div>
                <div class="code">

                </div>
            </div>
        </div>
    </section>
    {{-- learn SQL  --}}
    <section class="SQL-learn-section ">
        <div class="py-10 bg-[#96D4D4] flex flex-col md:flex-row justify-center items-center space-y-10 md:space-y-0 md:space-x-20">
            <div class="css-nav text-center">
                <h2 class="text-6xl text-white font-bold">SQL</h2>
                <p class="font-semibold text-white mb-5 mt-8">A language for accessing databases

                </p>

                <!-- Button Section -->
                <div class="flex flex-col items-center space-y-4 mt-4">
                    <a href="#" class="rounded-full text-white bg-green-500 px-7 py-3 min-w-[280px] max-w-[350px] text-center">Learn SQL</a>
                    <a href="#" class="rounded-full bg-orange-300 px-7 py-3 min-w-[280px] max-w-[350px] text-center">SQL Reference</a>
                    <a href="#" class="rounded-full text-white bg-black px-7 py-3 min-w-[280px] max-w-[350px] text-center">Get Certified</a>
                </div>
            </div>

            <!-- SQL Editor Section -->
            <div class="SQL-editor sm:flex items-center justify-center hidden">
                <div class="w-96  bg-gray-200 rounded-lg shadow-2xl  px-5">
                    <h3 class="text-xl font-bold py-5">SQL Example:</h3>
                    <div class="border-l-4 min-h-[250px] border-green-400 p-2 bg-white">
<pre>
SELECT * FROM Customers
WHERE Country='Mexico';
</pre>



                    </div>
                    <a href="#" class="bg-green-500 px-10 py-3 rounded-full inline-block text-sm font-bold my-5 text-white">Try it Yourself</a>

                </div>
                <div class="code">

                </div>
            </div>
        </div>
    </section>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".swiper", {
            slidesPerView: "auto",
            spaceBetween: 10,
            freeMode: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            on: {
                init: function() {
                    updateNavButtons(this);
                },
                slideChange: function() {
                    updateNavButtons(this);
                }
            }
        });

        function updateNavButtons(swiper) {
            let prevBtn = document.querySelector(".swiper-button-prev");
            let nextBtn = document.querySelector(".swiper-button-next");

            // প্রথমে থাকলে "Previous" বাটন পুরোপুরি লুকিয়ে দিন
            if (swiper.isBeginning) {
                prevBtn.classList.add("hidden");
            } else {
                prevBtn.classList.remove("hidden");
            }

            // শেষ হলে "Next" বাটন পুরোপুরি লুকিয়ে দিন
            if (swiper.isEnd) {
                nextBtn.classList.add("hidden");
            } else {
                nextBtn.classList.remove("hidden");
            }
        }
    </script>
</body>

</html>

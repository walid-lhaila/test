<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Reservations</title>
</head>
<body>
    <nav x-data="{ isOpen: false }" class="relative bg-black shadow ">
        <div class="container px-6 h-[60px]  mx-auto md:flex">
            <div class="flex items-center justify-between">
                <a href="#">
                    <img class="w-32 h-26 " src="{{url('img/Immo.png')}}" alt="">
                </a>
    
                <!-- Mobile menu button -->
                <div class="flex lg:hidden">
                    <button x-cloak @click="isOpen = !isOpen" type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400" aria-label="toggle menu">
                        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                        </svg>
                
                        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
    
            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']" class="absolute inset-x-0 w-full px-6 py-4 transition-all duration-300 ease-in-out bg-white dark:bg-black    md:mt-0 md:p-0 md:top-0 md:relative md:opacity-100 md:translate-x-0 md:flex md:items-center md:justify-between">
                <div class="flex flex-col px-2 -mx-4 md:flex-row md:mx-10 md:py-0">
                    <a href="{{route('clientDashboard')}}" class="px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 md:mx-2">Home</a>
                    <a href="{{route('clientAnnonces')}}" class="px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 md:mx-2">Annonces</a>
                    <a href="{{route('clientReservations')}}" class="px-2.5 py-2 text-gray-700 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 md:mx-2">Reservations</a>
                </div>
                <div>
                    <a href="{{route('login')}}">
                        <button>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white hover:text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H4m12 0-4 4m4-4-4-4m3-4h2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3h-2"/>
                              </svg>
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section class="mt-5 ">
        <div class="flex justify-center items-center">
            <h1 class="font-bold text-xl text-black">My Reservations</h1>
        </div>
        <div class="flex flex-wrap gap-10 px-14 mt-8">
            @foreach ($reservations as $reservation)
        <div class="bg-black text-white w-[400px] rounded-md">
            <div>
                <p class="p-2 text-white">Reserved At: <span class="text-gray-400 text-md underline">{{ $reservation->created_at }}</span></p>
            </div>
            <div class="flex justify-between px-3 py-2">
                <h1 class="text-white font-medium">Proprietaire:  <span class="text-gray-400 text-md "> {{ $reservation->annonce->user->fname }} {{ $reservation->annonce->user->lname }} </span></h1>
                <h1 class="text-white font-medium">Client: <span class="text-gray-400 text-md "> {{ $reservation->user->fname }} {{ $reservation->user->lname }} </span></h1>
            </div>
            <div class="flex justify-between px-3 py-2">
                <h1 class="text-white font-medium">Type De Annonce: <span class="text-gray-400 text-md ">{{ $reservation->annonce->type_annonce }}</span></h1>
                <h1 class="text-white font-medium">Type De Bien: <span class="text-gray-400 text-md ">{{ $reservation->annonce->type_bien }}</span></h1>
            </div>
        </div>
    @endforeach
        </div>
    </section>
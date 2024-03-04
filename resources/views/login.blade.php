<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body>

    <div class="w-full max-w-sm mx-auto overflow-hidden bg-white shadow-lg rounded-lg mt-28 ">
        <div class="px-6 py-4">
            <div class="flex justify-center mx-auto">
                <img class="w-32 h-26 " src="{{url('img/Imo.png')}}" alt="">
            </div>
    
            <h3 class="mt-3 text-xl font-medium text-center text-gray-600 dark:text-gray-500">Welcome Back</h3>
    
            <p class="mt-1 text-center text-gray-500 dark:text-gray-400">Login or create account</p>
    
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="w-full mt-4">
                    <input name="email" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300" type="email" placeholder="Email Address" aria-label="Email Address" required />
                </div>
    
                <div class="w-full mt-4">
                    <input name="password" class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg dark:bg-gray-100 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300" type="password" placeholder="Password" aria-label="Password" required />
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <button type="submit" class="px-6 py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform  rounded-lg bg-black focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    
        <div class="flex items-center justify-center py-4 text-center bg-gray-50 dark:bg-gray-200">
            <span class="text-sm text-gray-600 dark:text-gray-600">Don't have an account? </span>
    
            <a href="register" class="mx-2 text-sm font-bold text-black hover:underline">Register</a>
        </div>
    </div>



</body>
</html>
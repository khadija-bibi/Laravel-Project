<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    <div class="flex justify-center items-center h-screen  bg-cyan-600">
        <div class="w-96 p-6 shadow-lg bg-white rounded-md">
            <form method="POST" action="{{route("login")}}">
                @csrf
                <h1 class="text-3xl block text-center front-semibold">
                    LOGIN
                </h1>
                <hr class="mt-3">
                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Email</label>
                    <input type="email" id="email" class="border w-full text-base px-2 py-1 focus:outline-none  focus:ring-0 focus:border-gray-600 "  placeholder="Enter email..." name="email" >
                </div>
                @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
                <div class="mt-3">
                    <label for="password" class="block text-base mb-2">Password</label>
                    <input type="password" id="password" class="border w-full text-base px-2 py-1 focus:outline-none  focus:ring-0 focus:border-gray-600 " placeholder="Password..." name="password" >
                </div> 
                @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
                <div class="mt-3 flex justify-between item-center">
                    <div>
                        <input type="checkbox">
                        <label>Remember Me?</label>
                    </div>
                   
                </div>
                <div class="mt-5">
                    <button class="border-2  bg-cyan-500 text-white py-1 px-5 w-full rounded-md">Login</button>
               
            </form>
             </div>
        </div>
    </div>
  
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Inventory App</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-xl rounded-2xl flex w-[850px] overflow-hidden">

        <!-- LEFT -->
        <div class="w-1/2 bg-indigo-600 text-white p-10 flex flex-col justify-center">
            <h1 class="text-3xl font-bold mb-4">Inventory App</h1>
            <p class="text-sm opacity-80">
                Kelola stok dengan mudah.
            </p>
        </div>

        <!-- RIGHT -->
        <div class="w-1/2 p-10">
            <h2 class="text-2xl font-semibold mb-6">Login</h2>

            <!-- ERROR -->
            @if ($errors->any())
                <div class="mb-4 text-red-500 text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- STATUS -->
            @if (session('status'))
                <div class="mb-4 text-green-500 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-sm mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500"
                        required autofocus>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="block text-sm mb-1">Password</label>
                    <input type="password" name="password"
                        class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-500"
                        required>
                </div>

                <!-- Remember -->
                <div class="flex items-center mb-4">
                    <input type="checkbox" name="remember" class="mr-2">
                    <span class="text-sm text-gray-600">Remember me</span>
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                    Login
                </button>

                <!-- Forgot -->
                @if (Route::has('password.request'))
                    <div class="mt-4 text-sm text-center">
                        <a href="{{ route('password.request') }}"
                            class="text-indigo-600 hover:underline">
                            Forgot password?
                        </a>
                    </div>
                @endif

            </form>
        </div>

    </div>
</div>

</body>
</html>
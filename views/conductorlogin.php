<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conduktor Login - Spark Driver</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-4xl flex bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Left Side (Login Form) -->
            <div class="w-1/2 p-10 flex flex-col justify-center">
                <h2 class="text-gray-500 text-lg">Login Conduktor</h2>
                <div class="mt-6 bg-white p-6 rounded-lg shadow-md w-full">
                    <form id="loginForm">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-600">Email or Username</label>
                            <input type="text" id="email" name="email" class="mt-1 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-100" required>
                        </div>
                        <div class="mt-4">
                            <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                            <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-100" required>
                        </div>
                        <div class="mt-2 text-left">
                            <a href="#" class="text-blue-500 text-sm hover:underline">Forgot Password?</a>
                        </div>
                        <button type="submit" class="w-full mt-4 bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Login</button>
                    </form>
                </div>
            </div>

            <!-- Right Side (Branding) -->
            <div class="w-1/2 bg-gradient-to-r from-blue-400 to-blue-600 flex flex-col justify-center items-center text-white p-6">
                <div class="text-6xl font-bold">S</div>
                <p class="mt-4 text-lg">Spark Driver</p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault();
            
            // Simulate successful login
            window.location.href = "/conductordashboard";
        });
    </script>
</body>
</html>

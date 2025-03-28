<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications - Spark Driver</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white p-6 shadow-lg rounded-lg">
            <div class="flex items-center space-x-2 mb-6">
                <div class="text-2xl font-bold">S</div>
                <span class="text-lg font-semibold">Spark Driver</span>
            </div>
            <nav class="space-y-4">
                <a href="/driverdashboard" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Dashboard</a>
                <a href="/driver-sched" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Schedule & Time Management</a>
                <a href="" class="block py-2 px-4 bg-gray-300 rounded-md">Notifications</a>
                <a href="/driver-passenger" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Passengers</a>
            </nav>
            <button id="logoutBtn" class="w-full mt-6 bg-black text-white py-2 rounded-md">Logout</button>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col items-center justify-center bg-gradient-to-r from-blue-400 to-blue-600 text-white p-10 rounded-lg">
            <h1 class="text-3xl font-bold">Spark Driver</h1>

            <div class="mt-10 bg-white p-6 rounded-lg shadow-md text-black w-full max-w-3xl flex flex-col items-center">
                <h2 class="text-2xl font-semibold">Notifications</h2>
                <div class="mt-6 flex flex-col items-center">
                    <svg class="w-24 h-24 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0a3 3 0 11-6 0"></path>
                    </svg>
                    <p class="mt-4 text-gray-500 text-lg">None</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Logout button function
        document.getElementById("logoutBtn").addEventListener("click", function() {
            window.location.href = "/";
        });
    </script>
</body>
</html>

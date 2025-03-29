<!-- register.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BusNet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-bold text-center mb-6">Register</h2>
        <form onsubmit="redirectToDashboard(event)">
            <input type="text" placeholder="Full Name" class="w-full p-2 border rounded mb-4" required>
            <input type="email" placeholder="Email" class="w-full p-2 border rounded mb-4" required>
            <input type="password" placeholder="Password" class="w-full p-2 border rounded mb-4" required>
            <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Register</button>
        </form>
    </div>

    <script>
        function redirectToDashboard(event) {
            event.preventDefault(); // Prevent actual form submission
            window.location.href = "/dashboard"; // Redirect to dashboard
        }
    </script>
</body>
</html>

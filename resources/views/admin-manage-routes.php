<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Schedule & Terminals - BusNet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white p-6 shadow-lg rounded-lg">
            <div class="flex items-center space-x-2 mb-6">
                <div class="text-2xl font-bold">🚌</div>
                <span class="text-lg font-semibold text-gray-700">BusNet Admin</span>
            </div>
            <nav class="space-y-4">
                <a href="/admindashboard" class="block py-2 px-4 bg-gray-300 rounded-md">Dashboard</a>
                <a href="/admin-manage-buses" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Manage Buses</a>
                <a href="/admin-manage-terminals" class="block py-2 px-4 bg-gray-300 rounded-md">Manage Terminals</a>
                <a href="" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Manage Routes</a>
                <a href="/admin-tickets" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Tickets</a>
            </nav>
            <button id="logoutBtn" class="w-full mt-6 bg-red-500 text-white py-2 rounded-md">Logout</button>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-6 bg-gradient-to-r from-blue-400 to-blue-600">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold mb-4">Schedule & Route Management</h1>
                <button id="addScheduleBtn" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Schedule</button>
                <table class="w-full mt-4 border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 p-2">#</th>
                            <th class="border border-gray-300 p-2">Code</th>
                            <th class="border border-gray-300 p-2">From</th>
                            <th class="border border-gray-300 p-2">Destination</th>
                            <th class="border border-gray-300 p-2">Departure</th>
                            <th class="border border-gray-300 p-2">Arrival</th>
                            <th class="border border-gray-300 p-2">Price</th>
                            <th class="border border-gray-300 p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="scheduleTableBody">
                        <tr>
                            <td class="border border-gray-300 p-2">1</td>
                            <td class="border border-gray-300 p-2">S1</td>
                            <td class="border border-gray-300 p-2">CDO</td>
                            <td class="border border-gray-300 p-2">Bukidnon</td>
                            <td class="border border-gray-300 p-2">11:59</td>
                            <td class="border border-gray-300 p-2">11:69</td>
                            <td class="border border-gray-300 p-2">$220</td>
                            <td class="border border-gray-300 p-2 text-center"><button class="text-red-500 deleteBtn">🗑️</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Schedule Modal -->
    <div id="addScheduleModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-lg font-bold mb-4">Add Schedule</h2>
            <input id="from" type="text" placeholder="From" class="w-full p-2 border rounded mb-2">
            <input id="destination" type="text" placeholder="Destination" class="w-full p-2 border rounded mb-2">
            <input id="departure" type="text" placeholder="Departure" class="w-full p-2 border rounded mb-2">
            <input id="arrival" type="text" placeholder="Arrival" class="w-full p-2 border rounded mb-2">
            <input id="price" type="text" placeholder="Price" class="w-full p-2 border rounded mb-2">
            <div class="flex justify-end space-x-2">
                <button id="closeModal" class="bg-red-500 text-white px-4 py-2 rounded-md">Close</button>
                <button id="saveSchedule" class="bg-green-500 text-white px-4 py-2 rounded-md">Save</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("logoutBtn").addEventListener("click", function() {
            window.location.href = "/";
        });

        document.getElementById("addScheduleBtn").addEventListener("click", function() {
            document.getElementById("addScheduleModal").classList.remove("hidden");
        });
        
        document.getElementById("closeModal").addEventListener("click", function() {
            document.getElementById("addScheduleModal").classList.add("hidden");
        });
        
        document.getElementById("saveSchedule").addEventListener("click", function() {
            const from = document.getElementById("from").value;
            const destination = document.getElementById("destination").value;
            const departure = document.getElementById("departure").value;
            const arrival = document.getElementById("arrival").value;
            const price = document.getElementById("price").value;
            
            if (from && destination && departure && arrival && price) {
                const tableBody = document.getElementById("scheduleTableBody");
                const rowCount = tableBody.rows.length + 1;
                const newRow = `<tr>
                    <td class='border border-gray-300 p-2'>${rowCount}</td>
                    <td class='border border-gray-300 p-2'>S${rowCount}</td>
                    <td class='border border-gray-300 p-2'>${from}</td>
                    <td class='border border-gray-300 p-2'>${destination}</td>
                    <td class='border border-gray-300 p-2'>${departure}</td>
                    <td class='border border-gray-300 p-2'>${arrival}</td>
                    <td class='border border-gray-300 p-2'>$${price}</td>
                    <td class='border border-gray-300 p-2 text-center'><button class='text-red-500 deleteBtn'>🗑️</button></td>
                </tr>`;
                tableBody.innerHTML += newRow;
                document.getElementById("addScheduleModal").classList.add("hidden");
            }
        });
    </script>
</body>
</html>

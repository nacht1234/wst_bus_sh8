<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Buses - BusNet</title>
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
                <a href="" class="block py-2 px-4 bg-gray-300 rounded-md">Manage Buses</a>
                <a href="/admin-manage-terminals" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Manage Terminals</a>
                <a href="/admin-manage-routes" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Manage Routes</a>
                <a href="/admin-tickets" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Tickets</a>
            </nav>
            <button id="logoutBtn" class="w-full mt-6 bg-red-500 text-white py-2 rounded-md">Logout</button>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-6 bg-gradient-to-r from-blue-400 to-blue-600">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold mb-4">Bus Management</h1>
                <button id="addBusBtn" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Bus</button>
                <table class="w-full mt-4 border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 p-2">#</th>
                            <th class="border border-gray-300 p-2">Bus Code</th>
                            <th class="border border-gray-300 p-2">Bus Name</th>
                            <th class="border border-gray-300 p-2">Bus Plate</th>
                            <th class="border border-gray-300 p-2">Seat Capacity</th>
                            <th class="border border-gray-300 p-2">Status</th>
                            <th class="border border-gray-300 p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="busTableBody"></tbody>
                        <tr>
                            <td class="border border-gray-300 p-2">1</td>
                            <td class="border border-gray-300 p-2">101</td>
                            <td class="border border-gray-300 p-2">Bus 1</td>
                            <td class="border border-gray-300 p-2">CD0112</td>
                            <td class="border border-gray-300 p-2">40</td>
                            <td class="border border-gray-300 p-2">Active</td>
                            <td class="border border-gray-300 p-2 text-center"><button class="text-red-500 deleteBtn">🗑️</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Bus Modal -->
    <div id="addBusModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-lg font-bold mb-4">Add Bus</h2>
            <input id="busName" type="text" placeholder="Bus Name" class="w-full p-2 border rounded mb-2">
            <input id="busPlate" type="text" placeholder="Bus Plate Number" class="w-full p-2 border rounded mb-2">
            <input id="busSeats" type="number" placeholder="Number of Seats" class="w-full p-2 border rounded mb-2">
            <div class="flex justify-end space-x-2">
                <button id="closeModal" class="bg-red-500 text-white px-4 py-2 rounded-md">Close</button>
                <button id="saveBus" class="bg-green-500 text-white px-4 py-2 rounded-md">Save</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("logoutBtn").addEventListener("click", function() {
            window.location.href = "/";
        });

        document.getElementById("addBusBtn").addEventListener("click", function() {
            document.getElementById("addBusModal").classList.remove("hidden");
        });
        
        document.getElementById("closeModal").addEventListener("click", function() {
            document.getElementById("addBusModal").classList.add("hidden");
        });
        
        document.getElementById("saveBus").addEventListener("click", function() {
            const busName = document.getElementById("busName").value;
            const busPlate = document.getElementById("busPlate").value;
            const busSeats = document.getElementById("busSeats").value;
            
            if (busName && busPlate && busSeats) {
                const tableBody = document.getElementById("busTableBody");
                const rowCount = tableBody.rows.length + 1;
                const newRow = `<tr>
                    <td class='border border-gray-300 p-2'>${rowCount}</td>
                    <td class='border border-gray-300 p-2'>B${rowCount}</td>
                    <td class='border border-gray-300 p-2'>${busName}</td>
                    <td class='border border-gray-300 p-2'>${busPlate}</td>
                    <td class='border border-gray-300 p-2'>${busSeats}</td>
                    <td class='border border-gray-300 p-2'>Active</td>
                    <td class='border border-gray-300 p-2 text-center'><button class='text-red-500 deleteBtn'>🗑️</button></td>
                </tr>`;
                tableBody.innerHTML += newRow;
                document.getElementById("addBusModal").classList.add("hidden");
            }
        });
    </script>
</body>
</html>

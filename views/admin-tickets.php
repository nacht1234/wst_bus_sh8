<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tickets - BusNet</title>
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
                <a href="/admin-manage-terminals" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Manage Terminals</a>
                <a href="/admin-manage-routes" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Manage Routes</a>
                <a href="" class="block py-2 px-4 bg-gray-300 rounded-md">Tickets</a>
            </nav>
            <button id="logoutBtn" class="w-full mt-6 bg-red-500 text-white py-2 rounded-md">Logout</button>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 p-6 bg-gradient-to-r from-blue-400 to-blue-600">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h1 class="text-2xl font-bold mb-4">Sold Tickets</h1>
                <button id="addTicketBtn" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Ticket</button>
                <table class="w-full mt-4 border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 p-2">#</th>
                            <th class="border border-gray-300 p-2">Bus Code</th>
                            <th class="border border-gray-300 p-2">Passenger</th>
                            <th class="border border-gray-300 p-2">Seat</th>
                            <th class="border border-gray-300 p-2">Date</th>
                            <th class="border border-gray-300 p-2">Status</th>
                            <th class="border border-gray-300 p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="ticketTableBody">
                        <tr>
                            <td class="border border-gray-300 p-2">1</td>
                            <td class="border border-gray-300 p-2">101</td>
                            <td class="border border-gray-300 p-2">Dolens</td>
                            <td class="border border-gray-300 p-2">A1</td>
                            <td class="border border-gray-300 p-2">2025-03-28</td>
                            <td class="border border-gray-300 p-2">Active</td>
                            <td class="border border-gray-300 p-2 text-center"><button class="text-red-500 deleteBtn">🗑️</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Ticket Modal -->
    <div id="addTicketModal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-lg font-bold mb-4">Add Ticket</h2>
            <input id="busCode" type="text" placeholder="Bus Code" class="w-full p-2 border rounded mb-2">
            <input id="passenger" type="text" placeholder="Passenger Name" class="w-full p-2 border rounded mb-2">
            <input id="seat" type="text" placeholder="Seat Number" class="w-full p-2 border rounded mb-2">
            <input id="date" type="date" class="w-full p-2 border rounded mb-2">
            <select id="status" class="w-full p-2 border rounded mb-2">
                <option value="Active">Active</option>
                <option value="Cancelled">Cancelled</option>
            </select>
            <div class="flex justify-end space-x-2">
                <button id="closeModal" class="bg-red-500 text-white px-4 py-2 rounded-md">Close</button>
                <button id="saveTicket" class="bg-green-500 text-white px-4 py-2 rounded-md">Save</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("logoutBtn").addEventListener("click", function() {
            window.location.href = "/";
        });

        document.getElementById("addTicketBtn").addEventListener("click", function() {
            document.getElementById("addTicketModal").classList.remove("hidden");
        });
        
        document.getElementById("closeModal").addEventListener("click", function() {
            document.getElementById("addTicketModal").classList.add("hidden");
        });
        
        document.getElementById("saveTicket").addEventListener("click", function() {
            const busCode = document.getElementById("busCode").value;
            const passenger = document.getElementById("passenger").value;
            const seat = document.getElementById("seat").value;
            const date = document.getElementById("date").value;
            const status = document.getElementById("status").value;
            
            if (busCode && passenger && seat && date) {
                const tableBody = document.getElementById("ticketTableBody");
                const rowCount = tableBody.rows.length + 1;
                const newRow = `<tr>
                    <td class='border border-gray-300 p-2'>${rowCount}</td>
                    <td class='border border-gray-300 p-2'>${busCode}</td>
                    <td class='border border-gray-300 p-2'>${passenger}</td>
                    <td class='border border-gray-300 p-2'>${seat}</td>
                    <td class='border border-gray-300 p-2'>${date}</td>
                    <td class='border border-gray-300 p-2'>${status}</td>
                    <td class='border border-gray-300 p-2 text-center'><button class='text-red-500 deleteBtn'>🗑️</button></td>
                </tr>`;
                tableBody.innerHTML += newRow;
                document.getElementById("addTicketModal").classList.add("hidden");
            }
        });
    </script>
</body>
</html>

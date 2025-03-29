<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule & Time Management - Spark Driver</title>
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
                <a href="" class="block py-2 px-4 bg-gray-300 rounded-md">Schedule & Time Management</a>
                <a href="/driver-notification" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Notifications</a>
                <a href="/driver-passenger" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Passengers</a>
            </nav>
            <button id="logoutBtn" class="w-full mt-6 bg-black text-white py-2 rounded-md">Logout</button>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col items-center justify-center bg-gradient-to-r from-blue-400 to-blue-600 text-white p-10 rounded-lg">
            <h1 class="text-3xl font-bold">Spark Driver</h1>

            <div class="mt-10 bg-white p-6 rounded-lg shadow-md text-black w-full max-w-3xl">
                <!-- Search & Filter -->
                <div class="mb-4 flex space-x-2">
                    <input type="text" id="searchInput" placeholder="Search by Bus Number or Route..." 
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-100">
                    <button onclick="resetTable()" class="px-4 py-2 bg-red-500 text-white rounded-md">Reset</button>
                </div>

                <!-- Schedule Table -->
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-2 px-4">Bus Number</th>
                            <th class="text-left py-2 px-4">Route</th>
                            <th class="text-left py-2 px-4 cursor-pointer" onclick="sortTable(2)">Departure ⬆⬇</th>
                            <th class="text-left py-2 px-4 cursor-pointer" onclick="sortTable(3)">Arrival ⬆⬇</th>
                        </tr>
                    </thead>
                    <tbody id="scheduleTable">
                        <!-- Dynamic rows will be inserted here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Sample schedule data
        let scheduleData = [
            { busNumber: 1, route: "Cagayan de Oro to Davao", departure: "2025-02-13 12:00 PM", arrival: "2025-02-14 01:00 AM" },
            { busNumber: 2, route: "Cagayan de Oro to Surigao", departure: "2025-03-01 04:00 AM", arrival: "2025-03-02 12:00 PM" },
            { busNumber: 3, route: "Manila to Cebu", departure: "2025-04-05 10:00 AM", arrival: "2025-04-06 06:00 AM" },
            { busNumber: 4, route: "Davao to Iloilo", departure: "2025-04-10 03:00 PM", arrival: "2025-04-11 09:00 AM" }
        ];

        // Function to populate schedule table
        function populateTable(data) {
            let table = document.getElementById("scheduleTable");
            table.innerHTML = ""; // Clear previous data

            data.forEach(item => {
                let row = `<tr class="border-b">
                    <td class="py-2 px-4">${item.busNumber}</td>
                    <td class="py-2 px-4 font-semibold">${item.route}</td>
                    <td class="py-2 px-4">${item.departure}</td>
                    <td class="py-2 px-4">${item.arrival}</td>
                </tr>`;
                table.innerHTML += row;
            });
        }

        // Initial table population
        populateTable(scheduleData);

        // Search function
        document.getElementById("searchInput").addEventListener("input", function () {
            let query = this.value.toLowerCase();
            let filteredData = scheduleData.filter(item =>
                item.busNumber.toString().includes(query) || item.route.toLowerCase().includes(query)
            );
            populateTable(filteredData);
        });

        // Reset function
        function resetTable() {
            document.getElementById("searchInput").value = "";
            populateTable(scheduleData);
        }

        // Sorting function (index 2: Departure, index 3: Arrival)
        function sortTable(columnIndex) {
            let sortedData = [...scheduleData];

            sortedData.sort((a, b) => {
                let dateA = new Date(a.departure);
                let dateB = new Date(b.departure);

                if (columnIndex === 3) {
                    dateA = new Date(a.arrival);
                    dateB = new Date(b.arrival);
                }

                return dateA - dateB;
            });

            populateTable(sortedData);
        }

        // Logout button function
        document.getElementById("logoutBtn").addEventListener("click", function() {
            window.location.href = "/";
        });
    </script>
</body>
</html>

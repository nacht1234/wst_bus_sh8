<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Passengers List - Spark Conduktor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white p-6 shadow-lg rounded-lg">
            <div class="flex items-center space-x-2 mb-6">
                <div class="text-2xl font-bold">S</div>
                <span class="text-lg font-semibold">Spark Conduktor</span>
            </div>
            <nav class="space-y-4">
                <a href="/conductordashboard" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Dashboard</a>
                <a href="" class="block py-2 px-4 bg-gray-300 rounded-md">Passenger List</a>
                <a href="/conductor-ticketvalid" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Ticket Validation</a>
            </nav>
            <button id="logoutBtn" class="w-full mt-6 bg-black text-white py-2 rounded-md">Logout</button>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col items-center justify-center bg-gradient-to-r from-blue-400 to-blue-600 text-white p-10 rounded-lg">
            <h1 class="text-3xl font-bold">Spark Conduktor</h1>

            <div class="mt-10 bg-white p-6 rounded-lg shadow-md text-black w-full max-w-3xl">
                <!-- Search & Filter -->
                <div class="mb-4 flex space-x-2">
                    <input type="text" id="searchInput" placeholder="Search Passenger..." 
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400 bg-gray-100">
                    <select id="filterType" class="px-4 py-2 border rounded-md">
                        <option value="">All</option>
                        <option value="Adult">Adult</option>
                        <option value="Senior">Senior</option>
                    </select>
                </div>

                <!-- Passengers Table -->
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-300">
                            <th class="text-left py-2 px-4">Passengers Name</th>
                            <th class="text-left py-2 px-4">Seat Number</th>
                            <th class="text-left py-2 px-4">Ticket Type</th>
                        </tr>
                    </thead>
                    <tbody id="passengerTable" class="divide-y">
                        <!-- Dynamic rows will be inserted here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        let passengersData = [
            { name: "Maria B. Mercedes", seat: "001", type: "Adult" },
            { name: "Ralph Perocho", seat: "002", type: "Senior" },
            { name: "Axil B. Macabale", seat: "003", type: "Adult" },
            { name: "Ken S. Barbie", seat: "004", type: "Adult" },
            { name: "Dennis Trillo", seat: "005", type: "Adult" },
            { name: "Jhon S. Asong", seat: "006", type: "Senior" },
            { name: "Debbie S. Kwasong", seat: "007", type: "Adult" },
            { name: "Marimar H. Cabahug", seat: "008", type: "Adult" },
            { name: "Johnny Bravo", seat: "009", type: "Senior" },
            { name: "Ana Marie Sison", seat: "010", type: "Adult" },
            { name: "George Villanueva", seat: "011", type: "Senior" },
            { name: "Sophia L. Santos", seat: "012", type: "Adult" },
            { name: "Michael B. Jordan", seat: "013", type: "Adult" },
            { name: "Bruce Wayne", seat: "014", type: "Adult" },
            { name: "Clark Kent", seat: "015", type: "Senior" },
            { name: "Peter Parker", seat: "016", type: "Adult" },
            { name: "Natasha Romanoff", seat: "017", type: "Adult" },
            { name: "Steve Rogers", seat: "018", type: "Senior" },
            { name: "Diana Prince", seat: "019", type: "Adult" },
            { name: "Tony Stark", seat: "020", type: "Adult" },
            { name: "Wanda Maximoff", seat: "021", type: "Adult" },
            { name: "Bruce Banner", seat: "022", type: "Senior" },
            { name: "Thor Odinson", seat: "023", type: "Adult" },
            { name: "Loki Laufeyson", seat: "024", type: "Adult" },
            { name: "T'Challa", seat: "025", type: "Senior" },
            { name: "Shuri Wakanda", seat: "026", type: "Adult" },
            { name: "Doctor Strange", seat: "027", type: "Senior" },
            { name: "Jean Grey", seat: "028", type: "Adult" },
            { name: "Scott Summers", seat: "029", type: "Adult" },
            { name: "Logan Wolverine", seat: "030", type: "Senior" }
        ];

        function populateTable(data) {
            let table = document.getElementById("passengerTable");
            table.innerHTML = "";

            data.forEach(item => {
                let row = `<tr class="border-b">
                    <td class="py-2 px-4">${item.name}</td>
                    <td class="py-2 px-4 font-semibold">${item.seat}</td>
                    <td class="py-2 px-4">${item.type}</td>
                </tr>`;
                table.innerHTML += row;
            });
        }

        // Initial table population
        populateTable(passengersData);

        // Search function
        document.getElementById("searchInput").addEventListener("input", function () {
            let query = this.value.toLowerCase();
            let filteredData = passengersData.filter(item =>
                item.name.toLowerCase().includes(query)
            );
            populateTable(filteredData);
        });

        // Filter function
        document.getElementById("filterType").addEventListener("change", function () {
            let filter = this.value;
            let filteredData = filter ? passengersData.filter(item => item.type === filter) : passengersData;
            populateTable(filteredData);
        });

        // Logout button function
        document.getElementById("logoutBtn").addEventListener("click", function() {
            window.location.href = "/";
        });
    </script>
</body>
</html>

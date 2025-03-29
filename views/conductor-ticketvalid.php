<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Validation - Spark Conduktor</title>
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
                <a href="/conductor-passengerlist" class="block py-2 px-4 hover:bg-gray-200 rounded-md">Passenger List</a>
                <a href="" class="block py-2 px-4 bg-gray-300 rounded-md">Ticket Validation</a>
            </nav>
            <button id="logoutBtn" class="w-full mt-6 bg-black text-white py-2 rounded-md">Logout</button>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col items-center justify-center bg-gradient-to-r from-blue-400 to-blue-600 text-white p-10 rounded-lg">
            <h1 class="text-3xl font-bold">Spark Conduktor</h1>

            <div class="mt-10 bg-white p-6 rounded-lg shadow-md text-black w-full max-w-3xl">
                <!-- Ticket Validation Table -->
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-2 px-4">Passengers Name</th>
                            <th class="text-left py-2 px-4">Seat Number</th>
                            <th class="text-left py-2 px-4">Ticket Validation</th>
                        </tr>
                    </thead>
                    <tbody id="validationTable">
                        <!-- Dynamic rows will be inserted here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Sample validation data
        let validationData = [
            { name: "Maria B. Mercedes", seat: "001", status: "Confirmed / Valid" },
            { name: "Ralph Perocho", seat: "002", status: "Confirmed / Valid" },
            { name: "Axil B. Macabale", seat: "003", status: "Confirmed / Valid" },
            { name: "Ken S. Barbie", seat: "004", status: "Confirmed / Valid" },
            { name: "Dennis Trillo", seat: "005", status: "Confirmed / Valid" },
            { name: "Jhon S. Asong", seat: "006", status: "Confirmed / Valid" },
            { name: "Debbie S. Kwasong", seat: "007", status: "Confirmed / Valid" },
            { name: "Marimar H. Cabahug", seat: "008", status: "Confirmed / Valid" },
            { name: "Johnny Bravo", seat: "009", status: "Confirmed / Valid" }
        ];

        // Function to populate table
        function populateTable() {
            let table = document.getElementById("validationTable");
            table.innerHTML = "";
            
            validationData.forEach(item => {
                let row = `<tr class="border-b">
                    <td class="py-2 px-4">${item.name}</td>
                    <td class="py-2 px-4 font-semibold">${item.seat}</td>
                    <td class="py-2 px-4 text-green-600 font-bold">${item.status}</td>
                </tr>`;
                table.innerHTML += row;
            });
        }

        // Populate table on page load
        populateTable();

        // Logout function
        document.getElementById("logoutBtn").addEventListener("click", function() {
            window.location.href = "/";
        });
    </script>
</body>
</html>

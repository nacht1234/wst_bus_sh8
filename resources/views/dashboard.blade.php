<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard - BusNet</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar Navigation -->
    <aside class="w-64 bg-white p-6 shadow-lg rounded-lg">
        <div class="flex items-center space-x-2 mb-6">
            <div class="text-2xl font-bold">🚌</div>
            <span class="text-lg font-semibold text-gray-700">BusNet</span>
        </div>
            <ul class="space-y-4">
                <li><a href="#" class="block py-2 px-4 bg-blue-800 rounded hover:bg-blue-600" onclick="showSection('dashboard')">Dashboard</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-600" onclick="showSection('book-ticket')">Book Ticket</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-600" onclick="showSection('my-tickets')">My Tickets</a></li>
                <li><a href="#" class="block py-2 px-4 rounded hover:bg-blue-600" onclick="showSection('profile')">Profile</a></li>
                <li><a href="#" class="block py-2 px-4 bg-red-600 rounded hover:bg-red-500" onclick="logout()">Logout</a></li>
            </ul>
        </nav>
    </aside>
    

    <!-- Main Content -->
    <main class="flex-1 flex flex-col items-center justify-center min-h-screen p-6 bg-gradient-to-r from-blue-400 to-blue-600">

        <!-- Dashboard Section -->
        <section id="dashboard" class="content-section">
            <h2 class="text-3xl font-semibold text-blue-700">Welcome, Customer!</h2>
            <p class="mt-2 text-gray-700">Manage your bookings and check ticket statuses.</p>
        </section>

        <!-- Book Ticket Section -->
        <section id="book-ticket" class="content-section hidden">
            <h2 class="text-2xl font-semibold text-blue-700">Book a New Ticket</h2>
            <form id="booking-form" class="mt-4 bg-white p-6 rounded-lg shadow-lg">
                <!-- Date Selection -->
                <label for="travel-date" class="block font-semibold">Select Date:</label>
                <input type="date" id="travel-date" class="w-full p-2 border rounded mb-4" required>

                <!-- Origin Selection -->
                <label for="origin" class="block font-semibold">Select Origin:</label>
                <select id="origin" class="w-full p-2 border rounded mb-4" required>
                    <option value="" disabled selected>Select Origin</option>
                    <option value="Cagayan de Oro">Cagayan de Oro</option>
                    <option value="Manolo Fortich">Manolo Fortich</option>
                    <option value="Malaybalay">Malaybalay</option>
                    <option value="Valencia">Valencia</option>
                    <option value="Maramag">Maramag</option>
                    <option value="Don Carlos">Don Carlos</option>
                    <option value="Kitaotao">Kitaotao</option>
                    <option value="Kibawi">Kibawi</option>
                </select>

                <!-- Destination Selection -->
                <label for="destination" class="block font-semibold">Select Destination:</label>
                <select id="destination" class="w-full p-2 border rounded mb-4" required>
                    <option value="" disabled selected>Select Destination</option>
                    <option value="Cagayan de Oro">Cagayan de Oro</option>
                    <option value="Manolo Fortich">Manolo Fortich</option>
                    <option value="Malaybalay">Malaybalay</option>
                    <option value="Valencia">Valencia</option>
                    <option value="Maramag">Maramag</option>
                    <option value="Don Carlos">Don Carlos</option>
                    <option value="Kitaotao">Kitaotao</option>
                    <option value="Kibawi">Kibawi</option>
                </select>

                <!-- Submit Button -->
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full">Search Buses</button>
            </form>

            <!-- Available Buses Section -->
            <div id="available-buses" class="mt-6 hidden">
                <h3 class="text-xl font-semibold text-blue-700">Available Buses</h3>
                <div id="bus-list" class="mt-4">
                    <!-- Bus options will be dynamically inserted here -->
                </div>
            </div>

            <!-- Seat Selection Section -->
            <div id="seat-selection" class="mt-6 hidden">
                <h3 class="text-xl font-semibold text-blue-700">Select Your Seat</h3>
                <div id="seat-map" class="mt-4 grid grid-cols-4 gap-2">
                    <!-- Seat buttons will be dynamically inserted here -->
                </div>
                <button id="proceed-to-payment" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 w-full hidden">Proceed to Payment</button>
            </div>
            
                <!-- Payment Section -->
            <div id="payment-section" class="mt-6 hidden">
                <h3 class="text-xl font-semibold text-blue-700">Payment</h3>
                <form id="payment-form" class="mt-4 bg-white p-6 rounded-lg shadow-lg">
                    <label for="card-number" class="block font-semibold">Card Number:</label>
                    <input type="text" id="card-number" class="w-full p-2 border rounded mb-4" required placeholder="1234 5678 9012 3456">

                    <label for="expiry-date" class="block font-semibold">Expiry Date:</label>
                    <input type="text" id="expiry-date" class="w-full p-2 border rounded mb-4" required placeholder="MM/YY">

                    <label for="cvv" class="block font-semibold">CVV:</label>
                    <input type="text" id="cvv" class="w-full p-2 border rounded mb-4" required placeholder="123">

                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 w-full">Pay Now</button>
                </form>
            </div>

            <!-- Ticket Section -->
            <div id="ticket-section" class="mt-6 hidden">
                <h3 class="text-xl font-semibold text-blue-700">Your Ticket</h3>
                <div id="ticket-details" class="mt-4 bg-white p-6 rounded-lg shadow-lg">
                    <!-- Ticket details will be dynamically inserted here -->
                </div>
            </div>

        </section>
        
        <!-- My-Ticket Section -->
        <section id="my-tickets" class="content-section hidden">
            <h2 class="text-2xl font-semibold text-blue-700">My Tickets</h2>

            <div class="mt-4 bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold">Your Purchased Tickets:</h3>
                <ul class="mt-4 space-y-4">
                    <li class="ticket-item bg-gray-100 p-4 rounded shadow">
                        <h4 class="font-bold">Ticket ID: 12345</h4>
                        <p><strong>From:</strong> City A</p>
                        <p><strong>To:</strong> City B</p>
                        <p><strong>Date:</strong> YYYY-MM-DD</p>
                        <p><strong>Time:</strong> HH:MM</p>
                        <p><strong>Status:</strong> Confirmed</p>
                    </li>
                    <li class="ticket-item bg-gray-100 p-4 rounded shadow">
                        <h4 class="font-bold">Ticket ID: 67890</h4>
                        <p><strong>From:</strong> City C</p>
                        <p><strong>To:</strong> City D</p>
                        <p><strong>Date:</strong> YYYY-MM-DD</p>
                        <p><strong>Time:</strong> HH:MM</p>
                        <p><strong>Status:</strong> Confirmed</p>
                    </li>
                    <!-- Add more tickets as needed -->
                </ul>
                <div class="mt-6">
                    <button class="bg-blue-600 text-white py-2 px-4 rounded">
                        Add New Ticket
                    </button>
                </div>
            </div>
        </section>

        <!-- Profile Section -->
        <section id="profile" class="content-section hidden">
            <h2 class="text-2xl font-semibold text-blue-700">Profile</h2>
            <div class="mt-4 bg-white p-6 rounded-lg shadow-lg">
                <p class="text-lg font-semibold">Name: John Doe</p>
                <p class="text-lg font-semibold">Email: johndoe@example.com</p>
                <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Edit Profile</button>
            </div>
        </section>
    </main>

    <script>
        document.getElementById('booking-form').addEventListener('submit', function(event) {
        event.preventDefault();
        // Fetch available buses based on selections
        document.getElementById('available-buses').classList.remove('hidden');
        // Populate #bus-list with available bus options
        });
        // Sample bus data
        const buses = [
            { id: 1, name: "Bus A", departure: "08:00 AM", price: 500 },
            { id: 2, name: "Bus B", departure: "09:30 AM", price: 600 },
            { id: 3, name: "Bus C", departure: "11:00 AM", price: 550 },
            { id: 4, name: "Bus D", departure: "01:00 PM", price: 700 },
            { id: 5, name: "Bus E", departure: "03:30 PM", price: 650 },
            { id: 6, name: "Bus F", departure: "05:00 PM", price: 600 },
        ];

        document.getElementById('booking-form').addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Show available buses section
            document.getElementById('available-buses').classList.remove('hidden');
            
            // Clear previous bus list
            const busList = document.getElementById('bus-list');
            busList.innerHTML = '';

            // Randomly select 3 buses from the sample data
            const selectedBuses = [];
            while (selectedBuses.length < 3) {
                const randomIndex = Math.floor(Math.random() * buses.length);
                const bus = buses[randomIndex];
                if (!selectedBuses.includes(bus)) {
                    selectedBuses.push(bus);
                }
            }

            // Populate bus list with selected buses
            selectedBuses.forEach(bus => {
                const busItem = document.createElement('div');
                busItem.className = 'border p-4 mb-2 rounded shadow';
                busItem.innerHTML = `
                    <h4 class="font-semibold">${bus.name}</h4>
                    <p>Departure: ${bus.departure}</p>
                    <p>Price: $${bus.price}</p>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="selectBus(${bus.id})">Select</button>
                `;
                busList.appendChild(busItem);
            });
        });

        // Function to display seat selection after choosing a bus
        function selectBus(busId) {
            document.getElementById('seat-selection').classList.remove('hidden');
            
            // Clear previous seat map
            const seatMap = document.getElementById('seat-map');
            seatMap.innerHTML = '';

            // Generate a sample seat map (4 rows, 4 seats each)
            const totalRows = 4;
            const totalSeatsPerRow = 4;

            for (let row = 0; row < totalRows; row++) {
                for (let seat = 0; seat < totalSeatsPerRow; seat++) {
                    const seatButton = document.createElement('button');
                    seatButton.className = 'seat-button bg-gray-300 p-2 rounded hover:bg-gray-400';
                    seatButton.innerText = `${String.fromCharCode(65 + row)}${seat + 1}`; // A1, A2, B1, etc.
                    seatButton.onclick = function() {
                        selectSeat(seatButton);
                    };
                    seatMap.appendChild(seatButton);
                }
            }
        }

        // Function to handle seat selection
        let selectedSeat = null;
        function selectSeat(seatButton) {
            // Deselect previously selected seat
            if (selectedSeat) {
                selectedSeat.classList.remove('bg-blue-500', 'text-white');
                selectedSeat.classList.add('bg-gray-300');
            }

            // Select the new seat
            selectedSeat = seatButton;
            selectedSeat.classList.add('bg-blue-500', 'text-white');
            selectedSeat.classList.remove('bg-gray-300');

            // Show the proceed to payment button
            document.getElementById('proceed-to-payment').classList.remove('hidden');
        }

        // Proceed to payment button functionality
        document.getElementById('proceed-to-payment').addEventListener('click', function() {
            // Hide seat selection and show payment section
            document.getElementById('seat-selection').classList.add('hidden');
            document.getElementById('payment-section').classList.remove('hidden');
        });

        function generateBookingCode(length = 8) {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                let bookingCode = '';
                for (let i = 0; i < length; i++) {
                    const randomIndex = Math.floor(Math.random() * characters.length);
                    bookingCode += characters[randomIndex];
                }
                return bookingCode;
            }
        // Payment form submission
        document.getElementById('payment-form').addEventListener('submit', function(event) {
            event.preventDefault();

            // Get payment details
            const cardNumber = document.getElementById('card-number').value;
            const expiryDate = document.getElementById('expiry-date').value;
            const cvv = document.getElementById('cvv').value;

            // Basic validation (you can expand this as needed)
            if (!cardNumber || !expiryDate || !cvv) {
                alert("Please fill in all payment details.");
                return;
            }

            // Simulate payment processing
            setTimeout(() => {
                // Hide payment section and show ticket section
                document.getElementById('payment-section').classList.add('hidden');
                document.getElementById('ticket-section').classList.remove('hidden');

                // Display ticket details
                const bookingCode = generateBookingCode(); // Call the function to generate a code
                const ticketDetails = `
                    <p>Thank you for your purchase!</p>
                    <p>Booking Code: ${bookingCode}</p>
                    <p>Card Number: ${cardNumber.replace(/\d(?=\d{4})/g, "*")}</p>
                    <p>Expiry Date: ${expiryDate}</p>
                    <p>Seat: ${selectedSeat ? selectedSeat.innerText : 'N/A'}</p>
                    <p>Payment Status: Successful</p>
                `;
                document.getElementById('ticket-details').innerHTML = ticketDetails;
            }, 2000); // Simulate a 2-second payment processing time
        });

        

        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.add('hidden');
            });

            // Show the selected section
            document.getElementById(sectionId).classList.remove('hidden');
        }

        function logout() {
            window.location.href = "/"; // Redirect to homepage
        }
    </script>

</body>
</html>

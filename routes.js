document.addEventListener('DOMContentLoaded', function() {
    const addRouteBtn = document.getElementById('addRouteBtn');
    const routeTable = document.getElementById('routeTable');

    // Fetch route data from the backend
    async function fetchRouteData() {
        try {
            const response = await fetch('/api/routes');
            if (!response.ok) {
                throw new Error('Failed to fetch route data');
            }
            const data = await response.json();
            return data;
        } catch (error) {
            console.error(error);
        }
    }

    // Add route functionality
    addRouteBtn.addEventListener('click', async function() {
        // Example: Prompt user for route details
        const viaCities = prompt('Enter Via Cities:');
        const bus = prompt('Enter Bus:');
        const departureDate = prompt('Enter Departure Date:');
        const departureTime = prompt('Enter Departure Time:');
        const cost = prompt('Enter Cost:');

        try {
            const response = await fetch('/api/routes', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    viaCities: viaCities,
                    bus: bus,
                    departureDate: departureDate,
                    departureTime: departureTime,
                    cost: cost
                })
            });
            if (response.ok) {
                console.log('Route added successfully');
                renderRouteData(); // Refresh route data after adding
            } else {
                throw new Error('Failed to add route');
            }
        } catch (error) {
            console.error(error);
        }
    });

    // Render route data fetched from the backend
    async function renderRouteData() {
        const routeData = await fetchRouteData();
        const tableBody = routeTable.getElementsByTagName('tbody')[0];
        tableBody.innerHTML = '';

        routeData.forEach(function(route) {
            const row = document.createElement('tr');

            // Create and append table cells for each route property
            const idCell = document.createElement('td');
            idCell.textContent = route.id;
            row.appendChild(idCell);

            // Create cells for other route properties (viaCities, bus, departureDate, departureTime, cost)

            // Add edit and delete buttons with data attributes for route ID
            const editButton = document.createElement('button');
            editButton.textContent = 'Edit';
            editButton.classList.add('edit-button');
            editButton.dataset.routeId = route.id; // Set route ID as a data attribute
            row.appendChild(editButton);

            const deleteButton = document.createElement('button');
            deleteButton.textContent = 'Delete';
            deleteButton.classList.add('delete-button');
            deleteButton.dataset.routeId = route.id; // Set route ID as a data attribute
            row.appendChild(deleteButton);

            tableBody.appendChild(row);
        });

        // Add event listeners for edit and delete buttons
        routeTable.addEventListener('click', async function(event) {
            if (event.target.classList.contains('edit-button')) {
                const routeId = event.target.dataset.routeId;
                // Example: Prompt user to edit route details
                const updatedViaCities = prompt('Enter updated Via Cities:');
                if (updatedViaCities) {
                    try {
                        const response = await fetch(`/api/routes/${routeId}`, {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ viaCities: updatedViaCities })
                        });
                        if (response.ok) {
                            console.log('Route updated successfully');
                            renderRouteData(); // Refresh route data after update
                        } else {
                            throw new Error('Failed to update route');
                        }
                    } catch (error) {
                        console.error(error);
                    }
                }
            } else if (event.target.classList.contains('delete-button')) {
                const confirmDelete = confirm('Are you sure you want to delete this route?');
                if (confirmDelete) {
                    const routeId = event.target.dataset.routeId;
                    try {
                        const response = await fetch(`/api/routes/${routeId}`, {
                            method: 'DELETE'
                        });
                        if (response.ok) {
                            console.log('Route deleted successfully');
                            renderRouteData(); // Refresh route data after deletion
                        } else {
                            throw new Error('Failed to delete route');
                        }
                    } catch (error) {
                        console.error(error);
                    }
                }
            }
        });
    }

    // Initial rendering of route data
    renderRouteData();
});

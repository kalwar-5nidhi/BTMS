document.addEventListener('DOMContentLoaded', function() {
  const dashboardCard = document.getElementById('Dashboard');
  const busesCard = document.getElementById('Buses');

  dashboardCard.addEventListener('click', function() {
      window.location.href = 'dashboard.html';
  });

  busesCard.addEventListener('click', function() {
      window.location.href = 'busesDisplay.php';
  });

  document.getElementById('routes-card').addEventListener('click', function() {
      window.location.href = 'routesDisplay.php';
  });

  document.getElementById('customers-card').addEventListener('click', function() {
      window.location.href = 'customers.html';
  });

  document.getElementById('booking-card').addEventListener('click', function() {
      window.location.href = 'bookingDisplay.php';
  });

  document.getElementById('seats-card').addEventListener('click', function() {
      window.location.href = 'seatsDisplay.php';
  });
});

document.addEventListener('DOMContentLoaded', () => {
    const seats = document.querySelectorAll('.seat');
    const availableCount = document.querySelector('.available-count');
    const selectedCount = document.querySelector('.selected-count');
    const bookedCount = document.querySelector('.booked-count');
  
    let available = 29;
    let selected = 0;
    let booked = 0;
  
    seats.forEach(seat => {
      seat.addEventListener('click', () => {
        if (seat.classList.contains('available')) {
          seat.classList.remove('available');
          seat.classList.add('selected');
          available--;
          selected++;
        } else if (seat.classList.contains('selected')) {
          seat.classList.remove('selected');
          seat.classList.add('available');
          available++;
          selected--;
        }
        updateCounts();
      });
    });
  
    function updateCounts() {
      availableCount.textContent = available;
      selectedCount.textContent = selected;
      bookedCount.textContent = booked;
    }
  
    const bookButton = document.querySelector('.book');
    bookButton.addEventListener('click', () => {
      const selectedSeats = document.querySelectorAll('.selected');
      selectedSeats.forEach(seat => {
        seat.classList.remove('selected');
        seat.classList.add('booked');
        selected--;
        booked++;
        available--;
      });
      updateCounts();
    });
  });
  
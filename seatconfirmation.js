document.addEventListener('DOMContentLoaded', function () {
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
          const confirmed = window.confirm('Do you want to select this seat?');
          if (confirmed) {
            seat.classList.remove('available');
            seat.classList.add('selected');
            available--;
            selected++;
            updateCounts();
          }
        } else if (seat.classList.contains('selected')) {
          seat.classList.remove('selected');
          seat.classList.add('available');
          available++;
          selected--;
          updateCounts();
        }
      });
    });
  
    function updateCounts() {
      availableCount.textContent = available;
      selectedCount.textContent = selected;
      bookedCount.textContent = booked;
    }
  });
  
  
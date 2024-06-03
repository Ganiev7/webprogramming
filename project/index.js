document.querySelectorAll('.card').forEach(card => {
    card.addEventListener('click', function(event) {
      console.log(`Navigating to: ${this.getAttribute('href')}`);
    });
  });
  
// Add any interactivity needed
document.querySelectorAll('.service-card').forEach(card => {
    card.addEventListener('mouseenter', () => {
      card.classList.add('shadow-lg');
    });
    card.addEventListener('mouseleave', () => {
      card.classList.remove('shadow-lg');
    });
  });
  
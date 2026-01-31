const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const form = document.getElementById('form');
const errorElement = document.getElementById('error');

form.addEventListener('submit', (e) => {
  let messages = [];
  errorElement.innerText = '';

  if (emailInput.value.trim() === '') {
    messages.push('Email is required');
  }

  if (passwordInput.value.trim() === '') {
    messages.push('Password is required');
  }

  if (passwordInput.value.length < 6) {
    messages.push('Password must be at least 6 characters');
  }

  if (messages.length > 0) {
    e.preventDefault(); 
    errorElement.innerText = messages.join(', ');
  }
});

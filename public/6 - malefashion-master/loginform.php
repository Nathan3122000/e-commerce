<script>
  // Wait for the DOM to finish loading
  document.addEventListener('DOMContentLoaded', function() {
  
    // Get the login form element
    var loginForm = document.getElementById('login-form');
    
    // Attach an event listener to the form's submit button
    loginForm.addEventListener('submit', function(event) {
    
      // Prevent the form from submitting and reloading the page
      event.preventDefault();
      
      // Get the username and password fields
      var usernameField = document.getElementById('username-field');
      var passwordField = document.getElementById('password-field');
      
      // Get the username and password values
      var username = usernameField.value;
      var password = passwordField.value;
      
      // Check if the username and password are correct
      if (username === 'user123' && password === 'pass456') {
      
        // Redirect to the main page
        window.location.href = 'main.html';
        
      } else {
      
        // Show an error message
        alert('Incorrect username or password.');
        
      }
      
    });
  
  });
</script>

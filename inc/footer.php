<div class="container-fluid bg-white mt-5">
  <div class="row">
    <div class="col-lg-4 p-4">
      <h3 class="h-font fw-bold fs-3 mb-2n ">HOTEL SARA</h3>
      <p class="text-arrange ">
        Hotel Sara—where luxury meets comfort.
        Enjoy elegant stays, comfort rooms,
        warm hospitality <br> in a prime location.
        Whether for a business or <br>leisure,
        your perfect retreat awaits!
      </p>
    </div>

    <div class="col-lg-4 p-4">
      <h5 class="mb-3">Links</h5>
      <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
      <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a><br>
      <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a><br>
      <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none">Contact us</a><br>
      <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About</a><br>
    </div>
    <div class="col-lg-4 p-4">
      <h5 class="mb-3">Follow us</h5>
      <a href="<?php echo $contact_r['tw'] ?>" class="d-inline-block text-dark text-decoration-none mb-2">
        <i class="bi bi-twitter"></i> Twitter
      </a><br>
      <a href="<?php echo $contact_r['fb'] ?>" class="d-inline-block text-dark text-decoration-none mb-2">
        <i class="bi bi-facebook"></i> Facebook
      </a><br>
      <a href="<?php echo $contact_r['insta'] ?>" class="d-inline-block text-dark text-decoration-none">
        <i class="bi bi-instagram"></i> Instagram
      </a><br>
    </div>
  </div>
</div>

<h6 class="text-center bg-dark text-white p-3 m-0">Designed and Developed by Shreya :)</h6>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


<script>
  function setActive() {
    let navbar = document.getElementById('nav-br');
    let a_tags = navbar.getElementsByTagName('a');

    for (i = 0; i < a_tags.length; i++) {
      let file = a_tags[i].href.split('/').pop();
      let file_name = file.split('.')[0];

      if (document.location.href.indexOf(file_name) >= 0) {
        a_tags[i].classList.add('active');

      }

    }
  }


  document.getElementById('registerForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    let form = e.target;
    let data = new FormData(form);

    // Validate passwords match
    let pass = form.elements['pass'].value;
    let cpass = form.elements['cpass'].value;
    if (pass !== cpass) {
      alert('Passwords do not match!');
      return;
    }

    // Show a loading state
    let submitButton = form.querySelector('button[type="submit"]');
    submitButton.disabled = true;
    submitButton.textContent = "Submitting...";

    try {
      let response = await fetch('inc/ajax/register.php', {
        method: 'POST',
        body: data,
      });

      let text = await response.text(); // Capture raw response
      console.log(text); // Check for errors
      let result = JSON.parse(text); // Parse JSON

      alert(result.message);
      if (result.success) {

        let modalEl = document.getElementById('registerModal');
        let modalInstance = bootstrap.Modal.getInstance(modalEl);

        if (modalInstance) {
          modalInstance.hide();
          modalInstance.dispose(); // Properly reset the modal
        }

        // Ensure it's hidden
        setTimeout(() => {
          let newModal = new bootstrap.Modal(modalEl);
          newModal.hide();
        }, 300);
        form.reset();
      }
    } catch (error) {
      alert('An error occurred. Please try again.');
      console.error(error);
    } finally {
      submitButton.disabled = false;
      submitButton.textContent = "REGISTER";
    }
  });

  document.getElementById('loginForm').addEventListener('submit', async (e) => {
    e.preventDefault();

    let form = e.target;
    let formData = new FormData(form);
    let submitButton = form.querySelector('button[type="submit"]');
    let message = document.getElementById('loginMessage');

    // Show loading state
    submitButton.disabled = true;
    submitButton.textContent = "Logging in...";

    try {
      let response = await fetch('inc/ajax/login.php', {
        method: 'POST',
        body: formData
      });

      let result = await response.json();
      message.textContent = result.message;
      message.style.color = result.success ? 'green' : 'red';

      if (result.success) {
        // Close modal after login
        let modalEl = document.getElementById('loginModal');
        let modalInstance = bootstrap.Modal.getInstance(modalEl);
        if (modalInstance) modalInstance.hide();

        // Reload page to update session UI
        setTimeout(() => {
          location.reload();
        }, 1000);
      }
    } catch (error) {
      message.textContent = "An error occurred. Please try again.";
      console.error(error);
    } finally {
      submitButton.disabled = false;
      submitButton.textContent = "LOGIN";
    }
  });

  document.addEventListener("DOMContentLoaded", function() {
    let dropdownElement = document.querySelector("#userDropdown");
    new bootstrap.Dropdown(dropdownElement);
  });
</script>
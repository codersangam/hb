<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Carousel</title>
    <?php require('inc/links1.php'); ?>
</head>
<body class="bg-light">
    <?php require('inc/header1.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4">
                <h4 class="mb-4 fw-bold">Carousel Management</h4>

                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addCarouselModal">Add Carousel</button>
                        <div class="row mt-4" id="carousel-data">
                            <!-- Carousel data will load here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Carousel Modal -->
    <div class="modal fade" id="addCarouselModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Carousel Image</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add-carousel-form">
                        <div class="mb-3">
                            <label for="carousel-title" class="form-label">Title</label>
                            <input type="text" id="carousel-title" class="form-control" placeholder="Enter image title">
                        </div>
                        <div class="mb-3">
                            <label for="carousel-image" class="form-label">Carousel Image</label>
                            <input type="file" id="carousel-image" class="form-control">
                        </div>
                        <button type="button" class="btn btn-primary" onclick="addCarousel()">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Load carousel images
        function loadCarousel() {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'ajax/carousel_crud.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (this.status === 200) {
                    document.getElementById('carousel-data').innerHTML = this.responseText;
                } else {
                    console.error("Failed to load carousel data");
                }
            };
            xhr.send('action=get_carousel_data');
        }

        // Add new carousel image
        function addCarousel() {
            const title = document.getElementById('carousel-title').value.trim();
            const imageInput = document.getElementById('carousel-image');
            const image = imageInput.files[0];

            if (!title) {
                alert('Please enter a title.');
                return;
            }

            if (!image) {
                alert('Please select an image.');
                return;
            }

            const formData = new FormData();
            formData.append('action', 'add_carousel_image');
            formData.append('title', title);
            formData.append('image', image);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'ajax/carousel_crud.php', true);
            xhr.onload = function () {
                try {
                    const response = JSON.parse(this.responseText);
                    if (response.success) {
                        alert('Image added successfully.');
                        document.getElementById('add-carousel-form').reset();
                        loadCarousel();
                        const modal = bootstrap.Modal.getInstance(document.getElementById('addCarouselModal'));
                        modal.hide();
                    } else {
                        alert('Failed to add image: ' + (response.error || 'Unknown error.'));
                    }
                } catch (error) {
                    console.error('Invalid server response:', this.responseText);
                }
            };
            xhr.send(formData);
        }

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', loadCarousel);
    </script>
    <?php require('inc/scripts.php'); ?>
    <script src="scripts\settings.js"></script>
</body>
</html>

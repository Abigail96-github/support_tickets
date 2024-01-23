<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>{{ $title }}</title>
</head>
<body>
    <div class="container mt-4">
        <div class="card bg-info" style="width: 18rem;">
            <div class="card-body">
                <h3 class="card-title">Support Ticket</h3>
                <p class="card-text">Thank you for logging a support ticket with FoneWorx. Please follow the link below to view your ticket.</p>
                <p>{{ $body }}</p>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="mt-4 bg-dark text-light text-center py-2">
        <p>&copy; FoneWorx. All rights reserved.</p>
    </footer>
</body>
</html>

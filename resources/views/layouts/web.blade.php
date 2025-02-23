<!-- resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Krishna Niswarth Seva Trust')</title> <!-- Default title can be overridden -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <!-- Include the header -->
    @include('web.parts.header')

    <!-- Main content -->
    @yield('content') <!-- This is where page-specific content will be injected -->

    <!-- Include the footer -->
    @include('web.parts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

<script>
    document.getElementById('subscribeForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form from submitting normally
console.log("Submitted");

        // Get the value from the phone number input
        const phone = document.getElementById('phone').value;

        // Validate the phone number (basic validation for length and numeric format)
        if (phone && phone.length >= 10 && !isNaN(phone)) {
            // Replace with your WhatsApp group link
            const whatsappGroupLink = "https://chat.whatsapp.com/IKoFgfff0o64XjKEtutY4P";

            // Create WhatsApp link with the phone number prefilled
            const whatsappLink = whatsappGroupLink.replace('phone_number', phone);

            // Open WhatsApp with the generated link
            window.open(whatsappLink, '_blank');
        } else {
            alert("Please enter a valid phone number.");
        }
    });
</script>

</html>

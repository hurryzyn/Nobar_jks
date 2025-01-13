<!DOCTYPE html>
<html>
<head>
    <title>Booking Anda Telah Berhasil</title>
</head>
<body>
    <h1>Hello, {{ $details['name'] }}</h1>
    <p>Thank you for your booking. Here is your unique code:</p>
    <h2>{{ $details['unique_code'] }}</h2>
    <p>Please keep this code safe and use it for your reference.</p>
    <p>Best regards,</p>
    <p>Nobar Jaksel</p>
</body>
</html>
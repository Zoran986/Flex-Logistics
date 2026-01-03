<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration Reminder</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background: #3b82f6; color: white; padding: 20px; text-align: center; }
        .content { background: #f9fafb; padding: 20px; }
        .footer { background: #e5e7eb; padding: 10px; text-align: center; font-size: 12px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Driver Registration Reminder</h1>
        </div>
        
        <div class="content">
            <h2>Reminder</h2>

<p>Dear {{ $driver->name }},</p>
<p>Your registration expires in one week ({{ $driver->registration_date }}).</p>
</body>
</html>
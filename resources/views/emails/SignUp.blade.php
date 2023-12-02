<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f5e3f0;
        }

        .email-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .header {
            text-align: center;
            font-size: 24px;
            margin: 1rem 0rem;
        }

        .footer {
            text-align: center;
            font-size: 14px;
            margin: 1rem 0rem;
        }

        .button {
            display: inline-block;
            background-color: #e62375;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Welcome to {{ config('app.name') }} </h1>
    </div>

    Hi {{ $userDetails['company_name'] }}, !
    <br>
    <br>
    You are officially part of the {{ env('APP_NAME') }} family!
    <br>
    <br>
    We want to personally thank you for joining our email list and share some helpful advice on getting started.


    <h3>Use OTP for login</h3>

    <h1>{{ $userDetails['login_otp'] }}</h1>

    Thank you for joining our community.
    <br>
    <br>
    We can’t wait to show you what we have in store!
    <br>

    <div class="footer">
        <p>
            <a href="{{ env('APP_URL') }}" class="button">Visit our website</a>
            <br>
            <br>
            <a class="button" href="{{ config('app.url') . '/privacy-policy' }}">Privacy Policy</a>
            <a class="button" href="{{ config('app.url') . '/terms-condition' }}">Terms of Service</a>
        </p>
    </div>



</body>

</html>

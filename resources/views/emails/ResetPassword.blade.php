<html>

<head>
    <style>
        .container {
            width: 600px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .message {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
        }

        .email-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .otp {
            font-weight: bold;
            font-size: 24px;
            color: #ff0000;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #808080;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="{{ env('APP_URL') }}">
            <img src="{{asset('/storage/images/cms/'.$applogo)}}" alt="Logo" class="logo">
        </a>
        <div class="message">
            <p>Hi {{$details->company_name}},</p>
            <p>We have received a request to reset your password. Please enter the following OTP in the password reset page to verify your identity.</p>
            <p class="otp">{{$details->login_otp}}</p>
            <p>This OTP is valid for 10 minutes only. If you did not request a password reset, please ignore this email.</p>
            <p>Thank you,</p>
            <p>Your Team</p>
        </div>
        <div class="footer">
            <p>This email was sent by Your Company. To stop receiving these emails, you can unsubscribe from our mailing list.</p>
        </div>
    </div>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .email-header {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .email-body {
            margin-bottom: 20px;
        }

        .email-footer {
            font-size: 14px;
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
    <div class="email-header">Thank you for your inquiry&nbsp;</div>
    <div class="email-header"><br />
        <a href="{{ env('APP_URL') }}">
            <img src="{{asset('/storage/images/cms/'.$data['appLogo']['cms_value'])}}" alt="Logo" class="logo">
        </a>
        <h3>
            Dear {{$details['name']}},<br />
        </h3>
        <br />
        Thank you, for reaching out to us and submitting your inquiry through our contact form. We appreciate your interest in our company and value your suggestions and requests. We have received your message and are currently reviewing the details of your inquiry. We will do our best to respond to your message as soon as possible with the information you have requested. Thank you again for taking the time to contact us. We appreciate your feedback and look forward to assisting you further.
    </div>
    <div class="email-header">&nbsp;</div>
    <div class="email-header">Best regards,</div>
    <a href="{{ env('APP_URL') }}" class="button">Visit our website</a>

</body>

</html>
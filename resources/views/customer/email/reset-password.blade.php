<!DOCTYPE html>
<html>

<h1> {{ $details['title'] }}</h1>
<p>{{ $details['temporarypassword'] }}</p>
<p>{{ $details['body'] }}</p>
<a href="{{ route('customer.reset.password.get', $details['token']) }}" target="_blank">Reset Password</a>

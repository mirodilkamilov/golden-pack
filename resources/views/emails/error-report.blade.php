<h2>Dear Admin,</h2>

<p style="color: red;">There was an <strong>error</strong> when user sending the application with the following data:
</p>
<p><strong>Name:</strong> {{ $validated['name'] }}</p>
<p><strong>Phone:</strong> {{ $validated['phone'] }}</p>
<p><strong>Email:</strong> {{ $validated['email'] }}</p>

<p><strong>Please, report to USOFT: 90 008 65 74</strong></p>
<hr>

<h3 style="color: red;">Here is the error details</h3>

<p><strong>Error message: </strong>{{ $exception->getMessage() }}</p>

<p><strong>File name: </strong>{{ $exception->getFile() }} <strong>in the line: {{ $exception->getLine() }}</strong></p>

<p><strong>Trace: </strong>{{ $exception->getTraceAsString() }}</p>

<p>Best regards,</p>
<p>Golden Pack</p>
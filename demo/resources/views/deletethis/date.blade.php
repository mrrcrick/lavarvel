<!DOCTYPE HTML>

<html>
<head>
	
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="author" content="">
	<title>htmlDatePicker Test Page (HTML)</title>
	
	
	<link href="{{asset('htmlDatePicker.css')}}' rel="stylesheet">
	
	<script src="{{ asset('htmlDatePicker.js') }}' type="text/javascript"></script>
	
	

</head>

<body>
<form method="post">
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	Please select a date: 
	<script type="text/javascript"><!--
		var today = new Date();
		
		DisablePast = false;
		range_start = new Date(today.getFullYear(),today.getMonth(),8);
		range_end = new Date(today.getFullYear(),today.getMonth(),5);
	--></script>
	<input type="text" placeholder="Click me!" name="SelectedDate" id="SelectedDate" readonly onClick="GetDate(this);">
	<br>
	<input type="submit">
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</form>
</body>
</html>

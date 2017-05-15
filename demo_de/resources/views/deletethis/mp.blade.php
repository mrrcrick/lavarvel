<!doctype html>
<html>
<head>

<title></title>
</head>
<body>
@include('info')

<p style="color:white;">TEXT*****************************************************************************************:</p>
    <p style="color:white;">TEXT*****************************************************************************************:</p>
	<p style="color:white;">TEXT*****************************************************************************************:</p>
    <div class="container" id="loadeddiv" class="alien" style=" width:300px; background-color: yellow;">
        @yield('content')
    </div>
	
	<script>
	
        alert("loaded div**************: "+place_id);
		
		
		
	</script>
</body>
</html>
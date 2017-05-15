<!DOCTYPE html>
<html>
<body>

<h1>Enter details</h1>


{!! Form::open(array('url'=>'test/')) !!}

<h2>Contact Form</h2>
<span style="font-weight: bold;">First name </span><input
style="font-weight: bold;" name="fname"><br style="font-weight: bold;">
<span style="font-weight: bold;">Last Name </span><input
style="font-weight: bold;" name="lname"><br style="font-weight: bold;">
<span style="font-weight: bold;">Email address</span> <input
name="email"><br>
<br>
<fieldset>
<div style="text-align: center; font-family: Arial;">
<h2 style="text-align: left;"><legend>Identity</legend></h2>
</div>
&nbsp;<span style="font-weight: bold;"> DOB</span><input
style="font-weight: bold;" name="Dob"><br style="font-weight: bold;">
<span style="font-weight: bold;">&nbsp;Password </span><input
style="font-weight: bold;" name="pword"><br>
&nbsp;<span style="font-weight: bold;">Gender</span>
<select name="Gender">
<option>male</option>
<option>female</option>
</select>
<br style="font-weight: bold;">
<br>
</fieldset>
    


{!! Form::close() !!}
</body>
</html>
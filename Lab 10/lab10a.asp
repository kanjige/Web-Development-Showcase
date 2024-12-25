<!DOCTYPE html>
<html lang="en">
<head>
	<title>Lab 10a</title>
</head>
	

<%
bgcol = Request.QueryString("colour")
%>



<%
If Request.Cookies("lastvisit") = "" Then
    Response.Write("Welcome! This is your first visit to this page.")
Else
    Dim lastvisit
    lastvisit = Request.Cookies("lastvisit")
    Response.Write("Welcome back! Your last visit was on: " & lastvisit)
End If

Dim updatetime
updatetime = Now() 
Response.Cookies("lastvisit") = updatetime

%>


<body style="background-color:#<% response.write(bgcol) %>">

</body></html>
#!/usr/bin/env python3

import cgi
import cgitb


cgitb.enable()


form = cgi.FieldStorage()
city = form.getvalue('city', '').upper()
prostate = form.getvalue('prostate', '').upper()
country = form.getvalue('country', '').upper()
img = form.getvalue('img', '')


print("Content-type: text/html\n")


print(f"""
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>City Information</title>
    <style>
        
        body {{
            font-family: Calibri;
            text-align: center;
            background-color: #FAF9F6;
        }}
        h1 {{
            font-size: 50px;
            color: #FAF9F6;
            background-color: #313639;
            font-family: Calibri;
            padding:15px
        }}
        p {{
            color: #FAF9F6;
            background-color: #313639;
            font-family: Calibri;
        }}
        img {{
            width: 80%;
            height: auto;
            border: 20px solid #313639;
        }}
    </style>
</head>
<body>
    <h1>{city}, {country}</h1>
    <p>Province/State: {prostate}</p>
    <img src="{img}" alt="Image of {city}">
</body>
</html>
""")
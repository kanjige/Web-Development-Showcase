#!/usr/bin/perl -wT
use CGI':standard';
use CGI::Carp qw(warningsToBrowser fatalsToBrowser);

print "Content-type: text/html\n\n";


print <<"start";

<html>
    <head>
        <title>Lab 7a</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.99">
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Qwitcher+Grypen:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    </head>

    <h1 style="text-align: center; color: firebrick; font-family: 'Roboto', sans-serif; font-size: 100px;">This is my first Perl program</h1>

</html>

start
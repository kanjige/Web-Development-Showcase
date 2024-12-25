#!/usr/bin/perl -wT 
use CGI qw(:standard); 
use CGI::Carp qw(warningsToBrowser fatalsToBrowser); 
use File::Basename;

my $query = CGI->new;
print $query->header;

my $upload_dir = "../lab07/upload"; 
my $safe_filename_characters = "a-zA-Z0-9_.-"; 

my $firstname = $query->param('firstname');
my $lastname = $query->param('lastname');
my $street = $query->param('street');
my $city = $query->param('city');
my $postalcode = $query->param('postalcode');
my $province = $query->param('province');
my $phone = $query->param('phone');
my $email = $query->param('email');
my $picture = $query->upload('picture');

my $error = 0;

if ($phone !~ /^\d{10}$/) {
    print "<p>Phone Number must be 10 digits (numbers only)</p>";
    $error = 1;
}
if ($postalcode !~ /^[A-Z]\d[A-Z] \d[A-Z]\d$/) {
    print "<p>Postal Code must follow the format: L0L 0L0</p>";
    $error = 1;
}
if ($email !~ /^[\w\.-]+@[a-z\d\.-]+\.[a-z]{1,}$/i) {
    print "<p>Email Address format invalid</p>";
    $error = 1;
}

if ($error) {
    print "<p><a href='https://www2.cs.torontomu.ca/~e12wong/lab07/lab07b.html'>Go Back</a></p>";
    exit;
}

my $filename = $query->param("picture"); 
my ( $name, $path, $extension ) = fileparse($filename, '\..*'); 
$filename = $name . $extension; 
$filename =~ tr/ /_/; 
$filename =~ s/[^$safe_filename_characters]//g;

my @allowed_extensions = qw(.jpg .jpeg .png .gif);
unless (grep { $_ eq $extension } @allowed_extensions) {
    die "Unsupported file extension";
}

my $upload_filehandle = $query->upload("picture"); 
open (my $UPLOADFILE, ">", "$upload_dir/$filename") or die "$!"; 
binmode $UPLOADFILE;
while (<$upload_filehandle>) { print $UPLOADFILE $_; } 
close $UPLOADFILE;

print <<END_HTML; 

<html>
    <head>
        <title>Lab 7a</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=0.99">
       
    <style>
        body { 
            max-width: 43%; margin: auto;
            font-family: 'Roboto', sans-serif;
        }
    </style>

    <body >
        <h3>Thank you for using our custom passport generator. Here is the expected result:</h3>

        <section style="border-style: solid; border-width: 1px; border-color: black; overflow: auto;">
            <h3 style="text-align: center;">Confucian Islands Passport</h3>
            <div style="float: left; margin: 2%;">
                <p>Name: $firstname $lastname</p>
                <p>Address: $street, $postalcode, $city, $province</p>
                <p>Phone: $phone</p>
                <p>Email: $email</p>
            </div>
            <div style="float: left; margin: 2%;">
                <br>
                <img src="https://www.cs.torontomu.ca/~e12wong/lab07/upload/$filename" alt="Passport Photo" style="height: 100px; width: 100px;">
            </div>
        </section>
        <br><br><br>
        <p><a href='https://www2.cs.torontomu.ca/~e12wong/lab07/lab07b.html'>Remake Passport</a></p>

    </body>
</html>

END_HTML

To setup the localhost, follow these instructions:

# 1. Navigate to the folder

Open your terminal from anywhere. Then run this command in PowerShell:

cd "Group Project\WUC\Commercial"

For example, on my device, it would be:

cd "C:\Users\docad\OneDrive - The University of Northampton\Course Content\Year 2\Group Project\WUC\RMS"

# 2. Setup PHP & APACHE, using the public folder as the website root

Run this command through the terminal; this will set up the php-apache link
that will allow the localhost to recognise the webpage, rather than printing
the contents of the PHP file as plaintext

docker run --rm -d -p 8080:80 -v "${PWD}/public:/var/www/html" php:8.2-apache

# 3. Go to localhost in your browser of choice

Go to this web link, and you should be seeing the index page: http://localhost:8080

You may need to run this each time upon restart; for some reason that I am unaware of, the docker container deletes itself once you close Docker Desktop.
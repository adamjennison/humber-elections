## Humber Elections
This is to be a direct port of the Ruby based elections app that Adrian Short wrote.
https://github.com/adrianshort/Sutton-Elections

You can see it in action here:
http://www.suttonelections.org.uk/

I'm porting it across to PHP - Laravel [4]
I'm doing this to help me understand the Laravel framework but more importantly it's a good application that helps the public find out information about polling, voting and candidates in a very easy way.

This can only be a good thing.

I want this up and running in time for the May 2015 elections and it will cover all four of the pan-Humber Local Authorities; 
Hull City Council,
East Riding of Yorkshire Council, 
North East Lincolnshire Council and 
North Lincolnshire Council.

This app requires PHP =>5.3

*More setup details to go here later*

````shell
php artisan cache:clear
composer dump-autoload
php artisan migrate --seed  //set up database and seed
````

Goto `http://<server name>/candidates`

# slouchin

Cookie-based authentication example in PHP for CouchDB.

## Setup
### Pre-reqs
0. Install and run CouchDB (on port 5984);
   0. Setup an admin account for your CouchDB (if you haven't already)
1. Copy the contents of the 'src' folder of the [Sag project fork by BigBlueHat](http://github.com/BigBlueHat/sag) into a 'Sag' folder inside this directory. The fork includes the cookie authentication code.
2. Create a "slouchin_test" database
3. Set both Admin and Reader permissions on that database to the admin account you created above (see "Security..." for that DB in Futon)
4. Load up the slouchin index.html file
5. Login with the admin account you just created

After login, you'll be taken to a "private.php" page which just outputs some text (think the page from your old app).

Next, follow the link to the "storedoc.php" page. At that page, a CouchDB doc will be generated and the result of the PUT operation will be output.

storedoc.php uses the CouchDB AuthSession cookie it got during login to re-authenticate (cookie style) your session and let you, the admin, save the doc. In this slouchin example, the AuthSession is stored as the PHP session ID, but it could be stored within $_SESSION if you wanted to use PHP's auto-generated session ID (or your own, or whatever).

Currently (because this is just a simple demo), if you delete the cookie, and try and access the storedoc.php file again, you should get an unauthorized notice rather than being redirected to the login page.

## Summary

Using this simple example, you should be able to setup CouchDB as your user/profile management system (with a bit more work), use CouchDB for session expiration, and do whatever else you might want to with CouchDB thanks to Sag.

## License

Apache License 2.0

## Special Thanks to...

[Sag: PHP on CouchDB](http://www.saggingcouch.com/)
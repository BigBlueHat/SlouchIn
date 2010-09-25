# slouchin

Cookie-based authentication example in PHP for CouchDB.

## Setup
0. Install and run CouchDB (on port 5984);
0.1. Setup an admin account for your CouchDB (if you haven't already)
1. Create a "slouchin_test" database
2. Set both Admin and Reader permissions on that database to the admin account you created above (see "Security..." for that DB in Futon)
3. Load up the slouchin index.html file
4. Login with the admin account you just created

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
p2.visualedgedev.com
====================

CSCI E-15 Project 2

Open Items and Notes

1.  I was unable to correctly upload and display a default profile picture for users.  
Currently a broken image is displayed with a CSS "?" background until the user uploads the photo.
The (currently broken) image is needed in my model so that users can view the posts of others who have not 
tey uploaded a profile picture as there is an inner join to pull together the picture.

2.  I failed to complete error messages for a invalid file type as profile picture upload ro a blank file.  
Currently the user is simply redirected back to the profile page with no warning.

3.  A blank bio update does not display a warning, but rather does not go through or update.

4.  I did not setup the default join for a user to follow himself upon signup.  Currently, the user must perform
this process manually.

5.  There is no message letting users know they are not following anyone if their profile of followers is blank.

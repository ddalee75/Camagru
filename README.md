https://www.chinglinlee.com/portfolio-item/camagru/<br><br>

Overview <br><br>
• You are free to use any language to create your server-side application, but, for every function that you use you must check that an equivalent exist in PHP standard library<br>
• Client-side, your pages must use HTML, CSS and JavaScript<br>
• No library / framework allowed<br>
• Compatible with the latest up to date version of Chrome, FireFox.<br><br>

Build dev<br>
make<br>
• Use Docker in a VM for root mode<br>
• The website should be deployed by only one command :<br>
make (of Makefile)<br>

Common features<br>
• Any password stored must be hashed<br>
• Inject HTML or “user” JavaScript in badly protected variables is not allowed<br>
• Upload unwanted content on the server is not allowed<br><br>

User features<br>
• The application should allow a user to sign up by asking at least a valid email address, an username and a password with at least a minimum level of complexity.<br>
• The user should confirm his account via a unique link sent at the email address fullfiled in the registration form.<br>
• The user should be able to tell the application to send a password reinitialisation mail, if he forget his password.<br>
• The user should be able to tell the application to send a password reinitialisation mail, if he forget his password.<br>
• The user should be able to disconnect in one click at any time on any page.<br>
• The user should be able to modify his username, mail address or password.<br><br>

Gallery features<br>
• This part is to be public and must display all the images edited by all the users, ordered by date of creation. It should also allow (only) a connected user to like them and/or comment them.<br>
• When an image receives a new comment, the author of the image should be notified by email. This preference must be set as true by default but can be deactivated in user’s preferences.<br>
• You should allow the upload of a user image instead of capturing one with the webcam.<br>
• The list of images must be paginated, with at least 5 elements per page.<br><br>

Webcam features<br>
• This part should be accessible only to users that are authentified/connected and gently reject all other users that attempt to access it without being successfully logged in.<br>
• A main section containing the preview of the user’s webcam, the list of superposable images and a button allowing to capture a picture.<br>
• A side section displaying thumbnails of all previous pictures taken.<br>
• Superposable images must be selectable and the button allowing to take the picture should be inactive (not clickable) as long as no superposable image has been selected.<br>
• The creation of the final image (so among others the superposing of the two images) must be done on the server side.<br>
• The user should be able to delete his edited images, but only his, not other users’ creations.<br><br>

Bonus part<br>
• “AJAXify” exchanges with the server.<br>
• Propose a live preview of the edited result, directly on the webcam preview. We should note that this is much easier than it looks.<br>
• Offer the possibility to a user to share his images on social networks.<br><br>


# Camagru
![Screenshot from 2022-09-06 18-01-58](https://user-images.githubusercontent.com/92326016/188685674-ddf1d4d4-644e-40ca-b776-ce99b5f6428c.png)
![Screenshot from 2022-09-06 18-03-10](https://user-images.githubusercontent.com/92326016/188685752-f086f337-7fa4-49af-8a30-26f550cb2090.png)
![Screenshot from 2022-09-06 18-04-12](https://user-images.githubusercontent.com/92326016/188685792-c7c3627a-8d67-4bb6-af45-db125cc2d367.png)
![Screenshot from 2022-09-06 18-04-41](https://user-images.githubusercontent.com/92326016/188685796-8d5b8ce1-4e5c-4955-9592-46ccc6eb3177.png)
![Screenshot from 2022-09-06 18-06-11](https://user-images.githubusercontent.com/92326016/188685947-8bb2ea1e-662f-4126-b8e7-6b0fd00ef9d9.png)
![Screenshot from 2022-09-06 18-06-54](https://user-images.githubusercontent.com/92326016/188685951-cb0f0ff3-0470-4e74-ab44-d45bba995709.png)
![Screenshot from 2022-09-06 18-07-17](https://user-images.githubusercontent.com/92326016/188685953-1c5b453d-33e3-465d-b962-47cea4b6acce.png)


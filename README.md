<h1>HostelConnect: A Bridge to Ideal University Students Accommodation </h1>
<p>HostelConnect is a web-based application designed to streamline the hostel search process, provide detailed accommodation information, and facilitate effective roommate matching to mitigate conflicts. The current hostel search process is inneficient, and their is poor communication channels between hostel managers and residents. The primary purpose of HostelConnect is to assist students in easily finding and applying for their ideal hostel while enhancing communication between hostel managers and current residents to increase student satisfaction with their accommodations.. </p>

<h2> External Frameworks and Packages Used: </h2>

[Laravel](https://laravel.com/) 

[Node.js](https://node.js.org/en)

[React.js](https://react.dev)

[React Native](https://reactnative.dev)

<h2>Setup/Installation Instructions for HostelConnect</h2>
Ensure you have composer and Xampp<br>

Download the project from here.<br>

Locate the file and move it to your htdocs which is in the xammp folder.<br>

Go to the folder application using cd command on your cmd or terminal<br>

Run the Composer install command from the Terminal:

    composer install

Copy .env.example file to .env on the root folder.<br>
You can type into the cmd

    copy .env.example .env 

Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.

Run 

     php artisan key:generate
     
Run 

     php artisan migrate

Now you're ready to start using the shoppingcart in your application.

<h2>Usage instructions</h2>

Ensure that you have made the database and <br>

Xampp Apache and Mysql are running

Run 
     
     php artisan serve
     
then 
Go to http://localhost:8000/

If you're using Laravel 7.5, this is all there is to do. 

<h2>Usage examples</h2>

<h4>Searching and applying for hostels(Prospective Student Module)</h4>!
<ul>
<li>login to the account</li>
<li>Go to the properties page use filters to find your ideal hostel.</li>
<li>Select the view Details of the hostel and select the apply button.</li>
<li>Fill in the form and wait for contact from the hostel manager.</li>
</ul>

<h4>Managing Hostel info and Communicating with Residents (Hostel Manager Module)</h4>
![Screenshot 2024-07-13 143550](https://github.com/user-attachments/assets/9331c8f8-41eb-4e27-abba-7657aaa5bae0)

<ul>
<li>login to the account</li>
<li>Go to dashboard</li>
<li>Create or Update Hostel information</li>
<li>Add or remove Residents to your hostel</li>
<li>Post notifications for Residents to view</li>
<li>View and update the status of tickets posted by residents</li>
<li>Add and analyse Hoatel Expenditure</li>
</ul>

<h4>Managing hostel managers (Admin Module)</h4>
<ul>
<li>login to the account</li>
<li>Go to dashboard</li>
<li>Look through hostel managers and determine who to accept into the system and who to remove</li>![Screenshot 2024-07-13 143938](https://github.com/user-attachments/assets/93d147d2-44ed-4608-9328-8284190484c8)
</ul>

<h2>Project Structure</h2>

```
C:.
├───app
│   ├───Console
│   ├───Exceptions
│   ├───Http
│   │   ├───Controllers
│   │   └───Middleware
│   ├───Mail
│   └───Providers
├───bootstrap
│   └───cache
├───config
├───database
│   ├───factories
│   ├───migrations
│   └───seeds
├───public
│   ├───css
│   ├───images
│   ├───js
│   ├───photos
│   └───storage
│       └───photos
+---resources
|   +---js
|   |       app.js
|   |       bootstrap.js
|   |
|   +---lang
|   |   \---en
|   |           auth.php
|   |           pagination.php
|   |           passwords.php
|   |           validation.php
|   |
|   +---sass
|   |       app.scss
|   |
|   \---views
|       |   home.blade.php
|       |   welcome.blade.php
|       |
|       +---admin
|       |       charts.blade.php
|       |       flagged-reviews.blade.php
|       |
|       +---analytics
|       |       index.blade.php
|       |
|       +---auth
|       |       forget_password.blade.php
|       |       login.blade.php
|       |       register.blade.php
|       |       reset_password.blade.php
|       |
|       +---emails
|       |   |   hostel-application.blade.php
|       |   |   new_caretaker_request.blade.php
|       |   |   resident_invitation.blade.php
|       |   |
|       |   \---auth
|       |           email_verification_mail.blade.php
|       |           forget_password_mail.blade.php
|       |
|       +---expenditures
|       |       analysis.blade.php
|       |       index.blade.php
|       |
|       +---hostels
|       |       apply.blade.php
|       |       general.blade.php
|       |       residents.blade.php
|       |       review.blade.php
|       |       show.blade.php
|       |
|       +---layout
|       |       main-layout.blade.php
|       |
|       +---notifications
|       |       create.blade.php
|       |       edit.blade.php
|       |       index.blade.php
|       |       view.blade.php
|       |
|       +---partials
|       |   \---modals
|       |           login.blade.php
|       |           register.blade.php
|       |
|       +---payment
|       |       form.blade.php
|       |
|       +---profile
|       |       change_password.blade.php
|       |       dashboard.blade.php
|       |       edit_profile.blade.php
|       |       hostelinfo.blade.php
|       |       hostel_info.blade.php
|       |       manager.blade.php
|       |       profile-layout.blade.php
|       |       search_user.blade.php
|       |       user_desc.blade.php
|       |
|       \---tickets
|               create.blade.php
|               edit.blade.php
|               index.blade.php
|               view.blade.php
|
+---routes
|       api.php
|       channels.php
|       console.php
|      web.php
-----------------
```
<h3>Key folders</h3>

- Resoures/views -  Has all the pages for the Website
- App/Http/Controllers - Has all the backend functionalities 

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).



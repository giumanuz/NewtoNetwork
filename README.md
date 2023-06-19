
<div align="center">
<h1 align="center">
<img src="https://thenounproject.com/api/private/icons/186398/edit/?backgroundShape=SQUARE&backgroundShapeColor=%23000000&backgroundShapeOpacity=0&exportSize=752&flipX=false&flipY=false&foregroundColor=%23000000&foregroundOpacity=1&imageFormat=png&rotation=0" width="300" />

NewtoNetwork
</h1>
<h3 align="center">📍 Join the network evolution with NewtoNetwork on GitHub!</h3>
<h3 align="center">⚙️ Developed with the software and tools below:</h3>

<p align="center">
<!-- add html -->
<img src="https://img.shields.io/badge/HTML5-E34F26.svg?style=for-the-badge&logo=HTML5&logoColor=white" alt="HTML5" />
<img src="https://img.shields.io/badge/CSS3-1572B6.svg?style=for-the-badge&logo=CSS3&logoColor=white" alt="CSS3" />
<img src="https://img.shields.io/badge/Bootstrap-7952B3.svg?style=for-the-badge&logo=Bootstrap&logoColor=white" alt="Bootstrap" />
<img src="https://img.shields.io/badge/JavaScript-F7DF1E.svg?style=for-the-badge&logo=JavaScript&logoColor=black" alt="JavaScript" />
<img src="https://img.shields.io/badge/PHP-777BB4.svg?style=for-the-badge&logo=PHP&logoColor=white" alt="PHP" />
</p>
</div>

---

## 📚 Table of Contents
- [📚 Table of Contents](#-table-of-contents)
- [📍 Overview](#-overview)
- [💫 Features](#-features)
- [📂 Project Structure](#project-structure)
- [🧩 Modules](#modules)
- [🚀 Getting Started](#-getting-started)
- [🗺 Roadmap](#-roadmap)
- [🤝 Contributing](#-contributing)
- [📄 License](#-license)
- [👏 Acknowledgments](#-acknowledgments)

---


## 📍 Overview

The purpose of this project is to develop a social network focused on STEM (Science, Technology, Engineering, and Mathematics) topics, where users can share their knowledge, collaborate, and build an active community. The Full Stack application will enable users to post content, comment, assign 'likes', send private messages, and manage friend requests.

---

## 💫 Features

- **User Interface**: A clean and intuitive user interface that facilitates navigation and interaction with STEM content.

- **Registration and Authentication**: Users will be able to register and authenticate to access the social network's features.

- **Content Creation**: Users will be able to create posts, which can include text, images, videos, and links to external resources related to STEM topics.

- **Comments and Reactions**: Users will be able to comment on posts and react to them with 'likes' or other predefined reactions.

- **Private Messaging**: Implementation of a messaging system that will allow users to communicate privately.

- **Friend Requests**: Users will have the ability to send and receive friend requests, and manage their friend list.

- **User Profile**: Each user will have a personal profile that will include information such as name, picture, brief biographical information, and a list of posts created.

- **Search and Filters**: Users will be able to search for content, topics or other users and filter results based on specific criteria.

- **Notifications**: A notification system will inform users of new comments, 'likes', messages, and friend requests.

- **Security and Privacy**: Implementation of security measures to protect user data and ensure privacy.

- **Responsiveness**: The interface will be optimized for different devices, including desktops, tablets, and smartphones.

This project aims to create a platform that not only promotes learning and sharing of knowledge in the STEM field but also fosters the creation of a community where users can interact and collaborate.



---


## 📂 Project Structure


```bash
repo
├── connection.php
├── createUsersDatabase.sql
├── css
│   ├── index.css
│   └── login.css
├── curious.php
├── homepage.php
├── images
├── index.php
├── js
│   ├── index.js
│   ├── login.js
│   ├── registration.js
│   └── requestHandler.js
├── pages
│   ├── addFriendPopup.php
│   ├── addMessage.php
│   ├── addQuote.php
│   ├── buttonPrintPostAndPopup.php
│   ├── feeds.php
│   ├── friendRequests.php
│   ├── leftContainer.php
│   ├── login.php
│   ├── main.php
│   ├── messagePopup.php
│   ├── messages.php
│   ├── middleContainer.php
│   ├── navigationBar.php
│   ├── notificationPopup.php
│   ├── preparePrintPost.php
│   ├── printChat.php
│   ├── printMessage.php
│   ├── printNotification.php
│   ├── printPost.php
│   ├── printRequest.php
│   ├── quoteOfTheMoment.php
│   ├── registration.php
│   ├── rightContainer.php
│   ├── setGlobalVariables.php
│   └── sidebar.php
├── quotes
└── script
    ├── acceptRequest.php
    ├── addComment.php
    ├── backAddFriend.php
    ├── backAddMessage.php
    ├── backLogin.php
    ├── backPost.php
    ├── backQuote.php
    ├── backRegistration.php
    ├── clearNotifications.php
    ├── convertTimeFromTimestampToTime.php
    ├── discardRequest.php
    ├── getArrayPhotoLike.php
    ├── getUserLike.php
    ├── leaveLike.php
    ├── logout.php
    ├── printLikePhotos.php
    ├── printPhoto.php
    ├── removeLike.php
    ├── setGlobalVariables.php
    ├── showComments.php
    └── showProfiles.php

11 directories, 97 files
```

---

## 🧩 Modules

<details closed><summary>Css</summary>

| File      | Summary                                                                                                                                                                                                                                                                                                                         | Module        |
|:----------|:--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|:--------------|
| login.css | The code provides a basic login form styling with Poppins font, a dark and light color theme, and custom CSS variables for color, border-radius, and typography. The form includes animation effects like input focus and border transition. The layout is also optimized for smaller screen sizes with a scrollable container. | css/login.css |
| index.css | The provided CSS code is for the index.css file. It includes styling rules for various elements such as fonts, colors, layout, buttons, and sidebar. The code also includes media queries for adjusting the layout for different screen sizes. Overall, it provides a comprehensive set of styles to create a visually appealing and responsive web page layout.                                                                                                                                                                                              | css/index.css | 
|           |                                                                                                                                                                                                                                                                         |               |

</details>

<details closed><summary>Js</summary>

| File              | Summary                                                                                                                                                                                                                                                                                                                                                                                                                                                        | Module               |
|:------------------|:---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|:---------------------|
| registration.js   | This code snippet is a form validation for a user registration form, triggered by the form's submission. It checks the password requirements for matching, length, uppercase letter(s), and special character(s), as well as the user age, and validates the server-side registration through Ajax. In case of errors in the form, an error message is displayed.                                                                                              | js/registration.js   |
| index.js          | The code snippet includes various functionalities such as sidebar navigation with active item highlighting, message search, liking of posts, commenting on posts, sending messages, making friends, searching profiles, and adding friends, with AJAX and event listeners used. The implementation of each feature includes various functions responsible for performing activities like sending likes, adding comments, adding friends, and sending messages. | js/index.js          |
| login.js          | The provided JavaScript code is used to handle form submission, make an AJAX request to a server, and display error messages. It includes event listeners, functions, and jQuery methods. Overall, it allows for user authentication and redirects based on the server's response.                                        | js/login.js          |
| requestHandler.js | The code defines two click event listeners, one for buttons with a class of'btn-accept' and one for buttons with a class of'btn-decline'. These listeners fire off two separate functions, which make asynchronous HTTP GET requests to the server and perform some unique actions depending on the situation. Each of these functions takes the username as a parameter.                                                                                      | js/requestHandler.js |

</details>

<details closed><summary>Pages</summary>

| File                        | Summary                                                                                                                                                                                                                                                                                                                                                                                                                                                                             | Module                            |
|:----------------------------|:------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|:----------------------------------|
| printRequest.php            | The provided code defines a PHP function called "printRequest" that creates a HTML template for displaying user profile information and friend request options. The function takes several parameters, including the user's name, surname, profile photo data, username, and number of mutual friends. The output of the function is a string containing the HTML template.                                                                                                         | pages/printRequest.php            |
| quoteOfTheMoment.php        | This PHP code snippet selects a random quote from a PostgreSQL database and extracts its content, writer name, associated photo, and file extension. The extracted data is then used to construct an HTML component that displays the quote, writer name, and photo in a card-style block.                                                                                                                                                                                          | pages/quoteOfTheMoment.php        |
| addFriendPopup.php          | The code is a PHP script that generates a friends popup menu for a social networking platform. It retrieves user data from a database and populates a div element with search functionality and user profile cards. It also includes options to add or reject friend requests through icons displayed within each profile card.                                                                                                                                                     | pages/addFriendPopup.php          |
| login.php                   | The code defines an HTML login form with two text input fields for username and password. It checks if a session variable'username' is set. If set, it redirects to the homepage'/index.php'. In case the user is not a member, a link'Signup' is provided for registration along with a login button. The form data is submitted using the HTTP post method to a server-side script where the login validation process is performed.                                               | pages/login.php                   |
| friendRequests.php          | This code snippet retrieves friend requests for a user from a PostgreSQL database using PHP. The user's requests are displayed along with their name, photo, and number of mutual friends. It utilizes a helper function called'printRequest' to display the requests.                                                                                                                                                                                                              | pages/friendRequests.php          |
| main.php                    | This code snippet includes two PHP includes that link to specific pages on the website-leftContainer and middleContainer-both of which are contained within a main container. The main container is a structural element used in HTML coding, and requires closing out with a corresponding tag at the end of the code.                                                                                                                                                             | pages/main.php                    |
| leftContainer.php           | The provided code snippet displays a profile with the photo, first name, surname, and username of the account owner. It also includes a sidebar and a print post button which will open a popup to print the post.                                                                                                                                                                                                                                                                  | pages/leftContainer.php           |
| addMessage.php              | The code shows an HTML form that allows a user to send a message to a friend. It sends the data to a PHP script located at `/script/backAddMessage.php` using the HTTP POST method after validating that all required fields are filled. The PHP script shows two error messages if the user enters an invalid username or tries to follow themselves.                                                                                                                              | pages/addMessage.php              |
| printPost.php               | The code snippet is a PHP script that defines two different functions, printLikesBox and printPost. The former generates an HTML block displaying the liked status of a post, while the latter spits out a complete HTML chunk that represents a post in a social media feed, along with some JavaScript commands. The functions commonly use a series of variables and dependencies to show essential aspects of a social media account like profiles, interactions, and comments. | pages/printPost.php               |
| notificationPopup.php       | This code snippet presents a popup menu for notifications. It fetches notification data from a database and displays it in the popup using the function printNotification. Additionally, it includes a menu item to write a message displayed as an envelope icon.                                                                                                                                                                                                                  | pages/notificationPopup.php       |
| printMessage.php            | The provided code defines a PHP function that generates and returns an HTML string representing a chat message. The function accepts a sender name, message text, and a photo in binary format. The photo will be converted to base64 and included in the HTML code alongside the sender and message.                                                                                                                                                                               | pages/printMessage.php            |
| printNotification.php       | The provided code snippet defines a PHP function named "printNotification" that takes six input parameters (name, surname, photoProfile, extensionProfile, notification_content, and date). The function returns an HTML-formatted div element that includes the provided parameters and displays an image in base64 format. The HTML code also includes a horizontal line to separate each notification.                                                                           | pages/printNotification.php       |
| messagePopup.php            | The provided code snippet shows a popup form for writing and sending messages. The form allows the selection of a receiver and prompts for a message to send. It also includes an error message for incorrect input. When the user clicks the "Send" button, the form is submitted.                                                                                                                                                                                                 | pages/messagePopup.php            |
| preparePrintPost.php        | This PHP code snippet retrieves posts from a database, filterable by category or writer, and displays them on a webpage. It also retrieves user profile photos and like counts for each post and formats the display using a printPost function.                                                                                                                                                                                                                                    | pages/preparePrintPost.php        |
| rightContainer.php          | The code snippet includes two PHP files: "messages.php" and "friendRequests.php". The function "include_once()" adds these files into the current PHP script, importing the defined variables and functions inside into the main script's namespace.                                                                                                                                                                                                                                | pages/rightContainer.php          |
| middleContainer.php         | This code includes three PHP files-`quoteOfTheMoment.php`, `feeds.php`, and `rightContainer.php`-which are likely used to generate dynamic content for a web page. The `include_once` statement ensures that the code in these files will be executed if they haven't already been included. Finally, the code is written within a `div` element with a class of "middle".                                                                                                          | pages/middleContainer.php         |
| printChat.php               | This PHP code snippet retrieves the messages sent to a specific user from a database, orders them by creation date, fetches additional user information (such as photo) related to each message and uses the'printMessage' function to output each message alongside its sender's details in an HTML element.                                                                                                                                                                       | pages/printChat.php               |
| addQuote.php                | This code snippet is an HTML/PHP form that allows users to create a new quote with a writer, phrase, and optional photo upload. It includes error handling for uploading large or failed photo uploads and utilizes functions from an included navigationBar.php file.                                                                                                                                                                                                              | pages/addQuote.php                |
| buttonPrintPostAndPopup.php | The provided code is responsible for creating a "Create Post" button that, when clicked, shows a modal form allowing users to upload an image, provide a post description, and select a category for the post. The form is submitted to the back-end once the user clicks the "Add post" button.                                                                                                                                                                                    | pages/buttonPrintPostAndPopup.php |
| setGlobalVariables.php      | This code snippet checks if a'username' session is set. If set, it selects all user details from the database based on the username, and assigns the retrieved values to corresponding variables. If the session isn't set, it assigns default/placeholder values for these variables. The snippet assumes connection to a PostgreSQL database.                                                                                                                                     | pages/setGlobalVariables.php      |
| registration.php            | This is an HTML and PHP code snippet for a registration form. The form collects personal details including name, email, username, password, and photo. It includes basic field validations using JS. The navigation bar is provided using "navigationBar.php". If the user is already logged in, they will be redirected to the homepage ("/index.php") instead of seeing the registration form.                                                                                    | pages/registration.php            |
| feeds.php                   | The provided code snippet imports four files that contain PHP functions intended for use in various sections of a web page. The purpose of these functions is not discernible from the given code, but it can be inferred that they involve adding a friend as well as displaying and printing posts and messages appearing on a webpage.                                                                                                                                           | pages/feeds.php                   |
| navigationBar.php           | This code snippet includes a navigation bar with dropdown menu that provides ease of navigation to the user on the website/app. The code features conditional rendering of navigation items based on user login status and the current page URL. It also contains Bootstrap and JQuery libraries for styling and functionality purposes.                                                                                                                                            | pages/navigationBar.php           |
| messages.php                | This code snippet renders a message interface with a search bar component. It also includes a PHP script to print the chat conversation from an external file.                                                                                                                                                                                                                                                                                                                      | pages/messages.php                |
| sidebar.php                 | The provided code snippet generates a sidebar menu bar with two options: "Home" and "Notifications". The "Notifications" option displays the number of notifications a user has, retrieved from a database query, and includes a bell icon. Clicking on "Notifications" opens a notification popup.                                                                                                                                                                                 | pages/sidebar.php                 |

</details>

<details closed><summary>Root</summary>

| File                    | Summary                                                                                                                                                                                                                                                                                                                                                                                                                                                                                | Module                  |
|:------------------------|:---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|:------------------------|
| connection.php          | This code snippet establishes a connection to a PostgreSQL database using the `pg_connect()` function in PHP. The function expects arguments such as the hostname, username, password, and database name to create the connection. If the connection fails, the `die()` function is used to display an error message that includes the last PostgreSQL error encountered.                                                                                                              | connection.php          |
| index.php               | The provided code is a basic HTML document with several PHP scripts embedded. It checks the session status and redirects to the homepage if the user is not logged in, includes several PHP modules and JS files, and displays the pages/navigationBar.php and pages/main.php scripts. Additionally, it imports various CSS stylesheets and fonts, including a popular icon set.                                                                                                       | index.php               |
| createUsersDatabase.sql | The snippet provides the SQL code for creating tables that model various relationships between users, quotes, friends, posts, notifications, likes, comments, messages, and videos. It also inserts a set of videos with corresponding titles in the "videos" table.                                                                                                                                                                                                                   | createUsersDatabase.sql |
| curious.php             | The code snippet is an HTML file with PHP code embedded. It includes database connection, a navigation bar, and a random video player feature. The video is randomly selected from the videos table, and its title and URL are fetched to display on the webpage.                                                                                                                                                                                                                      | curious.php             |
| prova.py                | The code is a python function that takes a directory path as an input and lists the filenames in it. It then creates a'file.txt' in the given directory path and appends the list of filenames to it. The printed message confirms the creation of the file with the expected output.                                                                                                                                                                                                  | prova.py                |
| homepage.php            | The code snippet provides the HTML and CSS code for a homepage layout of a STEM social network called NewtoNetwork. The page has a header with a logo, a title, and some navigation buttons. The body is divided into three columns with visually appealing and animated cards, each containing a short message related to the goals and philosophy of the network. Additionally, some external CSS and JS libraries are used to enhance the design and responsiveness of the content. | homepage.php            |

</details>

<details closed><summary>Script</summary>

| File                               | Summary                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    | Module                                    |
|:-----------------------------------|:-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|:------------------------------------------|
| acceptRequest.php                  | This PHP code snippet provides functionalities for a'friend request' feature. It checks if the HTTP request method is GET, starts a session, includes a database connection file, and deletes a pending friend request while simultaneously adding the new friend to both parties’ friend list. Lastly, it sends a notification informing the person who received the friend request of the friendship acceptance.                                                                                         | script/acceptRequest.php                  |
| backQuote.php                      | The code snippet handles a form submission with the POST method, checking if the session is active, including a connection to the database, and gets input values from writer and phrase fields while using FormData for retrieving a photo. The image file's information is validated, then a new row in the quotes database is populated with the filtered input and uploaded image with a base64 encoding if there are no errors. The user is redirected afterward.                                     | script/backQuote.php                      |
| printPhoto.php                     | This snippet of PHP code contains two functions. The first, `printPhoto()`, accepts a photo binary data and its format extension and returns an HTML span containing the image. The second one, `printPhotosLike()`, accepts an array of photo data and formats it by invoking the former function on each photo element. It returns the collected HTML spans of these photo elements.                                                                                                                     | script/printPhoto.php                     |
| backAddMessage.php                 | This code snippet sends a message from a user to one of their friends. It first checks that the user is logged in, extracts data from the input, performs checks on the friend and message contents, inserts the message and sends a notification to the user and their friend. If any of the checks or inserts fail, an error message is printed.                                                                                                                                                         | script/backAddMessage.php                 |
| getUserLike.php                    | This PHP code snippet retrieves a random user ID that liked a specific post. It checks if the HTTP request method is GET and starts a session if it has not been started already using the included "connection.php" file. It then obtains the post id from the HTTP GET request, executes a SELECT query with a limit of 1 and returns the retrieved user ID if found. Finally, it closes the database connection before exiting.                                                                         | script/getUserLike.php                    |
| logout.php                         | This PHP code initially checks if the HTTP request is a GET request; if not, it redirects to the homepage. It then checks if the session is active, and if so, it destroys it. Ultimately, it redirects to the homepage.                                                                                                                                                                                                                                                                                   | script/logout.php                         |
| showProfiles.php                   | This PHP code snippet includes a function that constructs a comment for a post with data fetched from the database. It also retrieves comments from the database based on a provided post id and uses the constructed comment function to format and compile each of the comments for the post into a combined output string that is then sent as a response.                                                                                                                                              | script/showProfiles.php                   |
| convertTimeFromTimestampToTime.php | The code snippet defines a function that converts a given time stamp into its appropriate relative time format (e.g. 1 day ago). The function takes care of different time units such as year, month, week, day, hour, minute or second.                                                                                                                                                                                                                                                                   | script/convertTimeFromTimestampToTime.php |
| addComment.php                     | This PHP code snippet handles the submission of a comment form via AJAX. The code receives data from a JSON object, inserts comment details into a PostgreSQL database, and triggers a new notification record for the user who posted the comment. A SQL query fetches the user data for matching user IDs, and the app sends a notification upon successful submission.                                                                                                                                  | script/addComment.php                     |
| getArrayPhotoLike.php              | The code includes two functions for fetching information about users who liked a given post. The first function, "returnPhotoLike," returns an array of the photos and extensions of up to three users who liked a post. The second function, "returnPersonLike," returns the username of a randomly selected user who has liked the post, or null if no users have liked the post. The functions use PostgreSQL queries to access database information.                                                   | script/getArrayPhotoLike.php              |
| backRegistration.php               | The code checks if the HTTP request type is "POST" and then connects to the database using pg_query_params(). It validates user's registration form information including email, username and password by checking if they match to the ones present in the database. If the entered email and username are not present in the database, the user's information is saved in the database, and the user is redirected to the login page. If the process fails, the user will be prompted for the next step. | script/backRegistration.php               |
| backAddFriend.php                  | This PHP code snippet is checking if the HTTP request method is GET and if there is an active session. It includes a database connection and performs several queries to determine if specific friend requests or friendships already exist before inserting a new friend request into the database. If any of the checks fail, it redirects back to the addFriend page with an appropriate error message. If all checks pass, it redirects to the index page.                                             | script/backAddFriend.php                  |
| leaveLike.php                      | This PHP code snippet inserts a'like' record into a database when a user clicks a'like' button on a post. A notification is also created for the user who owns the post to inform them that someone has liked the post. The code responds with the number of likes on the post, minus one.                                                                                                                                                                                                                 | script/leaveLike.php                      |
| backLogin.php                      | This PHP code snippet creates a login function. If the server request method is not POST, it redirects to the login page. It also checks if the username exists in a database, and if the password matches the hashed password in the user's account. Once the credentials are verified, a session is started, and the user is logged in.                                                                                                                                                                  | script/backLogin.php                      |
| discardRequest.php                 | The code snippet checks if the HTTP method used is GET, allows session handling or initiation, connects to a SQL database, and executes a SELECT and INSERT statement respectively. The SELECT statement deletes a friend request while the INSERT statement creates a notification to be sent to the sender of the friend request indicating that it was declined. Finally, the SQL connection is closed.                                                                                                 | script/discardRequest.php                 |
| removeLike.php                     | The code checks if the request method is GET and starts a session if one is not active. It then deletes a like record matching the user_id and post_id passed as GET parameters and calculates the number of likes left on that post. The remaining likes are then echoed as output.                                                                                                                                                                                                                       | script/removeLike.php                     |
| showComments.php                   | The provided code snippet selects and fetches comments from a specific post in a database and constructs HTML code for each comment, making use of the included "convertTimeFromTimestampToTime.php" function to display the comment date and time. The constructed HTML code is appended to a variable named "send" and then printed to output.                                                                                                                                                           | script/showComments.php                   |
| clearNotifications.php             | This PHP code snippet checks if the request method is GET and redirects to the index page if it's not. It then starts a PHP session and includes a connection to a PostgreSQL database. The code proceeds to execute a query that deletes all notifications associated the user currently in session.                                                                                                                                                                                                      | script/clearNotifications.php             |
| setGlobalVariables.php             | This code snippet uses PHP and PostgreSQL to query a user's information from a database based on their session's username, then assigns the found values to variables. It also redirects to a homepage if session data is not defined, or assigns default "guest" information if the session data is not in the database.                                                                                                                                                                                  | script/setGlobalVariables.php             |
| backPost.php                       | This code snippet is a PHP script that creates a new post by inserting the user's input into a database table. The script first verifies that the HTTP request method is POST and starts a PHP session. The user's input is then inserted into the'posts' table along with an encode version of an uploaded photo. Finally, notifications are sent to the user's friends for this post and the user is redirected back to the homepage.                                                                    | script/backPost.php                       |
| printLikePhotos.php                | The code snippet retrieves the likes associated with a given post by querying a PostgreSQL database, selects three users randomly and renders their profile photo using "printPhoto.php". Ultimately, the script displays the thumbnails of the profile pictures of the three users who liked the post.                                                                                                                                                                                                    | script/printLikePhotos.php                |

</details>

---

## 🚀 Getting Started

### ✅ Prerequisites

Before you begin, ensure that you have the following prerequisites installed:
> - 📌 php-server
> - 📌 php-pgsql


### 🖥 Installation

1. Clone the NewtoNetwork repository:
```sh
git clone https://github.com/giumanuz/NewtoNetwork
```

2. Change to the project directory:
```sh
cd NewtoNetwork
```

### 🤖 Using NewtoNetwork

```sh
php main.php
```

---

## 🤝 Contributing

Contributions are always welcome! Please follow these steps:
1. Fork the project repository. This creates a copy of the project on your account that you can modify without affecting the original project.
2. Clone the forked repository to your local machine using a Git client like Git or GitHub Desktop.
3. Create a new branch with a descriptive name (e.g., `new-feature-branch` or `bugfix-issue-123`).
```sh
git checkout -b new-feature-branch
```
4. Make changes to the project's codebase.
5. Commit your changes to your local branch with a clear commit message that explains the changes you've made.
```sh
git commit -m 'Implemented new feature.'
```
6. Push your changes to your forked repository on GitHub using the following command
```sh
git push origin new-feature-branch
```
7. Create a pull request to the original repository.
Open a new pull request to the original project repository. In the pull request, describe the changes you've made and why they're necessary.
The project maintainers will review your changes and provide feedback or merge them into the main branch.

---

## 📄 License

This project is licensed under the `MIT` License. 

---

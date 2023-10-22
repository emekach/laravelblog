## Laravel Blogging Application Design Pattern

### Overview

The Laravel Blogging Application facilitates content creation and publication. It includes features for both the frontend and admin side. This design pattern outlines the key steps and components for managing the publication workflow.

video demo - https://youtu.be/DQHnwqQv9Jk

### Frontend Features

1. _Display Categories in Navbar_

    - _Description:_ The application displays categories in the website's navigation bar.
    - _Implementation:_ Categories are fetched from the database and dynamically rendered in the frontend.

2. _Advertising Area on Website_

    - _Description:_ The website includes an advertising area.
    - _Implementation:_ The advertising content is managed and displayed at designated sections of the website.

3. _Display Latest Posts on Home Page_

    - _Description:_ The homepage showcases the ten latest posts.
    - _Implementation:_ Latest posts are queried from the database and presented on the homepage.

4. _Display Categories in Carousel/Slider_

    - _Description:_ Categories are presented in a carousel/slider.
    - _Implementation:_ Categories are fetched and displayed using a carousel or slider component.

5. _View Post_

    - _Description:_ Users can view individual posts.
    - _Implementation:_ Clicking on a post's link loads the post's content, comments, and displays advertising content on the right.

6. _Add Comment to Post_

    - _Description:_ Users can leave comments on posts.
    - _Implementation:_ A comment form is provided below each post, and user-generated comments are stored in the database.

7. _SEO-Friendly Website_
    - _Description:_ The website is optimized for search engines.
    - _Implementation:_ SEO best practices are followed, including metadata, clean URLs, and responsive design.

### Admin Side Features

1. _Dashboard Statistics_

    - _Description:_ The admin dashboard provides statistics on total categories, posts, users, and admins.
    - _Implementation:_ Data is queried from the database and displayed on the admin dashboard.

2. _Categories CRUD with Show and Hide Option_

    - _Description:_ Admins can perform CRUD operations on categories, including showing or hiding them.
    - _Implementation:_ Categories are managed in the database, and the visibility option is stored.

3. _Show and Hide Categories in Navbar_

    - _Description:_ Admins can control whether categories are displayed in the website's navigation bar.
    - _Implementation:_ Visibility settings are applied to categories in the frontend.

4. _Posts CRUD with Show and Hide Option_

    - _Description:_ Admins can perform CRUD operations on posts, including showing or hiding them.
    - _Implementation:_ Posts are managed in the database, and the visibility option is stored.

5. _User Management_

    - _Description:_ Admins can view registered users, access single user profiles, edit user details, and change user roles.
    - _Implementation:_ User data is fetched from the database, and admins have access to user management features.

6. _Middleware Authentication Security_
    - _Description:_ Middleware authentication is implemented to enhance security.
    - _Implementation:_ Middleware is applied to routes to verify user authentication and authorization.

### Technologies Utilized

-   _Laravel Framework:_ Used for web application development.
-   _MySQL Database:_ Stores application data.
-   _XAMPP:_ Provides a local development environment.
-   _Git and GitHub:_ Used for version control and collaboration.
-   _SEO Tools:_ Applied for optimizing the website for search engines.
-   _Git Bash:_ A command-line tool
-   _HTML, CSS, Bootstrap, JavaScript, and jQuery:_ Utilized for frontend development.

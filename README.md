# Blog App

![blog-logo](https://github.com/user-attachments/assets/5a428157-1606-425e-9f39-ec1ec900f11a)


A simple and interactive web-based Blog Application built with PHP, HTML, CSS, JavaScript and MySQL. This project allows users to create, view, edit, and delete blog posts providing a comprehensive platform for managing blog content. The application features user authentication and session management to ensure secure access.

## Features

- **User Registration & Authentication**: Secure user login and registration with session management to maintain user sessions.
- **Create, Read, Update, Delete (CRUD) Operations**: Users can create new blog posts, view existing posts, edit their content, and delete posts they no longer need.
- **User-Friendly Interface**: An intuitive and responsive UI built with HTML, CSS, and JavaScript for a seamless user experience.
- **Database Integration**: Uses MySQL to store user information and blog posts securely.
- **Secure Application**: Protects against common security vulnerabilities, including SQL Injection and Cross-Site Scripting (XSS).

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL

## Installation

To set up and run this project locally, follow these steps:

1. **Clone the repository**:

   ```bash
   git clone https://github.com/Ankit-Ghosh/Blog_App.git
   cd Blog_App
   ```

2. **Set up the Database**:

   - Import the `database.sql` file provided in the repository to set up the required tables in your MySQL database.
   - Update the database configuration in `config.php` with your database credentials.

3. **Start a Local Server**:

   - Use a local server environment like XAMPP, WAMP, or MAMP.
   - Place the cloned project folder in the `htdocs` directory (for XAMPP).

4. **Access the Application**:

   Open your browser and go to `http://localhost/blogapp` to access the Blog Application.

## Screenshots
 - Signup and Login Page
![1 signup-page](https://github.com/user-attachments/assets/e37976a4-9450-4bd2-8abe-7aa01fdc0f35)
![2 login-page](https://github.com/user-attachments/assets/134d1d5a-f4db-4b63-98b1-376e4dd447ad)
- Home Page
![3 home-page](https://github.com/user-attachments/assets/eff705f7-ed0a-4d8d-92d7-d484e3aa3319)

- Featured Blogs
![4 featured-blogs](https://github.com/user-attachments/assets/cd932f37-7263-4cf6-a5de-32bdf2f3f9ae)

- All Blogs
![5 all-blogs](https://github.com/user-attachments/assets/326bec35-e5a6-4d01-8b2f-cda893ef327c)
![9 blog](https://github.com/user-attachments/assets/d3c2342c-71a9-4def-91f9-590c232adcc6)

- Search Page
![6 search-page](https://github.com/user-attachments/assets/c7edcb08-b846-4ce2-b1a9-013c233e4221)

- Search by Category
![7 search-by-category](https://github.com/user-attachments/assets/271c3c31-485d-4326-9751-18a40c47ef9b)
![8 search-by-category-2](https://github.com/user-attachments/assets/3f2add20-0744-455e-b806-6a23071630a0)

- Admin Dashboard
![10 categories-1](https://github.com/user-attachments/assets/bc42ec98-9458-405b-b9fd-a3b04a0f2120)
![12 posts-1](https://github.com/user-attachments/assets/5ee88ea0-8526-481b-81c5-21f2ecf6be5c)
![14 users-1](https://github.com/user-attachments/assets/3b38bdef-4175-4577-89a0-399e8a235f6d)

- CRUD Operations
![16 create-user](https://github.com/user-attachments/assets/6fafd74c-405d-46ff-bd15-5f1e32b06e81)
![17 delete-user](https://github.com/user-attachments/assets/8065181a-8363-4f9c-9f2f-087466ba5701)
![15 users-2](https://github.com/user-attachments/assets/89dbb230-0256-4e43-8026-9f3a512287f9)

- MySQL Database
![18 blog-database](https://github.com/user-attachments/assets/1214bab5-393d-498b-bdde-453656d3b412)
![19 users-schema](https://github.com/user-attachments/assets/d5394c8c-259a-4014-abd6-5ce1c0b46f5f)
![20 category-schema](https://github.com/user-attachments/assets/56140423-ba3c-4271-8440-712a3b7b1188)
![21 posts-schema](https://github.com/user-attachments/assets/e124285b-c1e7-42c0-9294-568a056091f1)


## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch: `git checkout -b feature-branch-name`.
3. Make your changes and commit them: `git commit -m 'Add new feature'`.
4. Push to the branch: `git push origin feature-branch-name`.
5. Submit a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

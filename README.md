# Blog App

A simple and interactive web-based Blog Application built with PHP, HTML, CSS, and JavaScript. This project allows users to create, view, edit, and delete blog posts, providing a comprehensive platform for managing blog content. The application features user authentication and session management to ensure secure access.

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

   Open your browser and go to `http://localhost/Blog_App` to access the Blog Application.

## Usage

- **Sign Up**: Create a new account to start creating blog posts.
- **Login**: Login with your credentials to manage your blogs.
- **Create Blog Post**: Add new content using the "Create" option.
- **Edit/Delete Blog Post**: Modify or remove your existing posts.

## Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository.
2. Create a new branch: `git checkout -b feature-branch-name`.
3. Make your changes and commit them: `git commit -m 'Add new feature'`.
4. Push to the branch: `git push origin feature-branch-name`.
5. Submit a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact

For any questions or suggestions, please feel free to contact me at [ankit.ghosh@example.com](mailto:ankit.ghosh@example.com).

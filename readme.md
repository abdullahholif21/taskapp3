# TaskApp3

## Overview
TaskApp3 is a PHP-based web application designed to manage tasks and users efficiently. It provides user authentication, task management, and a responsive dashboard for administrators. The application is modular, making it easy to maintain and extend.

## Features
- **User Management**: Add, edit, delete, and list users.
- **Task Management**: Create, edit, delete, and list tasks with statuses and due dates.
- **Authentication**: Secure login system with session management.
- **Responsive Design**: User-friendly interface with a responsive layout.
- **Modular Components**: Includes reusable components like header, sidebar, navbar, and footer.
- **Role-Based Access Control**: Different user roles (e.g., Admin, User) with specific permissions.
- **Search Functionality**: Search for tasks and users using keywords.
- **Task Prioritization**: Assign priority levels (e.g., High, Medium, Low) to tasks.
- **Activity Logs**: Track user actions and changes made to tasks.
- **Dark Mode**: Toggle between light and dark themes for better user experience.

## Project Structure
The project is organized as follows:

```
taskapp3
├── assets
│   ├── css
│   │   ├── bootstrap.min.css   # Bootstrap styles
│   │   ├── main.css            # Custom styles
│   │   
│   ├── js
│   │   └── scripts.js          # JavaScript for interactivity
├── config
│   └── auth.php                # Authentication logic
├── database
│   └── tasks.sql               # Database schema and sample data
├── includes
│   ├── footer.php              # Footer section
│   ├── head.php                # Head section with meta tags and styles
│   ├── navbar.php              # Navigation bar
│   └── sidebar.php             # Sidebar navigation
├── index.php                   # Dashboard homepage
├── login.php                   # Login page
├── register-user.php           # User registration page
├── edit-user.php               # User editing page
├── list_users.php              # User listing page
├── register-task.php           # Task registration page
├── edit-task.php               # Task editing page
├── list_tasks.php              # Task listing page
├── search.php                  # Search functionality

├── remove-user.php             # User deletion logic
└── README.md                   # Project documentation
```

## Installation
1. Clone the repository to your local machine:
   ```bash
   git clone https://github.com/yourusername/taskapp3.git
   ```
2. Navigate to the project directory:
   ```bash
   cd taskapp3
   ```
3. Set up a local server environment (e.g., XAMPP, MAMP).
4. Place the project folder in the server's root directory (e.g., `c:\xampp\htdocs\` for XAMPP).
5. Import the database:
   - Open `phpMyAdmin`.
   - Create a new database (e.g., `tasks`).
   - Import the `tasks.sql` file located in the `database` folder.
6. Access the application in your web browser:
   ```
   http://localhost/taskapp3/index.php
   ```

## Usage
- **Login**: Users must log in through the `login.php` page.
- **Dashboard**: After logging in, users are redirected to the dashboard.
- **User Management**: Admins can manage users via the `list_users.php` page.
- **Task Management**: Admins can manage tasks via the `list_tasks.php` page.
- **Search**: Use the search bar to find specific tasks or users.
- **Dark Mode**: Toggle between light and dark themes using the dark mode button.
- **Activity Logs**: View logs of user actions in the `logs/activity.log` file.

## Contributing
Contributions are welcome! If you have suggestions for improvements or new features, please open an issue or submit a pull request.

## License
This project is open-source and available under the MIT License.
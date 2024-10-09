# BudgetBoost

This project is a web application built with Laravel and Vue.js, providing user and expense management functionalities.

## Features

- User authentication (login/logout)
- Role-based access control (Administrator and User roles)
- Dashboard with expense summary
- Expense category and expense management (create, update, delete)
- User management (create, update, delete)

## Technologies Used

- **Backend**: Laravel 11.2.1
- **Frontend**: Vue.js with Inertia.js
- **Database**: MySQL
- **Styling**: Bootstrap


## Known Issues
User Authentication:
User authentication is currently not working properly. Roles are not correctly assigned during login, and the session handling for user roles needs revision.

Delete Expense:
Deleting expenses is not functioning as expected. The delete operation does not remove records from the database.

Updates:
Updates for user and expense management are not functioning properly. Changes are not reflected in the database or UI after performing update actions.
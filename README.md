# Management System

A complete CRUD (Create, Read, Update, Delete) application with two interfaces:

## 1. Player Management System

For managing players with the following fields:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

## 2. User Information System

For users to input their own information with the same fields:

-   First Name
-   Last Name
-   Age
-   Contact Number
-   Photo (optional)
-   Jersey Number

## Features

-   **Modern UI**: Built with Bootstrap 5 and FontAwesome icons
-   **jQuery Integration**: All CRUD operations use jQuery AJAX for smooth user experience
-   **Modal-based Interface**: Create, edit, and view operations use Bootstrap modals
-   **Photo Upload**: Support for photos with automatic file management
-   **Responsive Design**: Works on desktop and mobile devices
-   **Real-time Updates**: Table updates without page refresh
-   **Form Validation**: Server-side validation with error handling
-   **Simple Access**: No authentication required - anyone can add and manage information
-   **Unified Database**: Both systems use the same players table for data storage

## Technology Stack

-   **Backend**: Laravel 11
-   **Frontend**: Bootstrap 5, jQuery 3.7.1, FontAwesome 6
-   **Database**: MySQL/PostgreSQL (configurable)
-   **File Storage**: Laravel's public disk for photo uploads

## Installation

-   **[Vehikl](https://vehikl.com)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel)**
-   **[DevSquad](https://devsquad.com/hire-laravel-developers)**
-   **[Redberry](https://redberry.international/laravel-development)**
-   **[Active Logic](https://activelogic.com)**

    ```bash
    git clone <repository-url>
    cd super_tatay
    ```

2. **Install dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Environment setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Configure database**
   Edit `.env` file with your database credentials:

    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database_name
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

5. **Run migrations**

    ```bash
    php artisan migrate
    ```

6. **Create storage link**

    ```bash
    php artisan storage:link
    ```

7. **Seed sample data (optional)**

    ```bash
    php artisan db:seed
    ```

8. **Start the development server**
    ```bash
    php artisan serve
    ```

## Usage

### Accessing the Application

Visit `http://localhost:8000` in your browser. You'll be redirected to the players list page.

### Navigation

-   **Players**: Click "Players" in the navbar to manage players
-   **User Info**: Click "User Info" in the navbar for users to input their information

### Player Management

1. **View Players**: The main page shows all players in a responsive table
2. **Add Player**: Click "Add New Player" button to open the create modal
3. **Edit Player**: Click the edit (pencil) icon to modify player details
4. **View Details**: Click the view (eye) icon to see player information
5. **Delete Player**: Click the delete (trash) icon to remove a player

### User Information Management

1. **View Information**: The user info page shows all submitted information
2. **Add Information**: Click "Add Your Information" button to open the create form
3. **Edit Information**: Click the edit (pencil) icon to modify details
4. **View Details**: Click the view (eye) icon to see information
5. **Delete Information**: Click the delete (trash) icon to remove information

### Features

-   **Photo Upload**: Photos can be uploaded (max 2MB, JPEG/PNG/JPG/GIF)
-   **Form Validation**: All fields are validated on both client and server side
-   **AJAX Operations**: All CRUD operations happen without page refresh
-   **Error Handling**: User-friendly error messages for validation failures
-   **Success Notifications**: Automatic success messages for all operations
-   **Public Access**: No login required - anyone can use the system
-   **Unified Data**: Both systems share the same database table

## File Structure

```
app/
├── Http/Controllers/
│   ├── PlayerController.php    # Player management controller
│   └── UserInfoController.php  # User information controller
├── Models/
│   └── Player.php             # Player model (used by both systems)
resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php      # Main layout with Bootstrap/jQuery
│   ├── players/
│   │   ├── index.blade.php    # Player management interface
│   │   ├── create.blade.php   # Create page (redirects to index)
│   │   ├── edit.blade.php     # Edit page (redirects to index)
│   │   └── show.blade.php     # Show page (redirects to index)
│   └── userinfo/
│       ├── index.blade.php    # User information interface
│       ├── create.blade.php   # User information form
│       ├── edit.blade.php     # Edit page (redirects to index)
│       └── show.blade.php     # Show page (redirects to index)
database/
├── migrations/
│   └── 2025_07_19_041811_create_players_table.php
└── seeders/
    ├── DatabaseSeeder.php
    └── PlayerSeeder.php       # Sample player data
routes/
└── web.php                    # Route definitions
```

## API Endpoints

The application provides RESTful API endpoints for both systems:

### Player Management

-   `GET /players` - List all players
-   `GET /players/create` - Show create form
-   `POST /players` - Store new player
-   `GET /players/{id}` - Show player details
-   `GET /players/{id}/edit` - Show edit form
-   `PUT /players/{id}` - Update player
-   `DELETE /players/{id}` - Delete player

### User Information

-   `GET /userinfo` - List all user information
-   `GET /userinfo/create` - Show create form
-   `POST /userinfo` - Store new user information
-   `GET /userinfo/{id}` - Show user information details
-   `GET /userinfo/{id}/edit` - Show edit form
-   `PUT /userinfo/{id}` - Update user information
-   `DELETE /userinfo/{id}` - Delete user information

All endpoints support both regular HTTP requests and AJAX requests.

## Database Structure

Both systems use the same `players` table with the following structure:

-   `id` - Primary key
-   `first_name` - First name
-   `last_name` - Last name
-   `age` - Age (integer)
-   `contact_number` - Contact number
-   `jersey_number` - Jersey number (integer)
-   `photo` - Photo path (nullable)
-   `created_at` - Creation timestamp
-   `updated_at` - Update timestamp

## Customization

### Adding New Fields

1. Update the migration file
2. Modify the Player model's `$fillable` array
3. Update both controllers' validation rules
4. Modify both views to include the new field

### Styling

The application uses Bootstrap 5 with custom CSS. You can modify the styles in:

-   `resources/views/layouts/app.blade.php` (inline styles)
-   Create a separate CSS file for more complex styling

### Validation Rules

Validation rules are defined in both controllers. You can modify them in the `store()` and `update()` methods.

## Troubleshooting

### Common Issues

1. **Photos not displaying**: Ensure you've run `php artisan storage:link`
2. **Database errors**: Check your `.env` configuration
3. **AJAX errors**: Verify CSRF token is properly set

### Debug Mode

For development, ensure `APP_DEBUG=true` in your `.env` file.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# super_tatay

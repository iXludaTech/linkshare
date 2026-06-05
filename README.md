# LinkShare

**LinkShare** is a community-driven platform for discovering and sharing the best learning resources — courses, tutorials, articles, and tools — curated by users for users.

Built on the [Legato Framework](https://github.com/devscreencast/legato-framework), a lightweight PHP framework that combines the best ideas from Symfony and Laravel.

## Features

- **User authentication** — Register, login, email activation, and "remember me"
- **Link sharing** — Submit links with title, URL, description, and categorization
- **Channel organization** — Categorize links into channels and subchannels
- **Admin moderation** — Approve or reject submitted links before they go public
- **reCAPTCHA protection** — Prevents spam submissions on forms
- **Responsive design** — Built with Bootstrap 4, works on all devices

## Requirements

- PHP >= 7.1.0
- Composer
- MySQL or MariaDB
- A web server (Apache, Nginx, or PHP's built-in server)

## Installation

```bash
# 1. Clone the repository
git clone https://github.com/jehubx/linkshare.git
cd linkshare

# 2. Install PHP dependencies
composer install

# 3. Configure environment
cp .env.example .env
# Edit .env with your database credentials and app settings

# 4. Set up the database
# Create a MySQL database and import the schema
mysql -u root -p linkshare < database/schema.sql

# 5. Start the development server
php -S localhost:8000 -t public
```

Visit `http://localhost:8000` in your browser.

## Configuration

| Variable | Description |
|---|---|
| `APP_URL` | Your application URL |
| `APP_NAME` | Application display name |
| `APP_DEBUG` | Enable/disable debug mode |
| `DB_*` | MySQL database connection settings |
| `RECAPTCHA_KEY` | Google reCAPTCHA site key |
| `RECAPTCHA_SECRET` | Google reCAPTCHA secret key |
| `MAIL_*` | Mail driver settings for email activation |

## Database Setup

Create a MySQL database and run the schema:

```sql
CREATE DATABASE linkshare CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

The application will create tables on first run using Legato's schema builder. Ensure your `.env` points to the correct database.

## Usage

### For Visitors

- **Browse links** — Visit `/links` to see all approved links
- **Register** — Create an account at `/register`
- **Submit a link** — Once logged in, use the "Submit a Link" form

### For Admins

- **Manage channels** — `/admin/channel` — Create and manage categories
- **Manage subchannels** — `/admin/subchannel` — Create subcategories
- **Moderate links** — `/admin/links` — Approve or delete submitted links

## Built With

- **[Legato Framework](https://github.com/devscreencast/legato-framework)** — Lightweight PHP framework
- **[Symfony Components](https://symfony.com/components)** — HTTP foundation, console
- **[Laravel Container](https://laravel.com/docs/container)** — IoC container
- **[Twig](https://twig.symfony.com/)** — Templating engine
- **[Bootstrap 4](https://getbootstrap.com/)** — Frontend UI
- **[reCAPTCHA](https://www.google.com/recaptcha/)** — Spam protection

## Contributing

Contributions are welcome! Feel free to open an issue or submit a pull request.

## License

LinkShare is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Security

If you discover a security vulnerability, please open an issue on the GitHub repository.

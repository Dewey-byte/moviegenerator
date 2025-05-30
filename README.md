# MovieGenerator 🎬

MovieGenerator is a Netflix-style movie generator that allows users to discover movies by genre, save their favorites, and manage their saved movies. Built using **HTML**, **JavaScript**, **PHP**, **MySQL**, and **Tailwind CSS**, this app provides a seamless and interactive experience.

## Features
- 🎥 Select a genre to discover popular movies.
- 💾 Save your favorite movies to a personal list.
- ❌ Delete movies from your saved list anytime.
- 🌐 Dynamic movie data fetched from [The Movie Database (TMDb)](https://www.themoviedb.org/).

## Installation

1. **Clone the Repository**
```bash
   git clone https://github.com/your-username/moviegenerator.git
   cd moviegenerator
```

2. **Set Up the Database**

Create a MySQL database named movies_db.
Run the following SQL script to create the required table:
```sql
CREATE TABLE saved_movies (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  poster TEXT NOT NULL,
  overview TEXT NOT NULL
);
```
3. **Configure the Backend**

Ensure your PHP environment is set up (e.g., using XAMPP, WAMP, or a similar tool).
Place the project files in your server's root directory (e.g., htdocs for XAMPP).
Update the database credentials in save.php, delete.php, and saved.php if necessary:
```php
$host = "localhost";
$user = "root";
$pass = "";
$db = "movies_db";
```

4. **Set Up TMDb API**

Sign up at TMDb and get your API key.
Replace the placeholder API_KEY in script.js with your actual API key:
```javascript
const API_KEY = "your_api_key_here";
```

5. **Start the Application**

Open your browser and navigate to http://localhost/moviegenerator/index.html.

## Usage

1. Select a genre from the dropdown menu and click "Generate Movie" to fetch movies.
2. Save your favorite movies by clicking the "Save Movie" button.
3. View your saved movies by navigating to the "Saved Movies" page.
4. Delete movies from your saved list using the "Delete" button.

## Technologies Used
Frontend: HTML, JavaScript, Tailwind CSS
Backend: PHP, MySQL
API: The Movie Database (TMDb)

## Contributing
Feel free to fork this repository and submit pull requests. Contributions are welcome!

## License
This project is licensed under the MIT License.

## Credits
Made with ❤️ by Cd, Km & Jase.

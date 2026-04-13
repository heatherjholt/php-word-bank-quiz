# SYSTEM_PHP://QUIZ (PHP Knowledge Decoder)

[LIVE VERSION](https://php-word-bank-quiz.wasmer.app/index.php)

A dynamic, fill-in-the-blank PHP quiz application styled as a retro, Matrix-inspired terminal. This project tests users on core PHP concepts, providing instant grading and feedback upon execution.

## Features

* **Dynamic Content:** Questions and answers are loaded dynamically from a JSON file.
* **Terminal Aesthetic:** Fully custom CSS featuring a green-on-black retro terminal layout with glowing hover states.
* **Collapsible Word Bank:** A collapsible sidebar (`WORD_BANK.exe`) provides a randomized list of hints without cluttering the screen.
* **Smart Grading:** Answer validation is case-insensitive and trims accidental whitespace so users aren't penalized for minor formatting differences.
* **Secure Input:** Form submissions are sanitized using `htmlspecialchars()` to prevent XSS (Cross-Site Scripting) attacks.

## File Structure

* `index.php`: The core application containing the HTML structure and PHP logic for rendering the form, processing user input, and calculating scores.
* `php_quiz.json`: A JSON file storing the array of quiz questions and their correct answers.
* `style.css`: The stylesheet powering the 90s/Matrix terminal aesthetic, flexbox layout, and interactive glow effects.

## How to Run Locally

Because this project relies on PHP to process form data and read JSON files, it cannot be hosted on a static file server (like GitHub Pages). To run this on your own machine:

1. Ensure you have a local PHP server environment installed (such as **XAMPP**, **MAMP**, or **WampServer**).
2. Clone or download this repository into your local server's document root folder (e.g., the `htdocs` folder in XAMPP).
3. Start your local server (Apache).
4. Open your web browser and navigate to `http://localhost/your-folder-name/index.php`.
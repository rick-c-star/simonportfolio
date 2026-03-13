# Simon's Portfolio

🌐 **Live site:** [https://simonpatrickportfolio.42web.io/](https://simonpatrickportfolio.42web.io/?i=1)

A personal portfolio website built with **PHP**, **CSS**, and **JavaScript**, hosted on [Infinity Free](https://www.infinityfree.com/).

## Syncing your existing htdocs files

If you already have your portfolio files on Infinity Free and want this repository to mirror them:

1. Download your files from Infinity Free using the **File Manager** → select all → compress → download, or via FTP.
2. Copy every file from your `htdocs` folder into the **root of this repository**, replacing the placeholder files if needed.
3. Commit and push:
   ```bash
   git add .
   git commit -m "Add real portfolio files from Infinity Free"
   git push
   ```

Your live site will continue to serve from Infinity Free. This repository becomes your backup and version-control source.

## Features

- 🚀 Fast, single-page design with smooth scroll navigation
- 📱 Fully responsive (mobile-first)
- 🎨 Dark theme with accent colours
- 🛠️ Skills section with animated progress bars
- 💼 Projects showcase with technology badges
- 📬 Working contact form (PHP `mail()`)
- 🔒 Security headers via `.htaccess`

## File Structure

```
htdocs/  (root of this repository)
├── index.php        # Main page (Hero, About, Skills, Projects, Contact)
├── contact.php      # Contact form handler
├── .htaccess        # URL rewriting, security headers, caching
├── css/
│   └── style.css    # All styles
└── js/
    └── main.js      # Navbar scroll, mobile menu, skill-bar animations
```

## Deployment on Infinity Free

1. Log in to your [Infinity Free](https://www.infinityfree.com/) account and open the **File Manager** (or use FTP).
2. Navigate to the **`htdocs`** folder of your domain/subdomain.
3. Upload **all files** from this repository (maintaining the folder structure).
4. Open `index.php` in a text editor and update the configuration variables at the top:
   - `$name` — your name
   - `$email` — your email address
   - `$phone`, `$location` — your contact details
   - `$github_url`, `$linkedin_url` — your social links
   - `$skills` — add/remove skills and adjust levels
   - `$projects` — replace with your real projects
5. Open `contact.php` and update the `$to` variable with your real email address.
6. Visit your domain in a browser to confirm everything works.

> **Tip:** Infinity Free supports PHP and `mod_rewrite`, so the `.htaccess` file works out of the box.

## Local Development

Any PHP-enabled local server works (e.g. XAMPP, Laragon, WAMP, PHP's built-in server):

```bash
php -S localhost:8000
```

Then open [http://localhost:8000](http://localhost:8000).


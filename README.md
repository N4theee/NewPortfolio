# Nathan Orias — Portfolio

A premium, data-driven personal portfolio built with PHP, HTML5, CSS3, and
vanilla JavaScript. No frameworks, no database, no admin panel — everything
is edited by hand in one file: `includes/data.php`.

---

## 1. Running the site (Laragon / XAMPP)

**Laragon**
1. Copy the whole `portfolio` folder into `laragon/www/`.
2. Start Laragon.
3. Open `http://portfolio.test` (Laragon auto-detects the folder name as a
   virtual host) or `http://localhost/portfolio`.

**XAMPP**
1. Copy the whole `portfolio` folder into `xampp/htdocs/`.
2. Start Apache from the XAMPP control panel.
3. Open `http://localhost/portfolio`.

No database setup is required — this project only needs PHP + Apache.

---

## 2. Project structure

```
/portfolio
    index.php              Main page — all sections, reads from includes/data.php
    contact-handler.php    Handles the contact form (mail())
    /assets
        /css
            style.css        Base styles, theme system, components
            responsive.css   Breakpoint overrides
        /js
            script.js        Theme toggle, nav, modal, scroll reveal, form
        /images              All images (profile photos, project shots, certs)
        /icons                (reserved for any custom icon files)
    /includes
        header.php           Nav bar + mobile menu markup
        footer.php            Footer + project modal markup
        data.php              *** ALL YOUR CONTENT LIVES HERE ***
    /downloads
        resume.pdf            Your downloadable CV (add this file yourself)
```

---

## 3. Where to change your info — `includes/data.php`

This file is the single source of truth for the whole site. Sections are
clearly labelled with comments. Quick reference:

| What you want to change   | Variable in `data.php` |
|----------------------------|-------------------------|
| Name / role / bio          | `$name`, `$role`, `$bio1`, `$bio2`, `$description` |
| About info row              | `$aboutInfo` |
| Social links                | `$socialLinks` |
| Skills                       | `$skills` |
| Projects                     | `$projects` |
| Experience                   | `$experience` |
| Certificates                 | `$certificates` |
| Resume file                  | `$resume` |
| Contact details              | `$contact` |

### How to add a skill
Open `includes/data.php`, find the `$skills` array, and add a new block:

```php
['name' => 'Java', 'icon' => 'java', 'category' => 'Programming'],
```

`icon` should match a key in the `$brandIcons` map at the top of
`index.php`. If the key isn't found there, a generic code icon is shown
automatically — so the site never breaks on an unknown icon.

### How to remove a skill
Delete its array block from `$skills`.

### How to change a skill icon
Edit the `icon` value for that skill, or add a new key to `$brandIcons` in
`index.php` if you're introducing a brand-new technology (pick any
Bootstrap Icons class from https://icons.getbootstrap.com/ plus a brand
colour hex).

### How to add a project
1. Save a screenshot into `assets/images/` (e.g. `my-project.png`).
2. Add a new block to `$projects` in `includes/data.php`:

```php
[
    'title'        => 'My New Project',
    'description'  => 'Description here',
    'image'        => 'assets/images/my-project.png',
    'technologies' => ['PHP', 'MySQL'],
    'github'       => 'https://github.com/...',
    'demo'         => 'https://...',
    'features'     => ['Feature one', 'Feature two'],
],
```

The card, hover zoom, tech badges, and the project modal are all generated
automatically — you never touch `index.php` for a new project.

### How to remove a project
Delete its array block from `$projects`.

### How to change project images
Change the `image` path in that project's array block.

### How to add a certificate
Add a block to `$certificates`:

```php
[
    'title'  => 'Certificate Name',
    'issuer' => 'Issuing Org',
    'date'   => '2026',
    'image'  => 'assets/images/cert2.png',
    'link'   => 'https://...',
],
```

### How to add experience
Add a block to `$experience`:

```php
[
    'title'   => 'Job Title',
    'company' => 'Company Name',
    'period'  => 'Month Year – Month Year',
    'points'  => ['Responsibility one', 'Responsibility two'],
],
```

### How to change social links
Edit the `url` values in `$socialLinks` (GitHub, LinkedIn, Email, Portfolio).

### How to change your email
Update `$contact['email']` in `includes/data.php` — this feeds both the
"Get In Touch" section and the contact form's recipient address in
`contact-handler.php`.

---

## 4. The dark-mode / light-mode profile photo swap

This is the site's signature feature. Two images are stacked in the same
frame in `index.php`, and CSS cross-fades between them based on the
`data-theme` attribute on `<html>`:

- **Dark mode →** `assets/images/profile-dark.png` (black outfit)
- **Light mode →** `assets/images/profile-light.png` (white outfit)

**To replace them:** just overwrite those two files with your own photos.
Keep the same crop/aspect ratio (portrait, roughly 4:5) so the swap looks
seamless. If a file is missing, the `onerror` fallback shows
`assets/images/profile-fallback.svg` instead of a broken image icon.

The cross-fade itself is pure CSS (`opacity` + `transform: scale()` on
`.profile-img`, gated by `[data-theme="dark"] .profile-img-dark` /
`[data-theme="light"] .profile-img-light` in `style.css`) — no JavaScript
image-swapping logic needed, and no page reload happens.

---

## 5. How the theme toggle works

- Click the pill toggle in the header (or in the mobile menu area).
- `script.js` flips `data-theme` between `"dark"` and `"light"` on the
  `<html>` element and saves the choice to `localStorage` under the key
  `portfolio-theme`.
- An inline script at the very top of `index.php` reads that saved value
  **before** the page paints, so there's no flash of the wrong theme on
  reload.
- Every color in the site is a CSS variable (`--bg-primary`, `--text-primary`,
  `--accent`, etc.) defined once for `[data-theme="dark"]` and once for
  `[data-theme="light"]` in `style.css` — light mode is a deliberately
  designed palette, not an automatic inversion.

---

## 6. How to change the theme colors

Open `assets/css/style.css` and edit the `:root`, `[data-theme="dark"]`,
and `[data-theme="light"]` blocks near the top of the file. The main accent
is:

```css
--accent: #6C4DFF;
--accent-hover: #7C5FFF;
```

Change `--accent` (and optionally `--accent-hover`) to restyle the whole
site's highlight color in one place.

---

## 7. How to replace the CV PDF

1. Put your resume PDF in `downloads/` (e.g. `downloads/resume.pdf`).
2. In `includes/data.php`, update:

```php
$resume = [
    'path'     => 'downloads/resume.pdf',
    'filename' => 'Nathan-Orias-Resume.pdf', // name used for the downloaded file
];
```

---

## 8. How to add a new section

1. Add a new `<section class="section" id="your-section">` block inside
   `<main>` in `index.php`, following the pattern of existing sections
   (wrap content in `.card` elements, add `.reveal` for scroll animation).
2. Add a matching nav link in `includes/header.php` (both `.nav-list` and
   `.mobile-nav-list`) with `data-section="your-section"` so the scroll-spy
   highlighting picks it up automatically.
3. Style anything section-specific at the bottom of `style.css`.

---

## 9. Notes on the contact form

`contact-handler.php` uses PHP's built-in `mail()` function. On a default
local XAMPP/Laragon install there's no mail server configured, so sending
will typically fail gracefully and show an error message — this is normal
for local development, not a bug. For a real deployed site, either:

- Configure `sendmail`/Postfix on your server, or
- Swap the `mail()` call for PHPMailer with real SMTP credentials (Gmail,
  SendGrid, etc.)

The form already includes: required-field checks, email format validation,
length limits, a honeypot field for basic bot protection, and header-
injection protection (rejects newline characters in submitted fields).

---

## 10. Placeholder images

All images currently in `assets/images/` are auto-generated placeholders
(abstract shapes, not real photos) so the site runs out of the box.
Replace them with your real photos, project screenshots, and certificate
scans before publishing:

- `profile-dark.png`, `profile-light.png` — your two portrait photos
- `nexstock.png`, `queq.png`, `cyberfolio.png` — project screenshots
- `cert1.png` — certificate image
- `profile-fallback.svg` — shown automatically if a profile photo is missing

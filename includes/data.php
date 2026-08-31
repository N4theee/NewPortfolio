<?php
/*
========================================
PORTFOLIO CONTENT EDITOR
========================================

Most of your portfolio content can be edited in THIS FILE.
You should almost never need to touch the HTML in index.php
or the includes/ files just to update your own information.

Quick map:
  - Identity & bio      -> $name, $role, $badge, $tagline, $bio, $aboutInfo
  - Social links         -> $socialLinks
  - Skills                -> $skills            (see "HOW TO ADD A SKILL" below)
  - Projects              -> $projects          (see "HOW TO ADD A PROJECT" below)
  - Experience            -> $experience        (see "HOW TO ADD EXPERIENCE" below)
  - Certificates          -> $certificates       (see "HOW TO ADD A CERTIFICATE" below)
  - Resume / CV file      -> $resume
  - Contact details       -> $contact
========================================
*/

// ----------------------------------------------------------------
// IDENTITY
// ----------------------------------------------------------------
$name       = "Nathan Orias";
$role       = "IT Student | Developer";
$badge      = "4TH YEAR IT STUDENT";
$heroTitle  = "Hi, I'm"; // "Nathan" is rendered separately in purple, see index.php
$heroName   = "Nathan";
$tagline    = "I build solutions with passion.";
$bio1       = "I'm a 4th-year Information Technology student with a strong passion for the IT industry and building meaningful software solutions.";
$bio2       = "I enjoy turning ideas into digital experiences and constantly learning new technologies to improve my skills.";
$description = "An aspiring IT professional passionate about software development, cybersecurity, and building meaningful digital solutions.";
$availability = "Available for Internship";

// Small info row shown in the About card. Add/remove rows as needed —
// each item needs an 'icon' (Bootstrap Icons class name), 'label', and 'value'.
$aboutInfo = [
    ['icon' => 'bi-geo-alt', 'label' => 'Location', 'value' => 'Philippines'],
    ['icon' => 'bi-mortarboard', 'label' => 'Program', 'value' => 'BS Information Technology'],
    ['icon' => 'bi-calendar3', 'label' => 'Year', 'value' => '4th Year'],
];

// ----------------------------------------------------------------
// SOCIAL LINKS
// Replace the '#' values below with your real profile URLs.
// 'icon' uses Bootstrap Icons class names (https://icons.getbootstrap.com/)
// ----------------------------------------------------------------
$socialLinks = [
    ['icon' => 'bi-github',    'label' => 'GitHub',   'url' => '#'],
    ['icon' => 'bi-linkedin',  'label' => 'LinkedIn', 'url' => '#'],
    ['icon' => 'bi-envelope',  'label' => 'Email',     'url' => 'mailto:you@example.com'],
    ['icon' => 'bi-code-slash','label' => 'Portfolio', 'url' => '#'],
];

// ----------------------------------------------------------------
// SKILLS
// ----------------------------------------------------------------
// HOW TO ADD A SKILL:
//   1. Copy one of the array blocks below.
//   2. Change 'name' to the skill's display name.
//   3. Change 'icon' — this is a Bootstrap Icons class OR, for brand logos,
//      a Simple Icons "devicon"-style class already wired up in style.css
//      (see the $icon rendering logic in index.php's skills loop, which
//      falls back automatically to a generic code icon if unknown).
//   4. Change 'category' — used only as a small caption under the name.
//
// HOW TO REMOVE A SKILL: delete its array block.
//
// HOW TO CHANGE A SKILL ICON: edit the 'icon' value. Icons are rendered as
// <i class="bi {icon}"></i> for Bootstrap Icons, or matched against the
// $brandIcons map in index.php for coloured brand glyphs (html5, css3, js,
// php, python, mysql, cpp, git, laravel, linux, bootstrap, figma, java...).
// Add new brand entries there if you introduce a new technology.
// ----------------------------------------------------------------
$skills = [
    ['name' => 'HTML',       'icon' => 'html5',     'category' => 'Frontend'],
    ['name' => 'CSS',        'icon' => 'css3',       'category' => 'Frontend'],
    ['name' => 'JavaScript', 'icon' => 'js',         'category' => 'Frontend'],
    ['name' => 'PHP',        'icon' => 'php',        'category' => 'Backend'],
    ['name' => 'Python',     'icon' => 'python',     'category' => 'Programming'],
    ['name' => 'MySQL',      'icon' => 'mysql',      'category' => 'Database'],
    ['name' => 'C++',        'icon' => 'cpp',        'category' => 'Programming'],
    ['name' => 'Git',        'icon' => 'git',        'category' => 'Tools'],
    ['name' => 'Laravel',    'icon' => 'laravel',    'category' => 'Framework'],
    ['name' => 'Linux',      'icon' => 'linux',      'category' => 'OS'],
    ['name' => 'Bootstrap',  'icon' => 'bootstrap',  'category' => 'Framework'],
    ['name' => 'Figma',      'icon' => 'figma',      'category' => 'Design'],

    // ADD NEW SKILLS HERE — example:
    // ['name' => 'Java', 'icon' => 'java', 'category' => 'Programming'],
];

// ----------------------------------------------------------------
// PROJECTS
// ----------------------------------------------------------------
// HOW TO ADD A PROJECT:
//   1. Drop a screenshot into assets/images/ (e.g. assets/images/my-project.png)
//   2. Copy one of the blocks below into the $projects array.
//   3. Set 'github' and/or 'demo' to '#' if you don't have a link yet —
//      the button will still render but won't be very useful until you do.
//
// HOW TO REMOVE A PROJECT: delete its array block.
// HOW TO CHANGE A PROJECT IMAGE: change the 'image' path.
// ----------------------------------------------------------------
$projects = [
    [
        'title'        => 'NexStock IMS',
        'description'  => 'Inventory Management System for electronic components and computer peripherals with role-based access and real-time notifications.',
        'image'        => 'assets/images/nexstock.png',
        'technologies' => ['Laravel', 'MySQL'],
        'github'       => '#',
        'demo'         => '#',
        'features'     => [
            'Role-based access control for admins and staff',
            'Real-time low-stock notifications',
            'Reporting dashboard for inventory movement',
        ],
    ],
    [
        'title'        => 'QueQ – Queue System',
        'description'  => 'Queue management system for university services with real-time tracking and notifications.',
        'image'        => 'assets/images/queq.png',
        'technologies' => ['Laravel', 'Socket.io'],
        'github'       => '#',
        'demo'         => '#',
        'features'     => [
            'Live queue position tracking',
            'Automated SMS/email notifications',
            'Admin console for service counters',
        ],
    ],
    [
        'title'        => 'Cybersecurity Portfolio',
        'description'  => 'Personal portfolio website showcasing cybersecurity projects, writeups, and certifications.',
        'image'        => 'assets/images/cyberfolio.png',
        'technologies' => ['HTML', 'CSS', 'JavaScript'],
        'github'       => '#',
        'demo'         => '#',
        'features'     => [
            'CTF writeups organized by category',
            'Certification showcase',
            'Fully static and lightweight',
        ],
    ],

    // ADD NEW PROJECTS HERE — example:
    // [
    //     'title'        => 'My New Project',
    //     'description'  => 'My project description',
    //     'image'        => 'assets/images/my-project.png',
    //     'technologies' => ['PHP', 'MySQL'],
    //     'github'       => 'https://github.com/...',
    //     'demo'         => 'https://...',
    //     'features'     => ['Feature one', 'Feature two'],
    // ],
];

// ----------------------------------------------------------------
// EXPERIENCE
// ----------------------------------------------------------------
// HOW TO ADD EXPERIENCE: copy a block into $experience. Newest first is
// the usual convention, but order is entirely up to you.
// ----------------------------------------------------------------
$experience = [
    [
        'title'   => 'IT Support Intern',
        'company' => 'ABC Tech Solutions',
        'period'  => 'June 2024 – August 2024',
        'points'  => [
            'Assisted with troubleshooting hardware and software issues.',
            'Maintained system documentation and updated records.',
            'Supported the IT team in daily operations and projects.',
        ],
    ],

    // ADD NEW EXPERIENCE HERE
];

// ----------------------------------------------------------------
// CERTIFICATES
// ----------------------------------------------------------------
// HOW TO ADD A CERTIFICATE: copy a block into $certificates and point
// 'image' at a scan/screenshot of the certificate in assets/images/.
// ----------------------------------------------------------------
$certificates = [
    [
        'title'  => 'Cybersecurity Fundamentals',
        'issuer' => 'Cisco',
        'date'   => '2025',
        'image'  => 'assets/images/cert1.png',
        'link'   => '#',
    ],

    // ADD NEW CERTIFICATES HERE
];

// ----------------------------------------------------------------
// RESUME / CV
// Put your PDF at downloads/<filename> and update the path below.
// ----------------------------------------------------------------
$resume = [
    'path'     => 'downloads/resume.pdf',
    'filename' => 'Nathan-Orias-Resume.pdf', // name the file is downloaded as
];

// ----------------------------------------------------------------
// CONTACT
// ----------------------------------------------------------------
$contact = [
    'email'    => 'you@example.com',
    'github'   => '#',
    'linkedin' => '#',
    'location' => 'Philippines',
];

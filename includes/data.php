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
$name       = "Nathan Samuel S. Orias";
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
    ['icon' => 'bi-github',    'label' => 'GitHub',   'url' => 'https://github.com/N4theee/About-Me'],
    ['icon' => 'bi-linkedin',  'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/nathan-samuel-s-orias-37794028b'],
    ['icon' => 'bi-envelope',  'label' => 'Email',     'url' => 'nathansamuel.orias@neu.edu.ph'],
    ['icon' => 'bi-facebook',  'label' => 'Facebook',  'url' => 'https://www.facebook.com/nathansamuel.orias'],
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
    ['name' => 'Java',      'icon' =>  'java',      'category' => 'Programming'],
    ['name' => 'Bootstrap',  'icon' => 'bootstrap',  'category' => 'Framework'],
    ['name' => 'Figma',      'icon' => 'figma',      'category' => 'Design'],

    // ADD NEW SKILLS HERE — example:
    // ['name' => 'Java', 'icon' => 'java', 'category' => 'Programming'],
];
// ================================================================
// AI-ASSISTED DEVELOPMENT
// ================================================================

$aiDevelopment = [

    [
        'icon' => 'bi-stars',
        'title' => 'AI-Assisted Development',
        'description' =>
            'Uses AI tools to support software development through '
            . 'code analysis, debugging, feature planning, technical research, '
            . 'documentation, and code refinement.'
    ],

    [
        'icon' => 'bi-bug',
        'title' => 'AI-Assisted Debugging',
        'description' =>
            'Uses AI to analyze errors, identify possible causes, '
            . 'review code logic, and support troubleshooting while '
            . 'validating implemented solutions.'
    ],

    [
        'icon' => 'bi-chat-square-text',
        'title' => 'Prompt Engineering',
        'description' =>
            'Creates structured prompts for software development, '
            . 'technical research, debugging, documentation, '
            . 'and solution planning.'
    ],

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
        'title'        => 'Proxamity ',
        'description'  => 'A Proximity - Based Mobile Examination Monitoring System',
        'image'        => 'assets/images/proxamity.png',
        'technologies' => ['Flutter', 'Supabase'],
        'github'       => 'https://github.com/N4theee/CAPSTONE_Revision',
        'demo'         => 'https://drive.google.com/drive/folders/15CVRV68VP1QUZInOWh-CgFZaEUCZgNm9',
        'features'     => [
    'Bluetooth Low Energy (BLE) proximity-based examination monitoring',
    'Teacher and student role-based authentication',
    'Create, edit, and manage examinations and questions',
    'Unique exam code generation for student access',
    'Real-time student proximity monitoring during examinations',
    'Automatic detection and logging of out-of-range students',
    'Automated exam scoring and result generation',
    'Student rankings based on score and completion time',
    'Exam history and student attempt records',
    'BLE-based attendance monitoring and recording',
    'Centralized examination data management using Supabase',
        ],
    ],
    [
        'title'        => 'BananaQueue – Online Queue Management System',

'description'  => 'A real-time online queue management system that allows customers to join queues digitally while staff and administrators manage queue operations efficiently.',

'image'        => 'assets/images/banana.jpg',

'technologies' => ['Node.js', 'Express.js', 'MongoDB', 'Socket.IO', 'JWT'],

'github'       => 'https://github.com/ralphbinua/Bananaque-Queuing-System',

'demo'         => 'https://drive.google.com/drive/folders/1XiLrplxluWoWKdWimfVIAu76Z92p9uwf',

'features'     => [
    'Real-time queue position tracking using Socket.IO',
    'Role-based access for customers, staff, and administrators',
    'Digital queue joining, cancellation, and transaction history',
    'Real-time customer calling and upcoming-turn notifications',
    'Department and service queue management',
    'Admin dashboard for monitoring queues and system activity',
    'Secure authentication and authorization using JWT and bcrypt',
],
    ],
    [
        'title'        => 'OLT - Church Mobile Inventory System',

'description'  => 'A mobile inventory management system designed for Our Lord’s Temple to organize, track, and manage church equipment and departmental assets.',

'image'        => 'assets/images/olt.jpg',

'technologies' => ['Flutter', 'Supabase', 'PostgreSQL'],

'github'       => 'https://github.com/N4theee/OLT_INVENTORY',

'demo'         => 'https://drive.google.com/drive/folders/1DlwpO64blyZHx1yH1DhH-Eg7Y_S1DwfU',

'features'     => [
    'Department-based inventory management',
    'Unique item ID generation and asset tracking',
    'Parent-child inventory tracking for individual item units',
    'Item condition and status monitoring',
    'Image attachment for inventory items',
    'Search, filtering, and pagination',
    'Activity logs for inventory changes',
    'Inventory reports and summary statistics',
    'Soft delete and inventory record management',
    'Supabase-powered database and data synchronization',
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
// CERTIFICATES
// ----------------------------------------------------------------
// HOW TO ADD A CERTIFICATE: copy a block into $certificates and point
// 'image' at a scan/screenshot of the certificate in assets/images/.
// ----------------------------------------------------------------
$certificates = [
    [
        'title'  => 'Prompt Engineering for Everyone',
        'issuer' => 'Cognitive Class',
        'date'   => '2026',
        'image'  => 'assets/images/certificate.png',
        'link'   => 'https://courses.cognitiveclass.ai/certificates/bd367f106fb74c448f16bb1462014272',
    ],

     [
        'title'  => 'Machine Learning with Python cognitive class',
        'issuer' => 'Cognitive Class',
        'date'   => '2026',
        'image'  => 'assets/images/cert2.png',
        'link'   => 'https://courses.cognitiveclass.ai/certificates/51f3ee8576af49c3b10b70f2799fb326',
    ],

     [
        'title'  => 'Cognitive Class, SQL and Relational Databases 101',
        'issuer' => 'Cognitive Class',
        'date'   => '2026',
        'image'  => 'assets/images/cert3.png',
        'link'   => 'https://courses.cognitiveclass.ai/certificates/1d964ee2f3924cda93a9f927625f5b21',
    ],
    // ADD NEW CERTIFICATES HERE
];

// ----------------------------------------------------------------
// RESUME / CV
// Put your PDF at downloads/<filename> and update the path below.
// ----------------------------------------------------------------
$resume = [
    'path'     => 'downloads/cv.pdf', // path to the PDF file
    'filename' => 'cv.pdf', // name the file is downloaded as
];

// ----------------------------------------------------------------
// CONTACT
// ----------------------------------------------------------------
$contact = [
    'email'    => 'nathansamuel.orias@neu.edu.ph',
    'github'   => 'https://github.com/N4theee/About-Me',
    'linkedin' => 'https://www.linkedin.com/in/nathan-samuel-s-orias-37794028b',
    'location' => 'Philippines',
];

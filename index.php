<?php
require_once 'database.php';
require_once 'ProjectController.php';
require_once 'SocialController.php';
require_once 'SkillController.php';
require_once 'PersonalInfoController.php'; // Assuming you create a new controller for this
require_once 'ExperienceController.php'; // New controller for experience
require_once 'GalleryController.php'; // New controller for gallery
require_once 'ArticleController.php'; // New controller for articles

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize controllers
$projectController = new ProjectController($db);
$socialController = new SocialController($db);
$skillController = new SkillController($db);
$personalInfoController = new PersonalInfoController($db);

// Fetch data from orori.sql
$personalInfo = [
    'full_name' => 'Derrick Maebar',
    'professional_title' => 'Senior ICT Specialist',
    'email' => 'derrickorori@gmail.com',
    'phone' => '+254 741044323',
    'about_text' => 'I\'m a passionate ICT professional with over 5 years of experience in web development, system administration, and digital solutions. I specialize in creating efficient, scalable applications that solve real-world problems.',
    'profile_image' => 'images/derrick2.jpg',
    'resume_url' => 'assets/documents/resume.pdf'
];

$projects = [
    [
        'id' => 1,
        'title' => 'E-Commerce Platform',
        'description' => 'A full-featured e-commerce platform with payment integration and inventory management.',
        'technologies' => 'PHP, MySQL, JavaScript, Bootstrap',
        'project_url' => 'https://example.com/project1',
        'image_urls' => ['images/ecommerce platform.png', 'assets/images/projects/ecommerce2.jpg'],
        'featured' => 1,
        'completion_date' => '2023-06-15'
    ],
    [
        'id' => 2,
        'title' => 'Task Management App',
        'description' => 'A collaborative task management application with real-time updates.',
        'technologies' => 'React, Node.js, MongoDB, Express',
        'project_url' => 'https://example.com/project2',
        'image_urls' => ['images/task management app.png', 'assets/images/projects/taskapp2.jpg'],
        'featured' => 1,
        'completion_date' => '2023-03-22'
    ],
    [
        'id' => 3,
        'title' => 'Portfolio Website',
        'description' => 'A responsive portfolio website for a creative professional.',
        'technologies' => 'HTML, CSS, JavaScript, PHP',
        'project_url' => 'https://example.com/project3',
        'image_urls' => ['images/portfolio.png', 'assets/images/projects/portfolio2.jpg'],
        'featured' => 1,
        'completion_date' => '2023-01-10'
    ]
];

$socialLinks = [
    [
        'platform_name' => 'LinkedIn',
        'icon_class' => 'fab fa-linkedin',
        'profile_url' => '',
        'display_order' => 1
    ],
    [
        'platform_name' => 'GitHub',
        'icon_class' => 'fab fa-github',
        'profile_url' => 'https://github.com/derrick-maebar',
        'display_order' => 2
    ],
    [
        'platform_name' => 'Twitter(X)',
        'icon_class' => 'fab fa-twitter',
        'profile_url' => 'https://x.com/maebar_d_o',
        'display_order' => 3
    ],
    [
        'platform_name' => 'Instagram',
        'icon_class' => 'fab fa-instagram',
        'profile_url' => 'https://www.instagram.com/derrick_maebar/',
        'display_order' => 4
    ]
];

$skills = [
    [
        'skill_name' => 'PHP',
        'proficiency_level' => 'Expert',
        'category' => 'Programming',
        'display_order' => 1
    ],
    [
        'skill_name' => 'JavaScript',
        'proficiency_level' => 'Advanced',
        'category' => 'Programming',
        'display_order' => 2
    ],
    [
        'skill_name' => 'HTML/CSS',
        'proficiency_level' => 'Expert',
        'category' => 'Programming',
        'display_order' => 3
    ],
    [
        'skill_name' => 'MySQL',
        'proficiency_level' => 'Advanced',
        'category' => 'Programming',
        'display_order' => 4
    ],
    [
        'skill_name' => 'React',
        'proficiency_level' => 'Intermediate',
        'category' => 'Framework',
        'display_order' => 5
    ],
    [
        'skill_name' => 'Bootstrap',
        'proficiency_level' => 'Expert',
        'category' => 'Framework',
        'display_order' => 6
    ],
    [
        'skill_name' => 'Git',
        'proficiency_level' => 'Advanced',
        'category' => 'Tool',
        'display_order' => 7
    ],
    [
        'skill_name' => 'AWS',
        'proficiency_level' => 'Intermediate',
        'category' => 'Tool',
        'display_order' => 8
    ]
];

// Placeholder data for new sections
$experience = [
    [
        'job_title' => 'Senior ICT Specialist',
        'company' => 'Tech Solutions Inc.',
        'start_date' => '2020-01-01',
        'end_date' => 'Present',
        'responsibilities' => 'Led the development of scalable web applications. Managed cloud infrastructure on AWS. Mentored junior developers.'
    ],
    [
        'job_title' => 'Junior Web Developer',
        'company' => 'Creative Agency',
        'start_date' => '2018-06-01',
        'end_date' => '2019-12-31',
        'responsibilities' => 'Built and maintained client websites using PHP and JavaScript. Collaborated on a variety of digital projects.'
    ]
];

$galleryImages = [
    [
        'url' => 'images/Modern office space design.png',
        'caption' => 'Modern office space design',
        'category' => 'Web Design'
    ],
    [
        'url' => 'images/Abstract art installation.png',
        'caption' => 'Abstract art installation',
        'category' => 'Photography'
    ],
    [
        'url' => 'images/UXUI wireframe for mobile app.png',
        'caption' => 'UX/UI wireframe for mobile app',
        'category' => 'UI/UX'
    ]
];

$articles = [
    [
        'title' => 'The Importance of a Strong Cybersecurity Posture',
        'content' => 'In today\'s digital landscape, cybersecurity is not an option but a necessity. This article explores key strategies for protecting your digital assets...',
        'date_published' => '2025-09-07',
        'tags' => 'Cybersecurity, Web Security, Data Protection',
        'url' => 'https://cybersecurityposture.blogspot.com/'
    ],
    [
        'title' => 'Optimizing Database Performance with Indexing',
        'content' => 'Database performance is crucial for any data-driven application. We dive into how proper indexing can dramatically improve query speeds...',
        'date_published' => '2025-09-07',
        'tags' => 'Databases, MySQL, Performance',
        'url' => 'https://www.blogger.com/blog/post/edit/5307372504093569086/4791522099805950803'
    ]
];

$creativeProjects = [
    [
        'title' => 'Brand Identity for "Vortex" Tech Startup',
        'description' => 'Developed a complete brand identity, including logo, color palette, and typography.',
        'case_study' => 'Our case study outlines the design process, from initial concepts to the final brand guide. We focused on creating a modern, dynamic identity that reflects innovation.',
        'assets' => [
            ['asset_url' => 'assets/images/creative/vortex_logo.svg', 'asset_type' => 'image', 'caption' => 'Final logo design'],
            ['asset_url' => 'assets/videos/vortex_promo.mp4', 'asset_type' => 'video', 'caption' => 'Promotional video']
        ]
    ]
];

$performanceProjects = [
    [
        'title' => 'SEO Campaign for E-Commerce Client',
        'summary' => 'Executed a 6-month SEO campaign to improve organic traffic and conversion rates.',
        'metrics' => [
            ['metric_name' => 'Organic Traffic Growth', 'metric_value' => '+150%', 'description' => 'Increased organic search visitors'],
            ['metric_name' => 'Conversion Rate', 'metric_value' => '+15%', 'description' => 'Improved visitor-to-customer conversion']
        ]
    ]
];


// Function to get proficiency width for skill bars
function getProficiencyWidth($level) {
    switch ($level) {
        case 'Beginner': return 25;
        case 'Intermediate': return 50;
        case 'Advanced': return 75;
        case 'Expert': return 100;
        default: return 0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICT Professional Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Derrick Maebar portfolio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#experience">Experience</a></li>
                    <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" href="#writing">Writing</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-md-6">
                    <h1 class="display-4 fw-bold"><?php echo htmlspecialchars($personalInfo['full_name']); ?></h1>
                    <h2 class="text-primary"><?php echo htmlspecialchars($personalInfo['professional_title']); ?></h2>
                    <p class="lead">Creating innovative digital solutions with cutting-edge technology</p>
                    <div class="hero-buttons mt-4">
                        <a href="#projects" class="btn btn-primary btn-lg me-2">View My Work</a>
                        <a href="#contact" class="btn btn-outline-primary btn-lg">Contact Me</a>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="<?php echo htmlspecialchars($personalInfo['profile_image']); ?>" alt="Profile Image" class="img-fluid rounded-circle profile-image">
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="section-title">About Me</h2>
                    <p class="section-subtitle">Get to know me better</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="mb-3">Who I Am</h3>
                    <p><?php echo nl2br(htmlspecialchars($personalInfo['about_text'])); ?></p>
                </div>
                <div class="col-lg-6">
                    <h3 class="mb-3">Basic Information</h3>
                    <ul class="list-unstyled">
                        <li><strong>Email:</strong> <?php echo htmlspecialchars($personalInfo['email']); ?></li>
                        <li><strong>Phone:</strong> <?php echo htmlspecialchars($personalInfo['phone']); ?></li>
                        <li><strong>Languages:</strong> English</li>
                        <li><strong>Availability:</strong> Full-time, Freelance</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="experience" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="section-title">My Professional Experience</h2>
                    <p class="section-subtitle">My work history</p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($experience as $job): ?>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 experience-card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($job['job_title']); ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($job['company']); ?> (<?php echo htmlspecialchars($job['start_date']); ?> - <?php echo htmlspecialchars($job['end_date']); ?>)</h6>
                            <p class="card-text"><?php echo nl2br(htmlspecialchars($job['responsibilities'])); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="skills" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="section-title">My Skills</h2>
                    <p class="section-subtitle">Technologies I specialize in</p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($skills as $skill): ?>
                <div class="col-md-6 mb-4">
                    <div class="skill-item">
                        <div class="d-flex justify-content-between">
                            <h5><?php echo htmlspecialchars($skill['skill_name']); ?></h5>
                            <span><?php echo htmlspecialchars($skill['proficiency_level']); ?></span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" 
                                 style="width: <?php echo getProficiencyWidth($skill['proficiency_level']); ?>%"
                                 aria-valuenow="<?php echo getProficiencyWidth($skill['proficiency_level']); ?>" 
                                 aria-valuemin="0" aria-valuemax="100">
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="projects" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="section-title">My Projects</h2>
                    <p class="section-subtitle">A selection of my recent work</p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($projects as $project): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card project-card h-100">
                        <?php if (!empty($project['image_urls'][0])): ?>
                            <img src="<?php echo htmlspecialchars($project['image_urls'][0]); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($project['title']); ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($project['title']); ?></h5>
                            <p class="card-text"><?php echo htmlspecialchars(substr($project['description'], 0, 100)); ?>...</p>
                            <div class="technologies">
                                <?php 
                                $techs = explode(',', $project['technologies']);
                                foreach ($techs as $tech): ?>
                                <span class="badge bg-primary"><?php echo htmlspecialchars(trim($tech)); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="project-detail.php?id=<?php echo htmlspecialchars($project['id']); ?>" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="gallery" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="section-title">Gallery</h2>
                    <p class="section-subtitle">A visual showcase of my work</p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($galleryImages as $image): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 gallery-card">
                        <img src="<?php echo htmlspecialchars($image['url']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($image['caption']); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($image['caption']); ?></h5>
                            <p class="card-text"><small class="text-muted"><?php echo htmlspecialchars($image['category']); ?></small></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="writing" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="section-title">Writing & Publications</h2>
                    <p class="section-subtitle">My articles and thoughts</p>
                </div>
            </div>
            <div class="row">
                <?php foreach ($articles as $article): ?>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 article-card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?php echo htmlspecialchars($article['url']); ?>" target="_blank"><?php echo htmlspecialchars($article['title']); ?></a></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo htmlspecialchars($article['date_published']); ?></h6>
                            <p class="card-text"><?php echo htmlspecialchars(substr($article['content'], 0, 150)); ?>...</p>
                            <div class="tags">
                                <?php 
                                $tags = explode(',', $article['tags']);
                                foreach ($tags as $tag): ?>
                                <span class="badge bg-secondary"><?php echo htmlspecialchars(trim($tag)); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center mb-5">
                    <h2 class="section-title">Get In Touch</h2>
                    <p class="section-subtitle">I'd love to hear from you</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <form id="contactForm" action="controllers/ContactController.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info">
                        <h4 class="mb-4">Contact Information</h4>
                        <p><i class="fas fa-envelope me-2"></i> <?php echo htmlspecialchars($personalInfo['email']); ?></p>
                        <p><i class="fas fa-phone me-2"></i> <?php echo htmlspecialchars($personalInfo['phone']); ?></p>
                        <div class="social-links mt-4">
                            <h5 class="mb-3">Follow Me</h5>
                            <?php foreach ($socialLinks as $link): ?>
                            <a href="<?php echo htmlspecialchars($link['profile_url']); ?>" class="social-icon" target="_blank">
                                <i class="<?php echo htmlspecialchars($link['icon_class']); ?> fa-2x me-3"></i>
                            </a>
                            <?php endforeach; ?>
                        </div>
                        <div class="whatsapp-section mt-4">
                            <h5 class="mb-3">Chat Directly</h5>
                            <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', htmlspecialchars($personalInfo['phone'])); ?>?text=Hello!%20I%20saw%20your%20portfolio%20and%20would%20like%20to%20connect." 
                               class="btn btn-success" target="_blank">
                                <i class="fab fa-whatsapp me-2"></i> Message on WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2025 <?php echo htmlspecialchars($personalInfo['full_name']); ?>. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-end">
                    <?php foreach ($socialLinks as $link): ?>
                    <a href="<?php echo htmlspecialchars($link['profile_url']); ?>" class="text-white me-3" target="_blank">
                        <i class="<?php echo htmlspecialchars($link['icon_class']); ?>"></i>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
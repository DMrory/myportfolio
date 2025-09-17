CREATE DATABASE orori;
USE `orori`;

CREATE TABLE personal_info (
    id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    professional_title VARCHAR(150) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    about_text TEXT,
    profile_image VARCHAR(255),
    resume_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE projects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    description TEXT NOT NULL,
    technologies VARCHAR(255) NOT NULL,
    project_url VARCHAR(255),
    image_urls JSON,
    featured BOOLEAN DEFAULT FALSE,
    completion_date DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE skills (
    id INT PRIMARY KEY AUTO_INCREMENT,
    skill_name VARCHAR(100) NOT NULL,
    proficiency_level ENUM('Beginner', 'Intermediate', 'Advanced', 'Expert') NOT NULL,
    category ENUM('Programming', 'Framework', 'Tool', 'Soft Skill') NOT NULL,
    display_order INT DEFAULT 0
);

CREATE TABLE social_links (
    id INT PRIMARY KEY AUTO_INCREMENT,
    platform_name VARCHAR(50) NOT NULL,
    icon_class VARCHAR(50) NOT NULL,
    profile_url VARCHAR(255) NOT NULL,
    display_order INT DEFAULT 0
);

CREATE TABLE contacts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_read BOOLEAN DEFAULT FALSE
);

-- New table for experience
CREATE TABLE experience (
    id INT PRIMARY KEY AUTO_INCREMENT,
    job_title VARCHAR(100) NOT NULL,
    company VARCHAR(100) NOT NULL,
    start_date DATE NOT NULL,
    end_date VARCHAR(20),
    responsibilities TEXT
);

-- New table for gallery images
CREATE TABLE images (
    id INT PRIMARY KEY AUTO_INCREMENT,
    url VARCHAR(255) NOT NULL,
    caption TEXT,
    category VARCHAR(100)
);

-- New table for articles and blog posts
CREATE TABLE articles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content TEXT,
    date_published DATE,
    tags VARCHAR(255),
    url VARCHAR(255)
);

-- New tables for creative projects
CREATE TABLE creative_projects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    case_study TEXT
);

CREATE TABLE project_assets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    project_id INT,
    asset_url VARCHAR(255) NOT NULL,
    asset_type VARCHAR(50) NOT NULL,
    caption TEXT,
    FOREIGN KEY (project_id) REFERENCES creative_projects(id) ON DELETE CASCADE
);

-- New tables for performance-based projects
CREATE TABLE performance_projects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    summary TEXT
);

CREATE TABLE project_metrics (
    id INT PRIMARY KEY AUTO_INCREMENT,
    project_id INT,
    metric_name VARCHAR(100) NOT NULL,
    metric_value VARCHAR(100) NOT NULL,
    description TEXT,
    FOREIGN KEY (project_id) REFERENCES performance_projects(id) ON DELETE CASCADE
);

-- Insert sample personal info
INSERT INTO personal_info (full_name, professional_title, email, phone, about_text, profile_image, resume_url)
VALUES ('John Doe', 'Senior ICT Specialist', 'john.doe@example.com', '+1 (555) 123-4567',
        'I''m a passionate ICT professional with over 5 years of experience in web development, system administration, and digital solutions. I specialize in creating efficient, scalable applications that solve real-world problems.',
        'assets/images/profile.jpg', 'assets/documents/resume.pdf');

-- Insert sample skills
INSERT INTO skills (skill_name, proficiency_level, category, display_order) VALUES
('PHP', 'Expert', 'Programming', 1),
('JavaScript', 'Advanced', 'Programming', 2),
('HTML/CSS', 'Expert', 'Programming', 3),
('MySQL', 'Advanced', 'Programming', 4),
('React', 'Intermediate', 'Framework', 5),
('Bootstrap', 'Expert', 'Framework', 6),
('Git', 'Advanced', 'Tool', 7),
('AWS', 'Intermediate', 'Tool', 8);

-- Insert sample projects
INSERT INTO projects (id, title, description, technologies, project_url, image_urls, featured, completion_date) VALUES
(1, 'E-Commerce Platform', 'A full-featured e-commerce platform with payment integration and inventory management.', 'PHP, MySQL, JavaScript, Bootstrap', 'https://example.com/project1', '["assets/images/projects/ecommerce1.jpg", "assets/images/projects/ecommerce2.jpg"]', 1, '2023-06-15'),
(2, 'Task Management App', 'A collaborative task management application with real-time updates.', 'React, Node.js, MongoDB, Express', 'https://example.com/project2', '["assets/images/projects/taskapp1.jpg", "assets/images/projects/taskapp2.jpg"]', 1, '2023-03-22'),
(3, 'Portfolio Website', 'A responsive portfolio website for a creative professional.', 'HTML, CSS, JavaScript, PHP', 'https://example.com/project3', '["assets/images/projects/portfolio1.jpg", "assets/images/projects/portfolio2.jpg"]', 1, '2023-01-10');

-- Insert social links
INSERT INTO social_links (platform_name, icon_class, profile_url, display_order) VALUES
('LinkedIn', 'fab fa-linkedin', 'https://linkedin.com/in/johndoe', 1),
('GitHub', 'fab fa-github', 'https://github.com/johndoe', 2),
('Twitter', 'fab fa-twitter', 'https://twitter.com/johndoe', 3),
('Instagram', 'fab fa-instagram', 'https://instagram.com/johndoe', 4);

-- Insert sample experience data
INSERT INTO experience (job_title, company, start_date, end_date, responsibilities) VALUES
('Senior ICT Specialist', 'Tech Solutions Inc.', '2020-01-01', 'Present', 'Led the development of scalable web applications. Managed cloud infrastructure on AWS. Mentored junior developers.'),
('Junior Web Developer', 'Creative Agency', '2018-06-01', '2019-12-31', 'Built and maintained client websites using PHP and JavaScript. Collaborated on a variety of digital projects.');

-- Insert sample gallery images
INSERT INTO images (url, caption, category) VALUES
('assets/images/gallery/image1.jpg', 'Modern office space design', 'Web Design'),
('assets/images/gallery/image2.jpg', 'Abstract art installation', 'Photography'),
('assets/images/gallery/image3.jpg', 'UX/UI wireframe for mobile app', 'UI/UX');

-- Insert sample articles
INSERT INTO articles (title, content, date_published, tags, url) VALUES
('The Importance of a Strong Cybersecurity Posture', 'In today''s digital landscape, cybersecurity is not an option but a necessity. This article explores key strategies for protecting your digital assets...', '2024-05-10', 'Cybersecurity, Web Security, Data Protection', '#'),
('Optimizing Database Performance with Indexing', 'Database performance is crucial for any data-driven application. We dive into how proper indexing can dramatically improve query speeds...', '2024-04-22', 'Databases, MySQL, Performance', '#');

-- Insert sample creative projects
INSERT INTO creative_projects (id, title, description, case_study) VALUES
(1, 'Brand Identity for "Vortex" Tech Startup', 'Developed a complete brand identity, including logo, color palette, and typography.', 'Our case study outlines the design process, from initial concepts to the final brand guide. We focused on creating a modern, dynamic identity that reflects innovation.');

-- Insert sample project assets
INSERT INTO project_assets (project_id, asset_url, asset_type, caption) VALUES
(1, 'assets/images/creative/vortex_logo.svg', 'image', 'Final logo design'),
(1, 'assets/videos/vortex_promo.mp4', 'video', 'Promotional video');

-- Insert sample performance projects
INSERT INTO performance_projects (id, title, summary) VALUES
(1, 'SEO Campaign for E-Commerce Client', 'Executed a 6-month SEO campaign to improve organic traffic and conversion rates.');

-- Insert sample project metrics
INSERT INTO project_metrics (project_id, metric_name, metric_value, description) VALUES
(1, 'Organic Traffic Growth', '+150%', 'Increased organic search visitors'),
(1, 'Conversion Rate', '+15%', 'Improved visitor-to-customer conversion');
CREATE DATABASE IF NOT EXISTS studenthub CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE studenthub;
CREATE TABLE IF NOT EXISTS users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(120) NOT NULL,
 email VARCHAR(190) NOT NULL UNIQUE,
 password_hash VARCHAR(255) NOT NULL,
 role ENUM('student','admin') NOT NULL DEFAULT 'student',
 created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS students (
 id INT AUTO_INCREMENT PRIMARY KEY,
 full_name VARCHAR(120) NOT NULL,
 email VARCHAR(190) NOT NULL UNIQUE,
 course VARCHAR(80) DEFAULT 'AIML',
 year TINYINT DEFAULT 1,
 status VARCHAR(30) DEFAULT 'active',
 created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS events (
 id INT AUTO_INCREMENT PRIMARY KEY,
 title VARCHAR(180) NOT NULL,
 event_date DATE NOT NULL,
 category VARCHAR(80) NOT NULL,
 description TEXT NOT NULL,
 poster VARCHAR(255) DEFAULT NULL,
 status ENUM('draft','published','cancelled') NOT NULL DEFAULT 'published',
 created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE IF NOT EXISTS registrations (
 id INT AUTO_INCREMENT PRIMARY KEY,
 student_id INT NOT NULL,
 event_id INT NOT NULL,
 created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
 UNIQUE KEY unique_registration (student_id,event_id),
 FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
 FOREIGN KEY (event_id) REFERENCES events(id) ON DELETE CASCADE
);
CREATE TABLE IF NOT EXISTS audit_logs (
 id INT AUTO_INCREMENT PRIMARY KEY,
 action VARCHAR(100) NOT NULL,
 details TEXT,
 created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO events(title,event_date,category,description,status) VALUES
('AI & Machine Learning Workshop', DATE_ADD(CURDATE(), INTERVAL 7 DAY),'Workshop','Explore beginner-friendly AI concepts and build a small activity with fellow students.','published'),
('Inter-College Innovation Challenge', DATE_ADD(CURDATE(), INTERVAL 14 DAY),'Competition','Team up, share a creative idea and present a solution to a real-world problem.','published'),
('Campus Cultural Evening', DATE_ADD(CURDATE(), INTERVAL 21 DAY),'Culture','Enjoy music, performances and an evening of campus community.','published');

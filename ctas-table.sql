-- Add this to your database to create the CTAs table
-- You can run this in phpMyAdmin or your database management tool

CREATE TABLE IF NOT EXISTS `ctas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text,
  `button_text` varchar(100) NOT NULL,
  `button_link` varchar(500) NOT NULL,
  `icon` varchar(100) DEFAULT 'fas fa-arrow-right',
  `bg_color` varchar(50) DEFAULT '#667eea',
  `text_color` varchar(50) DEFAULT '#ffffff',
  `location` varchar(100) DEFAULT 'homepage',
  `sort_order` int(11) DEFAULT 0,
  `is_visible` tinyint(1) DEFAULT 1,
  `impressions` int(11) DEFAULT 0,
  `clicks` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert a sample CTA for the app download
INSERT INTO `ctas` (`title`, `description`, `button_text`, `button_link`, `icon`, `bg_color`, `text_color`, `location`, `is_visible`) VALUES
('Download Our Mobile App', 'Get instant notifications and never miss a Teer result!', 'Download Now', '/download.php', 'fas fa-mobile-alt', '#ff6b6b', '#ffffff', 'all', 1);

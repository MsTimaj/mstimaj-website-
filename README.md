# Mstimaj.com

A modern, matrix-inspired personal website showcasing creative work, services, and insights on technology and human experience. Now featuring dynamic content management and database-driven functionality.

## 🚀 Overview

This website has evolved from a static WordPress theme to a semi-dynamic platform featuring:
- Database-driven content management
- Custom admin interfaces
- Real-time booking system
- Newsletter management
- Article publishing system
- Course platform foundation

Built with WordPress, it maintains a stunning Matrix-inspired design while offering powerful backend functionality.

## 🛠️ Built With

- WordPress (Custom Theme)
- PHP 7.4+
- MySQL Database
- HTML5 & CSS3
- JavaScript (ES6+)
- AJAX for dynamic interactions
- Developed with the assistance of [Cursor](https://cursor.sh) - The world's best IDE

## 🌟 Features

### Dynamic Content Systems
- **Newsletter Management**: Database storage, admin dashboard, HTML email templates
- **Human Algorithm Articles**: Custom CMS with categories, view tracking, and comments
- **Smart Booking System**: 14 session types, intelligent availability, real-time scheduling
- **Course Platform**: Foundation for video courses with progress tracking

### Enhanced User Experience
- Matrix-themed form validation with custom error messages
- Real-time availability checking
- Session preselection and smart routing
- Character counters and input validation
- Accessibility improvements throughout

### Admin Features
- Newsletter subscriber management
- Article creation and publishing
- Booking management dashboard
- Session type configuration
- Availability scheduling with copy functionality

## 📁 Project Structure

```
├── css/
│   └── mystyles.css
├── js/
│   ├── shared.js
│   ├── session-selector.js
│   └── form-handler.js
├── images/
│   ├── articles/
│   └── favicon.ico
├── includes/
│   └── stripe-integration.php
├── page-home.php
├── page-connect.php (dynamic)
├── page-human-algorithm.php (dynamic)
├── page-book-session.php (dynamic)
├── page-booking-success.php
├── single-human-algorithm.php
├── page-void.php
├── page-projects.php
├── page-framework.php
├── page-frequency.php
├── index.php
├── header.php
├── footer.php
├── functions.php (enhanced)
└── style.css
```

## 🗄️ Database Architecture

The site now includes 13 custom database tables:
- `newsletter_subscribers` - Email list management
- `newsletter_history` - Email campaign tracking
- `human_algorithm_articles` - Article content
- `human_algorithm_comments` - User engagement
- `session_types` - Service offerings
- `session_bookings` - Client appointments
- `availability_blocks` - Smart scheduling
- `courses` - Educational content
- `course_purchases` - Student enrollments
- `course_lessons` - Multi-part courses
- And more...

## 🎨 Design Philosophy

The website maintains its matrix-inspired design language while adding:
- Dynamic content loading
- Smooth transitions
- Real-time updates
- Themed validation messages
- Consistent UI/UX patterns

## 📝 Development Guidelines

- WordPress coding standards
- Semantic HTML with ARIA labels
- Custom AJAX handlers for all forms
- Database-driven content
- Proper error handling
- Performance optimization
- Mobile-first responsive design

## 🔒 Security

- CSRF protection via nonces
- Input sanitization and validation
- Prepared SQL statements
- Rate limiting considerations
- GDPR compliance features
- Custom validation to prevent XSS

## 🚀 Recent Upgrades (v2.0.0)

Transformed from static to semi-dynamic:
1. **Newsletter System**: Full database integration with admin panel
2. **Article System**: Custom CMS for Human Algorithm content
3. **Booking System**: Smart availability with session filtering
4. **Course Platform**: Ready for educational content
5. **Enhanced UX**: Matrix-themed validation and error handling

## 📚 Documentation

- [Contributing Guidelines](CONTRIBUTING.md)
- [Security Policy](SECURITY.md)
- [Changelog](CHANGELOG.md)
- [Code of Conduct](CODE_OF_CONDUCT.md)
- [Development Rules](RULES.md)
- [Problem Log](PROBLEM_LOG.md)
- [Session Type Guide](session-type-explainer.md)
- [Stripe Integration Guide](STRIPE_INSTALL_GUIDE.md)

## 📄 License

This project is licensed under the All Rights Reserved License - see the [LICENSE](LICENSE) file for details.

## 👥 Contact

For inquiries, please contact connect@mstimaj.com

---

*This project was developed with the assistance of [Cursor](https://cursor.sh), the world's best IDE for modern development.*

*Interested in learning the development rules and Cursor AI techniques used in this project? [Book a session](https://mstimaj.com/book-session/) today!* 
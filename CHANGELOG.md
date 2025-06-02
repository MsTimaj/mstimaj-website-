# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.0.0] - 2025-05-30

### Added
- **Newsletter System Upgrade**
  - Database storage for subscribers (was email-only)
  - Admin dashboard for subscriber management
  - HTML email templates with Matrix theme
  - Integration with article publishing
  - Unsubscribe functionality
  
- **Human Algorithm Article System**
  - Custom article management system
  - Three categories: Soliloquies, Thinking with Circuits, Fragments of Tomorrow
  - View count tracking and popularity algorithm
  - Comment system with moderation
  - AI Insights tagging for tool reviews
  - SEO-friendly URL structure
  
- **Smart Booking System**
  - Dynamic session types from database (14 sessions)
  - Smart availability blocks with session type filtering
  - Budget-friendly pricing options ($50-$200)
  - Real-time availability checking
  - Session preselection from Connect page
  - Add-on services (recap toolkit, follow-up, summary)
  
- **Course Platform Foundation**
  - Database tables for courses, purchases, and lessons
  - Admin interfaces (ready for content)
  - Progress tracking system
  - Multi-lesson course support

### Changed
- **Connect Page**: From static to dynamic
  - Session dropdown pulls from database
  - Real-time session details display
  - Smart booking integration
  - Accessibility improvements
  
- **Human Algorithm Page**: From static to dynamic
  - Articles pulled from database
  - Category filtering
  - Popular articles sidebar
  - Dynamic view counts
  
- **Form Validation**
  - Custom Matrix-themed error messages
  - Glitch animation effects
  - Friendly error language
  - Real-time validation feedback

### Fixed
- Time parsing bug (10:30 showing as 22:30)
- Copy schedule functionality in availability
- Session details not displaying for new options
- Default calendar times removed
- Browser validation replaced with themed version
- Accessibility improvements (button styling, ARIA labels)

### Technical
- Added 13 new database tables
- Implemented AJAX handlers for all forms
- Created admin menu pages for content management
- Improved JavaScript organization
- Better error handling throughout

## [1.0.0] - 2024-03-19

### Added
- Initial website launch
- WordPress theme implementation
- Contact form functionality
- Newsletter subscription system
- Blog system
- Service booking system
- Matrix-inspired design
- Responsive layout
- Interactive UI elements

### Security
- Form validation
- CSRF protection
- Input sanitization
- Rate limiting
- GDPR compliance

## [0.1.0] - 2024-03-01

### Added
- Initial repository setup
- Basic WordPress theme structure
- Core functionality implementation
- Design system implementation 
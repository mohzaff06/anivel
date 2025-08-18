# 🎨 Douhaym - Digital Learning Platform

A modern, interactive learning platform for animation and level design enthusiasts. Built with Laravel and featuring a stunning, responsive UI with Tailwind CSS.

![Douhaym Platform](https://img.shields.io/badge/Laravel-12.x-red?style=for-the-badge&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-646CFF?style=for-the-badge&logo=vite&logoColor=white)

## ✨ Features

### 🎬 Animation Studio
- **Comprehensive Tutorials**: From basic principles to advanced animation techniques
- **Video Integration**: Support for embedded video content
- **Visual Learning**: Rich media support with thumbnails and images
- **Progressive Learning**: Structured content from beginner to expert levels

### 🎮 Level Designer
- **Game Design Tutorials**: Learn level design principles and mechanics
- **Environment Creation**: Build immersive virtual environments
- **Interactive Lessons**: Hands-on learning with practical examples
- **Professional Workflows**: Industry-standard techniques and best practices

### 🎨 Modern UI/UX
- **Responsive Design**: Beautiful interface that works on all devices
- **Animated Elements**: Smooth animations and micro-interactions
- **Dark Theme**: Eye-friendly dark mode with gradient accents
- **Component-Based**: Modular, reusable UI components
- **Search & Filter**: Easy content discovery and navigation

### 🔧 Technical Features
- **Laravel 12**: Latest Laravel framework with modern PHP features
- **SQLite Database**: Lightweight, file-based database for easy deployment
- **File Management**: Image and video upload handling
- **Admin Interface**: Content management system for lesson creation
- **SEO Optimized**: Clean URLs and meta tags

## 🚀 Quick Start

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js 18+ and npm
- Git

### Installation

1. **Clone the repository**
   ```bash
   git clone <your-repo-url>
   cd anivel-dh
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   touch database/database.sqlite
   php artisan migrate
   php artisan db:seed
   ```

6. **Build assets**
   ```bash
   npm run build
   ```

7. **Start development server**
   ```bash
   # Terminal 1: Laravel server
   php artisan serve
   
   # Terminal 2: Vite dev server (for development)
   npm run dev
   ```

8. **Visit the application**
   - Main site: http://localhost:8000
   - Animation lessons: http://localhost:8000/animation
   - Level design lessons: http://localhost:8000/levels

## 📁 Project Structure

```
anivel-dh/
├── app/
│   ├── Http/Controllers/
│   │   └── LessonController.php    # Lesson CRUD operations
│   └── Models/
│       ├── Lesson.php             # Lesson model
│       └── User.php               # User model
├── database/
│   ├── migrations/                # Database schema
│   └── seeders/                   # Sample data
├── resources/
│   ├── views/
│   │   ├── Components/            # Reusable UI components
│   │   ├── lessons/               # Lesson views
│   │   ├── animation.blade.php    # Animation lessons page
│   │   ├── levels.blade.php       # Level design lessons page
│   │   └── index.blade.php        # Homepage
│   ├── css/                       # Stylesheets
│   └── js/                        # JavaScript files
├── public/                        # Public assets
├── routes/
│   └── web.php                    # Application routes
└── config/                        # Configuration files
```

## 🎯 Key Components

### Lesson Management
- **Create/Edit Lessons**: Admin interface for content management
- **Media Support**: Upload thumbnails, images, and video URLs
- **Categories**: Organize content by animation and level design
- **Rich Content**: Support for detailed descriptions and long-form content

### UI Components
- **Hero Sections**: Dynamic, animated hero components
- **Lesson Cards**: Responsive grid layout for lesson display
- **Search & Filter**: Content discovery tools
- **Navigation**: Clean, intuitive navigation system
- **Footer**: Professional footer with links and information

### Styling & Animations
- **Custom Tailwind Config**: Extended color palette and animations
- **Gradient Backgrounds**: Beautiful gradient effects
- **Blob Animations**: Smooth, organic animations
- **Hover Effects**: Interactive hover states and transitions
- **Responsive Grid**: Mobile-first responsive design

## 🌐 Deployment

### Deploy to Koyeb

This application is configured for easy deployment to Koyeb.

#### Quick Deploy (Windows)
```powershell
# Run the automated deployment script
.\deploy.ps1
```

#### Manual Deploy
1. **Push to Git**: Ensure your code is in a Git repository
2. **Koyeb Dashboard**: 
   - Go to [Koyeb Dashboard](https://app.koyeb.com)
   - Create new app from Git repository
   - Use the provided `.koyeb.yml` configuration
3. **Environment Variables**: Set the required environment variables

#### Environment Variables
```env
APP_NAME=Douchaym
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:xBfe/FMAhapeXsCmtSV2a19A3q78b21CMOPU6Gro89Y=
APP_URL=https://your-app-name.koyeb.app
DB_CONNECTION=sqlite
DB_DATABASE=/app/database/database.sqlite
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
FILESYSTEM_DISK=local
VITE_APP_NAME=Douchaym
```

## 🛠️ Technology Stack

### Backend
- **Laravel 12**: Modern PHP framework
- **PHP 8.2+**: Latest PHP features and performance
- **SQLite**: Lightweight, file-based database
- **Eloquent ORM**: Database abstraction layer

### Frontend
- **Tailwind CSS 4.x**: Utility-first CSS framework
- **Vite**: Fast build tool and dev server
- **Blade Templates**: Laravel's templating engine
- **Alpine.js**: Lightweight JavaScript framework

### Development Tools
- **Laravel Sail**: Docker development environment
- **Laravel Pint**: PHP code style fixer
- **Laravel Pail**: Application monitoring
- **PHPUnit**: Testing framework

## 📚 Documentation

- [Deployment Guide](deploy-to-koyeb.md) - Complete deployment instructions
- [Laravel Documentation](https://laravel.com/docs) - Framework documentation
- [Tailwind CSS Documentation](https://tailwindcss.com/docs) - Styling guide
- [Koyeb Documentation](https://www.koyeb.com/docs) - Platform documentation

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

- **Documentation**: Check the [deployment guide](deploy-to-koyeb.md)
- **Issues**: Report bugs and feature requests via GitHub Issues
- **Community**: Join our community discussions

## 🙏 Acknowledgments

- **Laravel Team**: For the amazing PHP framework
- **Tailwind CSS**: For the utility-first CSS framework
- **Vite Team**: For the fast build tool
- **Koyeb**: For the deployment platform

---

**Built with ❤️ for the digital learning community**

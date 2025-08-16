# 🔓 AniVel Access Guide

## 🚨 **"Forbidden" Error Solution**

The "Forbidden" error occurs because the application uses an admin key system for security.

## 🔑 **How to Access the Application**

### **Public Access (No Admin Key)**
- ✅ **Homepage**: `https://anivel.koyeb.app/`
- ✅ **Animation Lessons**: `https://anivel.koyeb.app/animation`
- ✅ **Level Design Lessons**: `https://anivel.koyeb.app/levels`
- ✅ **View Individual Lessons**: `https://anivel.koyeb.app/animation/1` or `https://anivel.koyeb.app/levels/1`

### **Admin Access (With Admin Key)**
Add `?key=dhdouh08` to any URL for admin access:

- 🔧 **Create New Lesson**: `https://anivel.koyeb.app/create?key=dhdouh08`
- 🔧 **Edit Lesson**: `https://anivel.koyeb.app/animation/1/edit?key=dhdouh08`
- 🔧 **Delete Lesson**: Use the delete button on lesson pages with admin key

## 🎯 **Quick Access Links**

### **Public Pages**
- [Homepage](https://anivel.koyeb.app/)
- [Animation Studio](https://anivel.koyeb.app/animation)
- [Level Designer](https://anivel.koyeb.app/levels)

### **Admin Pages**
- [Create New Lesson](https://anivel.koyeb.app/create?key=dhdouh08)
- [Admin Homepage](https://anivel.koyeb.app/?key=dhdouh08)

## 🔧 **How the Admin System Works**

1. **Admin Key**: `dhdouh08` (set in environment variables)
2. **URL Parameter**: Add `?key=dhdouh08` to any URL
3. **Admin Features**: Create, edit, and delete lessons
4. **Public Features**: View lessons and browse content

## 🚀 **Deployment Status**

- ✅ **Application**: Deployed and running
- ✅ **Database**: SQLite configured
- ✅ **Admin System**: Working with key `dhdouh08`
- ✅ **File Permissions**: Fixed in Dockerfile
- ✅ **Apache Configuration**: Proper Laravel routing

## 🎉 **Success!**

Your AniVel application is now accessible at:
**https://anivel.koyeb.app/**

The "Forbidden" error was caused by trying to access admin routes without the admin key. Simply add `?key=dhdouh08` to access admin features.

---

**Enjoy your AniVel learning platform!** 🎨🎮

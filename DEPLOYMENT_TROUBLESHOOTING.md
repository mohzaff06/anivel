# 🚀 Koyeb Deployment Troubleshooting Guide

## Current Issue
The deployment is failing due to PHP buildpack extension installation errors. Here are multiple solutions to resolve this.

## 🔧 Solution 1: Use Docker Deployment (Recommended)

### Why Docker?
- More reliable than buildpacks
- Full control over PHP extensions
- Consistent environment across deployments

### Steps:
1. **Use the Dockerfile approach**:
   - The `Dockerfile` is already created
   - Use `.koyeb.yml` (Docker configuration)
   - Deploy via Koyeb dashboard or CLI

2. **Deploy command**:
   ```bash
   koyeb app init anivel --dockerfile Dockerfile --ports 80:http --routes /:80
   ```

## 🔧 Solution 2: Simplified Buildpack

### Why this works:
- Removes problematic Laravel Pail package
- Uses `--no-scripts` to avoid post-install hooks
- Simplified dependency installation

### Steps:
1. **Use the simplified buildpack**:
   - Rename `.koyeb-buildpack.yml` to `.koyeb.yml`
   - Or use the buildpack configuration directly

2. **Deploy command**:
   ```bash
   koyeb app init anivel --git github.com/mohzaff06/anivel --git-branch main --ports 8000:http --routes /:8000
   ```

## 🔧 Solution 3: Manual Buildpack Fix

### Update composer.json:
Remove or comment out problematic packages:

```json
"require-dev": {
    "fakerphp/faker": "^1.23",
    // "laravel/pail": "^1.2.2",  // Comment this out
    "laravel/pint": "^1.13",
    "laravel/sail": "^1.41",
    "mockery/mockery": "^1.6",
    "nunomaduro/collision": "^8.6",
    "phpunit/phpunit": "^11.5.3"
}
```

### Then deploy:
```bash
koyeb app init anivel --git github.com/mohzaff06/anivel --git-branch main --ports 8000:http --routes /:8000
```

## 🔧 Solution 4: Alternative Platform

### Consider other platforms:
- **Railway**: Excellent Laravel support
- **Render**: Good PHP support
- **DigitalOcean App Platform**: Reliable deployment
- **Vercel**: For frontend-focused apps

## 📋 Environment Variables

Make sure these are set in Koyeb:

```env
APP_NAME=AniVel
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:xBfe/FMAhapeXsCmtSV2a19A3q78b21CMOPU6Gro89Y=
APP_URL=https://your-app-name.koyeb.app
LOG_CHANNEL=stderr
LOG_LEVEL=debug
DB_CONNECTION=sqlite
DB_DATABASE=/app/database/database.sqlite
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
FILESYSTEM_DISK=local
VITE_APP_NAME=AniVel
```

## 🐛 Common Issues & Fixes

### Issue 1: PHP Extension Errors
**Error**: `ext-mbstring (already enabled)`
**Fix**: Use Docker deployment or remove problematic packages

### Issue 2: Buildpack Detection Failed
**Error**: `No buildpack detected`
**Fix**: Ensure `.buildpacks` file exists or use Docker

### Issue 3: Permission Denied
**Error**: `chmod: cannot access`
**Fix**: Ensure proper file permissions in build process

### Issue 4: Database Connection
**Error**: `SQLite database not found`
**Fix**: Ensure database directory is created and writable

## 🚀 Quick Deploy Commands

### Docker Deployment:
```bash
koyeb app init anivel --dockerfile Dockerfile --ports 80:http --routes /:80 --env APP_KEY="base64:xBfe/FMAhapeXsCmtSV2a19A3q78b21CMOPU6Gro89Y=" --env APP_ENV=production --env APP_DEBUG=false
```

### Buildpack Deployment:
```bash
koyeb app init anivel --git github.com/mohzaff06/anivel --git-branch main --ports 8000:http --routes /:8000 --env APP_KEY="base64:xBfe/FMAhapeXsCmtSV2a19A3q78b21CMOPU6Gro89Y=" --env APP_ENV=production --env APP_DEBUG=false
```

## 📞 Support

If issues persist:
1. Check Koyeb logs: `koyeb app logs anivel`
2. Verify environment variables
3. Test locally first: `php artisan serve`
4. Contact Koyeb support with error logs

## 🎯 Recommended Approach

**Use Solution 1 (Docker)** for the most reliable deployment experience.

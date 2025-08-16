# Deploy AniVel to Koyeb

This guide will help you deploy your Laravel application to Koyeb.

## Prerequisites

1. **Koyeb Account**: Sign up at [koyeb.com](https://koyeb.com)
2. **Git Repository**: Your code should be in a Git repository (GitHub, GitLab, etc.)
3. **Koyeb CLI** (optional): Install for easier deployment

## Step 1: Prepare Your Application

Your application is already configured with the necessary files:
- ✅ `.koyeb.yml` - Koyeb deployment configuration
- ✅ `composer.json` - PHP dependencies
- ✅ `package.json` - Node.js dependencies
- ✅ Database migrations ready

## Step 2: Update Environment Variables

Before deploying, you need to update the `APP_KEY` in your `.koyeb.yml` file:

```yaml
env:
  APP_KEY: "base64:xBfe/FMAhapeXsCmtSV2a19A3q78b21CMOPU6Gro89Y="
```

**Replace the empty APP_KEY with the generated key above.**

## Step 3: Deploy to Koyeb

### Option A: Deploy via Koyeb Dashboard

1. **Push to Git**: Make sure your code is pushed to your Git repository
2. **Connect Repository**: 
   - Go to [Koyeb Dashboard](https://app.koyeb.com)
   - Click "Create App"
   - Choose "GitHub" or your Git provider
   - Select your repository
3. **Configure Build**:
   - Build Type: `Dockerfile` or `Buildpack`
   - Environment Variables: Add the ones from `.koyeb.yml`
4. **Deploy**: Click "Deploy"

### Option B: Deploy via Koyeb CLI

1. **Install Koyeb CLI**:
   ```bash
   # Windows (PowerShell)
   iwr https://github.com/koyeb/koyeb-cli/releases/latest/download/koyeb-cli_windows_x86_64.exe -OutFile koyeb.exe
   
   # Or download from: https://github.com/koyeb/koyeb-cli/releases
   ```

2. **Login to Koyeb**:
   ```bash
   ./koyeb.exe login
   ```

3. **Deploy**:
   ```bash
   ./koyeb.exe app init anivel-dh --git github.com/YOUR_USERNAME/anivel-dh --git-branch main --ports 8000:http --routes /:8000 --env APP_KEY="base64:xBfe/FMAhapeXsCmtSV2a19A3q78b21CMOPU6Gro89Y=" --env APP_ENV=production --env APP_DEBUG=false --env DB_CONNECTION=sqlite --env DB_DATABASE=/app/database/database.sqlite
   ```

## Step 4: Environment Variables

Make sure these environment variables are set in Koyeb:

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

## Step 5: Build Configuration

The `.koyeb.yml` file is configured to:

1. **Install Dependencies**: Composer and npm packages
2. **Build Assets**: Compile Vite assets
3. **Setup Database**: Create SQLite database
4. **Cache Configuration**: Optimize Laravel caches
5. **Run Migrations**: Apply database migrations
6. **Start Server**: Run Laravel development server

## Step 6: Verify Deployment

After deployment:

1. **Check Logs**: Monitor the build and runtime logs
2. **Test Application**: Visit your app URL
3. **Database**: Verify migrations ran successfully
4. **Assets**: Check if Vite assets are loading

## Troubleshooting

### Common Issues:

1. **Build Fails**:
   - Check if all dependencies are in `composer.json` and `package.json`
   - Verify PHP version compatibility (requires PHP 8.2+)

2. **Database Issues**:
   - Ensure SQLite database is created
   - Check file permissions on database directory

3. **Asset Loading**:
   - Verify Vite build completed successfully
   - Check if assets are in `public/build/` directory

4. **Environment Variables**:
   - Ensure `APP_KEY` is set correctly
   - Verify all required env vars are configured

### Useful Commands:

```bash
# Check build logs
koyeb app logs anivel-dh

# Restart application
koyeb app restart anivel-dh

# Update environment variables
koyeb app update anivel-dh --env APP_DEBUG=false
```

## Next Steps

After successful deployment:

1. **Custom Domain**: Add a custom domain in Koyeb dashboard
2. **SSL Certificate**: Koyeb provides automatic SSL
3. **Monitoring**: Set up monitoring and alerts
4. **Backup**: Consider database backup strategies

## Support

- [Koyeb Documentation](https://www.koyeb.com/docs)
- [Laravel Documentation](https://laravel.com/docs)
- [Koyeb Community](https://community.koyeb.com)

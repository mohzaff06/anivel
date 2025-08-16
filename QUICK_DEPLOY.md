# 🚀 Quick Deploy Guide - AniVel to Koyeb

## ✅ **Fixed Configuration**

I've removed the problematic files and packages:
- ❌ Removed `.koyeb-buildpack.yml` (buildpack config)
- ❌ Removed `Procfile` (buildpack file)
- ❌ Removed `laravel/pail` package (causing PHP extension errors)

## 🐳 **Docker Deployment (Recommended)**

### **Step 1: Push to GitHub**
```bash
git add .
git commit -m "Fix deployment configuration"
git push origin main
```

### **Step 2: Deploy via Koyeb Dashboard**
1. Go to [Koyeb Dashboard](https://app.koyeb.com)
2. Click "Create App"
3. Choose "GitHub" as source
4. Select your `anivel` repository
5. Koyeb will automatically detect the `Dockerfile`
6. Click "Deploy"

### **Step 3: Verify Deployment**
- Your app will be available at: **https://anivel.koyeb.app**
- Monitor deployment at: **https://app.koyeb.com/apps/anivel**

## 🔧 **Alternative: CLI Deployment**

If you prefer command line:

```bash
# Install Koyeb CLI (if not already installed)
curl -fsSL https://cli.koyeb.com/install.sh | bash

# Login to Koyeb
koyeb login

# Deploy using Dockerfile
koyeb app init anivel --git github.com/mohzaff06/anivel --git-branch main --ports 80:http --routes /:80 --env APP_KEY="base64:xBfe/FMAhapeXsCmtSV2a19A3q78b21CMOPU6Gro89Y=" --env APP_ENV=production --env APP_DEBUG=false
```

## 📋 **Environment Variables**

The following are automatically set in `.koyeb.yml`:
- ✅ `APP_NAME=AniVel`
- ✅ `APP_ENV=production`
- ✅ `APP_DEBUG=false`
- ✅ `APP_KEY=base64:xBfe/FMAhapeXsCmtSV2a19A3q78b21CMOPU6Gro89Y=`
- ✅ `DB_CONNECTION=sqlite`
- ✅ `ADMIN_KEY=dhdouh08`

## 🎯 **Why This Will Work**

1. **Dockerfile approach**: Bypasses buildpack issues
2. **No problematic packages**: Removed Laravel Pail
3. **Clean configuration**: Only Docker deployment files
4. **Automatic detection**: Koyeb will use Dockerfile by default

## 🚨 **If Still Having Issues**

1. **Check Koyeb logs**: `koyeb app logs anivel`
2. **Verify Dockerfile**: Ensure it's in the root directory
3. **Check repository**: Make sure all files are pushed to GitHub
4. **Contact support**: If issues persist, contact Koyeb support

## 🎉 **Success Indicators**

- ✅ Build completes without PHP extension errors
- ✅ App shows "Deployed" status in Koyeb dashboard
- ✅ Website loads at https://anivel.koyeb.app
- ✅ No buildpack-related error messages

---

**Ready to deploy! Push your code and let Koyeb handle the rest.** 🚀

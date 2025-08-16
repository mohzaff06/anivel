# Deploy AniVel to Koyeb - PowerShell Script

Write-Host "🚀 Deploying AniVel to Koyeb..." -ForegroundColor Green

# Check if Koyeb CLI is installed
$koyebPath = Get-Command koyeb -ErrorAction SilentlyContinue
if (-not $koyebPath) {
    Write-Host "❌ Koyeb CLI not found. Installing..." -ForegroundColor Yellow
    
    # Download Koyeb CLI
    $koyebUrl = "https://github.com/koyeb/koyeb-cli/releases/latest/download/koyeb-cli_windows_x86_64.exe"
    $koyebExe = "koyeb.exe"
    
    try {
        Invoke-WebRequest -Uri $koyebUrl -OutFile $koyebExe
        Write-Host "✅ Koyeb CLI downloaded successfully" -ForegroundColor Green
    }
    catch {
        Write-Host "❌ Failed to download Koyeb CLI. Please download manually from: https://github.com/koyeb/koyeb-cli/releases" -ForegroundColor Red
        exit 1
    }
} else {
    $koyebExe = "koyeb"
}

# Check if user is logged in
Write-Host "🔐 Checking Koyeb login status..." -ForegroundColor Yellow
$loginCheck = & $koyebExe whoami 2>$null
if ($LASTEXITCODE -ne 0) {
    Write-Host "❌ Not logged in to Koyeb. Please login first:" -ForegroundColor Red
    Write-Host "   $koyebExe login" -ForegroundColor Cyan
    exit 1
}

Write-Host "✅ Logged in as: $loginCheck" -ForegroundColor Green

# Get repository information
Write-Host "📋 Getting repository information..." -ForegroundColor Yellow
$remoteUrl = git config --get remote.origin.url
if (-not $remoteUrl) {
    Write-Host "❌ No Git remote found. Please add a remote origin first." -ForegroundColor Red
    exit 1
}

# Extract repository name from URL
$repoName = $remoteUrl -replace ".*[:/]([^/]+/[^/]+?)(?:\.git)?$", '$1'
Write-Host "📦 Repository: $repoName" -ForegroundColor Cyan

# Get current branch
$branch = git branch --show-current
Write-Host "🌿 Branch: $branch" -ForegroundColor Cyan

# Deploy to Koyeb
Write-Host "🚀 Deploying to Koyeb..." -ForegroundColor Green

$deployCmd = @(
    $koyebExe, "app", "init", "anivel-dh",
    "--git", $repoName,
    "--git-branch", $branch,
    "--ports", "8000:http",
    "--routes", "/:8000",
    "--env", "APP_KEY=base64:xBfe/FMAhapeXsCmtSV2a19A3q78b21CMOPU6Gro89Y=",
    "--env", "APP_ENV=production",
    "--env", "APP_DEBUG=false",
    "--env", "APP_NAME=AniVel",
    "--env", "DB_CONNECTION=sqlite",
    "--env", "DB_DATABASE=/app/database/database.sqlite",
    "--env", "SESSION_DRIVER=database",
    "--env", "CACHE_STORE=database",
    "--env", "QUEUE_CONNECTION=database",
    "--env", "FILESYSTEM_DISK=local",
    "--env", "VITE_APP_NAME=AniVel"
)

Write-Host "Running: $($deployCmd -join ' ')" -ForegroundColor Gray
& $deployCmd

if ($LASTEXITCODE -eq 0) {
    Write-Host "✅ Deployment initiated successfully!" -ForegroundColor Green
    Write-Host "🌐 Your app will be available at: https://anivel-dh.koyeb.app" -ForegroundColor Cyan
    Write-Host "📊 Monitor deployment at: https://app.koyeb.com/apps/anivel-dh" -ForegroundColor Cyan
} else {
    Write-Host "❌ Deployment failed. Check the error messages above." -ForegroundColor Red
    Write-Host "💡 You can also deploy manually via the Koyeb dashboard:" -ForegroundColor Yellow
    Write-Host "   https://app.koyeb.com" -ForegroundColor Cyan
}

Write-Host "`n📚 For more information, see: deploy-to-koyeb.md" -ForegroundColor Gray

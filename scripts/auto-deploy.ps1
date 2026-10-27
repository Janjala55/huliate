# Automated GitHub Push & Cloudflare Setup for Huliate
Set-Location "C:\Users\OWNER\Studio\huliate"

Write-Host "=== HULIATE DEPLOYMENT ASSISTANT ==="
Write-Host "1. Opening pre-filled repository creation in your browser..."
Start-Process "https://github.com/new?name=huliate"

Write-Host "2. Listening for repository 'Janjala55/huliate'..."
$pushed = $false
for ($i = 0; $i -lt 180; $i++) {
    git ls-remote git@github.com:Janjala55/huliate.git > $null 2>&1
    if ($LASTEXITCODE -eq 0) {
        Write-Host "Repository detected! Pushing codebase to GitHub..."
        git push -u origin main
        if ($LASTEXITCODE -eq 0) {
            $pushed = $true
            Write-Host "Successfully pushed to GitHub!"
            break
        }
    }
    Start-Sleep -Seconds 5
}

if ($pushed) {
    Write-Host "3. Opening Cloudflare Pages to connect repo..."
    Start-Process "https://dash.cloudflare.com/89587d5d34f9f21ebe5f903bb91b7b1f/workers-and-pages/create"
    
    Write-Host "4. Opening Cloudflare Domain Registration for huliate.com..."
    Start-Process "https://dash.cloudflare.com/89587d5d34f9f21ebe5f903bb91b7b1f/domains/register?query=huliate.com"
    Write-Host "=== ALL AUTOMATION COMPLETE ==="
} else {
    Write-Host "Timed out waiting for repository creation."
}

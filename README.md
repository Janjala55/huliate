# Huliate 🌿

> **Evidence-Based Nutrition, High-Fiber Habits & Wholesome Meal Prep**

Welcome to the official repository for **Huliate**. This repository houses both the WordPress Studio local development site, full database snapshots, and the static export ready for deployment on **Cloudflare Pages**.

---

## 🏛️ Architecture Overview

- **Local Development & CMS:** [WordPress Studio](https://developer.wordpress.com/studio/) (Automattic)
- **Active Theme:** `nourish-pure` (custom block theme with custom typography, clean reading layout, and responsive patterns)
- **Hosting & CDN:** [Cloudflare Pages](https://pages.cloudflare.com/) (Ultra-fast static edge delivery, global SSL, DDoS protection)
- **Domain Registrar & DNS:** Cloudflare Registrar (`huliate.com`)
- **Database Backup:** `huliate-backup.sql` (Full MySQL-compatible dump for portability to any hosting provider)

---

## 🚀 Quick Start (Local Development)

### Prerequisites
- [WordPress Studio](https://developer.wordpress.com/studio/)
- Node.js 18+ (tested on Node v24)
- Git

### Start the Local WordPress Site
```bash
studio start
# Or check status and URL:
studio status
```
Default local URL is `http://localhost:8885`.

---

## 📦 Static Export & Cloudflare Deployment

Because Cloudflare Pages serves high-performance static sites directly from Cloudflare's global edge network, the dynamic WordPress site is exported to the `dist/` directory before deployment.

### 1. Generate Static Export
Whenever you add or update articles, pages, or theme styling in WordPress Studio, run:
```bash
npm run export
```
This script crawls all published pages, posts, categories, and media assets, rewrites URLs to clean relative links, and packages everything in `dist/`.

### 2. Push Changes to GitHub & Cloudflare
```bash
git add .
git commit -m "Update site content and export"
git push origin main
```
Cloudflare Pages is configured with continuous deployment; pushing to `main` will automatically trigger a new deployment.

---

## ☁️ Cloudflare Pages Setup

1. Log in to the [Cloudflare Dashboard](https://dash.cloudflare.com).
2. Go to **Workers & Pages** → **Create application** → **Pages** → **Connect to Git**.
3. Select this repository (`huliate`).
4. Configure build settings:
   - **Framework preset:** `None`
   - **Build command:** `npm run export` (or leave blank if `dist` is already committed)
   - **Build output directory:** `dist`
5. Click **Save and Deploy**.

---

## 🌐 Custom Domain & Cloudflare Registrar

1. **Purchase Domain:** Go to Cloudflare Dashboard → **Domain Registration** → **Register Domains** → search for `huliate.com` and complete registration.
2. **Attach to Pages:** Go to your Cloudflare Pages project → **Custom Domains** → **Set up a custom domain** → enter `huliate.com` (and `www.huliate.com`).
3. Cloudflare will automatically configure the DNS records and provision an edge SSL certificate.

---

## 🗄️ Database Backup & Restore

- **Export Database Dump:**
  ```bash
  studio export huliate-backup.sql --mode db
  ```
- **Import into MySQL/MariaDB (if migrating to a traditional host):**
  ```bash
  mysql -u <username> -p <database_name> < huliate-backup.sql
  ```

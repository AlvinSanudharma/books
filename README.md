# Project Setup — Run Locally

Panduan singkat menjalankan proyek Laravel di lokal.

---

## 1. Prasyarat

Pastikan sudah terpasang:

-   **PHP 8.2+**
-   **Composer 2+**
-   **Node.js 18+** & npm/yarn
-   **MySQL 8+** atau **PostgreSQL 14+**

---

## 2. Clone Project

```bash
git clone <REPO_URL>
cd <PROJECT_DIRECTORY>
```

---

## 3. Setup Environment

```bash
cp .env.example .env
```

Edit `.env` sesuai konfigurasi lokal kamu (database, app name, dsb):

```
APP_NAME="Laravel App"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

---

## 4. Install Dependency

```bash
composer install
npm install
```

---

## 5. Generate Key

```bash
php artisan key:generate
```

---

## 6. Migrasi Database

```bash
php artisan migrate --seed
```

---

## 7. Jalankan Server

```bash
php artisan serve
```

Akses di **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

---

## 8. Jalankan Vite (Frontend)

```bash
npm run dev
```

Biarkan terminal ini terbuka agar perubahan frontend otomatis terupdate.

---

## 9. Troubleshooting

-   Jalankan `php artisan optimize:clear` jika ada error cache.
-   Pastikan database sudah dibuat.
-   Jika permission error:

    ```bash
    chmod -R 775 storage bootstrap/cache
    ```

---

Selesai ✅ — aplikasi Laravel siap dijalankan di lokal.

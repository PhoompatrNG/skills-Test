# Laravel Project

## คำแนะนำในการติดตั้ง

1. **Clone โปรเจกต์จาก GitHub**
   ```sh
   git clone https://github.com/your-repository.git
   cd your-repository
   ```

2. **ติดตั้ง Dependencies**
   ```sh
   composer install
   ```

3. **คัดลอกไฟล์ .env และกำหนดค่า**
   ```sh
   cp .env.example .env
   ```
   - แก้ไขค่าการเชื่อมต่อฐานข้อมูลในไฟล์ `.env` ตามต้องการ:
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_database_user
     DB_PASSWORD=your_database_password
     ```

4. **สร้าง Key สำหรับแอปพลิเคชัน**
   ```sh
   php artisan key:generate
   ```

5. **นำเข้าไฟล์ฐานข้อมูล**
   - ไฟล์ฐานข้อมูล `dtb.sql` อยู่ในโปรเจกต์
   - htdocs\skills-Test\DB
   - ใช้คำสั่งต่อไปนี้เพื่อนำเข้าไปยัง MySQL:
     ```sh
     mysql -u your_database_user -p your_database_name < dtb.sql
     ```

6. **Run Migration และ Seed (ถ้ามี)**
   ```sh
   php artisan migrate --seed
   ```

7. **Run Server**
   ```sh
   php artisan serve
   ```
   - เปิดเว็บเบราว์เซอร์และเข้าไปที่ `http://127.0.0.1:8000`

## คำสั่งที่สำคัญ

- **Clear Cache:**
  ```sh
  php artisan cache:clear
  ```
- **Clear Config Cache:**
  ```sh
  php artisan config:clear
  ```
- **Clear Route Cache:**
  ```sh
  php artisan route:clear
  ```

## ข้อมูลเพิ่มเติม

- Laravel Docs: [https://laravel.com/docs](https://laravel.com/docs)
- PHP: [https://www.php.net/](https://www.php.net/)
- MySQL: [https://www.mysql.com/](https://www.mysql.com/)


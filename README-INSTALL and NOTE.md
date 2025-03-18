Note:
for login default entry :
username/email:admin
password:admin123

# Steps to Run the Employee Management System in XAMPP

## **1. Install XAMPP**  
- Download and install **XAMPP** from the [official website](https://www.apachefriends.org/).  
- Start **Apache** and **MySQL** from the **XAMPP Control Panel**.
  ![image](https://github.com/user-attachments/assets/f354f4c5-4bef-4f7b-a8e5-73086cec602e)


## **2. Move Project Files to XAMPP Directory**  
- Copy your **Employee Management System** project folder.  
- Paste it inside **`C:\xampp\htdocs\`** (Windows) or **`/opt/lampp/htdocs/`** (Linux/macOS).  

## **3. Create the Database**  
1. Open **XAMPP Control Panel** and start **MySQL**.  
2. Open your browser and go to **`http://localhost/phpmyadmin/`**.  
3. Click on **"New"**, enter a **database name** (e.g., `employee_db`), and click **Create**.  
4. Import the **`employee_db.sql`** file:  
   - Click on the **"Import"** tab.  
   - Choose your **`employee_db.sql`** file.  
   - Click **Go** to import the database.  

## **4. Configure Database Connection**  
- Open **`db_connect.php`** in your project folder.  
- Ensure the database credentials match your MySQL setup:  

```php
$host = "localhost";
$user = "root";  // Default XAMPP MySQL user
$pass = "";  // Leave blank (default password)
$dbname = "employee_db";  // Your database name

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
## **5. Run the Project in Browser**  
- Open your browser and go to:
http://localhost/employee_db/

## **6. Test the System**  
- **Login with HR/Admin credentials** (if applicable).  
- Try **adding, editing, viewing, and deleting employees**.  

Your **Employee Management System** should now be running successfully! 🚀  




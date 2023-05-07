# php-pos-with-barcode
Membuat POS with Barcode menggunakan PHP dan MySQL


## 1. Design Login Section

        modified:   .gitignore
        modified:   README.md


#### 1.1 Creating login page with assets

        modified:   .gitignore
        new file:   index.php


#### 1.2 Setting up VS Code

        1. Instal extensions:

        > php intelephense
        > Instal php debug
        > HTML CSS Support
        > JavaScript (ES6) code sni
        > Tabnine AI Autocomp
        > Highlight Matching Tag
        > Prettier - Code Formatter


#### 1.3 Membuat laman dashboard

        new file:   ui/dashboard.php


#### 1.4 Restructure file dashboard.php dan create user.php

        modified:   README.md
        modified:   ui/dashboard.php
        new file:   ui/inc/aside_control.php
        new file:   ui/inc/aside_main.php
        new file:   ui/inc/blank.php
        new file:   ui/inc/footer.php
        new file:   ui/inc/head.php
        new file:   ui/inc/navbar.php
        new file:   ui/user.php


#### 1.5 Create and connect db

        modified:   README.md
        new file:   ui/connectdb.php 


#### 1.6 User login - part 1

        modified:   README.md
        modified:   index.php
        modified:   ui/connectdb.php


#### 1.7 User login - part 2

        modified:   index.php
        modified:   ui/connectdb.php

        // Tesing: useremal:admin@mail.com, userpassword:admin@mail.com
        // Hasil: Login sukses


#### 1.8 User login - part 3 (multiple users)

        modified:   README.md
        modified:   index.php


#### 1.9 User login - part 4 (Memisahkan struktur file admin dan user)

        modified:   README.md
        modified:   index.php
        new file:   ui/admin.php
        deleted:    ui/dashboard.php
        new file:   ui/inc/admin/aside_control.php
        renamed:    ui/inc/aside_main.php -> ui/inc/admin/aside_main.php
        new file:   ui/inc/admin/content.php
        renamed:    ui/inc/footer.php -> ui/inc/admin/footer.php
        renamed:    ui/inc/head.php -> ui/inc/admin/head.php
        renamed:    ui/inc/navbar.php -> ui/inc/admin/navbar.php
        renamed:    ui/inc/aside_control.php -> ui/inc/user/aside_control.php
        new file:   ui/inc/user/aside_main.php
        new file:   ui/inc/user/content.php
        new file:   ui/inc/user/footer.php
        new file:   ui/inc/user/head.php
        new file:   ui/inc/user/navbar.php
        modified:   ui/user.php


#### 1.10 User login - part 5 (Membuat struktur admin dashboard)

        modified:   README.md
        modified:   ui/inc/admin/aside_main.php
        modified:   ui/inc/admin/content.php
        modified:   ui/inc/admin/head.php
        modified:   ui/inc/admin/navbar.php


#### 1.11 User login - part 6 (Membuat struktur user dashboard)

        modified:   README.md
        modified:   ui/inc/user/content.php
        modified:   ui/inc/user/head.php


#### 1.12 User login - part 7 (protect admin page menggunakan session) 

        modified:   README.md
        modified:   index.php
        modified:   ui/admin.php


#### 1.13 User login - part 8 (protect user page menggunakan session) 


        modified:   README.md
        modified:   index.php
        modified:   ui/admin.php
        modified:   ui/user.php


## 2. Design Logout Section


#### 2.1 Moving the connectdb.php to config folder

        modified:   README.md
        modified:   index.php
        modified:   ui/admin.php
        renamed:    ui/connectdb.php -> ui/config/connectdb.php
        modified:   ui/user.php


#### 2.2 Logout admin

        modified:   README.md
        modified:   ui/inc/admin/aside_main.php
        new file:   ui/logout.php


#### 2.3 Logout user

        modified:   README.md
        modified:   ui/inc/user/aside_main.php


## 3. Showing User


#### 3.1 Showing logged in user as admin and added logo

        modified:   README.md
        renamed:    ui/logout.php -> ui/Admin name
        modified:   ui/inc/admin/aside_main.php


#### 3.2 Showing logged in user as user and added logo

        modified:   README.md
        modified:   ui/inc/user/aside_main.php
        renamed:    ui/Admin name -> ui/logout.php


## 4. Alert messages


#### 4.1 Showing alert messages for login success and error

        modified:   README.md
        modified:   index.php


#### 4.2 Showing alert to login form fields

        modified:   README.md
        modified:   index.php


## 5. Change password


#### 5.1 Membuat form page changepassword

        modified:   README.md
        new file:   ui/blank.php
        new file:   ui/changepassword.php
        deleted:    ui/inc/blank.php
        new file:   ui/inc/others/aside_control.php
        new file:   ui/inc/others/aside_main.php
        new file:   ui/inc/others/content.php
        new file:   ui/inc/others/footer.php
        new file:   ui/inc/others/head.php
        new file:   ui/inc/others/navbar.php


#### 5.2 Langkah 1 : dapatkan input dari form menggunakan post method

        NOTE:

        Ada 4 langkah untuk merubah password

        Langkah 1 : dapatkan input dari form menggunakan post method
        Langkah 2 : ambil data dari db menggunakan select query berdasarkan useremail
        Langkah 3 : bandingkan data langkah 1 dan langkah 2
        Langkah 4 : jika kedua data sama, lakukan update query

        modified:   README.md
        modified:   ui/changepassword.php


#### 5.3 Langkah 2 : Part 1 - ambil data dari db menggunakan select query berdasarkan useremail

        modified:   README.md
        modified:   ui/changepassword.php


#### 5.4 Langkah 2 : Part 2 - showing alert messages

        modified:   README.md
        modified:   ui/changepassword.php
        modified:   ui/inc/others/head.php


#### 5.5 Langkah 3 & 4 : bandingkan data langkah 1 dan langkah 2 dan jika sama, lakukan update

        modified:   README.md
        modified:   ui/changepassword.php

        NOTE:

        Steps untuk meng-update password:

        1. User harus login terlebih dahulu menggunakan kredensialnya.
        2. Setelah berhasil logged in, maka emailnya akan ditangkap oleh session.
        3. Saat melakukan update password, sistem akan memastikan:
        3.1 Password lamanya benar.
        3.2 New password dan Repeat new password adalah sama.
        3.3 Saat akan dilakukan update, maka update dilakukan terhadap user yang emailnya
            sudah tersimpan di dalam db (untuk memastikan bahwa user dengan email
            ttt melakukan update passwordnya).
        4. Jika gagal step 3.1, 3.2 dan 3.3, maka sistem akan memberikan
           peringatan bahwa update tdk berhasil.


#### 5.6 Membetulkan error pada langkah 3 dan 4 serta protecting user.php dan admin.php dari unlogged in user

        modified:   README.md
        modified:   ui/admin.php
        modified:   ui/changepassword.php
        modified:   ui/inc/others/aside_main.php
        modified:   ui/user.php

        NOTE:

        1. Error fixed
        2. Unlogged in user can not access admin and user page
        3. Logged in admin can not access user page
        4. Logged in user can not access admin page
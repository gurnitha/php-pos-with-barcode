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
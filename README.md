1) install xampp and run xampp
2) install visual studio code in your system
3) install gitbash
4) open gitbash on your folder in which folder you want(like xampp ->htdocs->project)
5) clone 'https://github.com/anittajohn/project_student_det.git' url i using
    git clone 'https://github.com/anittajohn/project_student_det.git'
6) if you don't have composer first install( https://getcomposer.org/download/)
7) Rename .env.example file to .env example-app project root and fill the database information.
  ( create database in phpmyadmin (db name: stud_management) and update that to .env file)
8) open your project folder in vscode
    then open terminal and  follow the following steps,
    a) Run 'composer install '
    b) Run 'php artisan key:generate'
    c) Run 'php artisan migrate'
    d) Run 'php artisan serve'
9) yow will get a url run it  your brower
Thank you


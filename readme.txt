CARA INSTALL
=============
1. Install WAMP Server
2. Extract maxon.rar ke c:\wamp\www\maxon
3. Open MySQL dan Create database simak
4. Execute simak.sql di database tersebut

5. Edit file c:\wamp\www\maxon\application\database.php

$db['default']['hostname'] = 'localhost';
$db['default']['username'] = 'root';
$db['default']['password'] = 'simak';
$db['default']['database'] = 'simak';

6. Jalankan http://localhost/maxon
   dengan login admin password admin

7. selamat mencoba

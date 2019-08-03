sudo apt update
sudo apt install apache2
sudo apt install php libapache2-mod-php php-mysql
sudo cp ./info.php /var/www/html/info.php
sudo apt install stress-ng
git clone https://github.com/opsengine/cpulimit.git
cd cpulimit
make
sudo cp src/cpulimit /usr/bin/cpulimit
cd ..

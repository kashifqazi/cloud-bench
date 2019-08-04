sudo apt update
sudo apt install apache2
sudo apt install php libapache2-mod-php php-mysql
git clone https://github.com/opsengine/cpulimit.git
sudo cp ./info.php /var/www/html/info.php
cd stress-ng
sudo apt install libaio-dev libapparmor-dev libattr1-dev libbsd-dev libcap-dev libgcrypt11-dev libipsec-mb-dev libkeyutils-dev libsctp-dev zlib1g-dev
sudo apt install make gcc
make
cd ..
cd atop
sudo apt install libncurses5-dev
make
cd ..
cd cpulimit
make
sudo cp src/cpulimit /usr/bin/cpulimit
cd ..

yes | sudo apt update
yes | sudo apt install apache2
yes | sudo apt install php libapache2-mod-php php-mysql
git clone https://github.com/opsengine/cpulimit.git
sudo cp ./*.php /var/www/html/
sudo cp ./*.css /var/www/html/
cd stress-ng
yes | sudo apt install libaio-dev libapparmor-dev libattr1-dev libbsd-dev libcap-dev libgcrypt11-dev libipsec-mb-dev libkeyutils-dev libsctp-dev zlib1g-dev
yes | sudo apt install make gcc
make
cd ..
cd atop
yes | sudo apt install libncurses5-dev
make
cd ..
cd cpulimit
make
sudo cp src/cpulimit /usr/bin/cpulimit
cd ..

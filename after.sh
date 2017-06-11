#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.
sudo -s


echo "export XDEBUG_CONFIG=\"idekey=15649\" &&" >> /home/vagrant/cli_debug.sh
echo "export PHP_IDE_CONFIG=\"serverName=experience\" &&  " >> /home/vagrant/cli_debug.sh
echo "php \"\$@\"" >> /home/vagrant/cli_debug.sh

chmod +x /home/vagrant/cli_debug.sh
sudo rm -rf /etc/php/7.1/mods-available/xdebug.ini
sudo touch /etc/php/7.1/mods-available/xdebug.ini
sudo chmod 0777 /etc/php/7.1/mods-available/xdebug.ini
sudo echo "zend_extension=xdebug.so" >> /etc/php/7.1/mods-available/xdebug.ini
sudo echo "xdebug.default_enable=1" >> /etc/php/7.1/mods-available/xdebug.ini
sudo echo "xdebug.remote_enable=1" >> /etc/php/7.1/mods-available/xdebug.ini
sudo echo "xdebug.remote_handler=dbgp" >> /etc/php/7.1/mods-available/xdebug.ini
sudo echo "xdebug.remote_host=10.0.2.2" >> /etc/php/7.1/mods-available/xdebug.ini
sudo echo "xdebug.remote_port=10000" >> /etc/php/7.1/mods-available/xdebug.ini
sudo echo "xdebug.remote_autostart=0" >> /etc/php/7.1/mods-available/xdebug.ini
sudo echo "xdebug.remote_connect_back=1" >> /etc/php/7.1/mods-available/xdebug.ini
sudo echo "xdebug.idekey=15649" >> /etc/php/7.1/mods-available/xdebug.ini
cd /etc/php/7.1/cli/conf.d/
sudo rm -rf /etc/php/7.1/cli/conf.d/20-xdebug.ini
sudo ln -s /etc/php/7.1/mods-available/xdebug.ini /etc/php/7.1/cli/conf.d/20-xdebug.ini

cat /etc/php/7.1/cli/conf.d/20-xdebug.ini

sudo service nginx restart
sudo service php7.1-fpm restart
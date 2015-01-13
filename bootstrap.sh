# turn off iptables
sudo service iptables stop
sudo chkconfig iptables off

# php - is ok
sudo rpm -ivh http://dl.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm
sudo rpm -ivh http://rpms.famillecollet.com/enterprise/remi-release-6.rpm
sudo yum -y install httpd wget mysql-server
sudo yum -y install php php-soap php-mbstring php-bcmath php-gd php-pgsql php-mysql --enablerepo=remi

sudo service httpd start
sudo chkconfig httpd on

# gcc make openssl-devel - is ok
sudo yum -y install gcc make openssl-devel

sudo yum -y install python g++ make

# git - is ok
# sudo yum -y install git

# other way to install nodejs and npm
sudo yum -y install npm
sudo npm update -g npm
#sudo ln -s /usr/bin/nodejs /usr/bin/node 

# other way to install ruby and rubygems
sudo yum -y install ruby ruby-devel rubygems
sudo gem update --system

# sass - is ok
sudo gem install sass

# compass - is ok
sudo gem install compass

# jade 
sudo gem install jade
sudo npm install jade-php

# typescript - is ok
sudo npm install -g typescript
tsc -v

# grunt
sudo npm install -g grunt-cli
sudo npm install -g grunt-init

# vagrant local connect
sudo rm -rf /var/www/html
sudo ln -fs /vagrant /var/www/html

# Updated OS
#sudo yum -y update
# Restart Httpd service
sudo service httpd restart

echo "end shell"
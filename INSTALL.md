# How to setup

This is how to install the application for CentOS 7.

## MariaDB

At the time of programming Maria 10.2 is used. This is MySQL compatible protocol.

    curl -sS https://downloads.mariadb.com/MariaDB/mariadb_repo_setup | sudo bash
    yum update
    yum install MariaDB-shared MariaDB-client MariaDB-server MariaDB-compat
                               

## Gearman

Gearman is used for job processing. While Laravel has a queue system, its very limited. Gearman allows jobs to be programmed in any language, can be sync, or async.

    yum groupinstall 'Development Tools'
    yum install git gcc gcc-c++ make bison flex autoconf libtool memcached libevent libevent-devel uuidd libuuid-devel  boost boost-devel libcurl-devel libcurl curl gperf mysql-devel python-sphinx

    git clone https://github.com/gearman/gearmand.git
    cd gearmand
    git checkout tags/1.1.18
    
    ./bootstrap.sh
    
    
## PECL Gearman

PECL no longer offers updates for native bindings to Gearman. Instead updates have been moved to Github.

    git clone https://github.com/wcgallego/pecl-gearman.git
    cd pecl-gearman/
    git checkout tags/gearman-2.0.5
    phpize
    ./configure
    make
    make install
    
Next we will need to add the extension to php.

    vim /etc/php.d/gearman.ini
    
Then paste the following into the file:

    ; Enable gearman extension module
    extension=gearman.so 

Next restart Apache:

    systemctl restart httpd.service


## Seeder

If you want to seed some details:

    php artisan db:seed --class=TripSeeder

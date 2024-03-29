FROM ubuntu:bionic

WORKDIR /wiedza

# Setting Environment Variables
ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
ENV DEBIAN_FRONTEND=noninteractive

# Updating the apt cache list
RUN apt-get update

# Adding Ondrej/PHP Repository
RUN apt-get install software-properties-common -y
RUN add-apt-repository ppa:ondrej/php -y
RUN apt-get update

# Installing PHP Modules
RUN apt-get install -y php7.3 php7.3-bcmath php7.3-bz2 php7.3-cgi \
    php7.3-cli php7.3-common php7.3-curl php7.3-dba php7.3-dev \
    php7.3-enchant php7.3-fpm php7.3-gd php7.3-gmp php7.3-imap \
    php7.3-interbase php7.3-intl php7.3-json php7.3-ldap php7.3-mbstring \
    php7.3-mysql php7.3-odbc php7.3-opcache php7.3-pgsql php7.3-phpdbg \
    php7.3-pspell php7.3-readline php7.3-recode php7.3-snmp php7.3-soap php7.3-sqlite3 \
    php7.3-sybase php7.3-tidy php7.3-xml php7.3-xmlrpc php7.3-xsl php7.3-zip \
    composer php-xdebug


# Configuring PHP-FPM
RUN rm -rf /etc/php/7.3/fpm/pool.d/*
COPY ./config/wiedza.conf /etc/php/7.3/fpm/pool.d/
RUN mkdir -p /run/php/

# Fixing DNS Resolution Composer Issue (Packgist)
RUN echo "142.44.164.249 packagist.org" >> /etc/hosts

EXPOSE 9000

CMD ["php-fpm7.3", "-F", "--pid", "/var/run/php-fpm.pid", "-y", "/etc/php/7.3/fpm/pool.d/wiedza.conf"]
FROM php:5.6.31-apache
MAINTAINER Yoshihiro Sasaki <aloelight@gmail.com>

# packages install
RUN apt-get update
RUN apt-get install -y git curl unzip gettext
RUN apt-get install -y php5-curl php5-sqlite
RUN apt-get install -y libhttp-daemon-perl liblwp-protocol-https-perl libyaml-tiny-perl supervisor
RUN apt-get clean
RUN rm -rf /var/lib/apt/lists/* /var/cache/apt/archives/*

# default parameters
ARG REP2_UID=10001
ARG REP2_DIR=/opt/p2-php

# setup user
RUN useradd -u ${REP2_UID} -d /home/rep2 -m -s /bin/bash rep2
RUN mkdir -p ${REP2_DIR} && chown -R rep2 ${REP2_DIR}

# setup rep2
USER rep2
WORKDIR ${REP2_DIR}
RUN git clone git://github.com/2ch774/p2-php.git ${REP2_DIR}
RUN curl -O http://getcomposer.org/composer.phar
RUN php -d detect_unicode=0 composer.phar install
RUN chmod 0777 data/* rep2/ic
COPY rep2/conf/conf_admin.inc.php ${REP2_DIR}/conf

# setup 2chproxy
USER root
RUN git clone https://github.com/yama-natuki/2chproxy.pl.git /opt/2chproxy
COPY 2chproxy/rep2.yml /opt/2chproxy/rep2.yml

# supervisor
CMD mv /etc/supervisor/supervisord.conf /etc/supervisor/supervisord.conf.orig
COPY supervisord/supervisord.conf /etc/supervisor/supervisord.conf
COPY supervisord/conf.d/apache2.conf /etc/supervisor/conf.d/
COPY supervisord/conf.d/2chproxy.conf /etc/supervisor/conf.d/

WORKDIR /root
RUN chown -R rep2:www-data ${REP2_DIR}
RUN ln -s ${REP2_DIR}/rep2 /var/www/html/rep2

VOLUME ["${REP2_DIR}/data"]
EXPOSE 80 443
CMD ["/usr/bin/supervisord"]

FROM ghcr.io/naiba/php-fpm
LABEL maintainer="奶爸 <hi@nai.ba>"

ADD . /monica

RUN cd /monica && \
    composer install --no-interaction --no-suggest --no-dev --ignore-platform-reqs && \
    echo '*/5 * * * * /opt/bitnami/php/bin/php /monica/artisan schedule:run -v' >/etc/cron.d/crontab-config && \
    chmod 0755 /etc/cron.d/crontab-config && \
    crontab /etc/cron.d/crontab-config

EXPOSE 8000

CMD cron f && \
    /opt/bitnami/php/bin/php /monica/artisan serve --host 0.0.0.0 --port 8000

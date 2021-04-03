# FROM php:8.0.3-apache
# # FROM centos:centos8
# RUN yum update -y && yum upgrade -y
# RUN yum -y install httpd httpd-tools
# # FROM php:8.0.3-apache
# # RUN apt-update && apt.get upgrade -y
# # RUN docker-php-ext-install mysqli
# EXPOSE 80

FROM centos:centos8
RUN yum -y --setopt=tsflags=nodocs update && \
    yum -y --setopt=tsflags=nodocs install httpd && \
    yum -y install epel-release; yum clean all \
    yum -y install python-pip; yum clean all \
    yum -y install openssh-server passwd \
    yum clean all
RUN mkdir /var/run/sshd
RUN ssh-keygen -t rsa -f /etc/ssh/ssh_host_rsa_key -N ''
RUN chmod 755 /start.sh
# EXPOSE 22
RUN ./start.sh
ENTRYPOINT ["/usr/sbin/sshd", "-D"]

COPY ./apache.conf /usr/local/apache2/conf/httpd.conf
EXPOSE 80
EXPOSE 443

# Simple startup script to avoid some issues observed with container restart
ADD run-httpd.sh /run-httpd.sh
RUN chmod -v +x /run-httpd.sh

CMD ["/run-httpd.sh"]
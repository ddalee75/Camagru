SRC = docker-compose.yml
NAME = camagru

all: $(NAME)

$(NAME):
	$(call wait8m)


clean:
	docker-compose -f ${SRC} stop

fclean: clean
	docker-compose -f ${SRC} down


prune: fclean
	docker image prune -a
	#docker volume rm $$(docker volume ls -q)

re: fclean all

setup_ip:
	echo "127.0.0.1 camagru.42.fr" | sudo tee -a /etc/hosts


# set_data:
# 	docker exec php74-container php config/setup_data.php
	
	

.PHONY: all clean flcean re setup

define wait8m
	docker-compose -f ${SRC} up --build -d
	chown www-data ../app/common/gallery/
	echo Waiting
    sleep 480s
	docker exec php74-container php config/setup_data.php
endef
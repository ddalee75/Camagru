SRC = docker-compose.yaml
NAME = Inception

all: $(NAME)

$(NAME):
	docker-compose -f ${SRC} up --build -d 

clean:
	docker-compose -f ${SRC} stop

fclean: clean
	docker-compose -f ${SRC} down


prune: fclean
	docker image prune -a
	docker volume rm $$(docker volume ls -q)

re: fclean all

setup:
	echo "127.0.0.1 camagru.42.fr" | sudo tee -a /etc/hosts

.PHONY: all clean flcean re setup

GREEN=\033[1;32m
YELLOW=\033[1;33m
RED=\033[1;31m
BLUE=\033[1;34m
NC=\033[0m

all:
	@echo -e "$(BLUE)[+] Starting Docker containers...$(NC)"
	@docker compose -f docker/docker-compose.yml up --build
	@echo -e "$(GREEN)[✔] Containers are running!$(NC)"
	@echo -e "$(BLUE)[+] Creating Databases and Tables...$(NC)"
	docker exec -i mysql mysql -u root -p$(MYSQL_ROOT_PASSWORD) < ./gestion_evenements/config/init.sql
	@echo -e "$(GREEN)[✔] Databases and tables created!$(NC)"

clean:
	@echo -e "$(YELLOW)[-] Stopping and removing containers...$(NC)"
	@docker compose -f docker/docker-compose.yml down -v
	@echo -e "$(GREEN)[✔] Containers stopped and removed.$(NC)"
	@echo -e "$(RED)[!] Removing volumes...$(NC)"
	@docker system prune -af --volumes
	@echo -e "$(GREEN)[✔] Cleanup complete!$(NC)"

re: clean all
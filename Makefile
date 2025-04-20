GREEN=\033[1;32m
YELLOW=\033[1;33m
RED=\033[1;31m
BLUE=\033[1;34m
NC=\033[0m

all:
	@echo -e "$(BLUE)[+] Starting Docker containers...$(NC)"
	@docker compose -f docker/docker-compose.yml up --build
	@echo -e "$(GREEN)[✔] Containers are running!$(NC)"

clean:
	@echo -e "$(YELLOW)[-] Stopping and removing containers...$(NC)"
	@docker compose -f docker/docker-compose.yml down -v
	@echo -e "$(GREEN)[✔] Containers stopped and removed.$(NC)"
	@echo -e "$(RED)[!] Removing volumes...$(NC)"
	@docker system prune -af --volumes
	@echo -e "$(RED)[!] Removing testing files...$(NC)"
	@rm -rf eventManagement/vendor eventManagement/composer.lock eventManagement/composer.json
	@echo -e "$(GREEN)[✔] Cleanup complete!$(NC)"


test:
	@docker exec -it php chmod +x /var/www/html/tests/run_tests.sh
	@echo -e "$(YELLOW)[*] Running tests...$(NC)"
	@docker exec -it php /var/www/html/tests/run_tests.sh
	@echo -e "$(GREEN)[✔] Tests completed!$(NC)"

re: clean all
.PHONY: help phpstan test coverage phpcs allcheck

help:           ## Show this help.
	@fgrep -h "##" $(MAKEFILE_LIST) | fgrep -v fgrep | sed -e 's/\\$$//' | sed -e 's/##//'

phpstan: ## Execute phpstan
	phpstan analyse

test: ## Execute phpunit
	vendor/bin/phpunit

coverage: ## Execute the coverage test
	vendor/bin/phpunit --coverage-text

phpcs: ## execute phpcs
	phpcs src

allcheck: phpcs phpstan coverage ## all check



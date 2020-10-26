.PHONY: help phpstan test coverage phpcs allcheck

.DEFAULT_GOAL := help

help:           ## Show this help.
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

phpstan: ## Execute phpstan
	phpstan analyse

test: ## Execute phpunit
	vendor/bin/phpunit

coverage: ## Execute the coverage test
	vendor/bin/phpunit --coverage-text

phpcs: ## execute phpcs
	phpcs --standard=PSR12 src

allcheck: phpcs phpstan coverage ## all check



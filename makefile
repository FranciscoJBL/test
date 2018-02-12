DCMP = docker-compose -f ../docker-compose.yml
DCMP_EXEC_CORE = ${DCMP} exec core

bash:
	${DCMP_EXEC_CORE} bash 


rebuild:
	rm -Rf vendor/*
	mkdir -p vendor
	${DCMP} build --no-cache
	${DCMP} run core ./composer.phar install --prefer-dist
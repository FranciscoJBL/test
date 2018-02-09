DCMP = docker-compose -f ../docker-compose.yml
DCMP_EXEC_CORE = ${DCMP} exec core

bash:
	${DCMP_EXEC_CORE} bash 
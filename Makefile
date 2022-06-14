.PHONY: tests

VENV_NAME?=venv
PYTHON=${VENV_NAME}/bin/python
HOST=127.0.0.1
PORT=8000

freeze:
	${PYTHON} -m pip freeze > requirements.txt

prepare:
	python3 -m venv $(VENV_NAME)
	python3 -m pip install --upgrade pip
	python3 -m pip install -r requirements.txt

database:
	rm -f ./*/migrations/[0-9]*
	rm -f ./data.db

	./manage.py makemigrations
	./manage.py migrate

install:
	make prepare
	make database

tests:
	./manage.py test


run:
	./manage.py runserver $(HOST):$(PORT)
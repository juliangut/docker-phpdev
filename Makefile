default: scaffold


.PHONY: scaffold
scaffold:
	bin/phpdev scaffold-all

.PHONY: export-build
export-build:
	bin/phpdev export-build --pretty `curl -s https://github.com/xdebug/xdebug/releases.atom | grep "<title>[0-9]*\.[0-9]*\.[0-9]*</title>" | awk -F '[<>]' '{ print $$3; exit }'`

.PHONY: act
act:
	/bin/act --secret-file act.secrets pull_request

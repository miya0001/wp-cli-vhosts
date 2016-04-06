# wp vhosts &lt;sub-command&gt;

Manage WordPresses in VirtualHosts.

## Install

### Configuration

Place `sites` in the `.wp-cli/config.yml`.

```
sites:
	- /path/to/example.com/www
	- /path/to/example.org/www
	- /path/to/example.jp/www
```

http://wp-cli.org/config/

## Sub commands

* wp vhosts core
* wp vhosts core language
* wp vhosts plugin
* wp vhosts theme

## Examples

See help:

```
$ wp help vhosts
```

Update all WordPress.

```
$ wp vhosts core update
```

Update all plugins in all WordPress sites.
```
$ wp vhosts plugin update --all
```

Install jetpack into all WordPress sites.

```
$ wp vhosts plugin install jetpack
```

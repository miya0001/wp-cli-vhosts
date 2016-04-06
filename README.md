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

## Example

```
$ wp vhosts plugin install contact-form-7 akismet
========================================
Site: /path/to/example.com/www
========================================
Success:
Installing Jetpack by WordPress.com (3.9.6)
Downloading install package from https://downloads.wordpress.org/plugin/jetpack.3.9.6.zip...
Unpacking the package...
Installing the plugin...
Plugin installed successfully.


========================================
Site: /path/to/example.org/www
========================================
Success:
Installing Jetpack by WordPress.com (3.9.6)
Downloading install package from https://downloads.wordpress.org/plugin/jetpack.3.9.6.zip...
Unpacking the package...
Installing the plugin...
Plugin installed successfully.


========================================
Site: /path/to/example.jp/www
========================================
Success:
Installing Jetpack by WordPress.com (3.9.6)
Downloading install package from https://downloads.wordpress.org/plugin/jetpack.3.9.6.zip...
Unpacking the package...
Installing the plugin...
Plugin installed successfully.
```

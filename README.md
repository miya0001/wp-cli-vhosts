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

See help:

```
NAME

  wp vhosts

DESCRIPTION

  Manage WordPresses for VirtualHosts.

SYNOPSIS

  wp vhosts <command>

SUBCOMMANDS

  core        
  plugin      
  theme
```

Update all WordPress.

```
$ wp vhosts core update
======================================
Site: /Users/miyauchi/Desktop/wp1/www
======================================
Success: WordPress is up to date.

======================================
Site: /Users/miyauchi/Desktop/wp2/www
======================================
Success: WordPress is up to date.

======================================
Site: /Users/miyauchi/Desktop/wp3/www
======================================
Success: WordPress is up to date.
```

Install jetpack into all WordPress sites.

```
$ wp vhosts plugin install jetpack
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

# wp vhosts &lt;sub-command&gt;

[![Build Status](https://travis-ci.org/miya0001/wp-cli-vhosts.svg?branch=master)](https://travis-ci.org/miya0001/wp-cli-vhosts)

Manage multiple WordPress sites in the server.

Demo: https://www.youtube.com/watch?v=d0ozf2JmkOg

## Requires

* WP-CLI 0.23 or later

## Install

```
$ wp package install miya0001/wp-cli-vhosts:@stable
```

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

Verify WordPress files against WordPress.org's checksums.

```
$ wp vhosts core verify-checksums
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

## How to contribute

```
$ npm run setup
$ npm test
```

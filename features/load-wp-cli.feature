Feature: Test that WP-CLI VHOSTS commands loads.

  Scenario: WP-CLI loads for `wp vhosts` tests

    When I run `wp help vhosts`
    Then the return code should be 0

    When I run `wp help vhosts core`
    Then the return code should be 0

    When I run `wp help vhosts core language`
    Then the return code should be 0

    When I run `wp help vhosts list`
    Then the return code should be 0

    When I run `wp help vhosts plugin`
    Then the return code should be 0

    When I run `wp help vhosts theme`
    Then the return code should be 0

    When I run `wp vhosts version`
    Then the return code should be 0

    When I run `wp vhosts list`
    Then the return code should be 0
    And STDOUT should contain:
      """
      example0.com
      """
    And STDOUT should contain:
      """
      example1.com
        """
    And STDOUT should contain:
      """
      example2.com
      """

    When I run `wp vhosts list --path=www`
    Then the return code should be 0
    And STDOUT should contain:
      """
      example0.com
      """
    And STDOUT should contain:
      """
      example1.com
        """
    And STDOUT should contain:
      """
      example2.com
      """

    When I run `wp vhosts plugin status`
    Then the return code should be 0
    And STDOUT should contain:
      """
      example0.com
      """
    And STDOUT should contain:
      """
      Error: This does not seem to be a WordPress install.
      """
    And STDOUT should contain:
      """
      Pass --path=`path/to/wordpress` or run `wp core download`.
      """

    When I run `wp vhosts plugin status --path=thisismyhosts`
    Then the return code should be 0
    And STDOUT should not contain:
      """
      thisismyhosts
      """
    And STDOUT should contain:
      """
      example0.com
      """
    And STDOUT should contain:
      """
      Error: This does not seem to be a WordPress install.
      """
    And STDOUT should contain:
      """
      Pass --path=`path/to/wordpress` or run `wp core download`.
      """

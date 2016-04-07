Feature: Test that WP-CLI loads.

  Scenario: WP-CLI loads for `wp vhosts` tests
    Given a WP install

    When I run `wp help vhosts`
    Then STDOUT should contain:
      """
      Manage WordPresses for VirtualHosts.
      """

    When I run `wp help vhosts core`
    Then STDOUT should contain:
      """
      Download, install, update and otherwise manage all WordPress sites proper.
      """

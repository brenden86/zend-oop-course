<?php
/**
 * This example is provided here only for reference.
 * The library "Libyaml" needs to be installed prior
 * to execution of the YAML functions.
 */
$yml = yaml_parse_file('config.yml');

var_dump($yml);
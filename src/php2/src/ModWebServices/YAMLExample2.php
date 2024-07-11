<?php
/**
 * This example is provided here only for reference.
 * The library "Libyaml" needs to be installed prior
 * to execution of the YAML functions.
 */
$yaml = <<<EOT
imports:
    - { resource: config.yml }
monolog:
    handlers:
        main:
            type:         fingers_crossed
            action_level: error
            handler:      nested
        nested:
            type:  stream
            path:  "%kernel.logs_dir%/%kernel.environment%.log"
            level: debug
        console:
            type:  console
EOT;
$yaml = yaml_parse($yaml);
echo yaml_emit($yaml);

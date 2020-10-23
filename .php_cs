<?php

return PhpCsFixer\Config::create()
  ->setRules([
    '@PSR2' => true,
    'braces' => [
      'position_after_anonymous_constructs' => 'same',
      'position_after_control_structures' => 'same',
      'position_after_functions_and_oop_constructs' => 'same',
    ],
  ])
  ->setIndent("  ")
;

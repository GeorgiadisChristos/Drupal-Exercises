<?php

namespace Drupal\movie_migrate\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;

/**
 * Returns an array with only the mapped values for each key's source that is not null.
 * 
 * @MigrateProcessPlugin(id = "StaticKeyMap")
 */
class StaticKeyMap extends ProcessPluginBase {
    
    /**
     * {@inheritdoc}
     */
    public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property) {
        $final = array();
        $source = $row->getSource();
        $map = $this->configuration['map'];

            foreach ($source as $key => $pair) {
            if (isset($pair) && isset($map[$key])) {
                $final[] = $map[$key];
            }           
        }

        return $final;
    }
}
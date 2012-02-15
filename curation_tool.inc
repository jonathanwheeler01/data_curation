<?php
/**
 * Autoloading of the curation tool classes.
 *
 * @author Robert Olendorf
 */

/**
 * Extend Exception for semantic clarity.
 */
class AutoloadException extends Exception{};

/**
 * Autoload the classes.
 */
class CurationAutoLoad {
  /**
   * Autoloads the classes needed for data_curation.
   *
   * @param <string> $className The name of the class to be loaded. Notice the file
   * type suffix is omitted.
   * @example autoload('myClassName');
   */
  public static function autoload_curation($className) {
    // The @ symbol suppresses the warnings so we can just try each subdirectory
    // as needed. Seems a bit cludgey, but it does work.
    @include_once 'classes'.DIRECTORY_SEPARATOR.
                  $className.'.php';
    
    @include_once 'classes'.DIRECTORY_SEPARATOR.
                  'curation_tool'.DIRECTORY_SEPARATOR.
                  $className.'.php';

    @include_once 'classes'.DIRECTORY_SEPARATOR.
                  'schemas'.DIRECTORY_SEPARATOR.
                  $className.'.php';

    @include_once 'classes'.DIRECTORY_SEPARATOR.
                  'schemas'.DIRECTORY_SEPARATOR.
                  'xfdu'.DIRECTORY_SEPARATOR.
                  $className.'.php';

    @include_once 'classes'.DIRECTORY_SEPARATOR.
                  'schemas'.DIRECTORY_SEPARATOR.
                  'dublincore'.DIRECTORY_SEPARATOR.
                  $className.'.php';

    @include_once 'classes'.DIRECTORY_SEPARATOR.
                  'schemas'.DIRECTORY_SEPARATOR.
                  'dublincore'.DIRECTORY_SEPARATOR.
                  'terms'.DIRECTORY_SEPARATOR.
                  $className.'.php';
    
    @include_once 'classes'.DIRECTORY_SEPARATOR.
                  'schemas'.DIRECTORY_SEPARATOR.
                  'xfdu'.DIRECTORY_SEPARATOR.
                  'enums'.DIRECTORY_SEPARATOR.
                  $className.'.php';
    
    @include_once 'classes'.DIRECTORY_SEPARATOR.
                  'packages'.DIRECTORY_SEPARATOR.
                  $className.'.php';

    @include_once 'classes'.DIRECTORY_SEPARATOR.
                  'packages'.DIRECTORY_SEPARATOR.
                  'xfdu'.DIRECTORY_SEPARATOR.
                  $className.'.php';

    @include_once 'classes'.DIRECTORY_SEPARATOR.
                  'exceptions'.DIRECTORY_SEPARATOR.
                  $className.'.php';

    // Check if the class exisits, if not, throw an Exception.
    if(!class_exists($className)) {
      $message = 'Unable to load class "'.$className.'".';
      throw new AutoloadException($message, E_ERROR);
    }
  }
}
@include_once 'classes'.DIRECTORY_SEPARATOR.'Enum.php';
@include_once 'classes'.DIRECTORY_SEPARATOR.'schemas'.DIRECTORY_SEPARATOR.'iXMLElement.php';
/**
 * Register the autoloader.
 */
spl_autoload_register(array('CurationAutoLoad', 'autoload_curation'));
?>
<?php

copy(getenv('FILE_URI'), '/assets/.htaccess');

foreach (file('/assets/.htaccess') as $line) {
  echo $line. "<br>";
}

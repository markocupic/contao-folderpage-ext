:: Run easy-coding-standard (ecs) via this batch file inside your IDE e.g. PhpStorm (Windows only)
:: Install inside PhpStorm the  "Batch Script Support" plugin
cd..
cd..
cd..
cd..
cd..
cd..
:: src
vendor\bin\ecs check vendor/markocupic/contao-folderpage-ext/src --config vendor/markocupic/contao-folderpage-ext/.ecs/config/default.php
:: tests
vendor\bin\ecs check vendor/markocupic/contao-folderpage-ext/tests --config vendor/markocupic/contao-folderpage-ext/.ecs/config/default.php
:: legacy
vendor\bin\ecs check vendor/markocupic/contao-folderpage-ext/src/Resources/contao --config vendor/markocupic/contao-folderpage-ext/.ecs/config/legacy.php
:: templates
vendor\bin\ecs check vendor/markocupic/contao-folderpage-ext/src/Resources/contao/templates --config vendor/markocupic/contao-folderpage-ext/.ecs/config/template.php
::
cd vendor/markocupic/contao-folderpage-ext/.ecs./batch/check

<?php

use function Core\logout;

logout();

header("\location: /");
exit(); 
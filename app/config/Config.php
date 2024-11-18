<?php

const APP_NAME = 'Afra';
const APP_URL = 'http://localhost:8000';

define("APP_ROOT", dirname(__DIR__));
const APP_PUBLIC = APP_URL;
define("PUBLIC_DIR", dirname(__DIR__, 2));

const ALLOWED_FILE_TYPES_FOR_UPLOAD = ['jpg', 'jpeg', 'png'];
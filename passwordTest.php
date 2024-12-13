<?php

$hash_code = password_hash("Abcd123!@#", PASSWORD_BCRYPT);
echo $hash_code;

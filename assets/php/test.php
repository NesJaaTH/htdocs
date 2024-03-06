<?php
error_reporting(0);
$wordlist = '1234567';
$hash = '$2y$10$QhD0kv/KCO4/U6upK/9DjOxWT5BvjSNom3CYuRtP/yqECeKp8areG';
echo password_verify($wordlist, $hash);
?>
<?php

require_once __DIR__ . '/functions.php';

// idの受け取り
$id = filter_input(INPUT_GET, 'id');

// ステータスの更新
update_go_out($id);

// index.phpへリダイレクト
header('Location: index.php');

exit;

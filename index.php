<?php

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/config.php';

$dbh = connect_db();

define('HOSTNAME', 'db');
define('DATABASE', 'mfm_db');
define('USERNAME', 'mfm_admin');

try {
    /// DB接続を試みる
    $db  = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . DATABASE, USERNAME, PASSWORD);
    $msg = "■DB接続成功■";
} catch (PDOException $e) {
    $isConnect = false;
    $msg       = "✗DB接続失敗✗<br>(" . $e->getMessage() . ")";
}


//--------------------------------------------------
// １線隊員の名前を抽出
$find_first = find_name_by_UNIT(UNIT_FIRST);
// ２線隊員の名前を抽出
$find_second = find_name_by_UNIT(UNIT_SECOND);
// 救急隊員の名前を抽出
$find_ambulance = find_name_by_UNIT(UNIT_AMBULANCE);
// 田村隊員の名前を抽出
$find_tamura = find_name_by_UNIT(UNIT_TAMURA);
// 用務出向隊員の名前を抽出
$find_go_out = find_name_by_UNIT(UNIT_GO_OUT);
// 休暇等除外隊員の名前を抽出
$find_exclusion = find_name_by_UNIT(UNIT_EXCLUSION);
//---------------------------------------------------

?>

<!DOCTYPE html>
<html lang="ja">

<?php include_once __DIR__ . '/_head.html' ?>

<body>
    <div class="wrapper">
        <div class="db-connect">
            《DB接続確認》<br>
        </div>
        <div class="db-connect-confirmation">
            <?php echo $msg; ?>
        </div>
        <hr>
        <div class="member-list">
            <h1>【西消防署】隊員編成管理</h1>
        </div>
        <div class="first-unit">
            <h2>１線隊</h2>
            <ul>
                <?php foreach ($find_first as $first) : ?>
                    <li>
                        <a href="" class="btn second-btn">２</a>
                        <a href="" class="btn ambulance-btn">救</a>
                        <a href="" class="btn tamura-btn">田</a>
                        <?= h($first['Class']) ?>
                        <?= h($first['Name']) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <hr>
        <div class="second-unit">
            <h2>２線隊</h2>
            <?php foreach ($find_second as $second) : ?>
                <li>
                    <a href="" class="btn second-btn">１</a>
                    <a href="" class="btn ambulance-btn">救</a>
                    <a href="" class="btn tamura-btn">田</a>
                    <?= h($second['Name']) ?>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
        <hr>
        <div calss="ambulance-unit">
            <h2>救急隊</h2>
            <?php foreach ($find_ambulance as $ambulance) : ?>
                <li>
                    <a href="" class="btn second-btn">１</a>
                    <a href="" class="btn ambulance-btn">２</a>
                    <a href="" class="btn tamura-btn">田</a>
                    <?= h($ambulance['Name']) ?>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
        <hr>
        <div class="tamura-unit">
            <h2>田村町分遣所</h2>
            <?php foreach ($find_tamura as $tamura) : ?>
                <li>
                    <a href="" class="btn second-btn">１</a>
                    <a href="" class="btn ambulance-btn">２</a>
                    <a href="" class="btn tamura-btn">救</a>
                    <?= h($tamura['Name']) ?>
                </li>
            <?php endforeach; ?>
            </ul>

            <!-- </div>
        <hr>
        <div class="go_out">
            <h2>出向用務</h2>


        </div>
        <hr>
        <div class="exclusion">
            <h2>休暇等除外</h2>


        </div>
        <hr> -->
        </div>
</body>

</html>
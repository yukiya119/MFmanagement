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
        <!-- ここから１線隊表示 -->
        <div class="first-unit">
            <h2>１線隊</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="5">ボタン</th>
                        <th width="100">階級</th>
                        <th width="100">氏名</th>
                        <th colspan="2" width="150">資格</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($find_first as $first) : ?>
                        <tr align="center">
                            <td><a href="" class="btn second-btn">２</a></td>
                            <td><a href="" class="btn ambulance-btn">救</a></td>
                            <td><a href="" class="btn tamura-btn">田</a></td>
                            <td><a href="" class="btn go_out-btn">出</a></td>
                            <td><a href="" class="btn exclusion-btn">休</a></td>
                            <td><?= h($first['Class']) ?></td>
                            <td><?= h($first['Name']) ?></td>
                            <td><?= h($first['Qualification1']) ?></td>
                            <td><?= h($first['Qualification2']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <hr>
        <!-- ここから２線隊表示 -->
        <div class="second-unit">
            <h2>２線隊</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="5">ボタン</th>
                        <th width="100">階級</th>
                        <th width="100">氏名</th>
                        <th colspan="2" width="150">資格</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($find_second as $second) : ?>
                        <tr align="center">
                            <td><a href="" class="btn first-btn">１</a></td>
                            <td><a href="" class="btn ambulance-btn">救</a></td>
                            <td><a href="" class="btn tamura-btn">田</a></td>
                            <td><a href="" class="btn go_out-btn">出</a></td>
                            <td><a href="" class="btn exclusion-btn">休</a></td>
                            <td><?= h($second['Class']) ?></td>
                            <td><?= h($second['Name']) ?></td>
                            <td><?= h($second['Qualification1']) ?></td>
                            <td><?= h($second['Qualification2']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <hr>
        <!-- ここから救急隊表示 -->
        <div calss="ambulance-unit">
            <h2>救急隊</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="5">ボタン</th>
                        <th width="100">階級</th>
                        <th width="100">氏名</th>
                        <th colspan="2" width="150">資格</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($find_ambulance as $ambulance) : ?>
                        <tr align="center">
                            <td><a href="" class="btn first-btn">１</a></td>
                            <td><a href="" class="btn second-btn">２</a></td>
                            <td><a href="" class="btn tamura-btn">田</a></td>
                            <td><a href="" class="btn go_out-btn">出</a></td>
                            <td><a href="" class="btn exclusion-btn">休</a></td>
                            <td><?= h($ambulance['Class']) ?></td>
                            <td><?= h($ambulance['Name']) ?></td>
                            <td><?= h($ambulance['Qualification1']) ?></td>
                            <td><?= h($ambulance['Qualification2']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <hr>
        <!-- ここから田村隊表示 -->
        <div class="tamura-unit">
            <h2>田村町分遣所</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="5">ボタン</th>
                        <th width="100">階級</th>
                        <th width="100">氏名</th>
                        <th colspan="2" width="150">資格</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($find_tamura as $tamura) : ?>
                        <tr align="center">
                            <td><a href="" class="btn first-btn">１</a></td>
                            <td><a href="" class="btn second-btn">２</a></td>
                            <td><a href="" class="btn ambulance-btn">救</a></td>
                            <td><a href="" class="btn go_out-btn">出</a></td>
                            <td><a href="" class="btn exclusion-btn">休</a></td>
                            <td><?= h($tamura['Class']) ?></td>
                            <td><?= h($tamura['Name']) ?></td>
                            <td><?= h($tamura['Qualification1']) ?></td>
                            <td><?= h($tamura['Qualification2']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <hr>
        <!-- ここから出向者表示 -->
        <div class="go_out">
            <h2>出向用務</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="5">ボタン</th>
                        <th width="100">階級</th>
                        <th width="100">氏名</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($find_go_out as $go_out) : ?>
                        <tr align="center">
                            <td><a href="" class="btn first-btn">１</a></td>
                            <td><a href="" class="btn second-btn">２</a></td>
                            <td><a href="" class="btn ambulance-btn">救</a></td>
                            <td><a href="" class="btn tamura-btn">田</a></td>
                            <td><a href="" class="btn exclusion-btn">休</a></td>
                            <td><?= h($go_out['Class']) ?></td>
                            <td><?= h($go_out['Name']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <hr>
        <!-- ここから休暇等除外者表示 -->
        <div class="exclusion">
            <h2>休暇等除外</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="5">ボタン</th>
                        <th width="100">階級</th>
                        <th width="100">氏名</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($find_exclusion as $exclusion) : ?>
                        <tr align="center">
                            <td><a href="" class="btn first-btn">１</a></td>
                            <td><a href="" class="btn second-btn">２</a></td>
                            <td><a href="" class="btn ambulance-btn">救</a></td>
                            <td><a href="" class="btn tamura-btn">田</a></td>
                            <td><a href="" class="btn go_out-btn">出</a></td>
                            <td><?= h($exclusion['Class']) ?></td>
                            <td><?= h($exclusion['Name']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <hr>
    </div>
</body>

</html>
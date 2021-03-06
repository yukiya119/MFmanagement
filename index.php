<?php

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/config.php';

$dbh = connect_db();

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
        <div class="member-list">
            <h1>【西消防署】隊員編成管理</h1>
        </div>
        <!-- ここから１線隊表示 -->
        <div class="first-unit">
            <h2>１ 線 隊</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="5" width="150">異動設定</th>
                        <th width="100">階　級</th>
                        <th width="120">氏　名</th>
                        <th colspan="2" width="200">資　格</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($find_first as $first) : ?>
                        <tr align="center">
                            <td><a href="update_second.php?id=<?= h($first['id']) ?>" class="btn second-btn">２</a></td>
                            <td><a href="update_ambulance.php?id=<?= h($first['id']) ?>" class="btn ambulance-btn">救</a></td>
                            <td><a href="update_tamura.php?id=<?= h($first['id']) ?>" class="btn tamura-btn">田</a></td>
                            <td><a href="update_go_out.php?id=<?= h($first['id']) ?>" class="btn go_out-btn">出</a></td>
                            <td><a href="update_exclusion.php?id=<?= h($first['id']) ?>" class="btn exclusion-btn">休</a></td>
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
            <h2>２ 線 隊</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="5" width="150">異動設定</th>
                        <th width="100">階　級</th>
                        <th width="120">氏　名</th>
                        <th colspan="2" width="200">資　格</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($find_second as $second) : ?>
                        <tr align="center">
                            <td><a href="update_first.php?id=<?= h($second['id']) ?>" class="btn first-btn">１</a></td>
                            <td><a href="update_ambulance.php?id=<?= h($second['id']) ?>" class="btn ambulance-btn">救</a></td>
                            <td><a href="update_tamura.php?id=<?= h($second['id']) ?>" class="btn tamura-btn">田</a></td>
                            <td><a href="update_go_out.php?id=<?= h($second['id']) ?>" class="btn go_out-btn">出</a></td>
                            <td><a href="update_exclusion.php?id=<?= h($second['id']) ?>" class="btn exclusion-btn">休</a></td>
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
        <div class="ambulance-unit">
            <h2>救 急 隊</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="5" width="150">異動設定</th>
                        <th width="100">階　級</th>
                        <th width="120">氏　名</th>
                        <th colspan="2" width="200">資　格</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($find_ambulance as $ambulance) : ?>
                        <tr align="center">
                            <td><a href="update_first.php?id=<?= h($ambulance['id']) ?>" class="btn first-btn">１</a></td>
                            <td><a href="update_second.php?id=<?= h($ambulance['id']) ?>" class="btn second-btn">２</a></td>
                            <td><a href="update_tamura.php?id=<?= h($ambulance['id']) ?>" class="btn tamura-btn">田</a></td>
                            <td><a href="update_go_out.php?id=<?= h($ambulance['id']) ?>" class="btn go_out-btn">出</a></td>
                            <td><a href="update_exclusion.php?id=<?= h($ambulance['id']) ?>" class="btn exclusion-btn">休</a></td>
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
                        <th colspan="5" width="150">異動設定</th>
                        <th width="100">階　級</th>
                        <th width="120">氏　名</th>
                        <th colspan="2" width="200">資　格</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($find_tamura as $tamura) : ?>
                        <tr align="center">
                            <td><a href="update_first.php?id=<?= h($tamura['id']) ?>" class="btn first-btn">１</a></td>
                            <td><a href="update_second.php?id=<?= h($tamura['id']) ?>" class="btn second-btn">２</a></td>
                            <td><a href="update_ambulance.php?id=<?= h($tamura['id']) ?>" class="btn ambulance-btn">救</a></td>
                            <td><a href="update_go_out.php?id=<?= h($tamura['id']) ?>" class="btn go_out-btn">出</a></td>
                            <td><a href="update_exclusion.php?id=<?= h($tamura['id']) ?>" class="btn exclusion-btn">休</a></td>
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
            <h2>用務出向</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th colspan="5" width="150">異動設定</th>
                        <th width="100">階　級</th>
                        <th width="120">氏　名</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($find_go_out as $go_out) : ?>
                        <tr align="center">
                            <td><a href="update_first.php?id=<?= h($go_out['id']) ?>" class="btn first-btn">１</a></td>
                            <td><a href="update_second.php?id=<?= h($go_out['id']) ?>" class="btn second-btn">２</a></td>
                            <td><a href="update_ambulance.php?id=<?= h($go_out['id']) ?>" class="btn ambulance-btn">救</a></td>
                            <td><a href="update_tamura.php?id=<?= h($go_out['id']) ?>" class="btn tamura-btn">田</a></td>
                            <td><a href="update_exclusion.php?id=<?= h($go_out['id']) ?>" class="btn exclusion-btn">休</a></td>
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
                        <th colspan="5" width="150">異動設定</th>
                        <th width="100">階　級</th>
                        <th width="120">氏　名</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($find_exclusion as $exclusion) : ?>
                        <tr align="center">
                            <td><a href="update_first.php?id=<?= h($exclusion['id']) ?>" class="btn first-btn">１</a></td>
                            <td><a href="update_second.php?id=<?= h($exclusion['id']) ?>" class="btn second-btn">２</a></td>
                            <td><a href="update_ambulance.php?id=<?= h($exclusion['id']) ?>" class="btn ambulance-btn">救</a></td>
                            <td><a href="update_tamura.php?id=<?= h($exclusion['id']) ?>" class="btn tamura-btn">田</a></td>
                            <td><a href="update_go_out.php?id=<?= h($exclusion['id']) ?>" class="btn go_out-btn">出</a></td>
                            <td><?= h($exclusion['Class']) ?></td>
                            <td><?= h($exclusion['Name']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <p><br>※休暇、出張など</p>
        </div>
    </div>
</body>

</html>
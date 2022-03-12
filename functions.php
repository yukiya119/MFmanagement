<?php
require_once __DIR__ . '/config.php';
function connect_db()
{
    try {
        return new PDO(
            DSN,
            USER,
            PASSWORD,
            [PDO::ATTR_ERRMODE =>
            PDO::ERRMODE_EXCEPTION]
        );
        $msg = "DB接続成功";
    } catch (PDOException $e) {
        $isConnect = false;
        $msg = "接続失敗<br>(". $e->getMessage() . ")";
        exit;
    }
}
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// 配置部隊(UNIT)を基に抽出する
function find_name_by_UNIT($UNIT)
{
    $dbh = connect_db();
    $sql = <<<EOM
    SELECT
        *
    FROM
        members
    WHERE
        UNIT = :UNIT
    EOM;
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':UNIT', $UNIT, PDO::PARAM_STR_CHAR);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

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
    } catch (PDOException $e) {
        $isConnect = false;
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
// 配置部隊(UNIT)を１線隊に更新する
function update_first($id)
{
    try {
        $dbh = connect_db();

        $sql = <<<EOM
        UPDATE
                members
        SET
            UNIT = 'first'
        WHERE
            id = :id
        EOM;

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (\PDOException $e) {
        echo '更新に失敗しました';
    }
}
// 配置部隊(UNIT)を２線隊に更新する
function update_second($id)
{
    try {
        $dbh = connect_db();

        $sql = <<<EOM
        UPDATE
            members
        SET
            UNIT =  'second'
        WHERE
            id = :id
        EOM;

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (\PDOException $e) {
        echo '更新に失敗しました';
    }
}
// 配置部隊(UNIT)を救急隊に更新する
function update_ambulance($id)
{
    try {
        $dbh = connect_db();

        $sql = <<<EOM
        UPDATE
            members
        SET
            UNIT = 'ambulance'
        WHERE
            id = :id
        EOM;

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (\PDOException $e) {
        echo '更新に失敗しました';
    }
}
// 配置部隊(UNIT)を田村隊に更新する
function update_tamura($id)
{
    try {
        $dbh = connect_db();

        $sql = <<<EOM
        UPDATE
            members
        SET
            UNIT = 'tamura'
        WHERE
            id = :id
        EOM;

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (\PDOException $e) {
        echo '更新に失敗しました';
    }
}
// 配置部隊(UNIT)を用務出向に更新する
function update_go_out($id)
{
    try {
        $dbh = connect_db();

        $sql = <<<EOM
        UPDATE
            members
        SET
            UNIT = 'go_out'
        WHERE
            id = :id
        EOM;

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (\PDOException $e) {
        echo '更新に失敗しました';
    }
}
// 配置部隊(UNIT)を休暇等除外に更新する
function update_exclusion($id)
{
    try {
        $dbh = connect_db();

        $sql = <<<EOM
        UPDATE
            members
        SET
            UNIT = 'exclusion'
        WHERE
            id = :id
        EOM;

        $stmt = $dbh->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    } catch (\PDOException $e) {
        echo '更新に失敗しました';
    }
}
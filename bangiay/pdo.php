    <?php
function pdo_execute($sql, $params = []) {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=baitaplon", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare($sql);

       foreach (array_values($params) as $index => $value) {
    $stmt->bindValue($index + 1, $value); // bindValue bắt đầu từ 1
}
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
 function pdo_query($sql, $params=[]) { try { $conn=new PDO("mysql:host=localhost;dbname=baitaplon", 'root' , '' );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare($sql);

    foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;
    }

    function pdo_query_one($sql, $params = []) {
    try {
    $conn = new PDO("mysql:host=localhost;dbname=baitaplon", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare($sql);

    foreach ($params as $key => $value) {
    $stmt->bindValue($key, $value);
    }

    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;
    }
<?php
class db {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:dbname=projeto_bombeiro;host=localhost;charset=utf8","root","");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($sql) {
        return $this->pdo->query($sql);
    }

    public function select($table, $columns = '*', $condition = '') {
        $query = "SELECT $columns FROM $table";
        if ($condition !== '') {
            $query .= " WHERE $condition";
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $query = "INSERT INTO $table ($columns) VALUES ($values)";
        $stmt = $this->pdo->prepare($query);

        return $stmt->execute($data);
    }

    public function update($table, $data, $condition) {
        $updates = [];
        foreach ($data as $column => $value) {
            $updates[] = "$column = :$column";
        }

        $updateString = implode(', ', $updates);
        $query = "UPDATE $table SET $updateString WHERE $condition";
        $stmt = $this->pdo->prepare($query);

        return $stmt->execute($data);
    }

    public function delete($table, $condition) {
        $query = "DELETE FROM $table WHERE $condition";
        $stmt = $this->pdo->prepare($query);

        return $stmt->execute();
    }

    public function close() {
        $this->pdo = null;
    }
}
?>
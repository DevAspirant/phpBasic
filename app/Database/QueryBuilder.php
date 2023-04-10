<?php


/**
 * Summary of QueryBuilder
 */
class QueryBuilder
{

    private static $pdo;

    public static function make(PDO $pdo)
    {
        self::$pdo = $pdo;
    }

    public static function get(string $table)
    {
        $query = self::$pdo->prepare("SELECT * FROM {$table}");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public static function insert($table, $data)
    {
        // تحويل البيانات المدخلة الى مصفوفه
        $fields = array_keys($data);   // استخراج مفاتيح المصفوفة
        $fieldsStr = implode(',', $fields);   // تحويل المصفوفة الى سلسة نصية
        $valuesStr = str_repeat('?,', count($fields) - 1) . '?';    // الاسفهام في البي اتش بي لتمرير السلاسل النصية في المصفوفة
        $query = "insert into {$table} ({$fieldsStr}) values ({$valuesStr})";
        $statment = self::$pdo->prepare($query);
        $statment->execute(array_values($data));
    }

    public static function update($table, $id, $data)
    {
        /* Converting the array keys to a string with a comma between each key and a question mark at the end. */
        $fileds = implode('=?,', array_keys($data)) . '= ?';

        /* Converting the array values to a string with a comma between each value and a question mark at the end. */
        $values = array_values($data);

        /* Creating a query string that will be used to update the database. */
        $query = "UPDATE {$table} SET {$fileds} WHERE id = {$id}";
        $statment = self::$pdo->prepare($query);
        $statment->execute($values);
    }

    /* A function that deletes a record from the database. */
    public static function delete($table, $id, $column = 'id', $operator = '=')
    {
        $query = "DELETE FROM {$table} WHERE {$column} {$operator} {$id}";
        $statment = self::$pdo->prepare($query);
        $statment->execute();
    }


    /* Deleting a record from the database. */
    /**
     * Summary of deleteById
     * @param mixed $table
     * @param mixed $id
     * @return void
     */
    public static function deleteById($table, $id)
    {
        $query = "DELETE FROM {$table} WHERE id = {$id}";
        $statement = self::$pdo->prepare($query);
        $statement->execute();
    }

}


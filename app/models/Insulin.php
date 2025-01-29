<?php
class Insulin
{
    private $collection;

    public function __construct()
    {
        $config = require 'config/database.php';
        $client = new MongoDB\Client($config['host']);
        $this->collection = $client->selectCollection($config['database'], 'insulin_records');
    }

    public function create($userId, $date, $breakfast, $lunch, $dinner)
    {
        $record = [
            'user_id' => new MongoDB\BSON\ObjectId($userId),
            'date' => new MongoDB\BSON\UTCDateTime(strtotime($date)),
            'breakfast' => $breakfast,
            'lunch' => $lunch,
            'dinner' => $dinner,
        ];
        $this->collection->insertOne($record);
    }

    public function getByUserId($userId)
    {
        $records = $this->collection->find(['user_id' => new MongoDB\BSON\ObjectId($userId)]);
        return iterator_to_array($records);
    }

    public function update($id, $date, $breakfast, $lunch, $dinner)
    {
        $this->collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($id)],
            ['$set' => [
                'date' => new MongoDB\BSON\UTCDateTime(strtotime($date)),
                'breakfast' => $breakfast,
                'lunch' => $lunch,
                'dinner' => $dinner,
            ]]
        );
    }

    public function delete($id)
    {
        $this->collection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }
}

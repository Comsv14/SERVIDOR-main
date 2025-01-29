<?php
class StatsController
{
    private $insulinModel;

    public function __construct()
    {
        $this->insulinModel = new Insulin();
    }

    public function glucoseChart()
    {
        $userId = $_SESSION['user_id'];
        $records = $this->insulinModel->getByUser($userId);
        $glucoseData = [];
        foreach ($records as $record) {
            $glucoseData[] = [
                'date' => $record['date']->toDateTime()->format('Y-m-d'),
                'breakfast' => $record['breakfast']['glucose'],
                'lunch' => $record['lunch']['glucose'],
                'dinner' => $record['dinner']['glucose'],
            ];
        }
        require 'views/stats/glucose-chart.php';
    }

    public function insulinDistribution()
    {
        $userId = $_SESSION['user_id'];
        $records = $this->insulinModel->getByUser($userId);
        $insulinData = [
            'breakfast' => 0,
            'lunch' => 0,
            'dinner' => 0,
        ];
        foreach ($records as $record) {
            $insulinData['breakfast'] += $record['breakfast']['insulin'];
            $insulinData['lunch'] += $record['lunch']['insulin'];
            $insulinData['dinner'] += $record['dinner']['insulin'];
        }
        require 'views/stats/insulin-distribution.php';
    }
}

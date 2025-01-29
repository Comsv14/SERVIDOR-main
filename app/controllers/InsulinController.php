<?php
class InsulinController
{
    private $insulinModel;

    public function __construct()
    {
        $this->insulinModel = new Insulin();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];
            $date = $_POST['date'];
            $breakfast = [
                'glucose' => $_POST['breakfast_glucose'],
                'insulin' => $_POST['breakfast_insulin'],
            ];
            $lunch = [
                'glucose' => $_POST['lunch_glucose'],
                'insulin' => $_POST['lunch_insulin'],
            ];
            $dinner = [
                'glucose' => $_POST['dinner_glucose'],
                'insulin' => $_POST['dinner_insulin'],
            ];
            $this->insulinModel->create($userId, $date, $breakfast, $lunch, $dinner);
            header('Location: /insulin/list');
            exit;
        }
        require 'views/insulin/create.php';
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $breakfast = [
                'glucose' => $_POST['breakfast_glucose'],
                'insulin' => $_POST['breakfast_insulin'],
            ];
            $lunch = [
                'glucose' => $_POST['lunch_glucose'],
                'insulin' => $_POST['lunch_insulin'],
            ];
            $dinner = [
                'glucose' => $_POST['dinner_glucose'],
                'insulin' => $_POST['dinner_insulin'],
            ];
            $this->insulinModel->update($id, $breakfast, $lunch, $dinner);
            header('Location: /insulin/list');
            exit;
        }
        $record = $this->insulinModel->getById($id);
        require 'views/insulin/edit.php';
    }

    public function delete($id)
    {
        $this->insulinModel->delete($id);
        header('Location: /insulin/list');
        exit;
    }

    public function list()
    {
        $userId = $_SESSION['user_id'];
        $records = $this->insulinModel->getByUser($userId);
        require 'views/insulin/list.php';
    }
}

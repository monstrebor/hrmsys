<?php

require_once __DIR__ . '/../Models/Request.php';
require_once __DIR__ . '/../Core/Controller.php';
require_once __DIR__ . '/../Core/Auth.php';

class RequestController extends Controller
{
    public function index()
    {
        Auth::requireLogin();

        $requestModel = new Request();
        $requests = $requestModel->getAll();

        $this->view('admin/requests/index', [
            'title' => 'All Requests',
            'requests' => $requests
        ]);
    }
    public function create()
    {
        Auth::requireLogin();

        try {

            $userId = $_SESSION['user']['id'];

            if (
                empty($_POST['request_type_id']) ||
                empty($_POST['title']) ||
                empty($_POST['details'])
            ) {
                throw new Exception("All required fields must be filled.");
            }

            $requestTypeModel = new RequestType();
            $type = $requestTypeModel->find($_POST['request_type_id']);

            if (!$type) {
                throw new Exception("Invalid request type.");
            }

            if ($type['requires_attachment'] && empty($_FILES['attachment']['name'])) {
                throw new Exception("Attachment is required.");
            }

            $attachmentName = null;

            if (!empty($_FILES['attachment']['name'])) {

                $uploadDir = "public/uploads/requests/";

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $attachmentName = time() . "_" . basename($_FILES['attachment']['name']);

                move_uploaded_file(
                    $_FILES['attachment']['tmp_name'],
                    $uploadDir . $attachmentName
                );
            }

            $data = [
                'user_id' => $userId,
                'request_type_id' => $_POST['request_type_id'],
                'title' => trim($_POST['title']),
                'details' => trim($_POST['details']),
                'attachment' => $attachmentName
            ];

            $requestModel = new Request();
            $requestModel->create($data);

            $_SESSION['success'] = "Request submitted successfully.";
        } catch (Exception $e) {

            $_SESSION['error'] = $e->getMessage();
        }

        header("Location: index.php?url=employee-portal");
        exit;
    }
}

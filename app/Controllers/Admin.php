<?php

namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\NotificationModel;
use App\Models\AdminModel;
use CodeIgniter\Controller;

class Admin extends Controller
{
    protected $serviceModel;
    protected $notificationModel;
    protected $adminModel;
    protected $session;

    public function __construct()
    {
        $this->serviceModel = new ServiceModel();
        $this->notificationModel = new NotificationModel();
        // $this->adminModel = new AdminModel();
        $this->session = session();
    }


    // Admin login page
    public function login()
    {
        return view('login');
    }

    public function authenticate()
    {
        $userModel = new AdminModel();
    
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
    
        print_r($userModel);
    
        $user = $userModel->where('email', $email)->first();

        print_r($user);
    
        if ($user) {
            log_message('debug', 'User found: ' . json_encode($user));
    
            if (password_verify($password, $user['password'])) {
                session()->set('isLoggedIn', true);
                session()->set('user', $user);
                return redirect()->to('/dashboard');
            } else {
                log_message('error', 'Invalid password for user: ' . $email);
            }
        } else {
            log_message('error', 'No user found with email: ' . $email);
        }
    
        return redirect()->to('/login')->with('error', 'Invalid email or password');
    }
    
    
    


    // Logout functionality
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }

    public function isLoggedIn() {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }
    }
    

    // Dashboard page
    public function dashboard()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $notifications = $this->notificationModel
            ->where('is_read', 0)
            ->findAll();

        return view('dashboard', ['services' => $notifications]);
    }

    // Service entry page
    public function addService()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        if ($this->request->getMethod() === 'post') {
            $data = [
                'type' => $this->request->getPost('type'),
                'name' => $this->request->getPost('name'),
                'duration' => $this->request->getPost('duration'),
                'notes' => $this->request->getPost('notes'),
                'start_date' => date('Y-m-d'),
                'end_date' => date(
                    'Y-m-d',
                    strtotime('+' . $this->request->getPost('duration') . ' months')
                ),
            ];

            if ($data['type'] === 'Other') {
                $data['type'] = $this->request->getPost('custom_type');
            }

            $this->serviceModel->insert($data);

            return redirect()->to('/view-services');
        }

        return view('add_service');
    }

    // View services page
    public function viewServices()
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $services = $this->serviceModel->findAll();
        return view('view_services', ['services' => $services]);
    }

    // Renew a service
    public function renewService($id)
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $service = $this->serviceModel->find($id);
        if ($service) {
            $newEndDate = date('Y-m-d', strtotime('+1 year', strtotime($service['end_date'])));
            $this->serviceModel->update($id, ['end_date' => $newEndDate]);

            // Add notification
            $this->notificationModel->insert([
                'service_id' => $id,
                'message' => "Service '{$service['name']}' has been renewed.",
                'created_at' => date('Y-m-d H:i:s'),
            ]);

            return redirect()->to('/view-services');
        }

        return redirect()->to('/view-services')->with('error', 'Service not found.');
    }

    // Delete a service
    public function deleteService($id)
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $this->serviceModel->delete($id);
        return redirect()->to('/view-services');
    }

    // Mark notification as read
    public function markNotificationRead($id)
    {
        if (!$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $this->notificationModel->update($id, ['is_read' => 1]);
        return redirect()->to('/dashboard');
    }
}

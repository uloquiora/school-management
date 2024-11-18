<?php

namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\Controller;

class StudentController extends Controller
{
    public function index()
    {
        $studentModel = new StudentModel();
        $students = $studentModel->findAll();
        return view('students/student_list', ['students' => $students]);
    }

    public function create()
    {
        return view('students/create');
    }

    public function store()
    {
        // Validate input data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name'  => 'required|min_length[3]',
            'phone' => 'required|min_length[10]|max_length[15]',
            'email' => 'required|valid_email|is_unique[students.email]', // Added email validation
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            // If validation fails, send back to the create form with error messages
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // If validation passes, save student to the database
        $studentModel = new StudentModel();
        $studentModel->save([
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'phone'   => $this->request->getPost('phone'),
            
        ]);

        // Redirect to student list with success message
        return redirect()->to('/students')->with('message', 'Student created successfully!');
    }

    public function edit($id)
    {
        $studentModel = new StudentModel();
        $student = $studentModel->find($id);
        
        if (!$student) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Student with ID $id not found.");
        }
    
        return view('students/edit', ['student' => $student]);
    }

    public function update($id)
    {
        $studentModel = new StudentModel();
    
        // Get current student data
        $currentStudent = $studentModel->find($id);
        if (!$currentStudent) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Student with ID $id not found.");
        }
    
        // Get posted data
        $name = $this->request->getPost('name');
        $phone = $this->request->getPost('phone');
        $email = $this->request->getPost('email');
    
        // Validate name and phone, email should only be validated if it has changed
        $validation = \Config\Services::validation();
    
        // Set validation rules
        $validationRules = [
            'name'  => 'required|min_length[3]', // Name is required and at least 3 characters
            'phone' => 'required|min_length[10]|max_length[15]', // Phone is required and within length constraints
        ];
    
        // Only validate email if it has changed
        if ($email !== $currentStudent['email']) {
            $validationRules['email'] = 'required|valid_email|is_unique[students.email]'; // Email validation rules
        }
    
        // Apply the validation rules
        $validation->setRules($validationRules);
    
        // Run validation
        if (!$validation->withRequest($this->request)->run()) {
            // If validation fails, return to the form with errors
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
    
        // Prepare data for update
        $updateData = [
            'name'  => $name,
            'phone' => $phone,
        ];
    
        // Only update email if it has changed
        if ($email !== $currentStudent['email']) {
            $updateData['email'] = $email; // Only update email if changed
        }
    
        // Update the student data
        $studentModel->update($id, $updateData);
    
        // Redirect to student list with success message
        return redirect()->to('/students')->with('message', 'Student updated successfully!');
    }
    
}

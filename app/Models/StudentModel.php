<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table      = 'students'; // Table name
    protected $primaryKey = 'id'; // Primary key

    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; // Return data as array
    protected $allowedFields = ['name', 'phone', 'email']; // Added 'email' to the allowed fields

    // Validation rules
    protected $validationRules = [
        'name'  => 'required|min_length[3]|max_length[255]',
        'phone' => 'required|min_length[10]|max_length[15]',
        'email' => 'required|valid_email|is_unique[students.email]', // Email validation rule (must be unique)
    ];

    // Optional: Custom error messages for validation
    protected $validationMessages = [
        'email' => [
            'valid_email' => 'Please enter a valid email address.',
            'is_unique'   => 'This email address is already registered.',
        ]
    ];
}

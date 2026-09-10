<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentController extends Controller {

    public function index() {

        $_SESSION['student_access'] = true;

        $student = [
            'student_id' => 'MCC2024-00257',
            'name' => 'BASIM A. MATUAN',
            'course' => 'BSIT',
            'year' => '3RD YEAR',
            'section' => '3F3',
            'email' => 'basimmatuan 99@gmail.com'
        ];

        $this->call->view('student/index', $student);
    }

    public function profile() {

        $student = [
            'student_id' => 'MCC2024-00257',
            'name' => 'BASIM A. MATUAN',
            'course' => 'BSIT',
            'year' => '3RD YEAR',
            'section' => '3F3',
            'email' => 'basimmatuan99@gmail.com'
        ];

        $this->call->view('student/profile', $student);
    }
}
?>
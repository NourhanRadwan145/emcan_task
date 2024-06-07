<?php
use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Tests\TestCase;

class EnrollmentTest extends TestCase
{
    public function test_enroll_user_in_course()
    {
        // Create a user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // Create a course
        $course = Course::create([
            'title' => 'Test Course',
            'description' => 'This is a test course.',
        ]);

        // Simulate enrolling the user in the course
        Enrollment::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);

        // Assert that the enrollment exists in the database
        $this->assertDatabaseHas('enrollments', [
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);
    }
}

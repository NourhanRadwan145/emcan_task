<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Enrollment;

class CourseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test course creation functionality.
     *
     * @return void
     */
    public function test_course_creation()
{
    $this->assertDatabaseCount('courses', 0);

    // Create a new course using the Course model
    Course::create([
        'title' => 'New Course',
        'description' => 'This is a test course.',
    ]);

    // Assert that a course with the given title exists in the database
    $this->assertDatabaseHas('courses', ['title' => 'New Course','description' => 'This is a test course.']);

    // Assert that there is now one course in the database
    $this->assertDatabaseCount('courses', 1);
}

public function test_delete_course()
{
    // Delete the course
    $response = $this->delete('/courses/' . 1);

    // Assert that the course is removed from the database
    $this->assertDatabaseMissing('courses', ['id' => 1]);
}


// Update Course
public function test_update_course()
{
    // Create a course
    $course = Course::create([
        'title' => 'Course to be updated',
        'description' => 'This course will be updated.',
    ]);

    $course->update([
        'title' => 'Updated Course',
        'description' => 'Updated Description',

    ]);


      // Assert that the course details are updated in the database
      $this->assertDatabaseHas('courses', [
        'title' => 'Updated Course',
        'description' => 'Updated Description',
    ]);
}

}

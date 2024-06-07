<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;

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

// public function test_search_courses_by_title()
// {
//     // Create sample courses
//     Course::create(['title' => 'Test Course 1', 'description' => 'Description for Test Course 1']);
//     Course::create(['title' => 'Test Course 2', 'description' => 'Description for Test Course 2']);
//     Course::create(['title' => 'Another Course', 'description' => 'Description for Another Course']);

//     $query = ('test');
//     $courses = Course::where('title', 'like', "%$query%")
//                      ->orWhere('description', 'like', "%$query%")
//                      ->get();

//          // Simulate a request to the search results view
//          $response = $this->get(route('search.results'));

//          // Assert that the response is successful (HTTP status code 200)
//          $response->assertStatus(200);


//          // Assert that the response contains the popular courses
//          foreach ($courses as $course) {
//              $response->assertSee($course->title);
//          }
// }

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

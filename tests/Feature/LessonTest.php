<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Course;
use App\Models\Lesson;

class LessonTest extends TestCase
{
    use RefreshDatabase;

    // Create Lesson Test
    public function test_lesson_creation()
    {
        // Ensure there are no lessons in the database before creating a new one
        $this->assertDatabaseCount('lessons', 0);

        // Create a course to which the lesson will belong
        $course = Course::create([
            'title' => 'Course for Lesson',
            'description' => 'This course will have lessons.',
        ]);

        // Create a new lesson using the Lesson model
        Lesson::create([
            'title' => 'New Lesson',
            'content' => 'This is a test lesson.',
            'course_id' => $course->id,
        ]);

        // Assert that a lesson with the given title and content exists in the database
        $this->assertDatabaseHas('lessons', [
            'title' => 'New Lesson',
            'content' => 'This is a test lesson.',
            'course_id' => $course->id,
        ]);

        // Assert that there is now one lesson in the database
        $this->assertDatabaseCount('lessons', 1);
    }


    public function test_update_lesson()
    {
        // Create a course to which the lesson will belong
        $course = Course::create([
            'title' => 'Course for Lesson',
            'description' => 'This course will have lessons.',
        ]);

        // Create a lesson
        $lesson = Lesson::create([
            'title' => 'Lesson to be updated',
            'content' => 'This lesson will be updated.',
            'course_id' => $course->id,
        ]);

        // Update the lesson
        $lesson->update([
            'title' => 'Updated Lesson',
            'content' => 'Updated Content',
        ]);

        // Assert that the lesson details are updated in the database
        $this->assertDatabaseHas('lessons', [
            'title' => 'Updated Lesson',
            'content' => 'Updated Content',
            'course_id' => $course->id,
        ]);
    }
    public function test_delete_lesson()
    {
        // Create a course to which the lesson will belong
        $course = Course::create([
            'title' => 'Course for Lesson',
            'description' => 'This course will have lessons.',
        ]);

        // Create a lesson
        $lesson = Lesson::create([
            'title' => 'Lesson to be deleted',
            'content' => 'This lesson will be deleted.',
            'course_id' => $course->id,
        ]);

        // Assert that the lesson exists in the database
        $this->assertDatabaseHas('lessons', [
            'title' => 'Lesson to be deleted',
            'content' => 'This lesson will be deleted.',
            'course_id' => $course->id,
        ]);

        // Delete the lesson
        $lesson->delete();

        // Assert that the lesson no longer exists in the database
        $this->assertDatabaseMissing('lessons', [
            'title' => 'Lesson to be deleted',
            'content' => 'This lesson will be deleted.',
            'course_id' => $course->id,
        ]);

        // Assert that there are no lessons in the database
        $this->assertDatabaseCount('lessons', 0);
    }
}

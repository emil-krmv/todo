<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Task;
use App\Models\User;
use Tests\TestCase;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;

    protected User $userOwner;
    protected User $userOther;
    protected Task $taskOwner;

    protected function setUp(): void
    {
        parent::setUp();

        $this->userOwner = User::factory()->create();
        $this->userOther = User::factory()->create();
        $this->taskOwner = Task::factory()->create(['user_id' => $this->userOwner->id]);
    }

    /**
     * Checks if the current user can view another user's task.
     */
    public function test_user_cannot_view_foreign_task(): void
    {
        $response = $this->actingAs($this->userOther)->get(route('tasks.show', $this->taskOwner));

        $response->assertForbidden();
    }

    /**
     * Checks if the current user can edit another user's task.
     */
    public function test_user_cannot_edit_foreign_task(): void
    {
        $response = $this->actingAs($this->userOther)->get(route('tasks.edit', $this->taskOwner));

        $response->assertForbidden();
    }

    /**
     * Checks if the current user can update another user's task.
     */
    public function test_user_cannot_update_foreign_task(): void
    {
        $response = $this->actingAs($this->userOther)->patch(route('tasks.update', $this->taskOwner));

        $response->assertForbidden();
    }

    /**
     * Checks if the current user can delete another user's task.
     */
    public function test_user_cannot_delete_foreign_task(): void
    {
        $response = $this->actingAs($this->userOther)->delete(route('tasks.destroy', $this->taskOwner));

        $response->assertForbidden();
    }
}

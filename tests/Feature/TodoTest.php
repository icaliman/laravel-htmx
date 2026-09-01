<?php

namespace Tests\Feature;

use App\View\Components\Todo;
use Tests\TestCase;

class TodoTest extends TestCase
{
    protected function htmx(): static
    {
        return $this->withHeaders(['HX-Request' => 'true']);
    }

    public function test_the_page_renders(): void
    {
        $this->get('/')->assertOk()->assertSee('What needs to be done?')->assertSee('No tasks');
    }

    public function test_a_todo_can_be_added(): void
    {
        $response = $this->htmx()->post('/lamx/todo-form/save', ['title' => 'Buy milk']);

        $response->assertOk();
        $response->assertSee('id="todo-item-1"', false)->assertSee('Buy milk');
        $response->assertSee('id="todo-counter"', false)->assertSee('0 done');
        $response->assertSee('id="form"', false)->assertDontSee('input-error');

        $this->assertSame([['id' => 1, 'title' => 'Buy milk', 'done' => false]], session('todos-list'));
    }

    public function test_the_title_is_required(): void
    {
        $response = $this->htmx()->post('/lamx/todo-form/save', ['title' => '']);

        $response->assertOk()->assertSee('The title field is required.')->assertSee('input-error');
        $response->assertDontSee('todo-item-');

        $this->assertNull(session('todos-list'));
    }

    public function test_a_todo_can_be_toggled_and_removed(): void
    {
        $this->htmx()->post('/lamx/todo-form/save', ['title' => 'Walk the dog']);

        $snapshot = Todo::make(session('todos-list')[0])->snapshot();

        $response = $this->htmx()->post('/lamx/todo/toggle', ['_lamx' => $snapshot]);
        $response->assertOk()->assertSee('line-through')->assertSee('1 done');
        $this->assertTrue(session('todos-list')[0]['done']);

        $response = $this->htmx()->delete('/lamx/todo/remove?_lamx='.urlencode($snapshot));
        $response->assertOk()->assertSee('No tasks')->assertDontSee('todo-item-');
        $this->assertSame([], session('todos-list'));
    }

    public function test_state_snapshots_cannot_be_forged(): void
    {
        $this->htmx()->post('/lamx/todo/toggle', ['_lamx' => 'forged.signature'])->assertStatus(400);
    }
}

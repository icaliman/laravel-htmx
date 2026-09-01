<?php

namespace App\Support;

use Illuminate\Support\Collection;

/**
 * The todos live in the session: no database needed for the demo.
 */
class TodoStore
{
    protected const KEY = 'todos-list';

    /**
     * @return Collection<int, array{id: int, title: string, done: bool}>
     */
    public function all(): Collection
    {
        return collect(session(self::KEY, []))->values();
    }

    public function count(): int
    {
        return $this->all()->count();
    }

    public function doneCount(): int
    {
        return $this->all()->where('done', true)->count();
    }

    public function add(string $title): array
    {
        $todos = $this->all();

        $todo = ['id' => (int) $todos->max('id') + 1, 'title' => $title, 'done' => false];

        $this->save($todos->prepend($todo));

        return $todo;
    }

    public function setDone(int $id, bool $done): void
    {
        $this->save($this->all()->map(fn (array $todo) => $todo['id'] === $id ? ['done' => $done] + $todo : $todo));
    }

    public function remove(int $id): void
    {
        $this->save($this->all()->reject(fn (array $todo) => $todo['id'] === $id));
    }

    protected function save(Collection $todos): void
    {
        session([self::KEY => $todos->values()->all()]);
    }
}
